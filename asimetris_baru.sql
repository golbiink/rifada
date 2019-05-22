-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2016 at 01:58 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `asimetris_baru`
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
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `google_maps` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `username`, `gambar`, `google_maps`) VALUES
(31, 'Recreation Event Sayang School', 'recreation-event-sayang-school', 'Membangun Rumah Hunian Masyarakat Surabaya', 'Sayang School', 'Enda (08192839849)', '2013-12-26', '2013-12-30', '2013-09-24', '08.00 s/d 12.00 WIB', 'joko', 'LOGO-SS-ok.jpg', 'https://maps.google.com/maps/ms?msa=0&msid=207657957287359859850.0004527f333e4d088a4ad&ie=UTF8&t=m&ll=-7.311848,112.782201&spn=0.001703,0.006566&z=17&output=embed'),
(36, 'Happy New Year 2014', 'happy-new-year-2014', 'Mendesain dan membangun rumah idaman bersama secara minimalis dan elegan', 'Sayang School', 'Ari (08189320984)', '2014-01-01', '2014-01-01', '2013-10-23', '09.00 s/d Selesai', 'wiro', 'newyear.jpg', 'https://maps.google.com/maps/ms?msa=0&msid=207657957287359859850.0004527f333e4d088a4ad&ie=UTF8&t=m&ll=-7.311848,112.782201&spn=0.001703,0.006566&z=17&output=embed'),
(38, 'Merry Christmast Event', 'merry-christmast-event', 'Dalam merayakan hari natal, sayang school mengadakan serangkaian acara yang berkaitan dengan hari natal asdlflads;hfjasdhfafyawegfawfwcbbdbvasdbvbigeagf Dalam merayakan hari natal, sayang school mengadakan serangkaian acara yang berkaitan dengan hari natal asdlflads;hfjasdhfafyawegfawfwcbbdbvasdbvbigeagf Dalam merayakan hari natal, sayang school mengadakan serangkaian acara yang berkaitan dengan hari natal asdlflads;hfjasdhfafyawegfawfwcbbdbvasdbvbigeagf', 'Sayang School', 'adi (09878746789)', '2013-12-22', '2013-12-23', '2013-09-24', '09.00 s/d 16.00 WIB', 'admin', 'merry-christmas2.jpg', 'https://maps.google.com/maps/ms?msa=0&msid=207657957287359859850.0004527f333e4d088a4ad&ie=UTF8&t=m&ll=-7.311848,112.782201&spn=0.001703,0.006566&z=17&output=embed');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `gbr_album`, `aktif`) VALUES
(29, 'Griyo Taman Asri ', 'griyo-taman-asri-', '66253griyo-taman-asri.jpg', 'Y'),
(28, 'indovision galery', 'indovision-galery', '793853indovision galery1.jpg', 'Y'),
(26, 'Grand opening KIM nganjuk 2015', 'grand-opening-kim-nganjuk-2015', '4638Grand opening KIM nganjuk 2015 1 .JPG', 'Y'),
(30, 'Badan Penanaman Modal dan Perizinan', 'badan-penanaman-modal-dan-perizinan', '592773badan-penanaman-modal-dan-perizinan.jpg', 'Y');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(9, 'sayang school', 'sayangschool.sch.id', 'LOGO-SS-ok.jpg', '2014-01-01');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=122 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `judul_seo`, `headline`, `isi_berita`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(120, 23, 'admin', 'Bintaro Plaza Residence', 'bintaro-plaza-residence', 'Y', '<p>Desain Booth&nbsp;Bintaro Plaza Residence adalah klien dari asimetris,&nbsp;Bintaro Plaza Residence &nbsp;memesan booth untuk booth pameran</p>', 'Minggu', '2016-04-03', '00:08:10', '84bintaro-plaza-residence.jpg', 1, 'child'),
(121, 21, 'admin', 'Iseo', 'iseo', 'Y', '<p><span>Desain Booth Iseo&nbsp;adalah klien dari asimetris, Iseo&nbsp; memesan booth untuk kegiatan pameran</span></p>', 'Minggu', '2016-04-03', '00:12:41', '99iseo.jpg', 1, 'education');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(3, 'Membuat Shopping Cart dengan PHP', 'shopping cart.pdf', '2009-02-17', 3),
(5, 'Skrip Captcha', 'captcha.rar', '2009-02-06', 2),
(8, 'Wallpaper PHP', 'PHP_weapon.jpg', '2009-10-28', 4),
(9, 'Brosur Pendaftaran Sayang School', 'Excell_VBA.ppt', '2009-11-03', 11),
(10, 'tes file download', 'Anemia.docx', '2013-12-30', 6);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `jdl_gallery`, `gallery_seo`, `keterangan`, `gbr_gallery`) VALUES
(56, 28, 'indovision galery', 'indovision-galery', '', '420989Stage Grand opening INDOVISION  di atrium pakuwon  supermall surabaya.jpg'),
(55, 28, 'indovision galery', 'indovision-galery', '', '578674indovision galery2.jpg'),
(54, 26, 'Grand opening KIM nganjuk 2015 1 ', 'grand-opening-kim-nganjuk-2015-1-', '', '537780booth KOMINFO PROV.JATIM di event KIM nganjuk 2015.jpg'),
(53, 26, 'Grand opening KIM nganjuk 2015', 'grand-opening-kim-nganjuk-2015', '', '507354Grand opening KIM nganjuk 2015.JPG');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`) VALUES
(18, 'Kindergarten', 'kindergarten', '<p></p><h2>Kindergarten</h2><br><ul><li>Integrate the needs, interest and abilities of the whole child</li><li>Develop a sense of self-esteem, an excitement &amp; curiosity for learning</li><li>Use integrated language approach to teach English language Art as well as Mandarin &amp; Bahasa Indonesia</li><li>Introduce Math (number concept, patterns, estimation, measurement, etc)</li><li>Introduce Science (Health, Life, Earth, Environment, etc)</li><li>Develop children’s sense of music</li></ul><h2>Schedule<br></h2><p><b>KA&nbsp;&nbsp;</b>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br></p><ul><li>Day&nbsp;&nbsp;&nbsp; :Monday - Friday</li><li>Time&nbsp;&nbsp;&nbsp; : 08.00 – 11.30</li></ul><p><b>TK-B/KB&nbsp;</b>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br></p><ul><li>Day&nbsp;&nbsp;&nbsp; : Monday - Friday</li><li>Time&nbsp;&nbsp;&nbsp; : 08.00 – 12.00</li></ul><p><br></p><p></p>', '2014-01-01', 'kindergarten.jpg'),
(19, 'Elementary', 'elementary', '<h2>Elementary </h2><br><ul><li>International Standard Curriculum with Full-English, While Mandarin &amp; Bahasa Indonesia also complement the curriculum.</li><li>Materials &amp; Method designed to develop critical thinking, decision making, problem solving skills</li><li>Language Arts applies to lear effective, creative oral &amp; written communication</li><li>Science taught to understand the scientific &amp; cultural worlds</li><li>Habits of healthy living via rigorous exercise both mentally &amp; physically</li><li>Instill interest, skills attitudes for life-long &amp; healthy learning</li></ul><h2>Schedule</h2><br><b>E1 – E3&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</b>&nbsp; &nbsp;<br><ul><li>Day&nbsp;&nbsp;&nbsp; :Monday - Friday</li><li>Time&nbsp;&nbsp;&nbsp; : 08.00 – 13.00</li></ul><b>E4 – E6&nbsp;&nbsp;&nbsp; &nbsp;</b>&nbsp;&nbsp; &nbsp;<br><ul><li>Day&nbsp;&nbsp;&nbsp; : Monday - Friday</li><li>Time: 08.00 – 14.00</li></ul>', '2014-01-01', 'elementary.jpg'),
(17, 'Playgroup', 'playgroup', '<h2>PLAYGROUP</h2><br><ul><li>Promote English language skills</li><li>Encourage creativity via arts &amp; crafts</li><li>Introduce simple math, science and music</li><li>Develop motor skills</li></ul><h2>Schedule</h2><p><b>Playgroup A </b><br></p><ul><li>Day&nbsp;&nbsp;&nbsp; : Monday, Wednesday, Friday</li><li>Time&nbsp;&nbsp;&nbsp; : 08.00 – 10.30&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; </li></ul><p><b>Playgroup B&nbsp;&nbsp;</b>&nbsp; &nbsp;<br></p><ul><li>Day&nbsp;&nbsp;&nbsp; : Monday - Friday</li><li>Time&nbsp;&nbsp;&nbsp; : 08.00 – 10.30</li></ul><p></p>', '2014-01-01', 'Playgroup.jpg'),
(14, 'Facility', 'facility', '<h2>FACILITIES</h2><br><ul><li>Fully Air-Conditioned large classrooms</li><li>Mini-Libraries in classes, main library&nbsp;&nbsp; &nbsp;</li><li>Computer, Language &amp; Science Lab</li><li>Academic Toys &amp; Tools</li><li>Outdoor &amp; Indoor Playground</li><li>WiFi Campus, CCTV &amp; Modern Cafeteria</li><li>Medical Facilities (In-House Doctor &amp; Psychologist)</li><li>Enrichment Programs &amp; Extra-curricular</li><li>(Sports, music, dance &amp; theater-drama)</li></ul>', '2014-01-01', ''),
(15, 'About Sayang School', 'about-sayang-school', 'Sayang School Is a ...', '2014-01-01', 'LOGO-SS-ok.jpg'),
(16, 'Organizational Structure', 'organizational-structure', 'This Is Organizational Structure of Sayang School ..', '2014-01-01', ''),
(12, 'History of Sayang School', 'history-of-sayang-school', '<p>Sayang School since in april 2013, stand up in Surabaya </p>', '2014-01-01', 'LOGO-SS-ok.jpg'),
(13, 'Vision and Mission', 'vision-and-mission', '<p></p><h2>Vision</h2><br>Aims to be an institution of excellence, dedicated to producing leaders of the future<br><br><h2>Mission</h2><br>To provide a safe, diverse educational community where all students have the opportunity to excel academically, personally, artistically, athletically and socially.<br><br><h2>Goals</h2><br>To focus our efforts to accomplish our mission and achieve our vision, the school set five board goals.<br>• Intense Focus on Student Achievement<br>• High-Performing and Dedicated Team<br>• Safe learning and Working Environment<br>• Efficient Operations<br>• Sustained Community Engagement<br><p></p>', '2014-01-01', 'VisionMissionValues.jpg');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(10, 'iuuan', 'golbiink@gmail.om', 'tes', 'tes', '2013-12-26'),
(11, 'adi', 'adi@gmail.com', 'test', 'tes 123', '2013-12-26');

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
  `no_telp` varchar(50) NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(1000) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `yahoo_messenger` varchar(100) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `alamat`, `email`, `url`, `facebook`, `twitter`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `yahoo_messenger`, `youtube`) VALUES
(1, 'Asimetris : Exhibition Contractor, Interior and Exterior - Jasa Desain Booth Surabaya', 'Jalan Kenongosari IV / 18 Pepelegi Waru Sidoarjo', 'Email. cv_asimetris@ymail.com', 'http://asimetris.net', 'https://www.facebook.com/SayangSchool', 'Asimetris', 'Telp. 08563222223', 'Asimetris : Exhibition Contractor, Interior and Exterior - Jasa Desain Booth Surabaya', 'asimetris, jasa desain booth surabaya, desain booth surabaya, asimetris desain booth surabaya, surabaya desain booth, pembuatan boot jawa, pembuatan boot surabaya, pembuatan boot bali, jasa bikin booth, booth surabaya, jasa pembuatan booth', 'faviconn.png', 'Asimetris', 'Asimetris');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `katajelek`
--

INSERT INTO `katajelek` (`id_jelek`, `kata`, `ganti`) VALUES
(4, 'sex', 's**'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `aktif`) VALUES
(19, 'Playground', 'playground', 'Y'),
(21, 'Playgroup', 'playgroup', 'Y'),
(22, 'Kindergarten', 'kindergarten', 'Y'),
(23, 'Elementary School', 'elementary-school', 'Y'),
(31, 'Toddler', 'toddler', 'Y');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=73 ;

--
-- Dumping data for table `komentar`
--


-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE IF NOT EXISTS `level_user` (
  `id_level` int(5) NOT NULL AUTO_INCREMENT,
  `level` varchar(100) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'user');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`) VALUES
