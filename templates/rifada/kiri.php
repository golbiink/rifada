<?php
if ($_GET['module'] == 'home') {
  ?>

  <section id="featured">
    <!-- start slider -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Slider -->
          <div id="main-slider" class="flexslider">
            <ul class="slides">

              <?php
              $berita = mysql_query("SELECT * FROM berita 
                            WHERE headline='Y' ORDER BY id_berita DESC LIMIT 5");
              $no = 1;
              while ($t = mysql_fetch_array($berita)) {

                $tgl_posting = tgl_indo($t['tanggal']);
                $isi_berita = strip_tags($t['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
                $isi = substr($isi_berita, 0, 120); // ambil sebanyak 200 karakter
                $isi = substr($isi_berita, 0, strrpos($isi, " ")); // potong per spasi kalimat

                // cek ada berapa komentar
                $komentar = "SELECT * FROM komentar WHERE id_berita = '" . $t['id_berita'] . "'";
                $rskomentar = mysql_query($komentar);
                $total_komentar = mysql_num_rows($rskomentar);
                echo "<li>
                    <img src='foto_berita/$t[gambar]' alt='$t[judul]' />
                    <div class='flex-caption'>
                    <h3>$t[judul]</h3> 
                    <p>$isi... </p>
                    <a href='news-$t[id_berita]-$t[judul_seo].html' class='btn btn-theme'>Selengkapnya</a>
                     </div>
                    </li>";
              }
              ?>


            </ul>
          </div>
          <!-- end slider -->
        </div>
      </div>
    </div>



  </section>
  <section class="callaction">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="big-cta">
            <div class="cta-text">
              <h2><span>Rifada Alam Jakarta : </span> <i>Tukang Taman Jakarta</i></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3">
              <div class="box">
                <div class="box-gray aligncenter">
                  <h4>Tukang Taman Jakarta</h4>
                  <div class="icon">
                    <i class="fa fa-check-circle-o fa-3x"></i>
                  </div>
                  <p>
                    Kami Menerima Pembuatan Segala Jenis Taman Area Jakarta dan Sekitarnya.
                  </p>

                </div>
                <div class="box-bottom">
                  <a href="page-23-desain-booth.html">Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box">
                <div class="box-gray aligncenter">
                  <h4>Vertical Garden</h4>
                  <div class="icon">
                    <i class="fa fa-pagelines fa-3x"></i>
                  </div>
                  <p>
                    Kami Menerima Pembuatan Vertical Garden Area Jakarta dan Sekitarnya.
                  </p>

                </div>
                <div class="box-bottom">
                  <a href="page-24-exhibition-contractor.html">Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box">
                <div class="box-gray aligncenter">
                  <h4>Landscape</h4>
                  <div class="icon">
                    <i class="fa fa-edit fa-3x"></i>
                  </div>
                  <p>
                    Kami Menerima Pembuatan Landscape Area Jakarta dan Sekitarnya.
                  </p>

                </div>
                <div class="box-bottom">
                  <a href="page-25-desain-interior.html">Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box">
                <div class="box-gray aligncenter">
                  <h4>Hardscape</h4>
                  <div class="icon">
                    <i class="fa fa-code fa-3x"></i>
                  </div>
                  <p>
                    Kami Menerima Pembuatan Hardscape Area Jakarta dan Sekitarnya.
                  </p>

                </div>
                <div class="box-bottom">
                  <a href="page-26-desain-eksterior.html">Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- divider -->
      <div class="row">
        <div class="col-lg-12">
          <div class="solidline">
          </div>
        </div>
      </div>
      <!-- end divider -->
      <!-- Portfolio Projects -->
      <div class="row">
        <div class="col-lg-12">
          <h4 class="heading">Portofolio</h4>
          <div class="row">
            <section id="projects">
              <ul id="thumbs" class="portfolio">
                <?php
                // Tentukan kolom
                $col = 4;

                $a = mysql_query("SELECT jdl_album, album.id_album, gbr_album, album_seo,  
                  COUNT(gallery.id_gallery) as jumlah 
                  FROM album LEFT JOIN gallery 
                  ON album.id_album=gallery.id_album 
                  WHERE album.aktif='Y'  
                  GROUP BY jdl_album DESC limit 4");

                $cnt = 0;
                while ($w = mysql_fetch_array($a)) {
                  if ($cnt >= $col) {

                    $cnt = 0;
                  }
                  $cnt++;
                  ?>

                  <!-- Item Project and Filter Name -->
                  <li class="col-lg-3 design" data-id="id-0" data-type="web">
                    <div class="item-thumbs">
                      <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                      <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php echo $w['jdl_album'] ?>" href="<?php echo "img_album/$w[gbr_album]" ?>">
                        <span class="overlay-img"></span>
                        <span class="overlay-img-thumb font-icon-plus"></span>
                      </a>
                      <!-- Thumb Image and Description -->
                      <img src="<?php echo "img_album/$w[gbr_album]" ?>" alt="<?php echo $w['jdl_album'] ?>">
                    </div>
                  </li>
                <?php

              }
              ?>
                <!-- End Item Project -->
              </ul>
            </section>
          </div>
        </div>
      </div>

    </div>
  </section>
<?php

}


// Modul Halaman Statis
elseif ($_GET['module'] == 'halamanstatis') {
  echo "<section id='inner-headline'>
  <div class='container'>
    <div class='row'>
      <div class='col-lg-12'>
        <ul class='breadcrumb'>
          <li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-righ'></i></li>
          <li class='active'>News</li>
        </ul>
      </div>
    </div>
  </div>
  </section>
  <section id='content'>
  <div class='container'>
    <div class='row'>
      <div class='col-lg-8'>";
  $detail = mysql_query("SELECT * FROM halamanstatis 
                              WHERE id_halaman='$_GET[id]'");
  $d = mysql_fetch_array($detail);
  $tgl_posting = tgl_indo($d['tgl_posting']);
  if ($d['gambar'] != '') {
    echo "<article>
            <div class='post-image'>
              <div class='post-heading'>
                <h3><a href='#'>$d[judul]</a></h3>
              </div>
              <img src='foto_banner/$d[gambar]' alt='' />
            </div>
            <p>
               $d[isi_halaman]
            </p>
            <div class='bottom-article'>
              <ul class='meta-post'>
                <li><i class='icon-calendar'></i>$tgl_posting</li>
              </ul>
            </div>
        </article>  
        </div>";
  } else {
    echo "<div class='post-image'>
              <div class='post-heading'>
                <h3><a href='#'>$d[judul]</a></h3>
              </div>
              </div>
      <p>
              $d[isi_halaman]
            </p>
             <div class='bottom-article'>
              <ul class='meta-post'>
                <li><i class='icon-calendar'></i>$tgl_posting</li>
              </ul>
            </div>
        </article>  
        </div>";
  }
  ?>





  <div class='col-lg-4'>
    <aside class='right-sidebar'>
      <div class='widget'>
        <h5 class='widgetheading'>Categories</h5>
        <ul class='cat'>

          <?php
          $kat = mysql_query("SELECT * FROM kategori");
          while ($k = mysql_fetch_array($kat)) {
            echo "<li><i class='icon-angle-right'></i><a href='categori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori]</a><ul></ul></li>";
          }
          ?>
        </ul>
      </div>
      <div class='widget'>
        <h5 class='widgetheading'>Visitors</h5>
        <ul class='recent'>

          <?php
          $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
          $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
          $waktu = time(); // 

          // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
          $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
          // Kalau belum ada, simpan data user tersebut ke database
          if (mysql_num_rows($s) == 0) {
            mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
          } else {
            mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
          }

          $pengunjung = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
          $totalpengunjung = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
          $hits = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
          $totalhits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
          $tothitsgbr = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
          $bataswaktu = time() - 300;
          $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

          $path = "counter/";
          $ext = ".png";

          $tothitsgbr = sprintf("%06d", $tothitsgbr);
          for ($i = 0; $i <= 9; $i++) {
            $tothitsgbr = str_replace($i, "<img src='$path $i $ext' alt='$i'>", $tothitsgbr);
          }

          echo "<table>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total visitor </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today hits </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Online Visitor </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
          ?>
        </ul>
      </div>
      <div class='widget'>
        <h5 class='widgetheading'>Twitter</h5>
        <ul class='tags'>
          <?php
          $main = mysql_query("SELECT * FROM identitas ");
          while ($sosmed = mysql_fetch_array($main))
            $fb = $sosmed['facebook'];
          $tw = $sosmed['twitter'];
          ?>
          <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/asimetrissby9" data-widget-id="721871685972922369">Tweets by @asimetrissby9</a>
          <script>
            ! function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0],
                p = /^http:/.test(d.location) ? 'http' : 'https';
              if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
              }
            }(document, "script", "twitter-wjs");
          </script>

        </ul>
      </div>
    </aside>
  </div>
  </div>
  </div>
  </section>
<?php

}


// Modul semua berita
elseif ($_GET['module'] == 'semuaberita') {
  echo "<section id='inner-headline'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<ul class='breadcrumb'>
					<li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-righ'></i></li>
					<li class='active'>News</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id='content'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-8'>";
  $p = new Paging2;
  $batas = 3;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql = mysql_query("select count(komentar.id_komentar) as jml, judul, judul_seo, jam, 
                       berita.id_berita, hari, tanggal, gambar, isi_berita, tag    
                       from berita left join komentar 
                       on berita.id_berita=komentar.id_berita
                       and aktif='Y' 
                       group by berita.id_berita DESC LIMIT $posisi,$batas");
  while ($r = mysql_fetch_array($sql)) {
    $tgl = tgl_indo($r['tanggal']);
    $dtgl = date("d", strtotime($tgl));
    $mytgl = date("m.y", strtotime($tgl));

    // Tampilkan hanya sebagian isi berita
    $isi_berita = htmlentities(strip_tags($r['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
    $isi = substr($isi_berita, 0, 200); // ambil sebanyak 150 karakter
    $isi = substr($isi_berita, 0, strrpos($isi, " ")); // potong per spasi kalimat

    ?>

    <article>
      <div class='post-image'>
        <div class='post-heading'>
          <h3><a href='#'><?php echo "$r[judul]" ?></a></h3>
        </div>
        <img src='<?php echo "foto_berita/$r[gambar]" ?>' alt='' />
      </div>
      <p>
        <?php echo "$isi" ?>
      </p>
      <div class='bottom-article'>
        <ul class='meta-post'>
          <li><i class='icon-calendar'></i><?php echo "$tgl" ?></li>
          <li><i class='icon-folder-open'></i>tag : <?php echo "$r[tag]" ?></li>
        </ul>
        <a href='news-<?php echo $r['id_berita']; ?>-<?php echo $r['judul_seo']; ?>.html' class='pull-right'>Selengkapnya <i class='icon-angle-right'></i></a>
      </div>
    </article>
  <?php

}

$jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));
$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['halberita'], $jmlhalaman);
echo "<div id='pagination'>
					<span class='all'>$linkHalaman</span>					
				</div>
			</div>";
?>


  <div class='col-lg-4'>
    <aside class='right-sidebar'>
      <div class='widget'>
        <h5 class='widgetheading'>Categories</h5>
        <ul class='cat'>

          <?php
          $kat = mysql_query("SELECT * FROM kategori");
          while ($k = mysql_fetch_array($kat)) {
            echo "<li><i class='icon-angle-right'></i><a href='categori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori]</a><ul></ul></li>";
          }
          ?>
        </ul>
      </div>
      <div class='widget'>
        <h5 class='widgetheading'>Visitors</h5>
        <ul class='recent'>

          <?php
          $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
          $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
          $waktu = time(); // 

          // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
          $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
          // Kalau belum ada, simpan data user tersebut ke database
          if (mysql_num_rows($s) == 0) {
            mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
          } else {
            mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
          }

          $pengunjung = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
          $totalpengunjung = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
          $hits = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
          $totalhits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
          $tothitsgbr = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
          $bataswaktu = time() - 300;
          $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

          $path = "counter/";
          $ext = ".png";

          $tothitsgbr = sprintf("%06d", $tothitsgbr);
          for ($i = 0; $i <= 9; $i++) {
            $tothitsgbr = str_replace($i, "<img src='$path $i $ext' alt='$i'>", $tothitsgbr);
          }

          echo "<table>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total visitor </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today hits </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Online Visitor </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
          ?>
        </ul>
      </div>
      <div class='widget'>
        <h5 class='widgetheading'>Twitter</h5>
        <ul class='tags'>
          <?php
          $main = mysql_query("SELECT * FROM identitas ");
          while ($sosmed = mysql_fetch_array($main))
            $fb = $sosmed['facebook'];
          $tw = $sosmed['twitter'];
          ?>
          <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/asimetrissby9" data-widget-id="721871685972922369">Tweets by @asimetrissby9</a>
          <script>
            ! function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0],
                p = /^http:/.test(d.location) ? 'http' : 'https';
              if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
              }
            }(document, "script", "twitter-wjs");
          </script>
        </ul>
      </div>
    </aside>
  </div>
  </div>
  </div>
  </section>
<?php

} elseif ($_GET['module'] == 'detailberita') {

  $detail = mysql_query("SELECT * FROM berita,users,kategori    
                      WHERE users.username=berita.username 
                      AND kategori.id_kategori=berita.id_kategori 
                      AND id_berita='$_GET[id]'");
  $d = mysql_fetch_array($detail);
  $tgl = tgl_indo($d['tanggal']);
  $baca = $d['dibaca'] + 1;
  ?>
  <section id='inner-headline'>
    <div class='container'>
      <div class='row'>
        <div class='col-lg-12'>
          <ul class='breadcrumb'>
            <li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-righ'></i></li>
            <li class='active'>News</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section id='content'>
    <div class='container'>
      <div class='row'>
        <div class='col-lg-8'>
          <article>
            <div class='post-image'>
              <div class='post-heading'>
                <h3><a href='#'><?php echo "$d[judul]" ?></a></h3>
              </div>
              <img src="<?php echo "foto_berita/$d[gambar]" ?>" alt='' />
            </div>
            <p>
              <?php echo "$d[isi_berita]" ?>
            </p>
            <div class='bottom-article'>
              <ul class='meta-post'>
                <li><i class='icon-calendar'></i><?php echo "$tgl" ?></li>
              </ul>
            </div>
          </article>
        </div>





        <div class='col-lg-4'>
          <aside class='right-sidebar'>
            <div class='widget'>
              <h5 class='widgetheading'>Categories</h5>
              <ul class='cat'>

                <?php
                $kat = mysql_query("SELECT * FROM kategori");
                while ($k = mysql_fetch_array($kat)) {
                  echo "<li><i class='icon-angle-right'></i><a href='categori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori]</a><ul></ul></li>";
                }
                ?>
              </ul>
            </div>
            <div class='widget'>
              <h5 class='widgetheading'>Visitors</h5>
              <ul class='recent'>

                <?php
                $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
                $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
                $waktu = time(); // 

                // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
                $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
                // Kalau belum ada, simpan data user tersebut ke database
                if (mysql_num_rows($s) == 0) {
                  mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
                } else {
                  mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
                }

                $pengunjung = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
                $totalpengunjung = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
                $hits = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
                $totalhits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
                $tothitsgbr = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
                $bataswaktu = time() - 300;
                $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

                $path = "counter/";
                $ext = ".png";

                $tothitsgbr = sprintf("%06d", $tothitsgbr);
                for ($i = 0; $i <= 9; $i++) {
                  $tothitsgbr = str_replace($i, "<img src='$path $i $ext' alt='$i'>", $tothitsgbr);
                }

                echo "<table>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total visitor </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today hits </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Online Visitor </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
                ?>
              </ul>
            </div>
            <div class='widget'>
              <h5 class='widgetheading'>Twitter</h5>
              <ul class='tags'>
                <?php
                $main = mysql_query("SELECT * FROM identitas ");
                while ($sosmed = mysql_fetch_array($main))
                  $fb = $sosmed['facebook'];
                $tw = $sosmed['twitter'];
                ?>
                <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/asimetrissby9" data-widget-id="721871685972922369">Tweets by @asimetrissby9</a>
                <script>
                  ! function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0],
                      p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                      js = d.createElement(s);
                      js.id = id;
                      js.src = p + "://platform.twitter.com/widgets.js";
                      fjs.parentNode.insertBefore(js, fjs);
                    }
                  }(document, "script", "twitter-wjs");
                </script>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
