# LP11DPBO2024C1

## Janji
  Saya Boy Aditya Rohmaulana NIM 2203488 mengerjakan
  soal Latihan Praktikum 11 dalam mata kuliah DPBO untuk keberkahanNya
  maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. 

## Desain Program


Program ini adalah aplikasi web yang dibangun menggunakan PHP. Struktur dari project ini mengikuti pola desain Model-View-Presenter (MVP).

1. **View**: View adalah komponen yang bertanggung jawab untuk menampilkan data kepada pengguna dan menerima interaksi dari pengguna. Dalam proyek ini, `ViewPasien.php` bertindak sebagai View. View ini mengambil data dari Presenter dan menampilkan data tersebut kepada pengguna. View juga dapat menerima input dari pengguna dan meneruskannya ke Presenter.

2. **Presenter**: Presenter bertindak sebagai perantara antara Model dan View. Presenter mengambil data dari Model, memproses data tersebut, dan mempersiapkan data tersebut untuk ditampilkan oleh View. Presenter juga menerima input dari View dan memutuskan bagaimana cara menangani input tersebut. Dalam proyek ini, `ProsesPasien.php` bertindak sebagai Presenter. Presenter ini mengambil data dari `TabelPasien`, memproses data tersebut, dan mempersiapkan data tersebut untuk ditampilkan oleh `ViewPasien.php`. Presenter ini juga berisi metode untuk menambahkan, memperbarui, dan menghapus data pasien dari database.

3. **Model**: Model adalah komponen yang bertanggung jawab untuk mengelola data. Model dapat berinteraksi dengan database atau sumber data lainnya. Dalam proyek ini, `Pasien.class.php` dan `TabelPasien.class.php` bertindak sebagai Model. Model ini berisi definisi untuk objek Pasien dan logika untuk mengelola tabel pasien dalam database.

## Alur Program
Secara keseluruhan, alur proses dalam pola desain MVP adalah sebagai berikut:

1. Pengguna berinteraksi dengan View (misalnya, pengguna membuka aplikasi atau mengklik tombol).

2. View meneruskan interaksi pengguna ke Presenter.

3. Presenter memproses interaksi pengguna dan memutuskan apa yang harus dilakukan selanjutnya. Misalnya, jika pengguna mengklik tombol "Tambah Pasien", Presenter mungkin akan memanggil metode `addPasien()`.

4. Presenter mengambil data dari Model, memproses data tersebut, dan mempersiapkan data tersebut untuk ditampilkan oleh View.

5. Presenter memperbarui View dengan data baru.

6. View menampilkan data baru kepada pengguna.

## Dokumentasi


https://github.com/boyaditya/LP11DPBO2024C1/assets/135103722/d2461eba-4708-4960-a801-93169735b97c

![screencapture-localhost-8080-application-mvp-php-source-code-create-php-2024-05-04-13_20_25](https://github.com/boyaditya/LP11DPBO2024C1/assets/135103722/c01e85a4-7372-4229-acf9-4b999f53bfb4)

![screencapture-localhost-8080-application-mvp-php-source-code-edit-php-2024-05-04-13_20_12](https://github.com/boyaditya/LP11DPBO2024C1/assets/135103722/033e5439-be1f-4082-bc3d-eb6527baf90d)
