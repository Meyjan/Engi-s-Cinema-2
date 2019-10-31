# Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web

## Deskripsi Singkat

Saat ini Engi ingin melakukan ekspansi usaha dengan membangun sebuah bioskop. Setelah berdiri selama 2 bulan, Engi merasa bioskopnya sepi dibanding bioskop kompetitor lainnya. Usut punya usut, ternyata faktor utama penyebab sepinya bioskop Engi adalah tidak adanya kemudahan pemesanan tiket secara daring. Oleh karena itu, Engi meminta Anda untuk membuat aplikasi web pemesanan tiket bioskop daring. Engi menginginkan website miliknya untuk memiliki fitur pembelian tiket, memberi ulasan pada film yang telah ditonton, login dan register, riwayat pembelian tiket.

Engi telah mempekerjakan seorang UI/UX profesional untuk mendesain tampilan *website*-nya. Anda diminta untuk mengimplementasikan tampilan sedemikian mirip dengan tampilan pada contoh. Engi tidak meminta Anda untuk membangun *website* yang *responsive*. Icon dan jenis font tidak harus sama dengan contoh. Tata letak elemen, warna font, garis pemisah, dan perbedaan ukuran font harus terlihat sesuai contoh. Format rating dan waktu harus terlihat sesuai contoh tampilan.

## Tools

* Untuk frontend, gunakan Javascript, HTML dan CSS. **Tidak boleh** menggunakan *library* atau *framework* CSS atau JS (e.g. JQuery, lodash, atau Bootstrap). CSS sebisa mungkin ada di file yang berbeda dengan HTML (tidak *inline styling*).
* Untuk backend, wajib menggunakan **PHP tanpa framework apapun**. Harap diperhatikan, Anda harus mengimplementasikan fitur menggunakan HTTP *method* yang tepat.
* Gunakan **MySQL** untuk menyimpan data.

## Spesifikasi

### Login page

![](mockup/Login.jpg)

Halaman pertama yang ditampilkan jika pengguna belum *login* atau sudah *logout* adalah halaman **Login**. Pengguna dapat melakukan *login* sebagai *user*. *Login* hanya membandingkan email dan password saja. Tidak perlu tambahan proteksi apapun.

Identitas pengguna yang sudah *login* akan disimpan sebagai ***cookie*** dalam browser. *Cookie* menyimpan data pengguna dalam bentuk *string* dengan panjang tertentu. Untuk mengetahui pengguna mana yang sedang *login*, *string* tersebut dapat dilihat di basis data. **Identitas tersebut tidak boleh disimpan sebagai parameter HTTP GET**. Jika *cookie* ini tidak ada, maka pengguna dianggap belum login dan aplikasi akan selalu mengarahkan (*redirect*) pengguna ke halaman ini, meskipun pengguna membuka halaman yang lain. Masa berlaku *cookie* ditentukan sendiri oleh peserta.

### Register page

![](mockup/Register.jpg)

Pengguna dapat mendaftarkan akun baru jika belum *login* atau sudah *logout*. Pada halaman ini, pengguna mendaftarkan diri dengan email, username, dan nomor hp yang **unik**. Pengecekan keunikan nilai *field* dilakukan menggunakan AJAX. Jika unik, border *field* akan berwarna hijau. Jika tidak unik, *field* akan diberikan pesan error seperti berikut.

![](mockup/Register-Wrong.jpg)

Validasi lain yang dilakukan pada **sisi klien** pada halaman ini adalah:

* Email sesuai memiliki format email standar seperti “user@mail.com”.
* Username hanya menerima kombinasi alphabet, angka, dan *underscore*.
* Nomor HP hanya menerima angka dengan panjang antara 9-12 angka.

Setelah semua nilai *field* sudah diisi dan valid, pengguna dapat mendaftarkan akun barunya. Jika akun berhasil didaftarkan, pengguna langsung diarahkan ke halaman **Home**. Mekanisme *cookie* sama dengan halaman **Login**.

### Home page

![](mockup/Home.jpg)

Pada halaman **Home**, pengguna disambut dengan *username* pengguna dan daftar film yang sedang tayang. Film yang sedang tayang adalah film yang mempunyai jadwal saat waktu sekarang. Pengguna dapat melihat detail film dengan mengklik poster atau judul film.

Header aplikasi web terdiri dari *search bar* dan pilihan untuk *logout*. Search bar digunakan untuk mencari film berdasarkan judul. Hasil pencarian ditampilkan pada halaman **Search Result**. Jika pengguna memilih untuk *logout*, halaman akan diarahkan ke halaman **Login**.

### Search Result page

![](mockup/Search.jpg)

Hasil pencarian dari *search bar* di halaman Home akan ditampilkan pada halaman ini. Untuk setiap film, ditampilkan informasi judul, sinopsis, rating, poster. Pengguna dapat melihat detail film dengan mengklik tombol “View details”.

Jika daftar film melebihi jumlah tertentu (jumlah didefinisikan sendiri), maka akan muncul *pagination* untuk melihat daftar film selebihnya. Ketika memilih *page*, pengguna tidak diarahkan ke halaman baru namun daftar film langsung berubah di halaman ini.

### Film Detail page

![](mockup/MovieDetail.jpg)

Pada halaman **Film Detail**, terdapat beberapa informasi mengenai film yang dipilih, yaitu judul, poster, rating, genre (bisa lebih dari satu), tanggal rilis, durasi tayang (dalam menit), dan sinopsis dari film tersebut.

