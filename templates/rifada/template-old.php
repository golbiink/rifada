<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sayang School : Playgroup - Kindergarten - Elementary</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php include "dinatitel.php"; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php include "dinatittle1.php"; ?>">
    <meta name="keywords" content="<?php include "dinatittle2.php"; ?>">
    <meta http-equiv="Copyright" content="Sayang School">
    <meta name="author" content="Sayang School">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="7">
    <meta name="webcrawlers" content="all">
    <meta name="rating" content="general">
    <meta name="spiders" content="all">
    <!-- Le styles -->
    <link href="<?php echo "$f[folder]/assets/css/bootstrap.css" ?>" rel="stylesheet">
    <link href="<?php echo "$f[folder]/assets/css/socialmediabutton.css" ?>" rel="stylesheet">
    <link href="<?php echo "$f[folder]/assets/css/gallery.css" ?>" rel="stylesheet">
    <link href="<?php echo "$f[folder]/assets/css/type.css" ?>" rel="stylesheet">
    <link href="<?php echo "$f[folder]/assets/css/stack.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/assets/css/style.css" ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo "$f[folder]/assets/css/docs.css" ?>" rel="stylesheet">
    <link href="<?php echo "$f[folder]/assets/css/paging.css" ?>" rel="stylesheet">
	<link href="<?php echo "$f[folder]/assets/js/google-code-prettify/prettify.css" ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo "$f[folder]/assets/css/add.css" ?>" type="text/css" media="screen" />    
    <link href="<?php echo "$f[folder]/assets/css/bootstrap-responsive.css" ?>" rel="stylesheet">
	<link href="<?php echo "$f[folder]/assets/css/js-image-slider.css" ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo "$f[folder]/assets/js/js-image-slider.js" ?>" type="text/javascript"></script>
    <link href="<?php echo "$f[folder]/generic.css" ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo "$f[folder]/assets/css/forms.css" ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo "$f[folder]/assets/css/fonts/stylesheet.css" ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo "$f[folder]/assets/js/lightbox/themes/default/jquery.lightbox.css" ?>" type="text/css" />
    <script src="<?php echo "$f[folder]/assets/js/jquery.js" ?>"></script>
    <script src="<?php echo "$f[folder]/assets/js/jquery-1.4.min.js" ?>"></script>
		<script src="<?php echo "$f[folder]/assets/js/jquery.tipsy.js" ?>" type="text/javascript"></script>
	<script type='text/javascript'>
  $(function($) {        
	   $('.tips a').tipsy({fade: true, gravity: 'w'});
	   $('.tipsatas a').tipsy({fade: true, gravity: 's'});	
  });
</script>
<script src="<?php echo "$f[folder]/assets/js/lightbox/jquery.lightbox.min.js" ?>" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.lightbox').lightbox();		    
		});
  </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
<?php
$main=mysql_query("SELECT * FROM identitas ");
while($fav=mysql_fetch_array($main))
$favico  =$fav['favicon'];
?>
    <link rel="shortcut icon" href="<?php echo $favico ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo "$f[folder]/assets/ico/apple-touch-icon-144-precomposed.png" ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo "$f[folder]/assets/ico/apple-touch-icon-114-precomposed.png" ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo "$f[folder]/assets/ico/apple-touch-icon-72-precomposed.png" ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo "$f[folder]/assets/ico/apple-touch-icon-57-precomposed.png" ?>">
    
    <!-- googe webfonts -->
    <link href='http://fonts.googleapis.com/css?family=McLaren' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Vampiro+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>



<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5060983-15']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body data-spy="scroll" data-target=".subnav" data-offset="50" > 
<div id="far-clouds" class="far-clouds stage"></div>
 <div id="near-clouds" class="near-clouds stage"></div>
 <!-- logo and search start here -->
 <div class="container margintop"> <div class="row">
    <div class="span8 margintop"> 
        <h1 class="toplogo"><span><a href="home"><img src="<?php echo "$f[folder]/assets/images/logo.png" ?>"></a></span></h1>
        </div> 
