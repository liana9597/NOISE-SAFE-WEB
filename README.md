# 🌐 Language Options:
**English** | [Bahasa Indonesia](README-id.md)

---

# Noise Safe Admin Panel (IoT Control Panel)

A data-rich administrative dashboard built on top of the **Laravel Framework**, custom-engineered to manage smart hearing-assist hardware (Smart Earbuds), monitor live device telemetry, and track customer warranty and service cycles.

# Overview

Noise Safe is an award-winning, integrated IoT innovation designed to support individuals suffering from hyperacusis (extreme hypersensitivity to environmental noise) using intelligent noise-filtering earbuds.

The overall Noise Safe infrastructure operates across 3 foundational tech pillars:
* **IoT Hardware Subsystem:** (Embedded sensors and microcontrollers on the physical earbuds).
* **Companion Mobile Application:** For personal consumer acoustics tuning.
* **Web-Based Admin Panel:** The central business and hardware management engine.

This repository hosts the source code for the **Web-Based Admin Panel**.

The system acts as an enterprise control center enabling administrators to monitor active earbud deployments in the field, track customer purchase logs, and catalog hardware maintenance records. Currently, the web system is fully integrated with the physical IoT hardware modules via active data routing.

---

# Main Features

## 🔌 IoT Device Management & Live Telemetry
Tracks registered smart earbuds connected to the IoT ecosystem with automated operational abilities to:
* Aggregate and display a comprehensive registry of all deployed earbud units.
* Monitor live network connectivity states (*Active / Inactive*).
* Run early anomaly detection against hardware statuses.
* Deliver instant telemetry updates on the dashboard driven by packet transmissions from physical IoT hardware modules.

## 📈 Transactional History & Ownership Mapping
Stores and processes client transaction records to create explicit product ownership maps, indexing critical data such as:
* Complete Customer Profiles.
* Hardware Serial Numbers & Product SKUs.
* Purchase Timestamps & Dynamic Warranty Expiration Dates.
This feature expedites buyer verification before executing technical repair requests.

## 🛠️ Service Logs & Warranty Lifecycle Tracker
An asset-tracking subsystem to manage devices routing through repair centers, cataloging technical reports such as:
* Granular hardware fault and damage diagnoses.
* Technical servicing and component replacement logs written by technicians.
* Warranty validation status checking (Determining complimentary vs. paid repairs).
* Real-time repair pipeline tracking (*Pending / On Progress / Completed*).
* Medical-grade service log histories maintained per hardware serial number.

## 🔒 Admin Authentication & Security Hardening
Secures administrative access against automated dictionary attacks and brute-force bots by embedding mandatory **CAPTCHA** validation checks onto the login portal.

---

# Technologies Used

* **Backend Framework:** Laravel (PHP)
* **Database Engine:** MySQL
* **Scripting Languages:** JavaScript, HTML5 & CSS3

---

# Project Development Status

The system is currently undergoing active deployment and continuous development (*Active Development*).

Current Engineering Milestones:
* Full data integration with physical IoT hardware modules is operational.
* Real-time device telemetry and activity tracking panels are stable.
* Internal admin management (Sales mapping, service tracking, and warranty checking) is functional.
* Data-bridge integration linking the web admin panel with the companion mobile app is actively in progress.

---

# Engineering Team Contribution

* **Liana Syifa Fauzia:** Lead Web Admin Developer & Systems Integrator (Architected core backend routes, mapped relational schemas, engineered panel feature sets, and developed the web-to-hardware IoT communication bridge).
* **Nadiya Yohana Putri:** Public Landing Page Developer, led automated CAPTCHA security hardening, and acted as a functional system tester.
* **Hani Ayu Fadila:** Admin Panel Quality Control (QC) Tester & landing page asset designer.

---

# Screenshots

## Secured Admin Login Gateway (with CAPTCHA)
![Login Page](screenshots/login-page.png)

## Central IoT Telemetry & Device Monitoring Console
![Admin Dashboard](screenshots/admin-dashboard.png)

## Public Product Showroom (Landing Page)
![Landing Page](screenshots/landing-page.png)

---

# Key Highlights

* Modular Laravel admin architecture written following industry *Clean Code* conventions.
* Successful technical implementation of centralized IoT hardware monitoring.
* End-to-end management pipeline for hardware asset servicing (*Service Logs*).
* Instant computation and display of physical unit connectivity states.
* Managed within a highly structured, medium-scale collaborative team environment.
* Strongly embraces the architectural philosophy of *Real-time System Integration*.
