#include "esp_bt.h"
#include <HTTPClient.h>
#include <WiFi.h>
#include <HardwareSerial.h>


// ================= WIFI =================
const char *ssid = "Employees";
const char *password = "###HorizonU";

// ================= SIM800L =================
// Wiring SIM800L:
//   SIM800L TX  -> GPIO 26 (RX1 ESP32)
//   SIM800L RX  -> GPIO 27 (TX1 ESP32)
//   SIM800L VCC -> Sumber daya 3.7V–4.2V (LiPo / step-down dari 5V)
//                  JANGAN langsung dari 3.3V ESP32 (tidak cukup arus!)
//   SIM800L GND -> GND bersama ESP32
//   SIM800L RST -> GPIO 5  (opsional, untuk hard-reset via software)
//
// Catatan Penting:
//   - SIM800L membutuhkan arus puncak hingga 2A, gunakan kapasitor 1000uF
//     paralel di pin VCC-GND SIM800L untuk stabilisasi.
//   - Pastikan kartu SIM sudah aktif dan mendukung layanan data (GPRS).
//   - APN disesuaikan dengan operator kartu SIM Anda (lihat bagian CONFIG).
HardwareSerial sim800Serial(1); // UART1: RX=26, TX=27
#define SIM800_TX_PIN 26
#define SIM800_RX_PIN 27
#define SIM800_RST_PIN 5

// ---- Ganti APN sesuai operator kartu SIM Anda ----
// Telkomsel : "internet"
// Indosat   : "indosatgprs"
// XL        : "internet"
// Tri       : "3gprs"
// Smartfren : "smart"
const char *apn = "internet";   // APN operator

/*
 * ================= WIRING DIAGRAM =================
 *
 * 1. PUSH BUTTON (Tombol Darurat)
 *    - Kaki 1 tombol  -> PIN 4
 *    - Kaki 2 tombol  -> GND
 *    (Tidak perlu resistor tambahan karena software memakai INPUT_PULLUP)
 *
 * 2. BUZZER (Speaker Alarm)
 *    - Pin Positif (+) -> PIN 25
 *    - Pin Negatif (-) -> GND
 *
 * 3. SOUND SENSOR (Sensor Kebisingan Suara / Analog)
 *    - Pin AO / Out    -> PIN 34
 *    - Pin VCC         -> 3.3V
 *    - Pin GND         -> GND
 *
 * 4. SIM800L GSM/GPRS (PENGGANTI MODUL GPS)
 *    - Pin TX SIM800L  -> PIN 26 (RX1 ESP32)
 *    - Pin RX SIM800L  -> PIN 27 (TX1 ESP32)
 *    - Pin RST SIM800L -> PIN 5  (opsional)
 *    - Pin VCC SIM800L -> 3.7V–4.2V (bukan dari 3.3V ESP32)
 *    - Pin GND SIM800L -> GND bersama
 *
 * 5. LED STATUS
 *    - Terhubung otomatis ke LED On-Board ESP32 (PIN 2)
 *
 * ==================================================
 */

// ================= PIN =================
#define BUTTON_PIN 4
#define BUZZER_PIN 25
#define SOUND_PIN 34
#define LED_PIN 2

// ================= CONFIG =================
int noiseThreshold = 2000;
unsigned long lastSend = 0;
int sendInterval = 10000;

// ================= DEVICE INFO =================
String device_id = "1"; // Ganti dengan ID device yang terdaftar di database
String user_id = "1";   // Ganti dengan ID user yang terdaftar di database

// ================= STATE =================
bool wifiConnected = false;
bool gsmReady = false;
volatile bool emergencyTriggered = false;

// ================= DEKLARASI FUNGSI =================
void connectWiFi();
void checkWiFi();
void ledStatus();
void blinkFast();
void blinkSlow();
void alarmNoise();
void alarmEmergency();
void sendLocation(String rawGprsLoc, String status, int noiseValue,
                  String level, String message);
void sendViaGSM(String url);
bool initGSM();
String getRawGPRSLocation();
bool sendATCommand(String command, String expected, unsigned long timeout);
String urlEncode(String str);
static void smartDelay(unsigned long ms);

// ================= ISR (INTERRUPT) =================
// Fungsi ini dipanggil secara otomatis HANYA detik itu spesifik tombol ditekan
void IRAM_ATTR buttonInterrupt() {
  emergencyTriggered = true;
}