<?php

}

// Modul detail kategori
elseif ($_GET['module'] == 'detailkategori') {
  // Tampilkan nama kategori
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);
  echo "<section id='inner-headline'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<ul class='breadcrumb'>
					<li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-righ'></i></li>
					<li class='active'>Categories $n[nama_kategori]</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id='content'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-8'>";
  $p = new Paging3;
  $batas = 3;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan daftar berita sesuai dengan kategori yang dipilih
  $sql = "SELECT * FROM berita WHERE id_kategori='$_GET[id]' 
            ORDER BY id_berita DESC LIMIT $posisi,$batas";

  $hasil = mysql_query($sql);
  $jumlah = mysql_num_rows($hasil);
  // Apabila ditemukan berita dalam kategori
  if ($jumlah > 0) {
    while ($r = mysql_fetch_array($hasil)) {
      $tgl = tgl_indo($r['tanggal']);
      $dtgl = date("d", strtotime($tgl));
      $mytgl = date("m.y", strtotime($tgl));
      $tgl = tgl_indo($r['tanggal']);
      // Tampilkan hanya sebagian isi berita
      $isi_berita = htmlentities(strip_tags($r['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita, 0, 300); // ambil sebanyak 220 karakter
      $isi = substr($isi_berita, 0, strrpos($isi, " ")); // potong per spasi kalimat


      ?>
      <article>
        <div class='post-image'>
          <div class='post-heading'>
            <h3><a href='#'><?php echo "$r[judul]" ?></a></h3>
          </div>
          <img src='<?php echo "foto_berita/$r[gambar]" ?>' alt='' />
        </div>
        <p>
          <?php echo "$isi" ?>
        </p>
        <div class='bottom-article'>
          <ul class='meta-post'>
            <li><i class='icon-calendar'></i><?php echo "$tgl" ?></li>
            <li><i class='icon-folder-open'></i>tag : <?php echo "$r[tag]" ?></li>
          </ul>
          <a href='news-<?php echo $r['id_berita']; ?>-<?php echo $r['judul_seo']; ?>.html' class='pull-right'>Selengkapnya <i class='icon-angle-right'></i></a>
        </div>
      </article>
    <?php

  }

  $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET['halkategori'], $jmlhalaman);
  echo "<div id='pagination'>
					<span class='all'>$linkHalaman</span>					
				</div>
			</div>";
  ?>


    <div class='col-lg-4'>
      <aside class='right-sidebar'>
        <div class='widget'>
          <h5 class='widgetheading'>Categories</h5>
          <ul class='cat'>

            <?php
            $kat = mysql_query("SELECT * FROM kategori");
            while ($k = mysql_fetch_array($kat)) {
              echo "<li><i class='icon-angle-right'></i><a href='categori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori]</a><ul></ul></li>";
            }
            ?>
          </ul>
        </div>
        <div class='widget'>
          <h5 class='widgetheading'>Visitors</h5>
          <ul class='recent'>

            <?php
            $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
            $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
            $waktu = time(); // 

            // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
            $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
            // Kalau belum ada, simpan data user tersebut ke database
            if (mysql_num_rows($s) == 0) {
              mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
            } else {
              mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
            }

            $pengunjung = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
            $totalpengunjung = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
            $hits = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
            $totalhits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
            $tothitsgbr = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
            $bataswaktu = time() - 300;
            $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

            $path = "counter/";
            $ext = ".png";

            $tothitsgbr = sprintf("%06d", $tothitsgbr);
            for ($i = 0; $i <= 9; $i++) {
              $tothitsgbr = str_replace($i, "<img src='$path $i $ext' alt='$i'>", $tothitsgbr);
            }

            echo "<table>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total visitor </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today hits </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Online Visitor </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
            ?>
          </ul>
        </div>
        <div class='widget'>
          <h5 class='widgetheading'>Twitter</h5>
          <ul class='tags'>
            <?php
            $main = mysql_query("SELECT * FROM identitas ");
            while ($sosmed = mysql_fetch_array($main))
              $fb = $sosmed['facebook'];
            $tw = $sosmed['twitter'];
            ?>
            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/asimetrissby9" data-widget-id="721871685972922369">Tweets by @asimetrissby9</a>
            <script>
              ! function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0],
                  p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                  js = d.createElement(s);
                  js.id = id;
                  js.src = p + "://platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js, fjs);
                }
              }(document, "script", "twitter-wjs");
            </script>
          </ul>
        </div>
      </aside>
    </div>
    </div>
    </div>
    </section>
  <?php

} else {
  echo "<h1>Belum ada Berita Pada Kategori ini</h1>";
  ?>
    <div class='col-lg-4'>
      <aside class='right-sidebar'>
        <div class='widget'>
          <h5 class='widgetheading'>Categories</h5>
          <ul class='cat'>

            <?php
            $kat = mysql_query("SELECT * FROM kategori");
            while ($k = mysql_fetch_array($kat)) {
              echo "<li><i class='icon-angle-right'></i><a href='categori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori]</a><ul></ul></li>";
            }
            ?>
          </ul>
        </div>
        <div class='widget'>
          <h5 class='widgetheading'>Visitors</h5>
          <ul class='recent'>

            <?php
            $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
            $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
            $waktu = time(); // 

            // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
            $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
            // Kalau belum ada, simpan data user tersebut ke database
            if (mysql_num_rows($s) == 0) {
              mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
            } else {
              mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
            }

            $pengunjung = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
            $totalpengunjung = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
            $hits = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
            $totalhits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
            $tothitsgbr = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
            $bataswaktu = time() - 300;
            $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

            $path = "counter/";
            $ext = ".png";

            $tothitsgbr = sprintf("%06d", $tothitsgbr);
            for ($i = 0; $i <= 9; $i++) {
              $tothitsgbr = str_replace($i, "<img src='$path $i $ext' alt='$i'>", $tothitsgbr);
            }

            echo "<table>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total visitor </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today hits </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Online Visitor </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
            ?>
          </ul>
        </div>
        <div class='widget'>
          <h5 class='widgetheading'>Twitter</h5>
          <ul class='tags'>
            <?php
            $main = mysql_query("SELECT * FROM identitas ");
            while ($sosmed = mysql_fetch_array($main))
              $fb = $sosmed['facebook'];
            $tw = $sosmed['twitter'];
            ?>
            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/asimetrissby9" data-widget-id="721871685972922369">Tweets by @asimetrissby9</a>
            <script>
              ! function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0],
                  p = /^http:/.test(d.location) ? 'http' : 'https';
                if (!d.getElementById(id)) {
                  js = d.createElement(s);
                  js.id = id;
                  js.src = p + "://platform.twitter.com/widgets.js";
                  fjs.parentNode.insertBefore(js, fjs);
                }
              }(document, "script", "twitter-wjs");
            </script>
          </ul>
        </div>
      </aside>
    </div>
    </div>
    </div>
    </section>
  <?php

}
}


