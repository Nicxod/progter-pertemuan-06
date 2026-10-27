# progter-pertemuan-06
## Tugas Praktikum Pemrograman Terapan - Pertemuan 6
### Eksplorasi Docker untuk Menjalankan Aplikasi Web & Laravel

**Mahasiswa:** Dominic Xaviera  
**NRP:** 2472011  
**Mata Kuliah:** Pemrograman Terapan  

Repository ini berisi implementasi lengkap tugas praktikum pemrograman terapan mengenai kontainerisasi aplikasi web statis dan framework Laravel menggunakan Docker.

---

### 📁 Struktur Direktori
```text
pert 6/
├── aplikasi-web-sederhana/          # Proyek 1: Web Sederhana (Nginx Alpine)
│   ├── Dockerfile
│   ├── .dockerignore
│   ├── index.html
│   ├── style.css
│   └── app.js
├── laravel-docker/                  # Proyek 2: Laravel 11 + SQLite (Single Container)
│   ├── Dockerfile
│   ├── docker-entrypoint.sh
│   ├── .dockerignore
│   ├── app/
│   ├── database/
│   │   └── database.sqlite
│   ├── routes/web.php
│   └── resources/views/welcome.blade.php
├── screenshots/                     # Bukti Screenshot Pengujian
│   ├── browser_web_sederhana.png    # Screenshot Web Sederhana di Browser (Port 8080)
│   ├── browser_laravel.png          # Screenshot Laravel & SQLite di Browser (Port 8000)
│   └── docker_ps_and_images.png     # Screenshot Terminal docker ps & docker images
├── LAPORAN_LENGKAP_PRAKTIKUM.docx   # Dokumen Word Lengkap Siap Kumpul
├── LAPORAN_LENGKAP_PRAKTIKUM.html   # Dokumen HTML Cetak PDF
├── LAPORAN_PRAKTIKUM.md             # Laporan Lengkap + Jawaban Eksplorasi & Refleksi
└── README.md
```

---

### 🚀 Cara Menjalankan

#### 1. Menjalankan Aplikasi Web Sederhana
```bash
cd aplikasi-web-sederhana
docker build -t web-sederhana:1.0 .
docker run -d -p 8080:80 --name web-sederhana-container web-sederhana:1.0
```
Buka di browser: [http://localhost:8080](http://localhost:8080)

#### 2. Menjalankan Aplikasi Laravel (Single Container Database)
```bash
cd ../laravel-docker
docker build -t laravel-app:1.0 .
docker run -d -p 8000:8000 --name laravel-container laravel-app:1.0
```
Buka di browser: [http://localhost:8000](http://localhost:8000)

---

### 📄 Laporan Lengkap
Seluruh jawaban pertanyaan eksplorasi Laravel (1-6) dan pertanyaan refleksi (1-5) beserta dokumentasi pengerjaan lengkap dapat dibaca pada file:  
👉 **[LAPORAN_LENGKAP_PRAKTIKUM.docx](file:///c:/Users/Dominic/Semester%205/Progter/pert%206/LAPORAN_LENGKAP_PRAKTIKUM.docx)**
