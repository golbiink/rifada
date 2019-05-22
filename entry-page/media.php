<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>
	
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8' /> 
	
	<title> Asimetris : Halaman Administator </title>
	
<style type='text/css'>
		@import url('css/style.css');
		@import url('css/forms.css');
		@import url('css/forms-btn.css');
		@import url('css/menu.css');
		@import url('css/style_text.css');
		@import url('css/datatables.css');
		@import url('css/fullcalendar.css');
		@import url('css/pirebox.css');
		@import url('css/modalwindow.css');
		@import url('css/statics.css');
		@import url('css/tabs-toggle.css');
		@import url('css/system-message.css');
		@import url('css/tooltip.css');
		@import url('css/wizard.css');
		@import url('css/wysiwyg.css');
		@import url('css/wysiwyg.modal.css');
		@import url('css/wysiwyg-editor.css');
</style>
	
	<!--[if lte IE 8]>
		<script type='text/javascript' src='js/excanvas.min.js'></script>
	<![endif]-->
	<script type="text/javascript" src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" ></script>
    <script type="text/javascript" src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js" ></script>	
	<script type='text/javascript' src='js/jquery-1.7.1.min.js'></script>
	<script type='text/javascript' src='js/jquery.backgroundPosition.js'></script>
	<script type='text/javascript' src='js/jquery.placeholder.min.js'></script>
	<script type='text/javascript' src='js/jquery.ui.1.8.17.js'></script>
	<script type='text/javascript' src='js/jquery.ui.select.js'></script>
	<script type='text/javascript' src='js/jquery.ui.spinner.js'></script>
	<script type='text/javascript' src='js/superfish.js'></script>
	<script type='text/javascript' src='js/supersubs.js'></script>
	<script type='text/javascript' src='js/jquery.datatables.js'></script>
	<script type='text/javascript' src='js/fullcalendar.min.js'></script>
	<script type='text/javascript' src='js/jquery.smartwizard-2.0.min.js'></script>
	<script type='text/javascript' src='js/pirobox.extended.min.js'></script>
	<script type='text/javascript' src='js/jquery.tipsy.js'></script>
	<script type='text/javascript' src='js/jquery.elastic.source.js'></script>
	<script type='text/javascript' src='js/jquery.customInput.js'></script>
	<script type='text/javascript' src='js/jquery.validate.min.js'></script>
	<script type='text/javascript' src='js/jquery.metadata.js'></script>
	<script type='text/javascript' src='js/jquery.filestyle.mini.js'></script>
	<script type='text/javascript' src='js/jquery.filter.input.js'></script>
	<script type='text/javascript' src='js/jquery.flot.js'></script>
	<script type='text/javascript' src='js/jquery.flot.pie.min.js'></script>
	<script type='text/javascript' src='js/jquery.flot.resize.min.js'></script>
	<script type='text/javascript' src='js/jquery.graphtable-0.2.js'></script>
	<script type='text/javascript' src='js/jquery.wysiwyg.js'></script>
	<script type='text/javascript' src='js/controls/wysiwyg.image.js'></script>
	<script type='text/javascript' src='js/controls/wysiwyg.link.js'></script>
	<script type='text/javascript' src='js/controls/wysiwyg.table.js'></script>
	<script type='text/javascript' src='js/plugins/wysiwyg.rmFormat.js'></script>
	<script type='text/javascript' src='js/costum.js'></script>
	
</head>

<body>

<div id='wrapper'>
	<div id='container'>
	
		<div class='hide-btn top'></div>
		<div class='hide-btn center'></div>
		<div class='hide-btn bottom'></div>
		
		<div id='top'>
			<h1 id='logo'><a href='?module=home'></a></h1>
			<div id='labels'>
				<ul>
					<li><a href='?module=user' class='user'><span class='bar'><?php include "nama.php"; ?></span></a></li>
					<li><a href='?module=identitas' class='settings'></a></li>
					<li><a href='?module=hubungi' class='messages'></a></li>
					<li><a href='logout.php' class='logout'></a></li>
				</ul>
			</div>
			<div id='menu'>
				<ul> 
					<li class='current'><a href='?module=home'>Dashboard</a></li> 
					<li>
						<a href='#'>Posts</a>
						<ul> 
							<?php include "menu2.php"; ?>
						</ul>
					</li>
					<li>
						<a href='#'>Portofolio</a>
						<ul> 
							<?php include "menu3.php"; ?>
						</ul>
					</li>
					<li>
						<a href='#'>Statics Pages</a>
						<ul> 
							<?php include "menu4.php"; ?>
						</ul>
					</li>
					<li>
						<a href='#'>Events</a>
						<ul> 
							<?php include "menu5.php"; ?>
						</ul>
					</li>
					<li>
						<a href='#'>Setting Website</a>
						<ul> 
							<?php include "menu6.php"; ?>
						</ul>
					</li>
					<li>
						<a href='logout.php'>Logout</a>
						</li>
					</ul>
			</div>
		</div>
		
		<div id='left'>
<!-- menu tonggle -->
			<div class='box togglemenu'>
				<div class='content'>
					<ul>
						<li class='title'><h2>Dashboard</h2></li>
						<li class='content'>
							<ul>
							<?php include "menu1.php"; ?>
							</ul>
						</li>
						<li class='title'><h2>Posts</h2></li>
						<li class='content'>
							<ul>
							<?php include "menu2.php"; ?>
							</ul>
						</li>
						<li class='title'><h2>Portoflio</h2></li>
						<li class='content'>
							<ul>
							<?php include "menu3.php"; ?>
							</ul>
						</li>
						<li class='title'><h2>Pages</h2></li>
						<li class='content'>
							<ul>
							<?php include "menu4.php"; ?>
							</ul>
						</li>
						<li class='title'><h2>Events</h2></li>
						<li class='content'>
							<ul>
							<?php include "menu5.php"; ?>
							</ul>
						</li>
						<li class='title'><h2>Setting Website</h2></li>
						<li class='content'>
							<ul>
							<?php include "menu6.php"; ?>
							</ul>
						</li>
						
					</ul>
				</div>
			</div>
<!-- menu tonggle end-->	

<div class='box statics'>
				<div class='content'>
					<ul>
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

              echo "<li><h2>Statistics</h2></li>
						<li>Pengunjung Hari Ini <div class='info red'><span>$pengunjung</span></div></li>
						<li>Total Pengunjung <div class='info blue'><span>$totalpengunjung</span></div></li>
						<li>Hits <div class='info green'><span>$hits[hitstoday]</span></div></li>
						<li>Pengunjung Online <div class='info black'><span>$pengunjungonline</span></div></li>";
            ?>
          
                                            <!-- /block-content -->
			
						
					</ul>
				</div>
			</div>
			
			
		</div>
		
		<div id='right'>
			<div class='section'>
				<?php include "content.php"; ?>
				</div>
		</div>
		
	</div>
</div>

</body>

</html> 

<?php
}
}
?>