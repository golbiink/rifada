-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2013 at 11:42 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hma_renovasibangunan`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(5) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `username`) VALUES
(30, 'Seminar "Membangun Portal Berita ala Detik.com"', 'seminar-membangun-portal-berita-ala-detikcom', 'Seminar ini akan membahas tentang konsep, proses, dan implementasi dalam membangun portal berita sekelas detik.com.<br>', 'Lab. Universitas Atmajaya Yogyakarta', 'HMJ TI (081843092580)', '2009-03-14', '2009-03-14', '2009-01-31', '11.00 s/d 13.00 WIB', 'admin'),
(31, 'Bedah Buku "Membongkar Trik Rahasia Master PHP"', 'bedah-buku-membongkar-trik-rahasia-master-php', 'Acara bedah buku terbaru dari Lukmanul Hakim yang berjudul Membongkar Trik Rahasia Para Master PHP.\r\n', 'Toko Buku Gramedia Sudirman', 'Enda (08192839849)', '2009-10-29', '2009-10-30', '2009-01-31', '08.00 s/d 12.00 WIB', 'joko'),
(29, 'Workshop "3 Hari Menjadi Master PHP"', 'workshop-3-hari-menjadi-master-php', 'Workshop ini bertujuan untuk bla .. bla .. bla<br>', 'Jogja Expo Center', 'Adi (081893274848)', '2009-02-21', '2009-02-23', '2009-01-31', '15.00 s/d Selesai', 'sinto'),
(36, 'Workshop VBA Programming for Excel', 'workshop-vba-programming-for-excel', 'Tes\r\n', 'Lab. Pusat Komputer UII', 'Aci (08189320984)', '2009-10-29', '2009-10-29', '2009-10-26', '09.00 s/d Selesai', 'wiro'),
(38, 'Workshop Kolaborasi PHP dan jQuery', 'workshop-kolaborasi-php-dan-jquery', 'Materinya mengenai cara mengkolaborasikan pemrograman PHP dan jQuery\r\n', 'Hotel Santika Yogyakarta', 'Rendy (08787768768)', '2010-01-15', '2010-01-15', '2010-01-15', '09.00 s/d 16.00 WIB', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(5) NOT NULL AUTO_INCREMENT,
  `jdl_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `album_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `gbr_album`, `aktif`) VALUES
(21, 'Kartun', 'kartun', '476928sonic.jpg', 'Y'),
(20, 'Pernikahan', 'pernikahan', '146667nikah.jpg', 'Y'),
(18, 'Bayi', 'bayi', '246551silvestree.jpg', 'Y'),
(12, 'Ilustrator', 'ilustrator', '987701family.jpg', 'Y'),
(19, 'Binatang', 'binatang', '391479burung.jpg', 'Y'),
(17, 'Arsitektur', 'arsitektur', '741638arche090.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(4, 'Fresh Book', 'http://freshbooks.com', 'freshbook.jpg', '2009-02-05'),
(7, 'Cinema 21', 'http://21cineplex.com', 'cinema21.jpg', '2008-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=111 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `judul_seo`, `headline`, `isi_berita`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(106, 19, 'admin', 'Rumput Rumah Lebih Hijau dan Cantik', 'rumput-rumah-lebih-hijau-dan-cantik', 'Y', '<p>&nbsp;</p><p style="line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">RUMPUT RUMAH LEBIH HIJAU DAN CANTIK</span></span></strong><span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">&nbsp;Hamparan rumbut bak permadani di halaman rumah andamerupakan tempat favorit keluarga sebagai tempat untuk berantai, bermain bagianak-anak dan juga pesta kebun. Untuk itu penampilannya harus selalu dijaga,supaya tetap prima dan menawan. Untuk bisa menghasilkan nuansa tersebut adabeberapa cara yang bisa di ikuti</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">PenyiramanAir</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Air merupakan salah satu elemen penting untukkesehatan rumput anda. Ada masa di mana rumput tidak mendapatkan cukup air dimusim kemarau, sehingga diperlukan penyiraman yang lebih intensif di pagi dansore hari. Kondisi air yang berlebih juga tidak dibenarkan, karena dapatmenyebabkan pembusukan pada rumput. Pemakaian alat siram seperti gembor dansprayer akanlebih baik karena air diberikan secara halus dan merata.</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">Pemupukanrumput</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Pemupukan adalah hal perlu dilakukan setidaknya tigabulan sekali. Gunakan pupuk NPK denga perbandingan 100gr per m2. Campurkansedikit pasir halus pada pupuk agar seberannya merata. Penggunaan pupuk organikperlu dilakukan agar tanah tetap gembur dan diharapkan dapat mempercepat prosespeyerapan makanan oleh tanaman. Humus yang halus dan kering merupakan salahsatu pupuk organik yang baik. Sebarkan pupuk organik di atas permukaan tanahsecara merata dengan dosis 1kg per m2.</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">Bersihkandari gulma penggangu</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Pembersihan rumput hias anda dari gulma yang menggangukeindahan dan pertumbuhannya. Usahakan mencabut gulma sampai ke akar-akarnya,dengan bantuan pisau kebun. Lakukan pemangkasan minimal seminggu sekali. Khususuntuk musim hujan, biasanya rumput akan tumbuh lebih cepat, sehinggapemangkasan harus lebih sering. Pertahankan tinggi rumput sampai 2,5 &ndash; 3 cmagar rumput tumbuh dengan baik dan tampak indah. Begitu pula bila pemangkasanterlalu berlebihan akan menyebabkan kekeringan pada bagian pangkal dan rumputkelihatan botak.</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">Buatserapan air dan udara </span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Rumput yang sering diinjak, tanahnya akan padat danmengeras. Hal ini akan berpengaruh pada pertumbuhan rumput. Rumput memerlukanudara untuk pertumbuhannya. Karena itu perlu dilakukan lubang serapan dengancara membuat lubang dengan garpu taman sedalam 5 &ndash; 10cm dengan jarak 20 &ndash; 30cm,kemudian isilah dengan pasir atau humus halus. Lubang-lubang ini akan membantutanaman untuk menyerap air dan udara segar ke dalam tanah.</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">&nbsp;</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">&nbsp;</span></span></p><p>&nbsp;</p>', 'Minggu', '2013-09-22', '22:21:38', '38desain-lanskap-jembatan-kayu.jpg', 7, 'sepakbola'),
(107, 2, 'admin', 'Taman Lebih Manis Dengan Stepping Stone', 'taman-lebih-manis-dengan-stepping-stone', 'Y', '<p>&nbsp;</p><p style="line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span"><strong>TAMAN LEBIH MANIS DENGAN STEPPING STONE</strong></span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Stepping Stone atau batu pijakan taman, awalnya dibuat untuk pejalan kaki dapat nyaman melangkah tanpa harus menginjakkan kakidiatas rumput atau tanah. Perkembangan saat ini materialnya bukan hanya daribatu alam,tapi juga dari cetakan dengan bentuk yang bervariasi.</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Fungsi dari stepping stone lebih berkembang lagi saatini. Stepping stone kian bermetamorfosis menjadi elemen multi fungsi mulai darifungsi semula melindungi tanaman dari injakan kaki menjadi aksen untukmempercantik taman dan penunjuk arah jalan</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Materialnya pun kini lebih beragam dan variatif. Meskikebanyakan dari batu alam dan di padu padankan dengan material aplikasi darisemen, namun mampu manghasilkan hasil yang maksimal. Umumnya batu alam yang dipakaiadalah yang bertekstur kasar seperti batu koral. Warna batu koral yangbervariasi&nbsp; membuat kesan labih cantik.Bentuk stepping stone yang beraneka ragam membuat kelebihan material ini mampumenghasilkan taman yang cantik di rumah. </span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Walau stepping stone ini merupakan bagian kecil daritaman, ia tetap memiliki fungsi yang besar. Dengan adanya material ini, rumputtidak terinjak sehingga meminimalkan resiko rumput rusak.</span><font size="6" class="Apple-style-span"><span style="font-size: 14pt" class="Apple-style-span"></span></font></span></p><p>&nbsp;</p>', 'Minggu', '2013-09-22', '22:28:32', '801355450172-hotel-droog-fairy-tale-garden-01.jpg', 11, 'sepakbola'),
(108, 21, 'admin', 'Poin Penting Mendesain Kamar Remaja', 'poin-penting-mendesain-kamar-remaja', 'Y', '<p style="text-align: justify">&nbsp;</p><p style="text-align: justify"><span style="font-size: small" class="Apple-style-span"><strong>POIN PENTING MENDESAIN KAMAR REMAJA</strong></span></p><p style="text-align: justify"><span style="font-size: small" class="Apple-style-span">&nbsp;Perkembangan desain interior kamar tidur anak usia tanggung atau remaja selalu menarik untuk di bahas. Syarat nya cukup cukup sederhana jangan kekanak-kanakan atau jangan juga terlalu dewasa</span></p><p style="text-align: justify"><span style="font-size: small" class="Apple-style-span">Fase remaja tentunya berbeda dengan fase kanak-kanak. Dalam kondisi ini mereka cenderung lebih ekspresif diri dan sadar tentang halyang disukai dan yag tidak disukai. Termasuk dalam membuat kesan dalam menciptakan ruang tidur. Selain kenyamanan, mereka juga memiliki rasa yang berbeda dengan fase sebelumnya.</span></p><p style="text-align: justify"><span style="font-size: small" class="Apple-style-span">Adapun langkah yang harus dilakukan dalam mendesain kamar remaja</span></p><p style="text-align: justify"><strong><span><span style="font-size: small" class="Apple-style-span">Janganterlalu kekanak-kanakan.&nbsp;</span></span></strong><span><span style="font-size: small" class="Apple-style-span">Andaikan desain kamar anak anda masih berbau kenak-kanakan karena anak andamasih suka main boneka atau mobil-mobilan, sebaiknya mengurangi aksenanak-anaknya dalam penataan ruang. Tujuan nya agar anak anda memiliki jiwa yang tidak terlalu kekanak-kanakan. Sisipkan juga desain yang lebih dewasa namunproporsional, seperti furniture berbentuk geometris tetapi tidak terkesan kaku.Dengan memainkan materialnya, tinggi rendah furniturenya. Sesuai dengan faseumur nya hal tersebut akan membuat nyaman</span></span></p><p style="text-align: justify"><strong><span><span style="font-size: small" class="Apple-style-span">PerhatikanFurniturenya.</span></span></strong><span><span style="font-size: small" class="Apple-style-span"> Walau sudah menginjak masa remaja masih memungkinkan anak memilik sisi kenak-kanakannya.Jadi gunakanlah material yang tidak berbahaya jika mereka beraktifitas di dalam kamar. Perkembangan tinggi badan remaja sulit untuk di prediksi. Jadi pilhkanukuran kasur 120x180cm. Untuk meja belajar ketinggian maksimal 70 cm. Untuk kursi carilah yang bisa diatur ketinggiannya.</span></span></p><p style="text-align: justify"><span style="font-size: small" class="Apple-style-span">Biasanya anak remaja banyak memiliki pernak-pernik yang bersifat personal tergantung pada minat dan selera mereka. Sebaiknya kita mempersiapkan tempat untuk menyimpan barang-barang seperti itu didalam kamarnya.&nbsp;Sekaligus mengajarkan bagaimana cara kerapian di dalam kamar.</span></p><p style="text-align: justify"><strong><span><span style="font-size: small" class="Apple-style-span">Minimalisasiwarna warni.</span></span></strong><span><span style="font-size: small" class="Apple-style-span">&nbsp; Pada fase ini minat dan selera anak sudah mulai pada warna yang cenderung lembut dan tidak cerah dan ngejreng sepertifase kanak-kanak. Mulai dengan mengkombinasi warna yang senada, misal warna coklat, biru atau abu-abu. Ini tidak lepas dari sifat remaja yang tidak seagresif sifat kanak-kanak. Untuk meminimalkan warna yang monoton. Boleh memasukkan warna yang cerah tetapi bukan jadi warna yang dominan.</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">&nbsp;</span></span></p><p style="text-align: justify">&nbsp;</p>', 'Minggu', '2013-09-22', '22:32:19', '31teenager25e225802599s2brooms4.jpg', 18, ''),
(109, 23, 'admin', 'Jendela Lebih Manis dan Dinamis Jika Disusun Berbaris', 'jendela-lebih-manis-dan-dinamis-jika-disusun-berbaris', 'Y', '<p style="text-align: justify"><span style="font-size: small" class="Apple-style-span">&nbsp;</span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">JENDELA LEBIH MANIS DAN DINAMIS JIKA DISUSUN BERBARIS</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span style="font-size: small" class="Apple-style-span">&nbsp;Bermacam-macam sekali pilihan material dan cara mengaplikasikan jendela di dinding rumah. Salah satunya adalah disusun vertikal berbaris.</span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">Optimalkancahaya dan udara</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span style="font-size: small" class="Apple-style-span">Jika sumpek dan pengap tak terhindarkan lagi di rumah anda. Mungkin&nbsp; bukaan berupa 1 atau 2 jendela memang belum cukup. Aplikasikan saja 3 sampai 5 jendela vertikal pada dinding yang menghadap inner court atau halaman depan. Niscaya jumlah udara dan cahaya yang masuk pun lebih melimpah.</span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span style="font-size: small" class="Apple-style-span">Dengan banyaknya jendela vertikal yang terpasang,cahaya yang masuk akan mencukupi sehinga tidak perlu lagi menyalakan lampu disiang hari. Rumah anda jadi hemat energi. Tetapi jangan sampai rumah anda terang namun panas. Oleh karena itu sebaiknya jendela di letakkan tidak pada dinding yang menatang matahari. Namun jika tidak ada pilihan lain sebaiknya gunakan kaca film agar pengaruh buruk sinar matahari terhalau.</span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">Kesan Rumah lebih tinggi</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span style="font-size: small" class="Apple-style-span">Banyak orang memilih untuk meninggikan plafon agar rumah terasa lebih lega dan lapang. Namun jangan khawatir jika plafon dirumah sudah tidak mungkin lagi ditinggikan. Susunan jendela vertikal yang berbaris dapat membantu memanipulasi kesan lapang di rumah.</span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span style="font-size: small" class="Apple-style-span">Seperti memilih motif baju vertikal yang dapat dianggap melangsingkan. Jendela pun demikian. Barisan jendela vertikal akan membantu memberi kesan rumah lebih tinggi, baik dipandang dari dalam maupun dari luar. Apalagi jika model jendela yang di pilih sama atau simetris. Bentuk geometris nya akan memberi tampilan yang tidak biasa pada dinding rumah.</span></p><p style="text-align: justify"><span style="font-size: small" class="Apple-style-span">&nbsp;</span></p>', 'Minggu', '2013-09-22', '22:46:50', '57AD1795D2-26FF-4D81-9D62-782F3B2F1A42.jpg', 16, 'film'),
(110, 21, 'admin', 'Headboard Bikin Kamar Lebih Menarik dan Cantik', 'headboard-bikin-kamar-lebih-menarik-dan-cantik', 'Y', '<p>&nbsp;<strong><span><span style="font-size: small" class="Apple-style-span">HEADBOARD BIKIN KAMAR LEBIH MENARIK DAN CANTIK</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">&nbsp;Headboard tak sekedar menjadi penyeimbang antara kepala dan badan ranjang. Bila didesain dengan baik, headboard mampu memberi estetika yang lebih untuk ruang tidur anda.</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Pernahkah anda melihat ranjang polos bersandar pada dinding kamar ?. pasti tampak kurang menarik. Headboard hadir melengkapi ranjang. Selain keperluan estetika, headboard juga berfungsi sebagai sandaran kepala bagian atas dan sebagai sandaran tubuh kita pada saat posisi duduk ditempat tidur</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">Serasi Dengan Ranjang</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Mendesain headboard harus memperhatikan keserasian dengan tubuh ranjang dan dengan ruangan. Jangan sampai headboard menjadi lebihbesar atau dominan dibanding ranjang itu sendiri. Headboard juga dapat didisain menempel atau terpisah dengan ranjang.</span></span></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><strong><span><span style="font-size: small" class="Apple-style-span">Pemilihan Material Yang Tepat</span></span></strong></p><p style="text-align: justify; line-height: normal" class="MsoNormal"><span><span style="font-size: small" class="Apple-style-span">Material untuk headboard haruslah bisa memberikan kenyamanan, terutama pada saat kita sedang bersandar. Secara umum yang sering digunakan adalah kulit sintetis dan kain. Namun banyak juga yang menggunakan kayu dan HPL yang kemudian warna nya didesain agar cocok dengan badan ranjang.Material headboard seharusnya mudah dibersihkan karena kita tidak dapat mengganti sesering kita mengganti seprai.&nbsp;</span></span></p><p>&nbsp;</p>', 'Minggu', '2013-09-22', '22:51:14', '17atla-042208-headboard02.jpg', 39, 'tenis');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(3, 'Membuat Shopping Cart dengan PHP', 'shopping cart.pdf', '2009-02-17', 3),
(5, 'Skrip Captcha', 'captcha.rar', '2009-02-06', 2),
(1, 'Kalender Tahun 2009', 'kalender2009.rar', '2009-02-06', 8),
(8, 'Wallpaper PHP', 'PHP_weapon.jpg', '2009-10-28', 4),
(9, 'Slide  Pemrograman VBA Excell', 'Excell_VBA.ppt', '2009-11-03', 4);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(5) NOT NULL AUTO_INCREMENT,
  `id_album` int(5) NOT NULL,
  `jdl_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gallery_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `jdl_gallery`, `gallery_seo`, `keterangan`, `gbr_gallery`) VALUES
