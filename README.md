Dibuat oleh NusaCloudHost.Com. Bebas digunakan dan dikembangkan kembali.

# Baca Juga - WordPress Plugin

**Baca Juga** adalah plugin WordPress ringan yang dirancang untuk meningkatkan *internal linking* dan *user engagement* dengan menyisipkan rekomendasi artikel terkait secara otomatis di dalam konten postingan.

## 📋 Deskripsi
Plugin ini bekerja dengan memindai konten artikel dan menyisipkan kotak "Baca Juga" setiap 2 paragraf. Artikel yang direkomendasikan diambil secara acak berdasarkan kategori yang sama dengan artikel yang sedang dibaca, sehingga menjaga relevansi konten bagi pembaca.

## ✨ Fitur Utama
- **Otomatis & Dinamis:** Menyisipkan link internal tanpa perlu input manual di setiap postingan.
- **Relevansi Kategori:** Mengambil artikel terkait dari kategori yang sama (`category__in`).
- **Mode Acak (Randomize):** Menggunakan `orderby => rand` agar rekomendasi selalu variatif setiap kali halaman dimuat.
- **Desain Adaptif:** Menggunakan CSS minimal agar tampilan kotak selaras dengan font dan gaya tema WordPress yang digunakan.
- **Optimasi Performa:** Script hanya berjalan pada halaman artikel tunggal (`is_single`) untuk menghemat sumber daya server.

## 🛠️ Detail Teknis (Cara Kerja)
1. **Keamanan:** Mencegah akses langsung ke file melalui script `ABSPATH`.
2. **Parsing Konten:** Menggunakan fungsi `explode('</p>', $content)` untuk memecah artikel menjadi array paragraf.
3. **Logika Modulo:** Menggunakan operator sisa bagi (`$current_p_number % 2 == 0`) untuk menentukan posisi penyisipan setiap 2 paragraf.
4. **Integrasi WP_Query:** Memanggil `get_posts` dengan parameter kategori untuk mendapatkan maksimal 10 data artikel terkait.

## 🚀 Instalasi
1. Unduh atau salin file `baca-juga.php`.
2. Unggah file tersebut ke direktori `/wp-content/plugins/baca-juga/`.
3. Aktifkan plugin melalui menu **Plugins** di Dashboard WordPress Anda.
4. Plugin akan langsung bekerja pada semua artikel tunggal (single post).

## 🎨 Kustomisasi
Untuk mengubah jarak kemunculan link, cari baris berikut pada kode:
```php
if ($current_p_number % 2 == 0 ...