<p class="right"></p> 

<!-- <form method="POST" id="searchform" action="hasil-pencarian.html"> <!-- form pencarian -->
					<!-- <div>
					   <input class="margintop" type="text" name="kata" value="Search here..." onblur="if(this.value=='') this.value='Search...';" onfocus="if(this.value=='Search...') this.value='';" />
<button class="btn white margintop" type="button">Search</button>
					</div>
				</form> -->      


                </div>
                </div>
            </div>
            <!-- logo and search end here --><!-- menu start here -->
<div class="menu">
<?php include "menu.php"; ?>
</div>
<div class="clear"></div>
<?php include "$f[folder]/kiri.php"; ?>

                        <div class="clear"></div>
<!-- Footer Start Here -->
<!-- id footer Start Here -->
	<footer>
		<div class="container footerbg">
			<div class="row footer">
				<div class="footer">
					<p class="margintop" align="center">Copyright &copy; 2014 by Sayang School. All Rights Reserved.<br />
					<a href="http://agungprasetyo.net">Website Designed and Developed by Agung &amp; Iwan</a></p>
				</div>
			</div> 
		</div> 
	</footer>
<!-- Footer End Here -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo "$f[folder]/assets/js/javascripts/scrolltopcontrol.js" ?>"></script>
    <script src="<?php echo "$f[folder]/assets/js/bootstrap.min.js" ?>"></script>    
    <script src="<?php echo "$f[folder]/assets/js/bootstrap-alert.js" ?>"></script>
    <script src="<?php echo "$f[folder]/assets/js/bootstrap-tab.js" ?>"></script>    
    <script src="<?php echo "$f[folder]/assets/js/bootstrap-transition.js" ?>"></script>
    <script src="<?php echo "$f[folder]/assets/js/bootstrap-button.js" ?>"></script>
    <script src="<?php echo "$f[folder]/assets/js/bootstrap-carousel.js" ?>"></script>
	

<script type="text/javascript">
$('.carousel').carousel({
  interval: 6000
})

$(".alert").alert()
</script>    
    
    <script src="<?php echo "$f[folder]/assets/js/bootstrap-collapse.js" ?>"></script>    
    <script src="<?php echo "$f[folder]/assets/js/bootstrap-typeahead.js" ?>"></script>
    <script src="<?php echo "$f[folder]/assets/js/application.js" ?>"></script>


    <script src="<?php echo "$f[folder]/assets/js/javascripts/jquery.spritely-0.6.js" ?>" type="text/javascript"></script>

    <script type="text/javascript">
            $(document).ready(function() {
                $('#far-clouds').pan({fps: 30, speed: 0.7, dir: 'left', depth: 30});
                $('#near-clouds').pan({fps: 30, speed: 1, dir: 'left', depth: 70});
                
                window.actions = {
                    speedyClouds: function(){
                        $('#far-clouds').spSpeed(12);
                        $('#near-clouds').spSpeed(20);
                    },
                    runningClouds: function(){
                        $('#far-clouds').spSpeed(8);
                        $('#near-clouds').spSpeed(12);
                    },
                    walkingClouds: function(){
                        $('#far-clouds').spSpeed(3);
                        $('#near-clouds').spSpeed(5);
                    },
                    lazyClouds: function(){
                        $('#far-clouds').spSpeed(0.7);
                        $('#near-clouds').spSpeed(1);
                    },
                    stop: function(){
                        $('#far-clouds, #near-clouds').spStop();
                    },
                    start: function(){
                        $('#far-clouds, #near-clouds').spStart();
                    },
                    toggle: function(){
                        $('#far-clouds, #near-clouds').spToggle();
                    },
                    left: function(){
                        $('#far-clouds, #near-clouds').spChangeDir('left');                    
                    },
                    right: function(){
                        $('#far-clouds, #near-clouds').spChangeDir('right');                    
                    }
                };
            });    
    </script>
   
</body>
</html>     