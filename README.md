# Aplikasi Saksi Pilkada Pangandaran 2024

Aplikasi Saksi Pilkada adalah sebuah aplikasi berbasis web untuk membantu pencatatan hasil penghitungan suara pada Pilkada Pangandaran tahun 2024. Aplikasi ini memungkinkan saksi mencatat data hasil suara di setiap TPS secara terorganisir dan memberikan fitur pelaporan berbasis grafik.

## Fitur Utama

1. **Autentikasi Pengguna**:
   - Login dan Logout.
   - Registrasi pengguna baru untuk saksi.

2. **Manajemen Data Saksi**:
   - Tambah, Edit, Hapus, dan Lihat data saksi.
   - Menyimpan data lokasi (geolokasi) saksi.

3. **Input dan Manajemen Hasil Suara**:
   - Tambah, Edit, Hapus, dan Lihat data hasil suara.
   - Data suara meliputi suara kandidat, suara tidak sah, dan lokasi TPS.

4. **Visualisasi Data**:
   - Grafik berbentuk **pie chart** yang menampilkan total suara masing-masing kandidat secara real-time.

5. **Responsif dan Modern**:
   - Dibangun dengan **Bootstrap** untuk tampilan antarmuka yang responsif.
   - Fitur interaktif seperti efek hover pada grafik.

---

## Teknologi yang Digunakan

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap, dan JavaScript
- **Grafik**: Chart.js

---

## Cara Installasi

### 1. Clone Repository
```bash
git clone https://github.com/aleaengineer/Aplikasi-Saksi-Pilkada-2024.git
cd Aplikasi-Saksi-Pilkada
```

### 2. Konfigurasi Database
1. Buat database baru di MySQL (contoh: `saksi_pilkada`).
2. Import file `database.sql` yang sudah disediakan ke dalam database Anda.

   ```bash
   mysql -u [username] -p [database_name] < database.sql
   ```

3. Ubah file **`db.php`** sesuai dengan konfigurasi database Anda:
   ```php
   <?php
   $conn = new mysqli('localhost', 'username', 'password', 'saksi_pilkada');
   if ($conn->connect_error) {
       die("Koneksi gagal: " . $conn->connect_error);
   }
   ?>
   ```

### 3. Jalankan Aplikasi
1. Pindahkan semua file ke folder web server (contoh: `htdocs` di XAMPP).
2. Akses aplikasi melalui browser:
   ```
   http://localhost/Aplikasi-Saksi-Pilkada
   ```

---

## Struktur Direktori

```plaintext
Aplikasi-Saksi-Pilkada/
│
├── index.php           # Halaman login
├── register.php        # Halaman registrasi
├── dashboard.php       # Dashboard utama
├── tambah_saksi.php    # Form tambah data saksi
├── edit_saksi.php      # Form edit data saksi
├── hasil.php           # Halaman input hasil suara
├── grafik.php          # Halaman grafik suara
├── db.php              # Konfigurasi database
├── logout.php          # Logout session
├── uploads/            # Folder untuk menyimpan file yang diunggah
└── README.md           # Dokumentasi
```

---

## Fitur Mendatang

- Notifikasi otomatis melalui bot Telegram untuk perubahan data.
- Laporan hasil suara dalam format PDF.

---

## Kontribusi

Kami terbuka untuk kontribusi! Jika Anda ingin berkontribusi, silakan fork repository ini dan ajukan pull request. Pastikan Anda menulis deskripsi yang jelas untuk perubahan Anda.

---

## Lisensi

Aplikasi ini dirilis di bawah lisensi **MIT**. Silakan gunakan, modifikasi, dan distribusikan sesuai kebutuhan.

---

## Kontak

Jika ada pertanyaan atau masalah, Anda dapat menghubungi:
- **Email**: [mail@farhanmaulana.me](mailto:mail@farhanmaulana.me)
- **GitHub**: [https://github.com/aleaengineer](https://github.com/aleaengineer)
```
