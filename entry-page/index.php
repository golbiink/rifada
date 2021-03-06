<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<title>Asimetris : Halaman Administator</title>
	<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>
<style type="text/css">
		@import url("css/style.css");
		@import url("css/forms.css");
		@import url("css/forms-btn.css");
		@import url("css/menu.css");
		@import url('css/style_text.css');
		@import url("css/datatables.css");
		@import url("css/fullcalendar.css");
		@import url("css/pirebox.css");
		@import url("css/modalwindow.css");
		@import url("css/statics.css");
		@import url("css/tabs-toggle.css");
		@import url("css/system-message.css");
		@import url("css/tooltip.css");
		@import url("css/wizard.css");
		@import url("css/wysiwyg.css");
		@import url("css/wysiwyg.modal.css");
		@import url("css/wysiwyg-editor.css");
</style>
	
	<!--[if lte IE 8]>
		<script type="text/javascript" src="js/excanvas.min.js"></script>
	<![endif]-->
	
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

<div id="wrapper" class="login">
	<div class="logo">
		<img src="<?php echo "gfx/logoo.png" ?>">
	</div>
	<div class="box">
		<div class="title">
			Please login
			<span class="hide"></span>
		</div>
		<div class="content">
			<div class="message inner blue">
				<span><b>Information</b>: Click the submit button to proceed.</span>
			</div>
			<form name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)">
				<div class="row">
					<label>Username</label>
					<div class="right"><input type="text" name="username"></div>
				</div>
				<div class="row">
					<label>Password</label>
					<div class="right"><input type="password" name="password"></div>
				</div>
				<div class="row">
					<div class="right">
						<button type="submit"  value="Login"><span>Submit</span></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
</div>

</body>

</html> 