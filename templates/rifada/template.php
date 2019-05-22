<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php include "dinatitel.php"; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php include "dinatittle1.php"; ?>">
    <meta name="keywords" content="<?php include "dinatittle2.php"; ?>">
    <meta http-equiv="Copyright" content="Asimetris">
    <meta name="author" content="Asimetris">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="7">
    <meta name="webcrawlers" content="all">
    <meta name="rating" content="general">
    <meta name="spiders" content="all">
    <!-- css -->
    <!-- Theme skin -->
    <?php
    $main = mysql_query("SELECT * FROM identitas ");
    while ($icon = mysql_fetch_array($main)) {
        ?>
        <link rel="shortcut icon" type='image/x-icon' href="<?php echo "$icon[favicon]" ?>" />
    <?php
}
?>
    <link href="<?php echo "$f[folder]/skins/default.css" ?>" rel="stylesheet" />

    <link href="<?php echo "$f[folder]/css/bootstrap.min.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/css/fancybox/jquery.fancybox.css" ?>" rel="stylesheet">
    <link href="<?php echo "$f[folder]/css/jcarousel.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/css/flexslider.css" ?>" rel="stylesheet" />
    <link href="<?php echo "$f[folder]/css/style.css" ?>" rel="stylesheet" />




    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
        <!-- start header -->
        <header>
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="home"><img src="<?php echo "$f[folder]/img/tukang-taman-jakarta.png" ?>" width="70" height="60"> Rifada Alam Jakarta</a>
                    </div>
                    <div class="navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li><a href='home'>Home</a>
                                <?php
                                $main = mysql_query("SELECT * FROM menu WHERE id_parent='0' AND aktif='Y' AND link='#' order by id_menu");
                                while ($r = mysql_fetch_array($main)) {

                                    echo "<li class='dropdown' ><a href='$r[link]' class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' data-delay='0' data-close-others='false'>$r[nama_menu]</a>";
                                    $sub = mysql_query("SELECT * FROM menu WHERE id_parent='$r[id_menu]' AND aktif='Y' order by id_menu");
                                    $jml = mysql_num_rows($sub);
                                    // apabila sub menu ditemukan
                                    if ($jml > 0) {
                                        echo "<ul class='dropdown-menu' >";
                                        while ($w = mysql_fetch_array($sub)) {
                                            $sub2 = mysql_query("SELECT * FROM menu WHERE id_parent='$w[id_menu]' AND aktif='Y'");
                                            $jml2 = mysql_num_rows($sub2);
                                            if ($jml2 > 0) {
                                                echo "<li><a href='$w[link]'><span>$w[nama_menu]</span></a>";
                                                echo "<ul>";
                                                while ($x = mysql_fetch_array($sub2)) {
                                                    echo "<li><a href='$x[link]'><span>$x[nama_menu]</span></a></li>";
                                                }
                                                echo "</ul></li>";
                                            } else {
                                                echo "<li><a href='$w[link]'><span>$w[nama_menu]</span></a>";
                                            }
                                        }
                                        echo "</li></ul>
                       </li>";
                                    } else {
                                        echo "</li>";
                                        echo " <li><a href='page-20-relasi-asimetris.html' >Relasi</a>
                    <li><a href='photo-gallery.html' >Portofolio</a>
                    <li><a href='all-news.html' >News</a>
                    <li><a href='all-events.html' >Events</a>
                    <li><a href='contact-us.html' >Contact</a>";
                                    }
                                }
                                ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        <?php include "$f[folder]/kiri.php"; ?>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="widget">
                            <h5 class="widgetheading">Kontak Kami</h5>
                            <?php
                            $main = mysql_query("SELECT * FROM identitas ");
                            while ($t = mysql_fetch_array($main)) {
                                ?>
                                <address>
                                    <strong>Rifada Alam Jakarta</strong><br>
                                    Alamat : <?php echo "$t[alamat]" ?><br /></address>
                                <p>
                                    Telp : <?php echo "$t[no_telp]" ?> <br>
                                    Email : <?php echo "$t[email]" ?><br>
                                    Whatsapp : <?php echo "$t[whatsapp]" ?><br>
                                </p>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget">
                            <h5 class="widgetheading">Events</h5>
                            <ul class="link-list">
                                <?php
                                $agenda = mysql_query("SELECT * FROM agenda order by id_agenda DESC limit 5 ");
                                while ($a = mysql_fetch_array($agenda)) {
                                    ?>
                                    <li><a href='<?php echo "event-$a[id_agenda]" ?>-<?php echo "$a[tema_seo]" ?>.html'><?php echo "$a[tema]" ?></a></li>
                                <?php
                            }
                            ?>
                            </ul>
                        </div>


                    </div>
                    <div class="col-lg-3">
                        <div class="widget">
                            <h5 class="widgetheading">Latest posts</h5>
                            <ul class="link-list">
                                <?php
                                $berita = mysql_query("SELECT * FROM berita order by id_berita DESC limit 5 ");
                                while ($b = mysql_fetch_array($berita)) {
                                    ?>
                                    <li><a href='<?php echo "news-$b[id_berita]" ?>-<?php echo "$b[judul_seo]" ?>.html'><?php echo "$b[judul]" ?></a></li>
                                <?php
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget">
                            <h5 class="widgetheading">Informasi Pembayaran </h5>
                            <div>
                                <img src="<?php echo "$f[folder]/img/Logo_Bank_Jatim.jpg" ?>"><br />
                                BANK JATIM a/n cv asimetris 1731000791<br />
                                <img src="<?php echo "$f[folder]/img/bank-btn.gif" ?>"><br />
                                BANK BTN a/n cv asimetris 0000201501416619<br />

                            </div>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="copyright">
                                <p>
                                    <span>&copy; Rifada 2019 All right reserved. By </span><a href="https://ww.produksiweb.com" target="_blank">Produksiweb</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="social-network">
                                <?php
                                $main = mysql_query("SELECT * FROM identitas ");
                                while ($social = mysql_fetch_array($main)) {
                                    ?>
                                    <li><a href="<?php echo "$social[facebook]" ?>" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/<?php echo "$social[twitter]" ?>" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <li><a href="https://www.instagram.com/asimetrissby/" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo "$f[folder]/js/jquery.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/jquery.easing.1.3.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/bootstrap.min.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/jquery.fancybox.pack.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/jquery.fancybox-media.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/google-code-prettify/prettify.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/portfolio/jquery.quicksand.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/portfolio/setting.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/jquery.flexslider.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/animate.js" ?>"></script>
    <script src="<?php echo "$f[folder]/js/custom.js" ?>"></script>
    <script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=91196077"></script>

</body>

</html>