(3, 12, 'Duduk di Sofa', 'duduk-di-sofa', 'Sekeluarga sedang duduk di sofa.', '27587family sofa.jpg'),
(4, 12, 'Didepan Rumah', 'didepan-rumah', 'Sekeluarga sedang berada di ladang.', '258819family field.jpg'),
(5, 12, 'Keluarga Bahagia', 'keluarga-bahagia', 'Si anak memperlihatkan lukisan.', '697448family.jpg'),
(7, 19, 'Lebah', 'lebah', 'Lebah besar terbang.', '322906lebah.jpg'),
(8, 17, 'Bangunan Jepang', 'bangunan-jepang', 'Bangunan khas jepang', '370422arche037.jpg'),
(9, 17, 'Candi Merang', 'candi-merang', 'Bangunan candi khas kerajaan', '346527arche014.jpg'),
(10, 18, 'Cukur Janggut', 'cukur-janggut', 'Bayi unik sedang cukur rambut', '892395macho4.jpg'),
(11, 18, 'Push Up', 'push-up', 'Bayi unik sedang melakukan push-up', '991546macho1.jpg'),
(12, 19, 'Kuda Nyengir', 'kuda-nyengir', 'Gini nih kalau kuda lagi nyengir.', '658447kuda.jpg'),
(13, 21, 'Super Mario Bross', 'super-mario-bross', 'Game klasik 3D Mario Bross.', '601318mario bros.jpg'),
(32, 21, 'Naruto', 'naruto', 'Kartun ninja jepang Naruto', '45440naruto.jpg'),
(15, 21, 'Superman', 'superman', 'Superman kecil mau beraksi', '689147superman.jpg'),
(27, 21, 'Sonic', 'sonic', 'Sonic and Friend', '152618sonic.jpg'),
(31, 21, 'Kungfu Panda', 'kungfu-panda', 'Jack Black', '550598panda2.jpg'),
(33, 21, 'Maskot Euro 2008', 'maskot-euro-2008', 'Trix dan Flix di Euro 2008', '816528mascot.jpg'),
(14, 21, 'Harry Potter', 'harry-potter', 'Game Harry Potter', '735687potter.jpg'),
(42, 21, 'Avatar', 'avatar', 'Eng si Gundul Avatar', '874877avatar.jpg'),
(16, 21, 'Shrek', 'shrek', 'Film 3D Shrek 2', '527801shrek06_800.jpg'),
(44, 21, 'Kenshin', 'kenshin', 'Kenshin Himura', '494110himura.jpg'),
(45, 21, 'Sun Goku', 'sun-goku', 'Goku Cilik', '266845goku.JPG'),
(46, 21, 'Virtual Girl', 'virtual-girl', 'Gadis Cantik 3D', '837921Girl.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`) VALUES
(1, 'Renovasi Bangunan ', 'renovasi-bangunan-', '<p><strong><span style="font-family: ''Trebuchet MS'', Arial, Helvetica, sans-serif; font-weight: normal; font-size: 12px; border-collapse: collapse" class="Apple-style-span"></span></strong></p><div style="text-align: justify"><strong><strong><span style="font-size: small" class="Apple-style-span">Renovasi Bangunan</span></strong><span style="font-size: small" class="Apple-style-span">&nbsp;atau dalam akta perusahaan disebut CV. Bangunan adalah perusahaan&nbsp;</span><span style="font-size: small" class="Apple-style-span">jasa konstruksi yang terpercaya dalam melakukan pekerjaan desain dan konstruksi&nbsp;</span><span style="font-size: small" class="Apple-style-span">rumah dan bangunan lainnya. Didukung oleh team yang ahli dan berpengalaman untuk</span><span style="font-size: small" class="Apple-style-span">mencapai standart waktu dn kualitas yang baik.</span></strong></div><div style="text-align: justify"><strong><span style="font-size: small" class="Apple-style-span"><br></span></strong></div><div style="text-align: justify"><strong><span style="font-size: small" class="Apple-style-span">Berawal dari niat untuk merubah paradigma dan image bahwa pekerjaan konstruksi&nbsp;</span><span style="font-size: small" class="Apple-style-span">identik dengan kotor, kumuh, seenaknya sendiri, orang - orang yang tidak bersahabat</span><span style="font-size: small" class="Apple-style-span">dan anggapan jelek lainnya. Kami ingin merubah semua itu, dengan sistem kerja yang baik dan benar,&nbsp;</span><span style="font-size: small" class="Apple-style-span">komunikasi dan pelaporan kepada customer secara berkala, berseragam, memakai, identitas yang jelas,&nbsp;</span><span style="font-size: small" class="Apple-style-span">dan mengutamakan kepedulian tentang safety first dalam setiap kegiatan pekerjaan kami.</span></strong></div><p></p>', '2010-05-31', 'logo-small.jpg'),
(2, 'Visi dan Misi', 'visi-dan-misi', '<p>\r\nVisi :\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\nMisi :&nbsp;&nbsp; <br></p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n', '2010-05-31', ''),
(3, 'Struktur Organisasi', 'struktur-organisasi', '<p>Isikan struktur organisasi di bagian ini ya</p>', '2010-05-31', ''),
(4, 'Renovasi Rumah', 'renovasi-rumah', 'Renovasi Rumah', '2013-09-20', ''),
(5, 'Konstruksi Bangunan Surabaya', 'konstruksi-bangunan-surabaya', '<p>&nbsp;</p><p><span style="font-family: ''Trebuchet MS'', Arial, Helvetica, sans-serif; font-size: 12px; border-collapse: collapse" class="Apple-style-span"><span style="font-size: small" class="Apple-style-span"><strong>Renovasi Bangunan&nbsp;</strong>melayani pekerjaan Konstruksi Bangunan dan Perawatan Rumah secara berkala. D</span><span style="font-size: small" class="Apple-style-span">idalam pelayanan tersebut juga termasuk pekerjaan desain sebagai acuan pelaksanaan pekerjaan&nbsp;</span><span style="font-size: small" class="Apple-style-span">apapun masalahnya mengenai Rumah dan Bangunan dapat dicarikan solusinya. Dari masalah sederhana seperti&nbsp;</span><span style="font-size: small" class="Apple-style-span">AC kurang dingin, WC mampet, genteng bocor, saluran pembuangan dapur buntu dan pengecatan&nbsp;</span><span style="font-size: small" class="Apple-style-span">dingin. Masalah kelistrikan rumah juga menjadi bidang kami, dan memastikan tidak ada resiko&nbsp;</span><span style="font-size: small" class="Apple-style-span">hubungan pendek yan sering menjadi penyebab kebakaran. Pada skala yang lebih besar seperti membangun rumah&nbsp;</span><span style="font-size: small" class="Apple-style-span">secara keseluruhan atau renovasi berat juga seperti settin interior menjadi keahlian kami&nbsp;</span><span style="font-size: small" class="Apple-style-span">dalam memberikan hasil yang terbaik. Tidak hanya pada rumah tinggal, Renovasi bangunan&nbsp;</span><span style="font-size: small" class="Apple-style-span">juga mampu mendesain dan melaksanakan pekerjaan setting tempat usaha.</span></span></p>', '2013-09-20', 'kompro-edit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(1, 'Ariawan', 'ariawan@gmail.com', 'Mohon Informasi', 'Mohon informasi mengenai buku yang diterbitkan oleh Lokomedia.', '2008-02-10'),
(4, 'lukman', 'lukman@hakim', 'Request Code', 'Tolong dunk ..', '2009-02-25'),
(8, 'lukman', 'lukman@bukulokomedia.com', 'kontak kami', 'tes modul hubungi kami', '2010-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(10) NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `alamat`, `email`, `url`, `facebook`, `twitter`, `rekening`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`) VALUES
(1, 'Renovasi Bangunan', 'JL. Wijaya Kusuma No. 17 Surabaya 60272', 'admin@renovasibangunan.net', 'http://localhost/hmaproduk/renovasibangunan', 'https://www.facebook.com/pages/homemediaart/239333572825492', 'https://www.twitter.com/homemediaart', '123456677809', 'Telp. 031 5312146 | Fax. 031 5312146', 'renovasi bangunan', 'renovasi bangunan', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) NOT NULL,
  `jabatan_seo` varchar(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `jabatan_seo`, `aktif`) VALUES
(1, 'Owner', 'owner', 'Y'),
(2, 'Marketing ', 'marketing-', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `katajelek`
--

CREATE TABLE IF NOT EXISTS `katajelek` (
  `id_jelek` int(11) NOT NULL AUTO_INCREMENT,
  `kata` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `ganti` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_jelek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `katajelek`
--

INSERT INTO `katajelek` (`id_jelek`, `kata`, `ganti`) VALUES
(4, 'sex', 's**'),
(2, 'bajingan', 'b*******'),
(3, 'bangsat', 'b******');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `aktif`) VALUES
(19, 'Taman', 'taman', 'Y'),
(2, 'Tata Ruang', 'tata-ruang', 'Y'),
(21, 'Desain Interior', 'desain-interior', 'Y'),
(22, 'Desain Eksterior', 'desain-eksterior', 'Y'),
(23, 'Desain Bangunan', 'desain-bangunan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`) VALUES
(12, 71, 'Wisnu', 'wisnu.wordpress.com', 'pertamax', '2009-02-02', '08:10:23', 'Y'),
(13, 71, 'Adrian', 'adrian.blogspot.com', 'CR 7 emang idola gua, melesat terus ya prestasinya.', '2009-02-02', '09:06:01', 'Y'),
(15, 79, 'Armen', 'detik.com', 'ahmadinejad emang idolaku', '2009-02-03', '10:05:20', 'Y'),
(17, 74, 'Lukman', 'hakim.com', 'apakah browser google secanggih search enginenya?', '2009-02-21', '10:12:23', 'Y'),
(34, 92, 'Rudi', 'bukulokomedia.com', ' Kalau  tentang  gue,  kapan  dibuat  filmnya  ya?   ', '2009-10-28', '21:21:21', 'Y'),
(22, 77, 'Raihan', 'bukulokomedia.com', 'mas .. tolong kirimin source code proyek lokomedia&nbsp; ke email saya di raihan@gmail.com', '2009-08-25', '16:30:00', 'Y'),
(23, 77, 'Wawan', 'bukulokomedia.com', 'woi .. kunjungin dong website saya di http://bukulokomedia.com, jangan lupa kasih komen dan sarannya ya.', '2009-08-25', '16:31:50', 'Y'),
(36, 93, 'Lukman', 'google.com', 'tes  kata-kata  jelek  sex   ', '2009-11-04', '10:04:26', 'Y'),
(65, 85, 'hilman', 'antonhilman.com', ' emang  sih,  windows  7  lebih  cepat  dibandingkan  vista,  tapi  masih  banyak  bug  bung.   ', '2010-01-15', '04:16:25', 'Y'),
(66, 78, 'ronaldinho', 'ronaldino.com', ' ronaldo  pantas  mendapatkannya  tahun  ini  dan  kayaknya  tahun  depan  masih  menjadi  miliknya.   ', '2010-01-15', '04:18:08', 'Y'),
(67, 99, 'lukman', 'bukulokomedia.com', ' tes   ', '2010-02-11', '02:42:46', 'Y'),
(69, 99, 'fathan', 'bukulokomedia.com', 'keduax', '2010-02-15', '07:44:12', 'Y'),
(70, 99, 'Rianto', 'bukulokomedia.com', ' kok  nggak  ada  yang  pertamax  ..  langsung  keduax  sih.   ', '2010-05-16', '11:33:26', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`) VALUES
(1, 0, 'Beranda', 'home', 'Y'),
(2, 0, 'Profil', 'page-1-profil.html', 'Y'),
(21, 0, 'Hubungi Kami', 'hubungi-kami.html', 'Y'),
(20, 0, 'Galeri Foto', 'semua-album.html', 'Y'),
(19, 0, 'Berita', 'semua-berita.html', 'Y'),
(18, 0, 'Agenda', 'semua-agenda.html', 'Y'),
(8, 2, 'Visi dan Misi', 'page-2-visidanmisi.html', 'Y'),
(9, 2, 'Struktur Organisasi', 'page-3-strukturorganisasi.html', 'Y'),
(10, 19, 'Desain Interior', 'kategori-21-desain-interior.html', 'Y'),
(11, 19, 'Desain Bangunan', 'kategori-23-desain-bangunan.html', 'Y'),
(12, 19, 'Tata Ruang', 'kategori-2-tata-ruang.html', 'Y'),
(13, 19, 'Desain Eksterior', 'kategori-22-desain-eksterior.html', 'Y'),
(14, 19, 'Taman', 'kategori-19-taman.html', 'Y'),
(15, 0, 'Layanan', '#', 'Y'),
(16, 15, 'Renovasi Rumah', 'page-4-renovasirumah.html', 'Y'),
(17, 15, 'Konstruksi Bangunan', 'page-5-konstruksibangunan.html', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', '?module=user', '', '', 'N', 'user', 'Y', 1, ''),
(18, 'Berita', '?module=berita', '', '', 'Y', 'user', 'Y', 6, 'semua-berita.html'),
(19, 'Banner', '?module=banner', '', '', 'Y', 'admin', 'Y', 9, ''),
(37, 'Profil', '?module=profil', '<b>Bukulokomedia.com</b> merupakan website resmi dari penerbit Lokomedia yang bermarkas di Jl. Arwana No.24 Minomartani Yogyakarta 55581. Dirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret 2008.<br><br>Produk unggulan dari penerbit Lokomedia adalah buku-buku serta aksesoris bertema PHP (<span style="font-weight: bold; font-style: italic;">PHP: Hypertext Preprocessor</span>) yang merupakan pemrograman Internet paling handal saat ini.\r\n', 'gedungku.jpg', 'N', 'admin', 'N', 3, 'profil-kami.html'),
(10, 'Manajemen Modul', '?module=modul', '', '', 'N', 'admin', 'Y', 2, ''),
(31, 'Kategori', '?module=kategori', '', '', 'Y', 'admin', 'Y', 5, ''),
(33, 'Poling', '?module=poling', '', '', 'Y', 'admin', 'Y', 10, ''),
(34, 'Tag (Label)', '?module=tag', '', '', 'N', 'admin', 'Y', 7, ''),
(35, 'Komentar', '?module=komentar', '', '', 'Y', 'admin', 'Y', 8, ''),
(36, 'Download', '?module=download', '', '', 'Y', 'admin', 'Y', 11, 'semua-download.html'),
(40, 'Hubungi Kami', '?module=hubungi', '', '', 'Y', 'admin', 'Y', 12, 'hubungi-kami.html'),
(41, 'Agenda', ' ?module=agenda', '', '', 'Y', 'user', 'Y', 4, 'semua-agenda.html'),
(42, 'Shoutbox', '?module=shoutbox', '', '', 'Y', 'admin', 'Y', 13, ''),
(43, 'Album', '?module=album', '', '', 'N', 'admin', 'Y', 14, ''),
(44, 'Galeri Foto', '?module=galerifoto', '', '', 'Y', 'admin', 'Y', 15, ''),
(45, 'Templates', '?module=templates', '', '', 'N', 'admin', 'Y', 16, ''),
(46, 'Kata Jelek', '?module=katajelek', '', '', 'N', 'admin', 'Y', 17, ''),
(47, 'RSS', '-', '', '', 'Y', 'admin', 'N', 18, ''),
(48, 'YM', '-', '', '', 'Y', 'admin', 'N', 19, ''),
(49, 'Indeks Berita', '-', '', '', 'Y', 'admin', 'N', 20, ''),
(50, 'Kalender', '-', '', '', 'Y', 'admin', 'N', 21, ''),
(51, 'Statistik User', '-', '', '', 'Y', 'admin', 'N', 22, ''),
(52, 'Pencarian', '-', '', '', 'Y', 'admin', 'N', 23, ''),
(53, 'Berita Teratas', '-', '', '', 'Y', 'admin', 'N', 24, ''),
(54, 'Arsip Berita', '-', '', '', 'Y', 'admin', 'N', 25, ''),
(55, 'Berita Sebelumnya', '-', '', '', 'Y', 'admin', 'N', 26, ''),
(60, 'Sekilas Info', '?module=sekilasinfo', '', '', 'Y', 'admin', 'Y', 13, ''),
(59, 'Halaman Statis', '?module=halamanstatis', '', '', 'Y', 'admin', 'Y', 30, ''),
(61, 'Menu', '?module=menu', '', '', 'Y', 'admin', 'Y', 31, ''),
(62, 'Jabatan Team', '?module=jabatan', '', '', 'N', 'admin', 'Y', 32, ''),
(63, 'Staff', '?module=staff', '', '', 'N', 'admin', 'Y', 33, ''),
(64, 'Portofolio', '?module=portofolio', '', '', 'N', 'admin', 'Y', 34, '');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE IF NOT EXISTS `poling` (
  `id_poling` int(5) NOT NULL AUTO_INCREMENT,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_poling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `pilihan`, `status`, `rating`, `aktif`) VALUES
(1, 'Internet Explorer', 'Jawaban', 23, 'Y'),
(2, 'Mozilla Firefox', 'Jawaban', 80, 'Y'),
(3, 'Google Chrome', 'Jawaban', 21, 'Y'),
(4, 'Opera', 'Jawaban', 22, 'Y'),
(8, 'Apa Browser Favorit Anda?', 'Pertanyaan', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE IF NOT EXISTS `portofolio` (
  `id_portofolio` int(5) NOT NULL AUTO_INCREMENT,
  `nama_portofolio` varchar(255) NOT NULL,
  `portofolio_seo` varchar(100) NOT NULL,
  `alamat_portofolio` varchar(255) NOT NULL,
  `foto_portofolio` varchar(255) NOT NULL,
  PRIMARY KEY (`id_portofolio`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id_portofolio`, `nama_portofolio`, `portofolio_seo`, `alamat_portofolio`, `foto_portofolio`) VALUES
(1, 'Rumah Hunian Masyarakat Surabaya', 'rumah-hunian-masyarakat-surabaya', 'Jl. Maju Mundur No 1 Surabaya', '83374pics01.jpg'),
(2, 'Rumah Idaman Bersama', 'rumah-idaman-bersama', 'JL. Bulak Bubut Gg 2 No 10', '417541pic02.jpg'),
(3, 'Ruko Bahagia Sentosa', 'ruko-bahagia-sentosa', 'JL. Raya Bahagia Sentosa 95 Jakarta', '867492page1_img5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sekilasinfo`
--

CREATE TABLE IF NOT EXISTS `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL AUTO_INCREMENT,
  `info` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_sekilas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilas`, `info`, `tgl_posting`, `gambar`) VALUES
(1, 'Anak yang mengalami gangguan tidur, cenderung memakai obat2an dan alkohol berlebih saat dewasa.', '2010-04-11', 'news5.jpg'),
(2, 'WHO merilis, 30 persen anak-anak di dunia kecanduan menonton televisi dan bermain komputer.', '2010-04-11', 'news4.jpg'),
(3, 'Menurut peneliti di Detroit, orang yang selalu tersenyum lebar cenderung hidup lebih lama.', '2010-04-11', 'news3.jpg'),
(4, 'Menurut United Stated Trade Representatives, 25% obat yang beredar di Indonesia adalah palsu.', '2010-04-11', 'news2.jpg'),
(5, 'Presiden AS Barack Obama memesan Nasi Goreng di restoran Bali langsung dari Amerika', '2010-04-11', 'news1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

CREATE TABLE IF NOT EXISTS `shoutbox` (
  `id_shoutbox` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `website` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_shoutbox`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `shoutbox`
--

INSERT INTO `shoutbox` (`id_shoutbox`, `nama`, `website`, `pesan`, `tanggal`, `jam`, `aktif`) VALUES
(1, 'lukman', 'lukman.com', 'tes :-) aja ;-D ha ha ha <:D>', '2009-11-02', '00:00:00', 'Y'),
(2, 'hakim', 'hakim.com', 'tes :-) aja ;-D ha ha ha <:D>\r\ndfa\r\nfdas\r\nfdsa\r\nfdasf\r\n:-(', '2009-11-02', '00:00:00', 'Y'),
(3, 'daryono', 'bukulokomedia.com', 'ku tes lagi<br>\r\ntes :-) aja ;-D ha ha ha &lt;:D&gt;<br>\r\nkeren euy<br>\r\n:-(', '2009-11-02', '13:55:00', 'Y'),
(5, 'iin', 'uin-suka.ac.id', 'tes aja euy ;-D boi', '2009-11-03', '11:36:06', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id_staff` int(5) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(5) NOT NULL,
  `nama_staff` varchar(100) NOT NULL,
  `staff_seo` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gbr_staff` varchar(100) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_staff`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `id_jabatan`, `nama_staff`, `staff_seo`, `keterangan`, `gbr_staff`, `facebook`, `twitter`, `email`) VALUES
(1, 1, 'Arief Rahardjo Poetra', 'arief-rahardjo-poetra', '', '842102arif 3x4.jpg', 'arief rahardjo', 'bhonchuwh', 'arif@homemediaart.com'),
(2, 1, 'Darmawan', 'darmawan', 'tes tes', '826110wawan 3x4.jpg', 'https://id-id.facebook.com/public/Poetra-Pdw', 'pOetraDarmaR', 'darmawan@homemediaart.com'),
(3, 2, 'iwan', 'iwan', '', '566192me 3x4.jpg', 'iuuannahar', 'iuuannahar', 'iwan@homemediaart.com');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.2', '2009-09-11', 1, '1252681630'),
('127.0.0.1', '2009-09-11', 17, '1252734209'),
('127.0.0.3', '2009-09-12', 8, '1252817594'),
('127.0.0.1', '2009-10-24', 8, '1256381921'),
('127.0.0.1', '2009-10-26', 108, '1256620074'),
('127.0.0.1', '2009-10-27', 52, '1256686769'),
('127.0.0.1', '2009-10-28', 124, '1256792223'),
('127.0.0.1', '2009-10-29', 9, '1256828032'),
('127.0.0.1', '2009-10-31', 3, '1257047101'),
('127.0.0.1', '2009-11-01', 85, '1257113554'),
('127.0.0.1', '2009-11-02', 11, '1257207543'),
('127.0.0.1', '2009-11-03', 165, '1257292312'),
('127.0.0.1', '2009-11-04', 59, '1257403499'),
('127.0.0.1', '2009-11-05', 10, '1257433172'),
('127.0.0.1', '2009-11-11', 13, '1258006911'),
('127.0.0.1', '2009-11-12', 10, '1258048069'),
('127.0.0.1', '2009-11-14', 14, '1258222519'),
('127.0.0.1', '2009-11-17', 2, '1258473856'),
('127.0.0.1', '2009-11-19', 16, '1258635469'),
('127.0.0.1', '2009-11-21', 4, '1258863505'),
('127.0.0.1', '2009-11-25', 3, '1259216216'),
('127.0.0.1', '2009-11-26', 1, '1259222467'),
('127.0.0.1', '2009-11-30', 11, '1259651841'),
('127.0.0.1', '2009-12-02', 9, '1259746407'),
('127.0.0.1', '2009-12-03', 17, '1259906128'),
('127.0.0.1', '2009-12-10', 69, '1260423794'),
('127.0.0.1', '2009-12-12', 26, '1260560082'),
('127.0.0.1', '2009-12-11', 5, '1260508621'),
('127.0.0.1', '2009-12-13', 8, '1260716786'),
('127.0.0.1', '2009-12-14', 9, '1260772698'),
('127.0.0.1', '2009-12-15', 9, '1260837158'),
('127.0.0.1', '2009-12-16', 7, '1260905627'),
('127.0.0.1', '2009-12-17', 48, '1261026791'),
('127.0.0.1', '2009-12-18', 11, '1261088534'),
('127.0.0.1', '2009-12-22', 3, '1261477278'),
('127.0.0.1', '2009-12-25', 2, '1261686043'),
('127.0.0.1', '2009-12-26', 29, '1261835507'),
('127.0.0.1', '2009-12-27', 7, '1261920445'),
('127.0.0.1', '2009-12-28', 3, '1261965611'),
('127.0.0.1', '2009-12-29', 21, '1262024011'),
('127.0.0.1', '2009-12-30', 24, '1262146708'),
('127.0.0.1', '2010-01-01', 12, '1262286131'),
('127.0.0.1', '2010-01-03', 38, '1262529325'),
('127.0.0.1', '2010-01-12', 89, '1263264291'),
('127.0.0.1', '2010-01-14', 54, '1263482540'),
('127.0.0.1', '2010-01-15', 57, '1263506901'),
('127.0.0.1', '2010-02-11', 30, '1265831568'),
('127.0.0.1', '2010-02-13', 2, '1266032303'),
('127.0.0.1', '2010-02-14', 3, '1266115347'),
('127.0.0.1', '2010-02-15', 15, '1266195235'),
('127.0.0.1', '2010-02-18', 1, '1266499945'),
('127.0.0.1', '2010-02-22', 5, '1266856332'),
('127.0.0.1', '2010-02-25', 46, '1267103145'),
('127.0.0.1', '2010-05-12', 10, '1273654648'),
('127.0.0.1', '2010-05-16', 195, '1274026185'),
('127.0.0.1', '2010-05-17', 2, '1274029517'),
('127.0.0.1', '2010-05-19', 1, '1274279374'),
('127.0.0.1', '2010-05-27', 16, '1274967085'),
('127.0.0.1', '2010-05-30', 4, '1275192045'),
('127.0.0.1', '2010-05-31', 13, '1275271939'),
('127.0.0.1', '2010-06-05', 1, '1275676869'),
('127.0.0.1', '2010-06-06', 2, '1275842170'),
('127.0.0.1', '2010-06-15', 3, '1276572924'),
('127.0.0.1', '2010-06-22', 206, '1277221605'),
('127.0.0.1', '2010-08-02', 17, '1280754660'),
('127.0.0.1', '2010-08-20', 7, '1282285305'),
('127.0.0.1', '2010-08-30', 21, '1283185430'),
('127.0.0.1', '2010-08-31', 53, '1283207455'),
('127.0.0.1', '2010-09-02', 133, '1283402651'),
('127.0.0.1', '2010-09-05', 35, '1283702206'),
('127.0.0.1', '2010-09-13', 10, '1284370291'),
('127.0.0.1', '2010-09-17', 12, '1284662303'),
('127.0.0.1', '2010-09-22', 2, '1285091212'),
('127.0.0.1', '2010-09-23', 47, '1285254071'),
('127.0.0.1', '2010-09-26', 32, '1285512806'),
('127.0.0.1', '2010-09-27', 48, '1285529871'),
('127.0.0.1', '2011-03-27', 13, '1301192382'),
('127.0.0.1', '2011-04-02', 2, '1301736439'),
('127.0.0.1', '2011-04-15', 1, '1302827335'),
('127.0.0.1', '2011-07-23', 17, '1311423953'),
('127.0.0.1', '2011-11-26', 1, '1322325811'),
('127.0.0.1', '2011-12-22', 1, '1324566373'),
('127.0.0.1', '2012-10-25', 1, '1351100911'),
('127.0.0.1', '2013-01-21', 5, '1358772303'),
('127.0.0.1', '2013-02-03', 4, '1359874486'),
('127.0.0.1', '2013-08-02', 1, '1375381903'),
('127.0.0.1', '2013-09-08', 218, '1378658897'),
('127.0.0.1', '2013-09-09', 51, '1378665025'),
('127.0.0.1', '2013-09-15', 57, '1379264350'),
('127.0.0.1', '2013-09-16', 25, '1379265533'),
('127.0.0.1', '2013-09-18', 9, '1379521719'),
('127.0.0.1', '2013-09-19', 101, '1379609139'),
('127.0.0.1', '2013-09-20', 245, '1379696379'),
('127.0.0.1', '2013-09-21', 30, '1379700421'),
('127.0.0.1', '2013-09-22', 219, '1379839019'),
('127.0.0.1', '2013-09-23', 26, '1379955126'),
('127.0.0.1', '2013-09-24', 208, '1380037252');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `tag_seo`, `count`) VALUES
(1, 'Palestina', 'palestina', 5),
(2, 'Gaza', 'gaza', 6),
(9, 'Tenis', 'tenis', 5),
(10, 'Sepakbola', 'sepakbola', 4),
(8, 'Laskar Pelangi', 'laskar-pelangi', 2),
(11, 'Amerika', 'amerika', 10),
(12, 'George Bush', 'george-bush', 3),
(13, 'Browser', 'browser', 5),
(14, 'Google', 'google', 2),
(15, 'Israel', 'israel', 5),
(16, 'Komputer', 'komputer', 7),
(17, 'Film', 'film', 2),
(19, 'Mobil', 'mobil', 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id_templates` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_templates`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `aktif`) VALUES
(1, 'Standar', 'Lukmanul Hakim', 'templates/standar', 'N'),
(2, 'Building', 'Lukmanul Hakim', 'templates/building', 'N'),
(3, 'eL jQuery', 'Lukmanul Hakim', 'templates/eljquery', 'N'),
(4, 'resoar', 'iwan', 'templates/Resoar', 'N'),
(5, 'renovasi', 'iuuan', 'templates/renovasi', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@detik.com', '08238923848', 'admin', 'N', '1756a0f37b17e0406289d86505e8c79f'),
('sinto ', '958f62f9f8b7f348d08943189fda3b15', 'Sinto Gendeng', 'sinto@detik.com', '09945849545', 'user', 'N', '958f62f9f8b7f348d08943189fda3b15'),
('joko', '4e5ad0dc4d478726661c8c2b3ea31777', 'Joko Sembung', 'joko@detik.com', '0895485045958', 'user', 'N', '4e5ad0dc4d478726661c8c2b3ea31777'),
('wiro', 'fc5db878d663b752550c39f4c919e1fd', 'Wiro Sableng', 'wiro@detik.com', '038039403948', 'user', 'N', '9d4f2ec29bdfcf339f0b84bf8d2e4a56'),
('wiros', 'dcdd932ea3418387ef2f06644303389e', 'wiryo', 'wiryo@sableng', '98797', 'user', 'N', '25005d71e4f9a670ebf111888a0916b2');