(1, 0, 'Home', 'home', 'Y'),
(2, 0, 'Profile', '#', 'Y'),
(21, 0, 'Events', 'all-events.html', 'Y'),
(39, 0, 'Career', '#', 'Y'),
(19, 0, 'News', 'all-news.html', 'Y'),
(15, 0, 'Services', '#', 'Y'),
(36, 15, 'Desain Interior', '#', 'Y'),
(23, 0, 'Contact', 'contact-us.html', 'Y'),
(35, 15, 'Exhibition Contractor', '#', 'Y'),
(34, 15, 'Desain Booth', '#', 'Y'),
(32, 2, 'Organizational Structure', 'page-16-organizational-structure.html', 'Y'),
(31, 2, 'Vision and Mission', 'page-13-vision-and-mission.html', 'Y'),
(33, 2, 'Facility', 'page-14-facility.html', 'Y'),
(27, 2, 'History', ' 	page-12-history-of-sayang-school.html', 'Y'),
(30, 2, 'About Us', 'page-15-about-sayang-school.html', 'Y'),
(29, 28, 'Service in The Class', 'serviceintheclass.html', 'Y'),
(38, 15, 'Desain Eksterior', '#', 'Y');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', '?module=user', '', '', 'N', 'user', 'Y', 1, ''),
(18, 'Berita', '?module=berita', '', '', 'Y', 'user', 'Y', 6, 'semua-berita.html'),
(19, 'Banner', '?module=banner', '', '', 'Y', 'admin', 'Y', 9, ''),
(37, 'Profil', '?module=profil', '<p>\r\n<b>CURRICULUM </b> <br><br>\r\nSayang School curriculum departs on international standard and National Curriculum with two excellence first in English for daily conversation and second is excellence in Science with skill attitudes\r\n<br ><br>\r\n\r\n<b>METHODS</b><br><br>\r\nSayang School METHODS designed to develop students critical thinking, team work with problem solving skills, encourage positive thinking which leads to excellent character. \r\n<br><br>\r\n<b>STRATEGY OF TEACHING</b><br><br>\r\nSayang School use an interactive strategy with the students, with a fun way in teaching-learning method support with audio-visual facilities. Teacher use kinds of resource and variety of activities in every lesson. \r\n</p>', 'gedungku.jpg', 'N', 'admin', 'N', 3, 'profil-kami.html'),
(10, 'Manajemen Modul', '?module=modul', '', '', 'N', 'admin', 'Y', 2, ''),
(31, 'Kategori', '?module=kategori', '', '', 'Y', 'admin', 'Y', 5, ''),
(33, 'Poling', '?module=poling', '', '', 'N', 'admin', 'N', 10, ''),
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
(64, 'Portofolio', '?module=portofolio', '', '', 'N', 'admin', 'Y', 34, ''),
(65, 'Facility', '?module=facility', '', '', 'N', 'admin', 'Y', 35, '');

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
(1, 'Elegant', 'Jawaban', 23, 'Y'),
(2, 'Minimalis', 'Jawaban', 80, 'Y'),
(3, 'Sedang', 'Jawaban', 21, 'Y'),
(4, 'Megah', 'Jawaban', 22, 'Y'),
(8, 'Desain Rumah seperti apa yang anda inginkan?', 'Pertanyaan', 0, 'Y');

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
(1, 'Rumah Hunian Masyarakat', 'rumah-hunian-masyarakat', 'Jl. Maju Mundur No 1 Surabaya', '83374pics01.jpg'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilas`, `info`, `tgl_posting`, `gambar`) VALUES
(1, 'Headboard tak sekedar menjadi penyeimbang antara kepala dan badan ranjang', '2013-09-22', ''),
(2, 'Optimalkan cahaya dan udaraJika sumpek dan pengap tak terhindarkan lagi di rumah anda', '2013-09-21', ''),
(3, ' Pilhkan ukuran kasur 120x180cm Untuk meja belajar ketinggian maksimal 70 cm. Untuk kursi carilah ya', '2013-09-16', ''),
(4, 'jendela lebih manis dan dinamis jika disusun berbaris', '2013-09-16', ''),
(5, 'headboard bikin kamar lebih menarik dan cantik', '2013-09-17', '');

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
(2, 1, 'Agung', 'agung', '', '826110wawan 3x4.jpg', 'Ajunk Pracetio', 'prazetyo', 'praz@gmail.com'),
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
('127.0.0.1', '2013-09-24', 210, '1380040897'),
('127.0.0.1', '2013-09-25', 257, '1380117172'),
('127.0.0.1', '2013-09-26', 197, '1380209441'),
('127.0.0.1', '2013-09-28', 420, '1380387492'),
('127.0.0.1', '2013-09-29', 85, '1380391230'),
('127.0.0.1', '2013-12-11', 124, '1386780138'),
('127.0.0.1', '2013-12-12', 21, '1386863628'),
('127.0.0.1', '2013-12-14', 7, '1386989454'),
('127.0.0.1', '2013-12-15', 27, '1387086835'),
('127.0.0.1', '2013-12-17', 88, '1387299576'),
('127.0.0.1', '2013-12-18', 47, '1387302411'),
('127.0.0.1', '2013-12-22', 14, '1387683486'),
('127.0.0.1', '2013-12-26', 52, '1388070850'),
('127.0.0.1', '2013-12-27', 218, '1388163457'),
('127.0.0.1', '2013-12-28', 178, '1388234171'),
('127.0.0.1', '2013-12-29', 60, '1388309064'),
('127.0.0.1', '2013-12-30', 262, '1388422189'),
('127.0.0.1', '2013-12-31', 115, '1388478563'),
('127.0.0.1', '2014-01-01', 163, '1388585138'),
('127.0.0.1', '2014-01-02', 114, '1388680745'),
('127.0.0.1', '2014-01-04', 9, '1388838598'),
('127.0.0.1', '2014-01-05', 4, '1388910778'),
('127.0.0.1', '2014-01-06', 60, '1389027582'),
('127.0.0.1', '2014-01-07', 175, '1389091562'),
('127.0.0.1', '2014-01-08', 137, '1389198036'),
('172.25.81.8', '2014-01-08', 18, '1389147585'),
('127.0.0.1', '2014-01-09', 18, '1389233961'),
('172.25.81.8', '2014-01-09', 5, '1389241801'),
('127.0.0.1', '2014-01-31', 1, '1391159110'),
('127.0.0.1', '2014-02-01', 1, '1391229298'),
('127.0.0.1', '2014-02-09', 1, '1391914890'),
('127.0.0.1', '2014-02-11', 1, '1392122387'),
('127.0.0.1', '2014-09-14', 1, '1410666160'),
('127.0.0.1', '2016-04-02', 4, '1459614625'),
('127.0.0.1', '2016-04-03', 49, '1459630381'),
('127.0.0.1', '2016-04-04', 7, '1459761270'),
('127.0.0.1', '2016-04-05', 28, '1459808474'),
('127.0.0.1', '2016-04-06', 5, '1459952021'),
('127.0.0.1', '2016-04-07', 1, '1459964502'),
('::1', '2016-04-07', 52, '1460019854'),
('127.0.0.1', '2016-04-09', 9, '1460159355'),
('127.0.0.1', '2016-04-10', 1, '1460266911');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `tag_seo`, `count`) VALUES
(2, 'education', 'education', 8),
(9, 'play', 'play', 5),
(10, 'learning', 'learning', 4),
(8, 'game', 'game', 4),
(11, 'son', 'son', 10),
(12, 'child', 'child', 7),
(13, 'kids', 'kids', 7),
(14, 'sayang school', 'sayang-school', 2),
(15, 'elementary school', 'elementary-school', 5),
(16, 'playgroup', 'playgroup', 10),
(17, 'kindergarten', 'kindergarten', 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `aktif`) VALUES
(11, 'asimetris', 'gudangwebsite', 'templates/asimetris', 'Y');

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
('admin', '05a87c1f17234d6b002be2e6e57d0550', 'Administrator', 'sayangschool@gmail.com', '085748117547', 'admin', 'N', '218b379950075b8c70adc053a256819e');