// ================= SETUP =================
void setup() {
  Serial.begin(115200);

  // Matikan Bluetooth (biar ringan)
  btStop();

  // PIN MODE
  pinMode(BUTTON_PIN, INPUT_PULLUP);
  pinMode(BUZZER_PIN, OUTPUT);
  pinMode(LED_PIN, OUTPUT);
  pinMode(SIM800_RST_PIN, OUTPUT);
  digitalWrite(SIM800_RST_PIN, HIGH); // Pastikan RST tidak aktif saat boot

  // Buat tombol jadi prioritas (Interrupt)
  attachInterrupt(digitalPinToInterrupt(BUTTON_PIN), buttonInterrupt, FALLING);

  // SIM800L (UART1)
  sim800Serial.begin(9600, SERIAL_8N1, SIM800_TX_PIN, SIM800_RX_PIN);
  delay(3000); // Tunggu SIM800L siap boot

  // WIFI (prioritas utama)
  connectWiFi();

  // Inisialisasi GSM sebagai fallback
  gsmReady = initGSM();
}

// ================= SMART DELAY =================
static void smartDelay(unsigned long ms) {
  unsigned long start = millis();
  do {
    // Buang data serial SIM800L yang tidak dipakai di loop utama
    while (sim800Serial.available()) {
      sim800Serial.read();
    }
    delay(10);
  } while (millis() - start < ms);
}

// ================= LOOP =================
void loop() {

  // ===== WIFI CHECK =====
  checkWiFi();

  // ===== LED STATUS =====
  ledStatus();

  // ===== SOUND READ =====
  int soundValue = analogRead(SOUND_PIN);

  Serial.print("Sound: ");
  Serial.println(soundValue);

  // ===== CLASSIFICATION =====
  String level;
  if (soundValue < 1500)
    level = "SUNYI";
  else if (soundValue < 2500)
    level = "SEDANG";
  else
    level = "BISING";

  // ===== GET GPRS LOCATION (JIKA DIBUTUHKAN) =====
  String rawGprsLoc = "";

  // ===== EMERGENCY BUTTON =====
  if (emergencyTriggered) {
    emergencyTriggered = false; // Reset status

    Serial.println("🚨 EMERGENCY BUTTON PRESSED!");
    rawGprsLoc = getRawGPRSLocation();
    
    // KIRIM KE DATABASE TERLEBIH DAHULU (LANGSUNG)
    sendLocation(rawGprsLoc, "EMERGENCY", soundValue, level,
                 "Anak anda perlu bantuan, segera datangi ke lokasi");

    // Baru bunyikan alarm
    alarmEmergency();
    smartDelay(3000);
  }

  // ===== NOISE DETECTION =====
  if (soundValue > noiseThreshold) {
    Serial.println("🔊 NOISE DETECTED!");
    rawGprsLoc = getRawGPRSLocation();
    
    // KIRIM KE DATABASE TERLEBIH DAHULU (LANGSUNG)
    sendLocation(rawGprsLoc, "NOISE", soundValue, level, "");

    // Baru bunyikan alarm
    alarmNoise();
    smartDelay(2000);
  }

  // ===== AUTO SEND =====
  if (millis() - lastSend > sendInterval) {
    rawGprsLoc = getRawGPRSLocation();
    sendLocation(rawGprsLoc, "NORMAL", soundValue, level, "");
    lastSend = millis();
  }

  smartDelay(200);
}

// ================= WIFI CONNECT =================
void connectWiFi() {
  Serial.print("Connecting WiFi");

  WiFi.begin(ssid, password);

  int attempt = 0;
  while (WiFi.status() != WL_CONNECTED && attempt < 20) {
    Serial.print(".");
    blinkFast();
    attempt++;
  }

  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("\n✅ WiFi Connected: " + WiFi.localIP().toString());
    wifiConnected = true;
  } else {
    Serial.println("\n⚠️  WiFi gagal terhubung. Akan gunakan GSM sebagai fallback.");
    WiFi.disconnect(true);
    wifiConnected = false;
  }
}

// ================= WIFI CHECK =================
void checkWiFi() {
  if (WiFi.status() != WL_CONNECTED) {
    Serial.println("⚠️ WiFi Lost!");
    wifiConnected = false;
    connectWiFi();
  } else {
    wifiConnected = true;
  }
}

// ================= LED =================
void ledStatus() {
  if (wifiConnected || gsmReady) {
    digitalWrite(LED_PIN, HIGH); // nyala stabil = ada koneksi
  } else {
    blinkSlow();
  }
}

void blinkFast() {
  digitalWrite(LED_PIN, HIGH);
  delay(150);
  digitalWrite(LED_PIN, LOW);
  delay(150);
}

