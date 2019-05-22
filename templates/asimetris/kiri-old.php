 <?php
 if ($_GET['module']=='home'){
	 ?>
	 
	 
        <!-- / end content-kiri untuk headline berita -->   

		    <!-- slider -->
            <?php include "$f[folder]/demos.php"; ?>
            <!-- end slider -->
              <div class="clear">
              </div><br /> 
            <!-- our service -->
                    <?php include "$f[folder]/home.php"; ?>
            <!-- end ourservice -->
                <div class="clear">

				</div>
				</div>
              <!-- sidebar -->
			  
<div class="span4 margintop"><!-- start:span4 margintop -->
	<!-- <div class="padding"> --> <!-- start:padding -->
		<!-- <h3 class="navbar titlewrap"><span>SOCIAL MEDIA</span></h3>
			<?php
			$main=mysql_query("SELECT * FROM identitas ");
			while($id=mysql_fetch_array($main)){
			echo "	<a href='$id[facebook]' title='Facebook' class='facebookbutton'>Facebook</a>
					<a href='https://twitter.com/$id[twitter]' title='Twitter' class='twitterbutton'>Twitter</a>
					<a href='http://youtube.com/$id[youtube]' title='Youtube' class='youtubebutton'>Youtube</a>
					<a href='ymsgr:sendIM?$id[yahoo_messenger]'><img src='http://opi.yahoo.com/online?u=$id[yahoo_messenger]&amp;m=g&amp;t=11' border='0' width='60px' height='50px'></a>";
             }
			 ?>
	</div> --> <!-- stop:padding -->
	
	<div class="padding">
		<!-- <h3 class="navbar titlewrap"><span>BANNER</span></h3> -->
			<?php
			$banner=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC LIMIT 1");
            $no=1;
			while($r=mysql_fetch_array($banner)){      
			echo "<img alt='' src='foto_banner/$r[gambar]' class='floatimg' width='280' />";  
            }
			?>
	</div>
	<div class="clear"></div>

	<div class="stats">
		<h3 class="navbar titlewrap margintop"><span>STATISTICS</span></h3>
          <ul class="statsul">
            <?php
              $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time(); // 

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysql_num_rows($s) == 0){
                mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
              $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

              $path = "counter/";
              $ext = ".png";

              $tothitsgbr = sprintf("%06d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
	               $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
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
     
			<!-- <?php
			$main=mysql_query("SELECT * FROM identitas ");
			while($sosmed=mysql_fetch_array($main))
			$fb=$sosmed['facebook'];
			?> -->
		<!-- <div id="fb-root"></div>             
		<br /><br /><br /><br /> -->
	<div class="padding">
			<h3 class="navbar titlewrap margintop"><span>FANS PAGE FACEBOOK</span></h3>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=100968433297256";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

		<?php echo"<div class='fb-like-box' data-href='$fb' data-width='285' data-height='240' data-show-faces='true' data-header='true' data-stream='false' data-show-border='false'></div>";?>
	</div>
   <!--========= AKHIR FANPAGE ========================-->  

	

		  
</div><!-- stop:span4 margintop -->
<br />
</div>
</div>

              <!-- end sidebar -->
          <div class="clear">
          </div>
          </div>
           </div>
           

    <!-- detail staff -->       
<?php 
}
elseif ($_GET['module']=='detailstaff'){
	echo "<div id='content'>          
           <div id='content-detail'>";            

	$detail=mysql_query("SELECT * FROM staff,jabatan WHERE staff.id_jabatan=jabatan.id_jabatan
                    AND id_staff='$_GET[id]'");
	$st   = mysql_fetch_array($detail);
	$tgl = tgl_indo($st[tanggal]);
	$baca = $st[dibaca]+1;
	?>
    <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;<?=$st['nama_staff']?>
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
									
				  <tr><td><img src='img_staff/<?=$st['gbr_staff']?>' border=0 align="left" height="140" width="120"></td></tr>
				<table style='margin-top:-80px'><tr><td><b> Nama </b></td><td> : <?=$st['nama_staff']?> </td></tr> <br>
                <tr><td><b>Jabatan </b></td><td> : <?=$st['nama_jabatan']?></td></tr><br /> 	
                <tr><td><b> Facebook </b></td><td> : <?=$st['facebook']?> </td></tr> <br>
				<tr><td><b> Twitter </b></td><td> : <?=$st['twitter']?> </td></tr> <br>
				<tr><td><b> Email </b></td><td> : <?=$st['email']?> </td></tr> <br>
				<tr><td><b> Keterangan </b></td><td> : <?=$st['keterangan']?> </td></tr></table>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
							</div>
							</div>

<!-- detail portofolio -->       
<?php 
}
elseif ($_GET['module']=='detailportofolio'){
	echo "<div id='content'>          
           <div id='content-detail'>";            

	$detail=mysql_query("SELECT * FROM portofolio WHERE id_portofolio='$_GET[id]'");
	$st   = mysql_fetch_array($detail);
	$tgl = tgl_indo($st[tanggal]);
	$baca = $st[dibaca]+1;
	?>
    <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;<?=$st['nama_portofolio']?>
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
									
				  <tr><td><img src='img_portofolio/<?=$st['foto_portofolio']?>' border=0 align="left" height="240" width="220"></td></tr>
				<table style='margin-top:-10px'><tr><td><b> Nama </b></td><td> : <?=$st['nama_portofolio']?> </td></tr> <br>
                <tr><td><b>Alamat </b></td><td> : <?=$st['alamat_portofolio']?></td></tr>	
                </table>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
							</div>
							</div>							


							
                 <!-- detail berita -->
<?php 
}
elseif ($_GET['module']=='detailberita'){
	echo "<div id='content'>          
           <div id='content-detail'>";            

	$detail=mysql_query("SELECT * FROM berita,users,kategori    
                      WHERE users.username=berita.username 
                      AND kategori.id_kategori=berita.id_kategori 
                      AND id_berita='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	$baca = $d[dibaca]+1;
	?>
<div class="content">
   <div class="container_all masterbg bgbottom">
                    <div class="container marketing">
                        <div class="row">
                            <!-- 1 Column -->
                            <div class="span7 margintop">
                                <div class="padding">
								<h3 class="navbar titlewrapkonten">
								<div class="jdldetailnews"><?php echo $d['judul'] ?></div>
								</h3> 
			                       <div class="marginbottom paddingbottom"> 
								<span class="infodesc"><i>Posted by : <?php echo $d['nama_lengkap'] ?> -- 
                Category : <a href='categori-<?php echo $d['id_kategori']?>-<?php echo $d['kategori_seo']?>.html' style="color:#ff9d00;"><?php echo $d['nama_kategori']?></a> 
				-- Read: <?php echo $baca ?> times</i></span><br /><br />
                
                <p><span class="image"><img src='foto_berita/<?php echo $d['gambar']?>' class="gambar" align="left"></span></p>
				<div class="isi">
					<p><?php echo $d['isi_berita'] ?></p>
				</div>
                 
                 <?php
				   echo "<hr><p><b>Related News :</b><p><ul class='beritaterkait'>";
  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata  = explode(",",$d[tag]);
  $jml_katakan = (integer)count($pisah_kata);

  $jml_kata = $jml_katakan-1; 
  $ambil_id = substr($_GET[id],0,4);

  // Looping query sebanyak jml_kata
  $cari = "SELECT * FROM berita WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "tag LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
   $cari .= ") ORDER BY id_berita DESC LIMIT 5";
 
  $hasil  = mysql_query($cari);
  while($h=mysql_fetch_array($hasil)){
  		echo "<li><a href=news-$h[id_berita]-$h[judul_seo].html>$h[judul]</a></li>";
  };
?>

</div>

</div>
                            
                            
    <?php
  // Apabila detail berita dilihat, maka tambahkan berapa kali dibacanya
  mysql_query("UPDATE berita SET dibaca=$d[dibaca]+1 WHERE id_berita='$_GET[id]'"); 

?>
                                                                 
                            
<?php

  // Paging komentar
  $p      = new Paging7;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

  // Komentar berita
  $sql = mysql_query("SELECT * FROM komentar WHERE id_berita='$_GET[id]' AND aktif='Y' LIMIT $posisi,$batas");
	$jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
    while ($s = mysql_fetch_array($sql)){
      $tanggal = tgl_indo($s[tgl]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
 	    if ($s[url]!=''){
        echo "<span class=komentar><a name=$s[id_komentar] id=$s[id_komentar]><a href='http://$s[url]' target='_blank'><b><font color=red>$s[nama_komentar]</font></b></a></a></span><br />";  
	    }
	    else{
        echo "<span class=komentar><b><font color=red>$s[nama_komentar]</font></b></span><br />";  
      }

  		echo "<span class=tanggal>$tanggal - $s[jam_komentar] WIB</span><br /><br />";
      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
      $isikan=sensor($isian); 
 
  	  echo autolink($isikan);
      echo "<hr color=#CCC noshade=noshade />";	 		  
    }

   	$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM komentar WHERE id_berita='$_GET[id]' AND aktif='Y'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halkomentar'], $jmlhalaman);

    echo "<div class='pages'>$linkHalaman</div>";
  }
  // Form komentar
  
        
  echo "</div>";            
?>
		<div class="cleared"></div>
<?php  include "$f[folder]/sidebar.php"; ?>
                                    

</div>
</div>
</div>
</div>
                <!-- detail agenda -->
<?php 
}
elseif ($_GET['module']=='detailagenda'){
	echo "<div id='content'>          
           <div id='content-detail'>";            

	$detail=mysql_query("SELECT * FROM agenda,users 
						WHERE users.username=agenda.username 
						AND id_agenda='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	$baca = $d[dibaca]+1;
	?>
<div class="content">
   <div class="container_all masterbg bgbottom">
                    <div class="container marketing">
                        <div class="row">
                            <!-- 1 Column -->
                            <div class="span7 margintop">
                                <div class="padding">
								<h3 class="navbar titlewrapkonten">
								<div class="jdldetailnews"><?php echo $d['tema'] ?></div>
								</h3> 
			                       <div class="marginbottom paddingbottom"> 
								<span class="infodesc"><i>Posted by : <?php echo $d['username'] ?> - 
                Event : <a href='event-<?php echo $d['id_agenda']?>-<?php echo $d['tema_seo']?>.html' style="color:#ff9d00;"><?php echo $d['tema']?></a> 
				</i></span><br /><br />
                
                <img alt='' src='foto_agenda/<?php echo $d['gambar']?>' class='floatimg' width='180' height='160'/>
				<div class="isi">
					<table><tr><td><b>Place </td><td> : <?php echo $d['tempat'] ?></b></td></tr>
					<tr><td><b>Date </td><td>: <?php echo $d['tgl_mulai'] ?> to <?php echo $d['tgl_selesai'] ?></b></td></tr>
					<tr><td><b>Time </td><td>: <?php echo $d['jam'] ?></b></td></tr>
					</table><br /><br /><br /><br /><br /><br /><br />
					<p><b>Description : </b><br /><?php echo $d['isi_agenda'] ?></p>
				</div>
                 
              
</div>

</div>
                            
                            
                                
                            

        
  </div>
		<div class="cleared"></div>
<?php  include "$f[folder]/sidebar.php"; ?>
                                    

</div>
</div>
</div>
</div>
<!-- End Detil Agenda -->

<?php
}

// Modul berita per kategori
elseif ($_GET['module']=='detailkategori'){
	 echo "<div class='sidebar'>";
    include "$f[folder]/sidebar-nonfb.php";           
echo "</div>";
  // Tampilkan nama kategori
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);
  
  $p      = new Paging3;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  
  // Tampilkan daftar berita sesuai dengan kategori yang dipilih
 	$sql   = "SELECT * FROM berita WHERE id_kategori='$_GET[id]' 
            ORDER BY id_berita DESC LIMIT $posisi,$batas";		 

	$hasil = mysql_query($sql);
	$jumlah = mysql_num_rows($hasil);
	// Apabila ditemukan berita dalam kategori
	if ($jumlah > 0){
   while($r=mysql_fetch_array($hasil)){
	   $tgl = tgl_indo($r[tanggal]);
		    // Tampilkan hanya sebagian isi berita
    $isi_berita = htmlentities(strip_tags($r[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
    $isi = substr($isi_berita,0,300); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

  
  ?>
<div class="content">
   <div class="container_all masterbg bgbottom">
                    <div class="container marketing">
                        <div class="row">
                            <!-- 1 Column -->
                            <div class="span7 margintop3">
                                <div class="padding">
								<h3 class="navbar titlewrap">
								<span><?php echo $r['judul']?></span>
								</h2> 
								<!-- item Content --> 
								<div class="marginbottom paddingbottom"> 
								<h5 class="headline marginbottom">
								<span><?php echo $r['hari']?> <?php echo "$tgl"; ?> // Comments : <?php echo "$r[jml]"; ?></span></h5> <p><a href="#"><img alt="" src="foto_berita/medium_<?php echo $r['gambar']?>" class="floatimg" /></a> <?php echo "$isi.. <br><br><a href='news-$r[id_berita]-$r[judul_seo].html'  class='white' ><div class='classname'>Read More</div></a>"; ?></p> </div> <div class="clear"></div><br /> <!-- item Content End --> 
                      
                                    <br /><br />
                                        
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            			<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>       
                                                <!-- /article-content -->
                            
 <?php  
  }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);

  echo "<div class='pages'>$linkHalaman</div>";
  }
  else{ ?>
  
   <div class="content">
   <div class="container_all masterbg bgbottom">
                    <div class="container marketing">
                        <div class="row">
                            <!-- 1 Column -->
                            <div class="span7 margintop">
                                <div class="padding">
                                             <!-- article-content -->
                                              <b><font size="3">Belum ada berita pada kategori ini.</font></b>
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
                            
  <?php
   //echo "Belum ada berita pada kategori ini.";
  }
}

// Modul hasil pencarian berita 
elseif ($_GET['module']=='hasilcari'){
	?>
     <div class="content">
   <div class="container_all masterbg bgbottom">
                    <div class="container marketing">
                        <div class="row">
                            <!-- 1 Column -->
                            <div class="span7 margintop">
                                <div class="padding">
								<h3 class="navbar titlewrap">
								 <span>Search Result</span>
								 </h3>
                                                <!-- article-content -->
                                              
<?php
  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST['kata']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM berita WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "judul OR isi_berita LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY id_berita DESC LIMIT 7";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  if ($ketemu > 0){
    echo "<p>Ditemukan <b>$ketemu</b> berita dengan kata <font style='background-color:#00FFFF'><b>$kata</b></font> : </p>"; 
    while($t=mysql_fetch_array($hasil)){
		echo "<table><tr><td><span class=judul><a href=berita-$t[id_berita]-$t[judul_seo].html><b><font color='blue'>$t[judul]</font></b></a></span><br /><br />";
      // Tampilkan hanya sebagian isi berita
      $isi_berita = htmlentities(strip_tags($t[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,250); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      echo "$isi ... <a href='news-$t[id_berita]-$t[judul_seo].html' class='white'><div class='classname'>Read More</div></a>
            <br /></td></tr>
            </table><hr color=#CCC noshade=noshade />";
    }                                                          
  }
  else{
    echo "<p></p><p align=center>Not Result news with words <b>$kata</b></p>";
  }

?>                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                            <!-- slider -->
            <?php include "$f[folder]/sidebar.php"; ?>
            <!-- end slider -->
                                </div>
                            </div>

<?php 

}


// Modul hasil poling
elseif ($_GET['module']=='hasilpoling'){
	?>
       <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Hasil Polling
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
  <?php
     if (isset($_COOKIE["poling"])) {
   echo "Sorry, anda sudah pernah melakukan voting terhadap poling ini.";
 }
 else{
  // membuat cookie dengan nama poling
  // cookie akan secara otomatis terhapus dalam waktu 24 jam
  setcookie("poling", "sudah poling", time() + 3600 * 24);

  $u=mysql_query("UPDATE poling SET rating=rating+1 WHERE id_poling='$_POST[pilihan]'");

  echo "<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br /><br />
        Hasil poling saat ini: </p><br />";
  
  echo "<table width=100% style='border: 1pt dashed #0000CC;padding: 10px;'>";

  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  
  $jml_vote=$j[jml_vote];
  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  
  while ($s=mysql_fetch_array($sql)){
  	
  	$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 3;

    echo "<tr><td width=120>$s[pilihan] ($s[rating]) </td><td> 
          <img src=$f[folder]/images/blue.png width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table>
        <p>Jumlah Voting: <b>$jml_vote</b></p>";
 }
	
    
	?>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>

<?php
}


// Modul hasil poling
elseif ($_GET['module']=='lihatpoling'){
	?>
           <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Hasil Polling
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
  <?php
  echo "<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br /><br />
        Hasil poling saat ini: </p><br />";
  
  echo "<table width=100%>";

  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  
  $jml_vote=$j[jml_vote];
  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  
  while ($s=mysql_fetch_array($sql)){
  	
  	$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 3;

    echo "<tr><td width=120>$s[pilihan] ($s[rating]) </td><td> 
          <img src=$f[folder]/images/blue.png width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table>
        <p>Jumlah Voting: <b>$jml_vote</b></p>";
	?>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>


<?php

}

// Menu utama di header

// Modul profil
elseif ($_GET['module']=='profilkami'){
?>
   <div class="content">
   <div class="container_all masterbg bgbottom">
                    <div class="container marketing">
                        <div class="row">
                            <!-- 1 Column -->
                            <div class="span7 margintop">
                                <div class="padding">
								<h3 class="navbar titlewrap">
								 <span>Profile</span>
								 </h3>

<?php
$profil = mysql_query("SELECT * FROM modul WHERE id_modul='37'");
	$r      = mysql_fetch_array($profil);

  
  if ($r[gambar]!=''){
		echo "<span class=image><img src='foto_banner/$r[gambar]'></span>";
	}
  echo "<div class='isi'>$r[static_content]</div>"; 
  ?>

                                               
                                                <!-- /article-content -->
                    <div class="clear">
                </div>
				</div>
				</div>
           
          
<?php }

// Modul halaman statis
elseif ($_GET['module']=='halamanstatis'){

$detail=mysql_query("SELECT * FROM halamanstatis 
                      WHERE id_halaman='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
  $tgl_posting   = tgl_indo($d[tgl_posting]);
?>

	<div class="content">
   <div class="container_all masterbg bgbottom">
                    <div class="container marketing">
                        <div class="row">
                            <!-- 1 Column -->
                            <div class="span7 margintop">
                                <div class="padding">
								<h3 class="navbar titlewrap">
								 <span><?php echo $d['judul']?></span>
								 </h3>
								 Posted on : <?php echo $tgl_posting  ?><br /><br />

<?php
$profil = mysql_query("SELECT * FROM modul WHERE id_modul='37'");
	$r      = mysql_fetch_array($profil);

  
  if ($r[gambar]!=''){
		echo "<span class=image><img src='foto_banner/$d[gambar]'></span>";
	}
  echo "<div class='isi'>$d[isi_halaman]</div>"; 
  ?>

                                               
                                                <!-- /article-content -->
                    <div class="clear">
                </div>
				</div>
				</div>
           
              <!-- sidebar -->
                    <?php include "$f[folder]/sidebar.php"; ?>
			  <!-- end sidebar -->


<!-- end -->

<?php	
}

// Modul semua berita
elseif ($_GET['module']=='semuaberita'){
	echo "<div id='content'>";
  echo "<div id='content-kanan'>";
    include "$f[folder]/sidebar.php";           
echo "</div>";
  $p      = new Paging2;
  $batas  = 12;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql=mysql_query("select count(komentar.id_komentar) as jml, judul, judul_seo, jam, 
                       berita.id_berita, hari, tanggal, gambar, isi_berita    
                       from berita left join komentar 
                       on berita.id_berita=komentar.id_berita
                       and aktif='Y' 
                       group by berita.id_berita DESC LIMIT $posisi,$batas");
  while($r=mysql_fetch_array($sql)){
		$tgl = tgl_indo($r[tanggal]);
	
		// Tampilkan hanya sebagian isi berita
      $isi_berita = htmlentities(strip_tags($r[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,220); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

		?>	 <div id="content">
   <div class="container_all masterbg bgbottom">
                    <div class="container marketing">
                        <div class="row">
                            <!-- 1 Column -->
                            <div class="span7 margintop1">
							<div class="padding">
								<h3 class="navbar titlewrap">
								<span><?php echo $r['judul']?></span>
								</h2> 
								<!-- item Content --> 
								<div class="marginbottom paddingbottom"> 
								<h5 class="headline marginbottom">
								<span><?php echo $r['hari']?> <?php echo "$tgl"; ?> // Comments : <?php echo "$r[jml]"; ?></span></h5> <p><a href="#"><img alt="" src="foto_berita/medium_<?php echo $r['gambar']?>" class="floatimg" /></a> <?php echo "$isi.. <br><br><a href='news-$r[id_berita]-$r[judul_seo].html' class='white' ><div class='classname'>Read More</div></a>"; ?></p> </div> <div class="clear"></div><br /> <!-- item Content End --> 



                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
							</div>
                            
                            
                            		<div class="cleared"></div>
                                </div>
                           

                            <?php	
  }
  
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halberita], $jmlhalaman);
  echo "<div class='pages'>$linkHalaman </div><br /><br />";
                          
			  


}

// Modul semua agenda
elseif ($_GET['module']=='semuaagenda'){
  $p      = new Paging4;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas); 
echo "<div id='content'>";
  echo "<div id='content-kanan'>";
    include "$f[folder]/sidebar-nonfb.php";           
echo "</div>";
  // Tampilkan semua agenda
 	$sql = mysql_query("SELECT * FROM agenda  
                      ORDER BY id_agenda DESC LIMIT $posisi,$batas");		 
  while($d=mysql_fetch_array($sql)){
    $tgl_posting = tgl_indo($d[tgl_posting]);
    $tgl_mulai   = tgl_indo($d[tgl_mulai]);
    $tgl_selesai = tgl_indo($d[tgl_selesai]);
    $isi_agenda  = nl2br($d[isi_agenda]);
	?>
	<div class='content'>
   <div class='container_all masterbg bgbottom'>
                    <div class='container marketing'>
                        <div class='row'>
                            <!-- 1 Column -->
                            <div class='span7 margintop1'>
                                <div class='padding'>
								<h3 class='navbar titlewrap'>
								 <span><?php echo $d['tema'] ?></span>
								 </h3><ul class="archive unstyled">
<li style="none"><img alt='' src='foto_agenda/<?php echo $d['gambar']?>' class='floatimg' width='180' height='160'/>
                                           <div class='apwcontent1'>
											<div class='marginbottom'>
                                                <table>
												<tr><td><b>Date </b></td></tr>
												<tr><td><?php echo $tgl_mulai ?> s/d <?php echo $tgl_selesai ?></td></tr>
												<tr><td><b>Time </b></td></tr>
												<tr><td> <?php echo $d['jam'] ?> </td></tr>
												<tr><td><b>Place </b></td></tr>
												<tr><td> <?php echo  $d['tempat'] ?> </td></tr>
												</table><br />
												<a href='event-<?php echo $d['id_agenda']?>-<?php echo $d['tema_seo'] ?>.html'>Detil View</a>
                                            </div>
                                        </li> 
										<ul>
<!--	<iframe width="225" height="160" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $d[google_maps]?>"></iframe><br /><small>View <a href="<?php echo $d[google_maps]?>" style="color:#0000FF;text-align:left"><?php echo  $d['tempat'] ?></a> in a larger map</small><br><br> -->
	<?php
		  echo "</div></div></div> ";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halagenda], $jmlhalaman);

  echo "<div class='pages'>$linkHalaman</div> <br /><br />";
  
}

// Modul semua download
elseif ($_GET['module']=='semuadownload'){
  echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<span class=judul_head>&#187; <b>Download</b></span><br /><br />"; 
  $p      = new Paging5;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua download
 	$sql = mysql_query("SELECT * FROM download  
                      ORDER BY id_download DESC LIMIT $posisi,$batas");		 

  echo "<ul>";   
   while($d=mysql_fetch_array($sql)){
      echo "<li><a href='downlot.php?file=$d[nama_file]'>$d[judul]</a> ($d[hits])</li>";
	 }
  echo "</ul><hr color=#CCC noshade=noshade />";
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM download"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[haldownload], $jmlhalaman);

  echo "<div class='pages'>$linkHalaman </div><br /><br />";
  echo "</div>
    </div>";            
}


// Modul semua album
elseif ($_GET['module']=='semuaalbum'){
  echo "<div class='content'>
   <div class='container_all masterbg bgbottom'>
                    <div class='container marketing'>
                        <div class='row'>
                            <!-- 1 Column -->
                            <div class='span7 margintop'>
                                <div class='padding'>
								<h3 class='navbar titlewrap'>
								 <span>Photo Gallery</span>
								 </h3>
  "; 
  // Tentukan kolom
  $col = 2;

  $a = mysql_query("SELECT jdl_album, album.id_album, gbr_album, album_seo,  
                  COUNT(gallery.id_gallery) as jumlah 
                  FROM album LEFT JOIN gallery 
                  ON album.id_album=gallery.id_album 
                  WHERE album.aktif='Y'  
                  GROUP BY jdl_album");
  echo "<table><tr>";
  $cnt = 0;
  while ($w = mysql_fetch_array($a)) {
    if ($cnt >= $col) {
      echo "</tr><tr>";
      $cnt = 0;
  }
  $cnt++;


 echo "<td align=center valign=top><br />";
 echo " <div class='shadow padding'>

 <a href=album-$w[id_album]-$w[album_seo].html>
    <img class='img2' src='img_album/$w[gbr_album]' border=0 width=280 height=180><br />
    $w[jdl_album]</a><br />($w[jumlah] Foto)<br /></td>";
}
echo "</tr></table>";

  echo "
	</div>
    </div>";            
         
                    include "$f[folder]/sidebar.php";
		
}


// Modul galeri foto berdasarkan album
elseif ($_GET['module']=='detailalbum'){
  echo "<div class='content'>
   <div class='container_all masterbg bgbottom'>
                    <div class='container marketing'>
                        <div class='row'>
                            <!-- 1 Column -->
                            <div class='span7 margintop'>
                                <div class='padding'>
								<h3 class='navbar titlewrap'>
								 <span>Photo Gallery</span>
								 </h3>";
  echo "<span class=judul_head>&#187; <a href=semua-album.html><b>Album</b></a> &#187; <b>Galeri Foto</b></span><br />"; 
  $p      = new Paging6;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

  // Tentukan kolom
  $col = 3;

  $g = mysql_query("SELECT * FROM gallery WHERE id_album='$_GET[id]' ORDER BY id_gallery DESC LIMIT $posisi,$batas");
  $ada = mysql_num_rows($g);
  
  if ($ada > 0) {
  echo "<table><tr>";
  $cnt = 0;
  while ($w = mysql_fetch_array($g)) {
    if ($cnt >= $col) {
      echo "</tr><tr>";
      $cnt = 0;
    }
    $cnt++;

   echo "<td align=center valign=top><br />
   <div class='shadow padding'>
         <a href='img_galeri/$w[gbr_gallery]' title='$w[keterangan]' class='lightbox' rel='group1'>
         <img src='img_galeri/$w[gbr_gallery]' alt='$w[keterangan]' width='180' height='130' /></a><br />
         <b>$w[jdl_gallery]</b></a>
		 </div>
		 </td>";
  }
  echo "</tr></table><br />";

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM gallery WHERE id_album='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halgaleri], $jmlhalaman);

  echo "<div class='pages'>$linkHalaman </div><br /><br />";
  }
  else{
    echo "<p>Belum ada foto.</p>";
  }
  echo "</div>
    </div>";            
	
                    include "$f[folder]/sidebar.php";
		
}


// Modul hubungi kami
elseif ($_GET['module']=='hubungikami'){
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
								 </h3>
								 
								 <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msid=207657957287359859850.0004edb2ba31bd712b010&amp;msa=0&amp;ie=UTF8&amp;ll=-7.281047,112.809296&amp;spn=0.001447,0.002642&amp;t=m&amp;iwloc=0004edb2bda21df43e633&amp;output=embed"></iframe><br /><small>View <a href="https://maps.google.com/maps/ms?msid=207657957287359859850.0004edb2ba31bd712b010&amp;msa=0&amp;ie=UTF8&amp;ll=-7.281047,112.809296&amp;spn=0.001447,0.002642&amp;t=m&amp;iwloc=0004edb2bda21df43e633&amp;source=embed" style="color:#0000FF;text-align:left">Sayang School, Laguna Blok L-4, East Java, Indonesia</a> in a larger map</small><br><br>
                                <?php
  
  echo "<b>Contact Us in here : </b><br><br>
        <table width=100%>
        <form action=contact-action.html method=POST>
        <tr><td>Nama</td><td> : <input type=text name=nama size=40></td></tr>
        <tr><td>Email</td><td> : <input type=text name=email size=40></td></tr>
        <tr><td>Subjek</td><td> : <input type=text name=subjek size=40></td></tr>
        <tr><td valign=top>Pesan</td><td>  <textarea name=pesan  style='width: 280px; height: 100px;'></textarea></td></tr>
        <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 maxlength=6><br /></td></tr>
        </td><td colspan=2><input type=submit name=submit value=Kirim></td></tr>
        </form></table><br />";
	?>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
              <!-- sidebar -->
                    <?php include "$f[folder]/sidebar.php"; ?>
			  <!-- end sidebar -->

                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>

<?php
}


// Modul hubungi aksi
elseif ($_GET['module']=='hubungiaksi'){
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
								 </h3>                                         <!-- article-content -->
                                              
                                <?php
$nama=trim($_POST[nama]);
$email=trim($_POST[email]);
$subjek=trim($_POST[subjek]);
$pesan=trim($_POST[pesan]);

if (empty($nama)){
  echo "Anda belum mengisikan NAMA<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($email)){
  echo "Anda belum mengisikan EMAIL<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($subjek)){
  echo "Anda belum mengisikan SUBJEK<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($pesan)){
  echo "Anda belum mengisikan PESAN<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){

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
  echo "<span class=posting>&#187; <b>Contact Us</b></span><br /><br />"; 
  echo "<p align=center><b>Thank You for your message. <br /> We will respon this message.</b></p>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}
    
	?>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    <!-- slider -->
            <?php include "$f[folder]/sidebar.php"; ?>
            <!-- end slider -->
            
                                    
                                </div>
                            </div>

<?php
} else {

?>      
<div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">&nbsp;
                                                  
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
Halaman tidak di temukan                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
                            
                            <?php } ?>