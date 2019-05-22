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
<head>
	
	<meta http-equiv='Content-Type' content='text/html;charset=utf-8' /> 
	<title>Mustache: Dashboard</title>
	
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
	<script language='javascript' type='text/javascript'>
    tinyMCE_GZ.init({
    plugins : 'style,layer,table,save,advhr,advimage, ...',
		themes  : 'simple,advanced',
		languages : 'en',
		disk_cache : true,
		debug : false
});
</script>
<script language='javascript' type='text/javascript'
src='../tinymcpuk/tiny_mce_src.js'></script>
<script type='text/javascript'>
tinyMCE.init({
		mode : 'textareas',
		theme : 'advanced',
		plugins : 'table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu',
		theme_advanced_buttons1_add : 'fontselect,fontsizeselect',
		theme_advanced_buttons2_add : 'separator,preview,zoom,separator,forecolor,backcolor,liststyle',
		theme_advanced_buttons2_add_before: 'cut,copy,paste,separator,search,replace,separator',
		theme_advanced_buttons3_add_before : 'tablecontrols,separator,youtube,separator',
		theme_advanced_buttons3_add : 'emotions,flash',
		theme_advanced_toolbar_location : 'top',
		theme_advanced_toolbar_align : 'left',
		theme_advanced_statusbar_location : 'bottom',
		extended_valid_elements : 'hr[class|width|size|noshade]',
		file_browser_callback : 'fileBrowserCallBack',
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : '_something=My somthing;_something2=My somthing2;_something3=My somthing3;',
		apply_source_formatting : true
});

	function fileBrowserCallBack(field_name, url, type, win) {
		var connector = '../../filemanager/browser.html?Connector=connectors/php/connector.php';
		var enableAutoTypeSelection = true;
		
		var cType;
		tinymcpuk_field = field_name;
		tinymcpuk = win;
		
		switch (type) {
			case 'image':
				cType = 'Image';
				break;
			case 'flash':
				cType = 'Flash';
				break;
			case 'file':
				cType = 'File';
				break;
		}
		
		if (enableAutoTypeSelection && cType) {
			connector += '&Type=' + cType;
		}
		
		window.open(connector, 'tinymcpuk', 'modal,width=600,height=400');
	}
</script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.backgroundPosition.js"></script>
	<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.1.8.17.js"></script>
	<script type="text/javascript" src="js/jquery.ui.select.js"></script>
	<script type="text/javascript" src="js/jquery.ui.spinner.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/supersubs.js"></script>
	<script type="text/javascript" src="js/jquery.datatables.js"></script>
	<script type="text/javascript" src="js/fullcalendar.min.js"></script>
	<script type="text/javascript" src="js/jquery.smartwizard-2.0.min.js"></script>
	<script type="text/javascript" src="js/pirobox.extended.min.js"></script>
	<script type="text/javascript" src="js/jquery.tipsy.js"></script>
	<script type="text/javascript" src="js/jquery.elastic.source.js"></script>
	<script type="text/javascript" src="js/jquery.customInput.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/jquery.metadata.js"></script>
	<script type="text/javascript" src="js/jquery.filestyle.mini.js"></script>
	<script type="text/javascript" src="js/jquery.filter.input.js"></script>
	<script type="text/javascript" src="js/jquery.flot.js"></script>
	<script type="text/javascript" src="js/jquery.flot.pie.min.js"></script>
	<script type="text/javascript" src="js/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="js/jquery.graphtable-0.2.js"></script>
	<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="js/controls/wysiwyg.image.js"></script>
	<script type="text/javascript" src="js/controls/wysiwyg.link.js"></script>
	<script type="text/javascript" src="js/controls/wysiwyg.table.js"></script>
	<script type="text/javascript" src="js/plugins/wysiwyg.rmFormat.js"></script>
	<script type="text/javascript" src="js/costum.js"></script>
	
</head>

<body>

<div id='wrapper'>
	<div id='container'>
	
		<div class='hide-btn top'></div>
		<div class='hide-btn center'></div>
		<div class='hide-btn bottom'></div>
		
		<div id='top'>
			<h1 id='logo'><a href='./'></a></h1>
			<div id='labels'>
				<ul>
					<li><a href='#' class='user'><span class='bar'><b>Welcome Jhon Do</b></span></a></li>
					<li><a href='#' class='settings'></a></li>
					<li class='subnav'>
						<a href='#' class='messages'></a>
						<ul>
							<li><a href='#'>New message</a></li>
							<li><a href='#'>Inbox</a></li>
							<li><a href='#'>Outbox</a></li>
							<li><a href='#'>Trash</a></li>
						</ul>
					</li>
					<li><a href='#' class='logout'></a></li>
				</ul>
			</div>
			<div id='menu'>
				<ul> 
					<li class='current'><a href='?module=home'>Dashboard</a></li> 
					<li>
						<a href='#'>Setting Website</a>
						<ul> 
							<li><a href='?module=modul'>Manajemen Modul</a></li>
							<li><a href='?module=halamanstatis&act=edithalamanstatis&id=1'>Identitas Website</a></li>
							<li><a href='?module=user'>Manajemen User</a></li>
							<li><a href='?module=templates'>Templates</a></li>
						</ul>
					</li>
					<li><a href='?module=menu'>Menu</a> </li> 
					<li><a href='#'>Manajemen Berita</a>
					<ul> 
							<li><a href='?module=kategori'>Kategori Berita</a></li>
							<li><a href='?module=berita'>Berita</a></li>
							<li><a href='?module=komentar'>Komentar</a></li>
							<li><a href='?module=halamanstatis'>Halaman Statis</a></li>
							<li><a href='?module=tag'>Tag/Label</a></li>
							<li><a href='?module=katajelek'>Sensor Kata</a></li>
						</ul>
					</li>
					<li><a href='?module=hubungi'>Hubungi Kami</a></li>
					<li><a href='#'>Interaksi</a>
					<ul> 
							<li><a href='?module=agenda'>Agenda</a></li>
							<li><a href='?module=poling'>Poling</a></li>
							<li><a href='?module=sekilasinfo'>Sekilas Info</a></li>
							<li><a href='?module=shoutbox'>Shout Box</a></li>
						</ul>
					</li>
					<li><a href='#'>Media</a>
					<ul> 
							<li><a href='?module=album'>Album</a></li>
							<li><a href='?module=galerifoto'>Galeri Foto</a></li>
							<li><a href='?module=download'>Download</a></li>
							<li><a href='?module=banner'>Banner</a></li>
						</ul>
					</li>
					<li><a href='logout.php'>Logout</a></li>
				</ul>
			</div>
		</div>
		
		<div id='left'>
			<div class='box search'>
				<div class='content'>
					<form action=''>
						<input type='text' value='' placeholder='Search' />
						<button type='submit'></button>
					</form>
				</div>
			</div>
			
			<div class='box submenu'>
				<div class='content'>
					<ul>
						<li><a href='?module=home'>Home</a></li>
						<?php include "menu.php"; ?>
						<li><a href=logout.php>Logout</a></li>
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