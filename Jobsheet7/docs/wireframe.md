# Rancangan Wireframe dan User Flow SIMPUS-Mini

Dokumen ini menjelaskan rancangan awal tampilan dan alur penggunaan sistem perpustakaan SIMPUS-Mini. Rancangan dibuat sebagai acuan sebelum masuk ke tahap implementasi fitur.

## 1. Pengguna Sistem

| Pengguna   | Hak Akses                                                                       |
| ---------- | ------------------------------------------------------------------------------- |
| Pengunjung | Melihat halaman beranda dan daftar buku tanpa perlu melakukan login.            |
| Petugas    | Login ke sistem dan mengelola data buku, anggota, serta transaksi perpustakaan. |

## 2. Rancangan Halaman Login

```text
+--------------------------------------+
|             SIMPUS-Mini              |
|--------------------------------------|
|                                      |
|          LOGIN PETUGAS               |
|                                      |
| Username : [________________]        |
| Password : [________________]        |
|                                      |
|             [ MASUK ]                |
|                                      |
+--------------------------------------+
```

Halaman ini digunakan oleh petugas untuk masuk ke dalam sistem. Username dan password menjadi data yang diperlukan sebelum petugas dapat mengakses dashboard.

## 3. Rancangan Dashboard

```text
+-------------------------------------------------------------+
| SIMPUS-Mini | Beranda | Buku | Anggota | Transaksi | Keluar |
|-------------------------------------------------------------|
|                                                             |
|   Total Buku     Total Anggota     Buku Dipinjam            |
|   [   120   ]    [     80     ]    [      15    ]           |
|                                                             |
|   MENU CEPAT                                                |
|   [ Peminjaman ]       [ Pengembalian ]                     |
|                                                             |
|   TRANSAKSI TERAKHIR                                        |
|   Nama | Buku | Tanggal | Keterangan                        |
|                                                             |
+-------------------------------------------------------------+
```

Dashboard menampilkan informasi singkat mengenai jumlah buku, anggota, dan buku yang sedang dipinjam. Petugas juga dapat langsung menuju proses peminjaman atau pengembalian melalui menu yang tersedia.

## 4. Alur Peminjaman

```text
Login
  ↓
Dashboard
  ↓
Peminjaman Baru
  ↓
Pilih Anggota
  ↓
Pilih Buku
  ↓
Periksa Stok
  ↓
Simpan Transaksi
  ↓
Stok Buku Berkurang
```

Peminjaman hanya dapat dilakukan apabila jumlah stok buku masih tersedia.

## 5. Alur Pengembalian

```text
Dashboard
  ↓
Menu Pengembalian
  ↓
Cari Data Peminjaman
  ↓
Pilih Transaksi
  ↓
Konfirmasi Pengembalian
  ↓
Stok Buku Bertambah
  ↓
Kembali ke Dashboard
```

Setelah buku dikembalikan, status transaksi diperbarui dan jumlah stok buku bertambah kembali.

## 6. Fitur Sistem

Fitur yang direncanakan pada tahap ini meliputi login petugas, dashboard, pengelolaan buku, pengelolaan anggota, peminjaman, pengembalian, dan riwayat transaksi.

## 7. Rancangan Form Anggota

```text
+-------------------------------------------------+
|              DATA ANGGOTA BARU                  |
|-------------------------------------------------|
|                                                 |
| ID Anggota    : [___________________________]   |
| Nama          : [___________________________]   |
| Jenis Kelamin : ( ) Laki-laki ( ) Perempuan     |
| Program Studi : [--- Pilih Program Studi ---]   |
| Email         : [___________________________]   |
| No. HP        : [___________________________]   |
| Alamat        : [___________________________]   |
|                                                 |
|             [ BATAL ]   [ SIMPAN ]              |
|                                                 |
+-------------------------------------------------+
```

Form ini digunakan untuk memasukkan data anggota baru ke dalam sistem. Beberapa data seperti ID, nama, dan nomor HP dapat ditetapkan sebagai data yang wajib diisi.

## 8. Alur Pencarian Anggota

```text
Login Petugas
     ↓
Menu Anggota
     ↓
Gunakan Fitur Pencarian
     ↓
Masukkan Nama atau ID
     ↓
Sistem Menampilkan Data
     ↓
Pilih Data Anggota
```

Fitur pencarian membantu petugas menemukan data anggota dengan lebih cepat tanpa harus melihat seluruh daftar anggota.
