<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin'){
  echo "<br /><h2>Welcome</h2>
          <p>Hello <b>$_SESSION[namalengkap]</b>, Selamat datang di halaman administrator asimetris.<br> 
          Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website atau pilih ikon-ikon pada Control Panel. </p>
  
  <div class='btn-box'>
				<div class='content'>
					<a href='?module=home' class='item'>
						<img src='gfx/icons/big/dashboard.png' alt='Dashboard' />
						<span>Dashboard</span>
						Back to Dashboard
					</a>
					
					<a href='?module=hubungi' class='item'>
						<img src='gfx/icons/big/messages.png' alt='Hubungi Kami' />
						<span>Contact Us</span>
						Go to Inbox Message
					</a>
					
					<a href='?module=user' class='item'>
						<img src='gfx/icons/big/users.png' alt='Settings User' />
						<span>User Settings</span>
						Setting
					</a>
					
										
					<a href='?module=agenda' class='item'>
						<img src='gfx/icons/big/calendar.png' alt='Agenda' />
						<span>Event</span>
						Add Event
					</a>
					
					
					
					<a href='?module=galerifoto' class='item'>
						<img src='gfx/icons/big/photo.png' alt='Galeri Foto' />
						<span>Portofolio</span>
						Portofolio Upload
					</a>
					
								
					<a href='?module=berita' class='item'>
						<img src='gfx/icons/big/display.png' alt='Berita' />
						<span>News</span>
						News
					</a>
									</div>
			</div>
         <p align=left>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p> ";
  }
  elseif ($_SESSION['leveluser']=='user'){
  echo "<br /><h2>Selamat Datang</h2>
          <p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Administrator CMS Lokomedia.<br> 
        Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website. </p>

          <p align=left>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
 	}
}

// Bagian User
elseif ($_GET['module']=='profil'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profil/profil.php";
  }
}

// Bagian User
elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_users/users.php";
  }
}

// Bagian Modul
elseif ($_GET['module']=='modul'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_modul/modul.php";
  }
}

// Bagian Kategori
elseif ($_GET['module']=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Berita
elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_berita/berita.php";                            
  }
}

// Bagian Komentar Berita
elseif ($_GET['module']=='komentar'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_komentar/komentar.php";
  }
}

// Bagian Tag
elseif ($_GET['module']=='tag'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tag/tag.php";
  }
}

// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_agenda/agenda.php";
  }
}

// Bagian Banner
elseif ($_GET['module']=='banner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_banner/banner.php";
  }
}

// Bagian Poling
elseif ($_GET['module']=='poling'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_poling/poling.php";
  }
}

// Bagian Download
elseif ($_GET['module']=='download'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_download/download.php";
  }
}

// Bagian Hubungi Kami
elseif ($_GET['module']=='hubungi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Templates
elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_templates/templates.php";
  }
}

// Bagian Shoutbox
elseif ($_GET['module']=='shoutbox'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_shoutbox/shoutbox.php";
  }
}

// Bagian Album
elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri Foto
elseif ($_GET['module']=='galerifoto'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_galerifoto/galerifoto.php";
  }
}

// Bagian Kata Jelek
elseif ($_GET['module']=='katajelek'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_katajelek/katajelek.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Menu
elseif ($_GET['module']=='menu'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_menu/menu.php";
  }
}

// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Identitas
elseif ($_GET['module']=='identitas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_identitas/identitas.php";
  }
}

// Bagian Jabatan
elseif ($_GET['module']=='jabatan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_jabatan/jabatan.php";
  }
}

// Bagian Staff
elseif ($_GET['module']=='staff'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_staff/staff.php";
  }
}

// Bagian Update
elseif ($_GET['module']=='update'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_update/update.php";
  }
}

// Bagian Portofolio
elseif ($_GET['module']=='portofolio'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_portofolio/portofolio.php";
  }
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