Pengguna dapat melihat ulasan film tersebut dari pengguna yang telah membeli tiket film tersebut. Informasi setiap review meliputi *username*, foto pengguna yang memberikan ulasan, penilaian bintang (dalam skala 1-10), dan ulasan yang diberikan mengenai film tersebut.

Pembelian tiket bioskop dapat dibeli di halaman ini juga. Pengguna memilih tanggal dan jam tayang yang belum lewat dari waktu sekarang. Jika tiket untuk suatu jadwal sudah habis, maka akan muncul “Not Available”. Jika masih ada kursi yang tersedia, pengguna dapat memilih tombol “Book Now” yang kemudian mengarahkan ke halaman **Buy Ticket**.

### Buy Ticket page

![](mockup/BookTicket-Noticketselected.jpg)

Setelah memilih jadwal tayang film, pengguna memilih posisi kursi. Untuk setiap pembelian, pengguna hanya dapat **membeli 1 kursi**. Pengguna tidak dapat memilih kursi yang telah dibeli oleh pengguna lain. Kursi yang tersedia berwarna biru dan yang tidak tersedia berwarna abu-abu. (Asumsi saat pembelian tiket, ketersediaan kursi tidak berubah).

![](mockup/BookTicket-Selectedticket.jpg)

“Booking Summary” akan muncul ketika pengguna sudah memilih posisi kursi. Pengguna dapat membeli tiket dengan menekan tombol “Buy Ticket”.

![](mockup/BookTicket-Success.jpg)

Sebuah modal akan muncul untuk memberitahukan apakah tiketnya berhasil dibeli atau tidak. Modal hanya muncul jika **sudah ada konfirmasi keberhasilan/kegagalan dari *response* AJAX**. Menutup modal tersebut akan mengarahkan pengguna ke halaman **Transaction History**.

### Transaction History page

![](mockup/Transactions.jpg)

Pada halaman ini, ditampilkan daftar film yang telah dipesan dan telah ditonton (jadwal tayang telah lewat) maupun yang belum (jadwal tayang di masa depan). Daftar diurutkan **berdasarkan waktu jadwal tayang** dengan jadwal tayang paling terakhir merupakan entri paling atas.

Ulasan baru dapat dilakukan ketika tiket yang telah dibeli telah lewat jadwal tayangnya. Sebagai contoh sekarang tanggal 1 September 12.00, Engi membeli tiket untuk tanggal 2 September pukul 14.00, maka Engi baru bisa memberikan ulasan setelah tanggal 2 September pukul 14.00. Ulasan yang telah ditulis dapat diubah ataupun dihapus. Ulasan hanya dapat diberikan sekali untuk setiap pembelian tiket. Setelah ulasan dihapus, pengguna dapat memberikan ulasan baru.

Pada setiap entri pada *history*:

* Jika jadwal tayang film belum terlewat maka tidak pengguna tidak dapat menambah review
* Jika jadwal tayang film telah lewat, maka:
  * Jika belum memberikan ulasan maka muncul tombol “Add Review”
  * Jika sudah memberikan ulasan maka muncul tombol “Edit Review” dan tombol “Delete Review”

### User Review page

![](mockup/Reviews-Add.jpg)

Pengguna menulis ulasan film pada halaman ini. Pengguna dapat memberikan ulasan dalam bentuk pilihan rating dalam skala 1-10 dan deskripsi ulasan.

Jika pengguna belum pernah mengulas film tersebut atau telah menghapus ulasannya, pengguna dapat memberikan ulasannya dengan tombol "Submit" atau membatalkan ulasan dengan menekan tombol "Cancel". Jika pengguna telah memberikan ulasan dan belum dihapus, akan ada tombol "Submit" digantikan dengan tombol "Edit" untuk mengubah ulasan. Saat pengguna akan mengubah ulasan, informasi rating dan deskripsi ulasan akan muncul pada halaman ini.

## Keterangan Tambahan

* Jam pada aplikasi web mengacu pada jam lokal pengguna.
* Basis data didefinisikan sendiri.

## Cara Instalasi

* Buka xampp, jalankan Apache serta MySql
* Import db ke xampp local
* ketik pada halaman browser URL: localhost/public/index
* akan muncul halaman login


## Pembagian tugas kelompok
### REST
1. DB Transaksi Tiket: 13515116, 13517008, 13517131
2. Menambah transaksi baru dengan status "Pending": 13517131
3. Mengubah status transaksi ke "Success" dan "Cancelled": 13515116
4. Mengembalikan seluruh data transaksi pembelian film: 13517008


### SOAP
1. DB Bank: 13517131
2. Validasi Nomor Rekening: 13517131
3. Memberikan Data Rekening Nasabah: 13517008
4. Transaksi transfer: 13515116
5. Membuat akun virtual nomor rekening: 13515116
6. Mengecek ada atau tidak transaksi dalam suatu rentang waktu: 13517008


### ReactJS
1. Login: 13517131
2. Melakukan Transfer: 13515116
3. Melihat Riwayat Transaksi: 13517008


### Perubahan Engima
1. Transfer Engima dari repositori lama: 13517008
2. Pengambilan data film dari API TheMovieDB: 13517131
3. Penampilan data home: 13517131
4. Revisi film detail: 13515116
5. Buy Ticket: 13517008
6. Transaction History: 13517008
7. Revisi basis data Engima: 13515116