// Modul semua agenda
elseif ($_GET['module'] == 'semuaagenda') {
  echo "<section id='inner-headline'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-12'>
				<ul class='breadcrumb'>
					<li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-righ'></i></li>
					<li class='active'>Events</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id='content'>
	<div class='container'>
		<div class='row'>
			<div class='col-lg-8'>";
  $p = new Paging4;
  $batas = 3;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua agenda
  $sql = mysql_query("SELECT * FROM agenda  
                      ORDER BY id_agenda DESC LIMIT $posisi,$batas");
  while ($r = mysql_fetch_array($sql)) {
    $tgl = tgl_indo($r['tgl_posting']);
    $dtgl = date("d", strtotime($tgl));
    $mytgl = date("m.y", strtotime($tgl));

    $tgl_mulai = tgl_indo($r['tgl_mulai']);
    $tgl_selesai = tgl_indo($r['tgl_selesai']);
    $isi_agenda = nl2br($r['isi_agenda']);

    ?>

    <article>
      <div class='post-image'>
        <div class='post-heading'>
          <h3><a href='event-<?php echo $r['id_agenda'] ?>-<?php echo $r['tema_seo'] ?>.html'><?php echo $r['tema'] ?></a></h3>
        </div>
        <img src='foto_agenda/<?php echo $r['gambar'] ?>' alt='' />
        <table>
          <tr>
            <td><b>Date </b></td>
          </tr>
          <tr>
            <td><?php echo $tgl_mulai ?> s/d <?php echo $tgl_selesai ?></td>
          </tr>
          <tr>
            <td><b>Time </b></td>
          </tr>
          <tr>
            <td> <?php echo $r['jam'] ?> </td>
          </tr>
          <tr>
            <td><b>Place </b></td>
          </tr>
          <tr>
            <td> <?php echo $r['tempat'] ?> </td>
          </tr>
        </table><br />

      </div>
      <p>
        <?php echo "$isi_agenda" ?>
      </p>
      <div class='bottom-article'>
        <ul class='meta-post'>
          <li><i class='icon-calendar'></i><a href='#'> Posted : <?php echo "$tgl" ?></a></li>
        </ul>
        <a href='event-<?php echo $r['id_agenda'] ?>-<?php echo $r['tema_seo'] ?>.html' class='pull-right'>Selengkapnya <i class='icon-angle-right'></i></a>
      </div>
    </article>
  <?php

}

$jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['halagenda'], $jmlhalaman);
echo "<div id='pagination'>
					<span class='all'>$linkHalaman</span>					
				</div>
			</div>";
?>


  <div class='col-lg-4'>
    <aside class='right-sidebar'>
      <div class='widget'>
        <h5 class='widgetheading'>Categories</h5>
        <ul class='cat'>

          <?php
          $kat = mysql_query("SELECT * FROM kategori");
          while ($k = mysql_fetch_array($kat)) {
            echo "<li><i class='icon-angle-right'></i><a href='categori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori]</a><ul></ul></li>";
          }
          ?>
        </ul>
      </div>
      <div class='widget'>
        <h5 class='widgetheading'>Visitors</h5>
        <ul class='recent'>

          <?php
          $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
          $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
          $waktu = time(); // 

          // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
          $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
          // Kalau belum ada, simpan data user tersebut ke database
          if (mysql_num_rows($s) == 0) {
            mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
          } else {
            mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
          }

          $pengunjung = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
          $totalpengunjung = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
          $hits = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
          $totalhits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
          $tothitsgbr = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
          $bataswaktu = time() - 300;
          $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

          $path = "counter/";
          $ext = ".png";

          $tothitsgbr = sprintf("%06d", $tothitsgbr);
          for ($i = 0; $i <= 9; $i++) {
            $tothitsgbr = str_replace($i, "<img src='$path $i $ext' alt='$i'>", $tothitsgbr);
          }

          echo "<table>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total visitor </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today hits </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Online Visitor </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
          ?>
        </ul>
      </div>
      <div class='widget'>
        <h5 class='widgetheading'>Twitter</h5>
        <ul class='tags'>
          <?php
          $main = mysql_query("SELECT * FROM identitas ");
          while ($sosmed = mysql_fetch_array($main))
            $fb = $sosmed['facebook'];
          $tw = $sosmed['twitter'];
          ?>
          <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/asimetrissby9" data-widget-id="721871685972922369">Tweets by @asimetrissby9</a>
          <script>
            ! function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0],
                p = /^http:/.test(d.location) ? 'http' : 'https';
              if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
              }
            }(document, "script", "twitter-wjs");
          </script>
        </ul>
      </div>
    </aside>
  </div>
  </div>
  </div>
  </section>
