# TEST CASE SIPES (Sistem Informasi Pesantren)

## Positive Test Case

| ID    | Fitur                | Langkah Pengujian                    | Input                  | Hasil Yang Diharapkan              |
| ----- | -------------------- | ------------------------------------ | ---------------------- | ---------------------------------- |
| TC001 | Login Admin          | Masukkan username dan password benar | admin / admin123       | Sistem berhasil masuk dashboard    |
| TC002 | Data Santri          | Tambah data santri baru              | Data lengkap dan valid | Data santri berhasil tersimpan     |
| TC003 | Data Ustadz/Ustadzah | Tambah data ustadz                   | Data valid             | Data berhasil tersimpan            |
| TC004 | Jadwal Kegiatan      | Tambah jadwal kegiatan pesantren     | Jadwal valid           | Jadwal berhasil ditambahkan        |
| TC005 | Absensi              | Input absensi santri                 | Hadir/Izin/Sakit       | Data absensi berhasil disimpan     |
| TC006 | Keuangan             | Tambah data pembayaran santri        | Nominal valid          | Data pembayaran berhasil tersimpan |
| TC007 | Laporan Akademik     | Generate laporan akademik            | Data nilai santri      | Laporan tampil dengan benar        |
| TC008 | Laporan Non Akademik | Generate laporan kegiatan            | Data kegiatan santri   | Laporan berhasil ditampilkan       |

## Negative Test Case

| ID    | Fitur            | Langkah Pengujian          | Input          | Hasil Yang Diharapkan          |
| ----- | ---------------- | -------------------------- | -------------- | ------------------------------ |
| TC009 | Login Admin      | Password dikosongkan       | Username saja  | Sistem menampilkan pesan error |
| TC010 | Data Santri      | Isi umur dengan huruf      | abc            | Sistem menolak input           |
| TC011 | Data Ustadz      | Kosongkan nama ustadz      | Nama kosong    | Sistem menampilkan peringatan  |
| TC012 | Jadwal Kegiatan  | Input tanggal salah        | 32/15/2026     | Sistem menolak input           |
| TC013 | Absensi          | Tidak memilih status hadir | Kosong         | Sistem menampilkan error       |
| TC014 | Keuangan         | Input nominal dengan huruf | seratus ribu   | Sistem menolak input           |
| TC015 | Laporan Akademik | Data nilai kosong          | Tidak ada data | Sistem menampilkan notifikasi  |

## Edge Case Test

| ID    | Fitur            | Langkah Pengujian                  | Input              | Hasil Yang Diharapkan    |
| ----- | ---------------- | ---------------------------------- | ------------------ | ------------------------ |
| TC016 | Data Santri      | Input nama sangat panjang          | 500 karakter       | Sistem tetap stabil      |
| TC017 | Data Ustadz      | Input simbol aneh                  | @@@###             | Sistem menolak input     |
| TC018 | Jadwal Kegiatan  | Input jadwal sangat banyak         | 100 data sekaligus | Sistem tetap berjalan    |
| TC019 | Absensi          | Input karakter emoji               | 😀😀😀             | Sistem menolak input     |
| TC020 | Keuangan         | Input nominal negatif              | -100000            | Sistem menampilkan error |
| TC021 | Laporan Akademik | Generate laporan dengan data besar | 1000 data santri   | Sistem tetap stabil      |
