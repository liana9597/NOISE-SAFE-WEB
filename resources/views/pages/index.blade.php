@extends('layouts.app')

@section('title', 'Noise Safe - Earbud Pintar untuk Disabilitas Sensorik')
@section('meta_description', 'Earbud noise cancelling dengan GPS real-time dan suara menenangkan untuk anak dengan disabilitas sensorik. Pantau lokasi anak dari aplikasi orang tua.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-50 to-white pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-blue-900 leading-tight">
                        Tenang di Tengah Kebisingan
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Earbud pintar dengan noise cancelling otomatis dan fitur keamanan GPS real-time untuk anak dengan disabilitas sensorik.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#waiting-list" 
                           class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-full font-semibold hover:bg-yellow-500 transition shadow-xl text-lg">
                            Daftar Waiting List
                        </a>
                        <a href="#fitur" 
                           class="bg-white text-blue-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-50 transition border-2 border-blue-600 text-lg">
                            Pelajari Fitur
                        </a>
                    </div>
                    
                    <!-- Counter -->
                    <div class="flex items-center space-x-4 pt-4">
                        <div class="flex -space-x-2">
                            <div class="w-10 h-10 bg-blue-100 rounded-full border-2 border-white flex items-center justify-center text-blue-600 font-bold">A</div>
                            <div class="w-10 h-10 bg-blue-100 rounded-full border-2 border-white flex items-center justify-center text-blue-600 font-bold">B</div>
                            <div class="w-10 h-10 bg-blue-100 rounded-full border-2 border-white flex items-center justify-center text-blue-600 font-bold">C</div>
                        </div>
                        <p class="text-sm text-gray-500">
                            <span class="font-bold text-blue-600">{{ $totalWaitingList ?? 0 }}+</span> orang sudah mendaftar waiting list
                        </p>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="absolute inset-0 bg-blue-100 rounded-full blur-3xl opacity-30"></div>
                    <div class="bg-blue-100 h-96 rounded-2xl flex items-center justify-center relative z-10">
                        <div class="absolute -top-4 -right-4 bg-white p-4 rounded-2xl shadow-lg">
                            <p class="text-sm font-semibold">Noise Cancelling</p>
                            <p class="text-xs text-gray-500">-32dB</p>
                        </div>
                        <div class="absolute -bottom-4 -left-4 bg-white p-4 rounded-2xl shadow-lg">
                            <p class="text-sm font-semibold">GPS Real-time</p>
                            <p class="text-xs text-gray-500">Akurasi 5m</p>
                        </div>
                        <p class="text-blue-600 text-lg">[Gambar Earbud]</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Problem Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">
                    Tantangan yang Dihadapi
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Setiap hari, anak dengan disabilitas sensorik berjuang melawan kebisingan yang mengganggu
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6">
                    <div class="bg-red-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Sensitivitas Suara</h3>
                    <p class="text-gray-600">Suara bising bisa memicu kecemasan dan kepanikan pada anak</p>
                </div>
                <div class="text-center p-6">
                    <div class="bg-red-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Keterbatasan Komunikasi</h3>
                    <p class="text-gray-600">Sulit menyampaikan saat butuh bantuan di tempat ramai</p>
                </div>
                <div class="text-center p-6">
                    <div class="bg-red-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Kekhawatiran Orang Tua</h3>
                    <p class="text-gray-600">Tidak bisa memantau kondisi anak setiap saat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Unggulan -->
    <section id="fitur" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">
                    Fitur Unggulan Noise Safe
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Dirancang khusus untuk memberikan ketenangan bagi anak dan orang tua
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1: Noise Cancelling -->
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">🔇 Noise Cancelling Otomatis</h3>
                    <p class="text-gray-600">Meredam suara bising hingga 32dB secara otomatis saat terdeteksi kebisingan berlebih.</p>
                </div>
                
                <!-- Card 2: Suara Menenangkan -->
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">🎵 Suara Menenangkan</h3>
                    <p class="text-gray-600">Putar otomatis white noise atau suara alam saat sistem mendeteksi kepanikan.</p>
                </div>
                
                <!-- Card 3: Tombol Darurat -->
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">🆘 Tombol Darurat</h3>
                    <p class="text-gray-600">Tekan untuk kirim notifikasi instan ke orang tua jika butuh bantuan segera.</p>
                </div>
                
                <!-- Card 4: GPS Real-time -->
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition border border-gray-100">
                    <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">📍 GPS Real-time</h3>
                    <p class="text-gray-600">Pantau lokasi anak secara langsung dari aplikasi di HP orang tua.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja -->
    <section id="cara-kerja" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">
                    Cara Kerja Noise Safe
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Tiga langkah sederhana untuk ketenangan anak dan orang tua
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center relative">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">
                        1
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-3">
                        Anak Pakai Earbud
                    </h3>
                    <p class="text-gray-600">
                        Earbud nyaman dipakai seharian dengan baterai tahan 12 jam
                    </p>
                </div>
                
                <!-- Step 2 -->
                <div class="text-center relative">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">
                        2
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-3">
                        Suara Bising Teredam
                    </h3>
                    <p class="text-gray-600">
                        Noise cancelling otomatis aktif, suara menenangkan diputar jika perlu
                    </p>
                </div>
                
                <!-- Step 3 -->
                <div class="text-center">
                    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-6">
                        3
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-3">
                        Butuh Bantuan? Notifikasi!
                    </h3>
                    <p class="text-gray-600">
                        Tekan tombol darurat, orang tua langsung tahu lokasi via aplikasi
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Harga & Paket -->
    <section id="harga" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">
                    Pilih Paket yang Tepat
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Investasi untuk ketenangan buah hati Anda
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Starter Package -->
                <div class="bg-white border-2 border-gray-200 rounded-3xl p-8 hover:shadow-xl transition">
                    <h3 class="text-2xl font-bold text-blue-900 mb-2">Starter</h3>
                    <p class="text-gray-500 mb-6">Cocok untuk mencoba fitur dasar</p>
                    
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-blue-900">Rp 1.299.000</span>
                    </div>
                    
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            1 unit Earbud Noise Safe
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Akses aplikasi 6 bulan
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Garansi 1 tahun
                        </li>
                    </ul>
                    
                    <a href="#waiting-list" 
                       class="block text-center bg-blue-600 text-white py-4 rounded-full font-semibold hover:bg-blue-700 transition">
                        Daftar Waiting List
                    </a>
                </div>
                
                <!-- Complete Package (Recommended) -->
                <div class="bg-blue-600 text-white rounded-3xl p-8 hover:shadow-xl transition relative">
                    <div class="absolute top-0 right-8 bg-yellow-400 text-blue-900 px-4 py-2 rounded-b-lg font-semibold text-sm">
                        REKOMENDASI
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-2">Complete</h3>
                    <p class="text-blue-100 mb-6">Solusi lengkap untuk keamanan maksimal</p>
                    
                    <div class="mb-6">
                        <span class="text-4xl font-bold">Rp 1.999.000</span>
                    </div>
                    
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            1 unit Earbud Noise Safe
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Akses aplikasi SEUMUR HIDUP
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Garansi 2 tahun
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            FREE 1 tahun langganan suara premium
                        </li>
                    </ul>
                    
                    <a href="#waiting-list" 
                       class="block text-center bg-yellow-400 text-blue-900 py-4 rounded-full font-semibold hover:bg-yellow-500 transition">
                        Daftar Waiting List
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- WAITING LIST SECTION (UTAMA) -->
    <section id="waiting-list" class="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
        <div class="max-w-4xl mx-auto text-center px-4">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Siap Memberikan Ketenangan untuk Buah Hati?
            </h2>
            <p class="text-xl mb-10 text-blue-100">
                Dapatkan akses early access dan diskon khusus untuk pendaftar waiting list!
            </p>
            
            <!-- Tampilkan pesan sukses kalau ada -->
            @if(session('success'))
                <div class="mb-6 bg-green-500 text-white px-6 py-4 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- Form Waiting List -->
            <form action="{{ route('waiting-list.store') }}" method="POST" class="max-w-md mx-auto">
                @csrf
                
                <div class="mb-4">
                    <input type="text" 
                           name="name" 
                           placeholder="Nama Lengkap" 
                           class="w-full px-4 py-3 rounded-full text-gray-900 @error('name') border-2 border-red-500 @enderror"
                           value="{{ old('name') }}"
                           required>
                    @error('name')
                        <p class="text-red-300 text-sm mt-1 text-left">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <input type="email" 
                           name="email" 
                           placeholder="Email" 
                           class="w-full px-4 py-3 rounded-full text-gray-900 @error('email') border-2 border-red-500 @enderror"
                           value="{{ old('email') }}"
                           required>
                    @error('email')
                        <p class="text-red-300 text-sm mt-1 text-left">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <input type="tel" 
                           name="phone" 
                           placeholder="Nomor WhatsApp" 
                           class="w-full px-4 py-3 rounded-full text-gray-900 @error('phone') border-2 border-red-500 @enderror"
                           value="{{ old('phone') }}"
                           required>
                    @error('phone')
                        <p class="text-red-300 text-sm mt-1 text-left">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <select name="package" class="w-full px-4 py-3 rounded-full text-gray-900">
                        <option value="starter">Paket Starter - Rp 1.299.000</option>
                        <option value="complete">Paket Complete - Rp 1.999.000 (Rekomendasi)</option>
                    </select>
                </div>
                
                <button type="submit" 
                        class="bg-yellow-400 text-gray-900 px-10 py-4 rounded-full font-semibold hover:bg-yellow-500 transition text-xl shadow-2xl w-full">
                    Daftar Waiting List Sekarang
                </button>
            </form>
            
            <p class="text-blue-200 mt-4 text-sm">
                *Data Anda aman dan tidak akan disalahgunakan
            </p>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="text-lg text-gray-600">
                    Ada yang ingin ditanyakan? Kami siap membantu
                </p>
            </div>
            
            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <button class="w-full px-6 py-4 text-left font-semibold text-blue-900 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span>Apakah cocok untuk semua usia?</span>
                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">
                            Noise Safe dirancang khusus untuk anak-anak dan remaja (usia 5-18 tahun) dengan disabilitas sensorik. Ukuran earbud dapat disesuaikan dengan berbagai ukuran telinga.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ 2 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <button class="w-full px-6 py-4 text-left font-semibold text-blue-900 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span>Bagaimana cara setting suara di earbud?</span>
                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">
                            Anda bisa mengatur jenis suara menenangkan (white noise, suara alam, musik instrumental) melalui aplikasi Noise Safe di smartphone.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ 3 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <button class="w-full px-6 py-4 text-left font-semibold text-blue-900 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span>Kapan produk dikirim?</span>
                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">
                            Pengiriman untuk waiting list batch pertama akan dimulai setelah produksi selesai. Anda akan mendapatkan notifikasi via email.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ 4 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <button class="w-full px-6 py-4 text-left font-semibold text-blue-900 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span>Garansi berapa lama?</span>
                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">
                            Paket Starter mendapatkan garansi 1 tahun, sedangkan Paket Complete mendapatkan garansi 2 tahun.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ 5 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <button class="w-full px-6 py-4 text-left font-semibold text-blue-900 flex justify-between items-center" onclick="toggleFAQ(this)">
                        <span>Aplikasinya gratis atau berbayar?</span>
                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-4 hidden">
                        <p class="text-gray-600">
                            Aplikasi pendamping tersedia gratis. Paket Starter mendapatkan akses fitur lengkap selama 6 bulan, Paket Complete mendapatkan akses seumur hidup.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
    
    // Tutup mobile menu saat klik link
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.add('hidden');
        });
    });
</script>
@endpush