<?php

} elseif ($_GET['module'] == 'detailagenda') {

  $event = mysql_query("SELECT * FROM agenda,users 
						WHERE users.username=agenda.username 
						AND id_agenda='$_GET[id]'");
  $e = mysql_fetch_array($event);
  $tgl = tgl_indo($e['tanggal']);
  $tgl_posting = tgl_indo($e['tgl_posting']);
  $dtgl = date("d", strtotime($tgl_posting));
  $mytgl = date("m.y", strtotime($tgl_posting));

  $tgl_mulai = tgl_indo($e['tgl_mulai']);
  $tgl_selesai = tgl_indo($e['tgl_selesai']);
  $isi_agenda = nl2br($e['isi_agenda']);
  ?>
  <section id='inner-headline'>
    <div class='container'>
      <div class='row'>
        <div class='col-lg-12'>
          <ul class='breadcrumb'>
            <li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-righ'></i></li>
            <li class='active'>Events</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section id='content'>
    <div class='container'>
      <div class='row'>
        <div class='col-lg-8'>
          <article>
            <div class='post-image'>
              <div class='post-heading'>
                <h3><a href='event-<?php echo $e['id_agenda'] ?>-<?php echo $e['tema_seo'] ?>.html'><?php echo $e['tema'] ?></a></h3>
              </div>
              <img src='foto_agenda/<?php echo $e['gambar'] ?>' alt='' />
              <table>
                <tr>
                  <td><b>Date </b></td>
                </tr>
                <tr>
                  <td><?php echo $tgl_mulai ?> s/d <?php echo $tgl_selesai ?></td>
                </tr>
                <tr>
                  <td><b>Time </b></td>
                </tr>
                <tr>
                  <td> <?php echo $e['jam'] ?> </td>
                </tr>
                <tr>
                  <td><b>Place </b></td>
                </tr>
                <tr>
                  <td> <?php echo $e['tempat'] ?> </td>
                </tr>
              </table><br />

            </div>
            <p>
              <?php echo "$isi_agenda" ?>
            </p>
            <div class='bottom-article'>
              <ul class='meta-post'>
                <li><i class='icon-calendar'></i><a href='#'> Posted : <?php echo "$tgl_posting" ?></a></li>
              </ul>

            </div>
          </article>

        </div>





        <div class='col-lg-4'>
          <aside class='right-sidebar'>
            <div class='widget'>
              <h5 class='widgetheading'>Categories</h5>
              <ul class='cat'>

                <?php
                $kat = mysql_query("SELECT * FROM kategori");
                while ($k = mysql_fetch_array($kat)) {
                  echo "<li><i class='icon-angle-right'></i><a href='categori-$k[id_kategori]-$k[kategori_seo].html'>$k[nama_kategori]</a><ul></ul></li>";
                }
                ?>
              </ul>
            </div>
            <div class='widget'>
              <h5 class='widgetheading'>Visitors</h5>
              <ul class='recent'>

                <?php
                $ip = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
                $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
                $waktu = time(); // 

                // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
                $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
                // Kalau belum ada, simpan data user tersebut ke database
                if (mysql_num_rows($s) == 0) {
                  mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
                } else {
                  mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
                }

                $pengunjung = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
                $totalpengunjung = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0);
                $hits = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal"));
                $totalhits = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
                $tothitsgbr = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0);
                $bataswaktu = time() - 300;
                $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

                $path = "counter/";
                $ext = ".png";

                $tothitsgbr = sprintf("%06d", $tothitsgbr);
                for ($i = 0; $i <= 9; $i++) {
                  $tothitsgbr = str_replace($i, "<img src='$path $i $ext' alt='$i'>", $tothitsgbr);
                }

                echo "<table>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total visitor </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Today hits </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Online Visitor </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
                ?>
              </ul>
            </div>
            <div class='widget'>
              <h5 class='widgetheading'>Twitter</h5>
              <ul class='tags'>
                <?php
                $main = mysql_query("SELECT * FROM identitas ");
                while ($sosmed = mysql_fetch_array($main))
                  $fb = $sosmed['facebook'];
                $tw = $sosmed['twitter'];
                ?>
                <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/asimetrissby9" data-widget-id="721871685972922369">Tweets by @asimetrissby9</a>
                <script>
                  ! function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0],
                      p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                      js = d.createElement(s);
                      js.id = id;
                      js.src = p + "://platform.twitter.com/widgets.js";
                      fjs.parentNode.insertBefore(js, fjs);
                    }
                  }(document, "script", "twitter-wjs");
                </script>
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
<?php

}

