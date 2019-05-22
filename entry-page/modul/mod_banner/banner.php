<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus file ini?")) {
      document.location = delUrl;
   }
}
</script>

<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_banner/aksi_banner.php";
switch($_GET[act]){
  // Tampil Banner
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=banner&act=tambahbanner';\">
		  <span>Add Banner</span></button>
		<div class='box'>
	  <div class='title'>
						Banner
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Tittle</th><th>Url</th><th>Posted Date</th><th>Action</th></tr></thead>
								<tbody>";
    $tampil=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td><a href=$r[url] target=_blank>$r[url]</a></td>
                <td>$tgl</td>
                <td><a href=?module=banner&act=editbanner&id=$r[id_banner]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a> 
	                 <a href=javascript:confirmdelete('$aksi?module=banner&act=hapus&id=$r[id_banner]&namafile=$r[gambar]') 
   title='Hapus' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
		        </tr>";
    $no++;
    }
echo "</tbody>
	  </table>
					</div>
				</div>";
    break;
  
  case "tambahbanner":
    echo "<div class='box'>
					<div class='title'>
						Add Banner
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=banner&act=input' enctype='multipart/form-data'>
							<div class='row'>
								<label>Tittle</label>
								<div class='right'><input type=text name='judul'></div>
							</div>
							<div class='row'>
								<label>Url</label>
								<div class='right'><input type=text name='url' value='http://'></div>
							</div>
							<div class='row'>
								<label>Images</label>
								<div class='right'><input type=file name='fupload'></div>
							</div>
							<div class='row'>
								<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
    
  case "editbanner":
    $edit = mysql_query("SELECT * FROM banner WHERE id_banner='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Banner
						<span class='hide'></span>
					</div>
					<div class='content'>
					<form method=POST enctype='multipart/form-data' action=$aksi?module=banner&act=update>
					<input type=hidden name=id value=$r[id_banner]>
         					<div class='row'>
								<label>Tittle</label>
								<div class='right'><input type=text name='judul' value='$r[judul]'></div>
							</div>
							<div class='row'>
								<label>Url</label>
								<div class='right'><input type=text name='url' value='$r[url]'></div>
							</div>
							<div class='row'>
								<label></label>
								<div class='right'><img src='../foto_banner/$r[gambar]' width='160' height='100'></div>
							</div>
							<div class='row'>
								<label>Images</label>
								<div class='right'><input type=file name='fupload'></div>
							</div>
							<div class='row'>
								<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
    break;  
}
}
?>