void blinkSlow() {
  digitalWrite(LED_PIN, HIGH);
  delay(500);
  digitalWrite(LED_PIN, LOW);
  delay(500);
}

// ================= BUZZER =================
void alarmNoise() {
  for (int i = 0; i < 3; i++) {
    tone(BUZZER_PIN, 1500);
    smartDelay(150);
    noTone(BUZZER_PIN);
    smartDelay(150);
  }
}

void alarmEmergency() {
  for (int i = 0; i < 6; i++) {
    tone(BUZZER_PIN, 1000);
    smartDelay(200);
    noTone(BUZZER_PIN);
    smartDelay(200);
  }
}

// ================= URL ENCODE =================
String urlEncode(String str) {
  String encodedString = "";
  char c;
  char code0;
  char code1;
  for (int i = 0; i < str.length(); i++) {
    c = str.charAt(i);
    if (c == ' ') {
      encodedString += '+';
    } else if (isalnum(c)) {
      encodedString += c;
    } else {
      code1 = (c & 0xf) + '0';
      if ((c & 0xf) > 9) {
        code1 = (c & 0xf) - 10 + 'A';
      }
      c = (c >> 4) & 0xf;
      code0 = c + '0';
      if (c > 9) {
        code0 = c - 10 + 'A';
      }
      encodedString += '%';
      encodedString += code0;
      encodedString += code1;
    }
  }
  return encodedString;
}

// ================= SEND DATA (WiFi / GSM Fallback) =================
void sendLocation(String rawGprsLoc, String status, int noiseValue,
                  String level, String message) {

  // Susun URL yang akan dikirim ke server
  String url = "http://10.61.5.30/NOISE-SAFE-WEB/backend_api/send.php?";
  url += "device_id=" + device_id;
  url += "&user_id=" + user_id;

  // Kirim string lokasi GPRS jika ada
  if (rawGprsLoc != "") {
    url += "&gprs_loc=" + urlEncode(rawGprsLoc);
  }

  url += "&status=" + status;
  url += "&noise=" + String(noiseValue);
  url += "&level=" + level;

  if (message != "") {
    url += "&message=" + urlEncode(message);
  }

  Serial.println("Sending: " + url);

  // ── Prioritas 1: WiFi ──────────────────────────────────────────────
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(url);
    int httpCode = http.GET();

    Serial.print("HTTP Response Code (WiFi): ");
    Serial.println(httpCode);

    if (httpCode > 0) {
      Serial.println("Server Response: " + http.getString());
    } else {
      Serial.println("WiFi HTTP Error: " + http.errorToString(httpCode));
    }
    http.end();

  // ── Prioritas 2: GSM / SIM800L (fallback) ─────────────────────────
  } else if (gsmReady) {
    Serial.println("📡 WiFi tidak tersedia, mencoba via GSM...");
    sendViaGSM(url);

  } else {
    Serial.println("❌ Tidak ada koneksi (WiFi & GSM tidak tersedia)");
  }
}

// ================= GET GPRS LOCATION =================
String getRawGPRSLocation() {
  if (!gsmReady) return "";

  // Buka bearer, hiraukan error jika sudah terbuka
  sendATCommand("AT+SAPBR=3,1,\"Contype\",\"GPRS\"", "OK", 2000);
  sendATCommand("AT+SAPBR=3,1,\"APN\",\"" + String(apn) + "\"", "OK", 2000);
  sendATCommand("AT+SAPBR=1,1", "OK", 3000);

  // Bersihkan buffer
  while (sim800Serial.available()) sim800Serial.read();
  
  sim800Serial.println("AT+CIPGSMLOC=1,1");
  Serial.println(">> AT+CIPGSMLOC=1,1");

  String response = "";
  unsigned long startTime = millis();
  bool gotLoc = false;

  while (millis() - startTime < 15000) {
    while (sim800Serial.available()) {
      char c = (char)sim800Serial.read();
      response += c;
    }
    if (response.indexOf("+CIPGSMLOC:") != -1 && response.indexOf("OK") != -1) {
      gotLoc = true;
      break;
    }
    if (response.indexOf("ERROR") != -1) {
      break;
    }
    delay(10);
  }

  if (gotLoc) {
    Serial.println("<< " + response);
    // Parsing response: +CIPGSMLOC: 0,106.8456,-6.2088,2023/10/10,12:00:00
    int idx1 = response.indexOf("+CIPGSMLOC:");
    if (idx1 != -1) {
      int idxColon = response.indexOf(":", idx1);
      int idxEnd = response.indexOf("\r", idxColon); // Atau newline
      if (idxEnd == -1) idxEnd = response.length();
      
      String rawData = response.substring(idxColon + 1, idxEnd);
      rawData.trim(); // Menghilangkan spasi berlebih
      return rawData;
    }
  } else {
    Serial.println("❌ Gagal mendapatkan lokasi GPRS");
  }
  return "";
}

