# Laporan Pengujian Manual (Test Case) - Pertemuan 10
**Fitur:** CRUD Course (Create + Read)  
**Proyek:** KursusKu  
**Tanggal Pengujian:** 2 November 2026  

---

## Tabel Pengujian Manual (8 Skenario Wajib)

| No | Skenario | Input Utama | Hasil yang Diharapkan | Hasil Aktual | Status |
| :---: | :--- | :--- | :--- | :--- | :---: |
| **1** | **Simpan data valid** | Code: `WEB-101`<br>Name: `Web Dasar`<br>Fee: `300000`<br>Quota: `25`<br>Start Date: `15/11/2026`<br>Status: `open` | Data tersimpan ke MySQL, redirect ke `/courses`, dan pesan sukses *"Kursus berhasil ditambahkan."* tampil. | Data tersimpan, halaman terarah ke index, pesan sukses hijau muncul. | **Lulus** |
| **2** | **Kode kosong** | Code: *(dikosongkan)*<br>Field lain valid | Validasi gagal, data tidak tersimpan ke database, pesan error *"The code field is required."* tampil di bawah kolom kode. | Form menolak pengiriman, muncul pesan validasi error pada field kode. | **Lulus** |
| **3** | **Kode duplikat** | Code: `WEB-101` *(diinput kembali untuk kedua kali)* | Ditolak oleh rule `unique:courses,code`, data tidak tersimpan, pesan error duplikasi tampil. | Sistem menolak input dan menampilkan pesan bahwa kode kursus sudah digunakan. | **Lulus** |
| **4** | **Nama kosong** | Name: *(dikosongkan)*<br>Field lain valid | Validasi gagal, data tidak tersimpan, pesan error nama wajib diisi tampil. | Form gagal dikirim dan pesan validasi error muncul pada field nama. | **Lulus** |
| **5** | **Biaya negatif** | Fee: `-1000` | Ditolak oleh rule `min:0`, data tidak tersimpan, pesan error nilai minimal tampil. | Validasi menolak input negatif dan meminta nilai minimal 0. | **Lulus** |
| **6** | **Kuota 0** | Quota: `0` | Ditolak oleh rule `min:1`, data tidak tersimpan, pesan error kuota minimal tampil. | Form menolak angka 0 dan menampilkan pesan kuota minimal 1. | **Lulus** |
| **7** | **Status tidak valid** | Status: `active` *(diubah via inspect element)* | Ditolak oleh rule `in:draft,open,closed`, data tidak tersimpan ke database. | Server menolak input dan mengembalikan validasi error pada field status. | **Lulus** |
| **8** | **Daftar tampil ulang** | Akses/Reload URL `/courses` setelah input data | Data tetap tampil secara konsisten di tabel karena sudah tersimpan permanen di database MySQL. | Seluruh data yang diinput tetap muncul lengkap di tabel daftar kursus. | **Lulus** |

---

## Ringkasan Evidence Tambahan
* **Test Case Valid (#1):** Screenshot halaman daftar (`04-index-8-data.png`) & pengecekan baris pada tabel `courses` di MySQL.
* **Test Case Invalid (#2-#7):** Screenshot pesan validasi berwarna merah pada form (`05-validation-error.png`).