Berikut **Test Matrix Pertemuan 13** untuk fitur pencarian, filter, dan pagination server-side GET pada proyek **KursusKu** (`[http://127.0.0.1:8000/courses](http://127.0.0.1:8000/courses)`):

### Test Matrix — Pertemuan 13 (KursusKu)

| No | Skenario Pengujian | Input / Parameter | Expected Result | Hasil Aktual | Status | Evidence |
| --- | --- | --- | --- | --- | --- | --- |
| 1 | Tanpa JavaScript (Fallback Non-JS) | Navigasi / pagination (`?page=2`) dengan JavaScript dimatikan | Halaman tetap termuat dan navigasi pagination berfungsi tanpa ketergantungan JS | Halaman `?page=2` tampil (`Showing 11 to 20 of 26 results`) beserta kontrol pagination (`Previous` / `Next`) | Pass | *Screenshot* Non-JS (`/courses?page=2`) |
| 2 | Skenario 1 — 0 Hasil (*Empty State*) | `q=tidak-ada-xyz-999`, `status=` (kosong) | Menampilkan pesan *empty state* tanpa pesan error sistem | URL `?q=tidak-ada-xyz-999&status=` menampilkan pesan *"Tidak ada kursus yang sesuai pencarian/filter."* tanpa error | Pass | `02-search-zero-result`

 |
| 3 | Skenario 2 — 1 Hasil | `q=API-102` dan `q=AJAX-101` (`status=` kosong) | Menampilkan tepat 1 baris data yang sesuai dengan kode/nama kursus | `?q=API-102&status=` tampil 1 data (*Autentikasi API*, `closed`) dan `?q=AJAX-101&status=` tampil 1 data (*jQuery dan Ajax*, `draft`)

 | Pass | *Screenshot* Skenario 2 (`API-102` & `AJAX-101`)

 |
| 4 | Skenario 3 — > 10 Hasil | Tanpa filter / data awal 26 kursus (`?page=1`) | Halaman 1 menampilkan maksimal 10 data dan link pagination muncul | URL `?page=1` menampilkan 10 data (`Showing 1 to 10 of 26 results`) dan link pagination (`Previous` / `Next`) muncul

 | Pass | *Screenshot* Skenario 3 (`?page=1`)

 |
| 5 | Skenario 4 — Keyword dengan Spasi | `q=Web Modern` dan `q=Laravel Dasar` (`status=` kosong) | Keyword berspasi terbaca dengan benar dan mengembalikan hasil yang sesuai | `?q=Web+Modern&status=` tampil *Web Modern Lanjut* (`WEB-102`) dan `?q=Laravel+Dasar&status=` tampil *Laravel Dasar* (`LRV-101`)

 | Pass | *Screenshot* Skenario 4 (`Web Modern` & `Laravel Dasar`)

 |
| 6 | Skenario 5 — Filter + Page 2 | Filter `status=open`, lalu pindah ke halaman 2 | Parameter `status=open` (dan `q` bila ada) tetap terjaga di URL serta hasil halaman 2 tetap sesuai filter | URL `?status=open&page=2` menjaga `status=open` dan menampilkan 5 data sisa (`Showing 11 to 15 of 15 results`) berstatus `open`

 | Pass | `03-pagination2-query-filter`

 |

---

Tabel ini sudah mencakup seluruh skenario wajib Pertemuan 13 dan siap dimasukkan ke laporan praktikum atau dokumen pengujianmu. Apakah kamu ingin langsung menyusun **draft artikel ilmiah** atau mengerjakan **pengayaan fitur Ajax opsional**?