// ================= GSM INIT =================
bool initGSM() {
  Serial.println("🔌 Inisialisasi SIM800L...");

  // Hard-reset SIM800L via pin RST (opsional tapi dianjurkan)
  digitalWrite(SIM800_RST_PIN, LOW);
  delay(200);
  digitalWrite(SIM800_RST_PIN, HIGH);
  delay(3000);

  // Cek komunikasi dasar
  if (!sendATCommand("AT", "OK", 3000)) {
    Serial.println("❌ SIM800L tidak merespons");
    return false;
  }

  // Cek registrasi jaringan (0,1 = terdaftar; 0,5 = roaming)
  if (!sendATCommand("AT+CREG?", "+CREG: 0,1", 5000) &&
      !sendATCommand("AT+CREG?", "+CREG: 0,5", 5000)) {
    Serial.println("❌ SIM800L belum terdaftar ke jaringan GSM");
    return false;
  }

  Serial.println("✅ SIM800L siap");
  return true;
}

// ================= SEND VIA GSM (HTTP GET via AT Command) =================
void sendViaGSM(String url) {

  // Pastikan GPRS bearer ditutup jika sebelumnya terbuka
  sendATCommand("AT+SAPBR=0,1", "OK", 5000);
  delay(500);

  // --- Konfigurasi Bearer / GPRS ---
  if (!sendATCommand("AT+SAPBR=3,1,\"Contype\",\"GPRS\"", "OK", 5000)) {
    Serial.println("❌ GSM: Gagal set Contype");
    return;
  }

  String apnCmd = "AT+SAPBR=3,1,\"APN\",\"" + String(apn) + "\"";
  if (!sendATCommand(apnCmd, "OK", 5000)) {
    Serial.println("❌ GSM: Gagal set APN");
    return;
  }

  // Buka koneksi GPRS
  if (!sendATCommand("AT+SAPBR=1,1", "OK", 10000)) {
    Serial.println("❌ GSM: Gagal membuka koneksi GPRS");
    return;
  }

  // --- HTTP Init ---
  if (!sendATCommand("AT+HTTPINIT", "OK", 5000)) {
    Serial.println("❌ GSM: Gagal HTTPINIT");
    sendATCommand("AT+SAPBR=0,1", "OK", 5000); // tutup bearer
    return;
  }

  sendATCommand("AT+HTTPPARA=\"CID\",1", "OK", 3000);

  String urlCmd = "AT+HTTPPARA=\"URL\",\"" + url + "\"";
  if (!sendATCommand(urlCmd, "OK", 5000)) {
    Serial.println("❌ GSM: Gagal set URL");
    sendATCommand("AT+HTTPTERM", "OK", 3000);
    sendATCommand("AT+SAPBR=0,1", "OK", 5000);
    return;
  }

  // --- HTTP GET ---
  if (!sendATCommand("AT+HTTPACTION=0", "+HTTPACTION: 0,200", 15000)) {
    Serial.println("⚠️  GSM: HTTP Action selesai (status mungkin bukan 200)");
  }

  // Baca respons (opsional, hanya untuk debug)
  sim800Serial.println("AT+HTTPREAD");
  delay(2000);
  while (sim800Serial.available()) {
    Serial.write(sim800Serial.read());
  }

  // --- Cleanup ---
  sendATCommand("AT+HTTPTERM", "OK", 3000);
  sendATCommand("AT+SAPBR=0,1", "OK", 5000);

  Serial.println("✅ GSM: Data berhasil dikirim");
}

// ================= AT COMMAND HELPER =================
// Kirim AT command dan tunggu respons yang diharapkan dalam batas waktu
bool sendATCommand(String command, String expected, unsigned long timeout) {
  // Bersihkan buffer terlebih dahulu
  while (sim800Serial.available()) {
    sim800Serial.read();
  }

  sim800Serial.println(command);
  Serial.println(">> " + command);

  String response = "";
  unsigned long startTime = millis();

  while (millis() - startTime < timeout) {
    while (sim800Serial.available()) {
      char c = (char)sim800Serial.read();
      response += c;
    }
    if (response.indexOf(expected) != -1) {
      Serial.println("<< " + response);
      return true;
    }
    delay(10);
  }

  Serial.println("<< TIMEOUT / Unexpected: " + response);
  return false;
}