// Modul semua album
elseif ($_GET['module'] == 'semuaalbum') {
  echo "<section id='inner-headline'>
  <div class='container'>
    <div class='row'>
      <div class='col-lg-12'>
        <ul class='breadcrumb'>
          <li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-right'></i></li>
          <li class='active'>Portfolio</li>
        </ul>
      </div>
    </div>
  </div>
  </section>
  <div class='content'>
  <div class='container'>
    <div class='row'>
    <br />
      <div class='col-lg-12'>
        <div class='clearfix'>
        </div>
        <div class='row'>
          <section id='projects'>
          <ul id='thumbs' class='portfolio'>";
  $col = 3;
  $a = mysql_query("SELECT jdl_album, album.id_album, gbr_album, album_seo,  
                            COUNT(gallery.id_gallery) as jumlah 
                            FROM album LEFT JOIN gallery 
                            ON album.id_album=gallery.id_album 
                            WHERE album.aktif='Y'  
                            GROUP BY jdl_album");
  $cnt = 0;
  while ($w = mysql_fetch_array($a)) {
    if ($cnt >= $col) {
      $cnt = 0;
    }
    $cnt++;


    echo "
            <li class='item-thumbs col-lg-3 design' data-id='id-0'>
            <a class='link' href='album-$w[id_album]-$w[album_seo].html'>
            </a>
            <!-- Thumb Image and Description -->
            <img src='img_album/$w[gbr_album]' alt='$w[jdl_album]'>
			<br />
			<a href='album-$w[id_album]-$w[album_seo].html'><b><FONT SIZE='3' COLOR='#000'>$w[jdl_album]</FONT></b></a>
			<p>
			<b>($w[jumlah] Foto)</b>
			</p>
			</li>
			";
  }
  echo "
            <!-- End Item Project -->
            <!-- End Item Project -->
          </ul>
          </section>
        </div>
      </div>
    </div>
  </div>
  </section>";

  ?>
<?php 
}

// Modul detail album
elseif ($_GET['module'] == 'detailalbum') {
  echo "<section id='inner-headline'>
  <div class='container'>
    <div class='row'>
      <div class='col-lg-12'>
        <ul class='breadcrumb'>
          <li><a href='#'><i class='fa fa-home'></i></a><i class='icon-angle-right'></i></li>
          <li class='active'>Portfolio</li>
        </ul>
      </div>
    </div>
  </div>
  </section>
  <div class='content'>
  <div class='container'>
    <div class='row'>
    <br />
      <div class='col-lg-12'>
        <div class='clearfix'>
        </div>
        <div class='row'>
          <section id='projects'>
          <ul id='thumbs' class='portfolio'>";


  $p = new Paging6;
  $batas = 12;
  $posisi = $p->cariPosisi($batas);

  // Tentukan kolom
  $col = 3;

  $g = mysql_query("SELECT * FROM gallery WHERE id_album='$_GET[id]' ORDER BY id_gallery DESC LIMIT $posisi,$batas");
  $ada = mysql_num_rows($g);

  if ($ada > 0) {
    $cnt = 0;
    while ($w = mysql_fetch_array($g)) {
      if ($cnt >= $col) {
        echo "</tr><tr>";
        $cnt = 0;
      }
      $cnt++;


      echo "
            <li class='item-thumbs col-lg-3 design' data-id='id-0'>
            <a class='hover-wrap fancybox' data-fancybox-group='gallery' title='$w[jdl_gallery]' href='img_galeri/$w[gbr_gallery]'>
            <span class='overlay-img'></span>
            <span class='overlay-img-thumb font-icon-plus'></span>
            </a>
            <!-- Thumb Image and Description -->
            <img src='img_galeri/$w[gbr_gallery]' alt='$w[jdl_gallery]'>
            </li>";
    }
    echo "
            <!-- End Item Project -->
            <!-- End Item Project -->
          </ul>
          </section>
        </div>
      </div>
    </div>
  </div>
  </section>";

    ?>
  <?php 
}
}



// Modul hubungi kami
elseif ($_GET['module'] == 'hubungikami') {
  ?>
  <section id="inner-headline">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
            <li class="active">Contact</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section id="content">
    <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.698520932747!2d106.7330769!3d-6.1742972!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6208522244d48262!2sRIFADA+ALAM+-+jasa+tukang+taman+jakarta%2C+batu+carport%2C+vertical+garden%2C+lantai+batu+sikat+jakarta.!5e0!3m2!1sen!2sid!4v1558535557770!5m2!1sen!2sid" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Informasi Kontak</h4>

          <?php
          $main = mysql_query("SELECT * FROM identitas ");
          while ($t = mysql_fetch_array($main)) {
            ?>
            <address>
              <strong>Rifada Alam Jakarta</strong><br>
              <h5> Alamat : <?php echo "$t[alamat]" ?></h5>
            </address>

            <h5>Telp/WA : <?php echo "$t[no_telp]" ?> </h5>
            <h5>Email : <?php echo "$t[email]" ?></h5>
            <br />
          <?php

        }
        ?>

          <?php echo "
       
      </div>
    </div>
  </div>
  </section>";
        }
        // Modul hubungi aksi
        elseif ($_GET['module'] == 'hubungiaksi') {
          ?>

          <div class="content">
            <div class="container_all masterbg bgbottom">
              <div class="container marketing">
                <div class="row">
                  <!-- 1 Column -->
                  <div class="span7 margintop">
                    <div class="padding">
                      <h3 class="navbar titlewrap">
                        <span>Contact Us</span>
                      </h3> <!-- article-content -->

                      <?php
                      $nama = trim($_POST[nama]);
                      $email = trim($_POST[email]);
                      $subjek = trim($_POST[subjek]);
                      $pesan = trim($_POST[pesan]);
                      $iden = mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

                      if (empty($nama)) {
                        echo "Anda belum mengisikan NAMA<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
                      } elseif (empty($email)) {
                        echo "Anda belum mengisikan EMAIL<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
                      } elseif (empty($subjek)) {
                        echo "Anda belum mengisikan SUBJEK<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
                      } elseif (empty($pesan)) {
                        echo "Anda belum mengisikan PESAN<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
                      } else {
                        if (!empty($_POST['kode'])) {
                          if ($_POST['kode'] == $_SESSION['captcha_session']) {

                            mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");

                            echo "<p align=center><b>Terima kasih telah mengirimkan pesan . <br /> kami akan merespon email anda secepatnya.</b></p>";

                            $kepada = "$iden[email]";
                            $judul = "$_POST[subjek]";
                            $pesan = "$_POST[pesan]";
                            mail($kepada, $judul, $pesan, "From: $_POST[email]\n Content-type:text/html\r\n");
                          } else {
                            echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
                          }
                        } else {
                          echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
                        }
                      }
                    }
                    ?>