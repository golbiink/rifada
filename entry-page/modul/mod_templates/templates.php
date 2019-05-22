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
$aksi="modul/mod_templates/aksi_templates.php";
switch($_GET[act]){
  // Tampil Templates
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=templates&act=tambahtemplates';\">
		  <span>Add Templates</span></button>
		<div class='box'>
	  <div class='title'>
						Templates
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Templates Name</th><th>Owner</th><th>Folder</th><th>Active</th><th>Action</th></tr></thead>
								<tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM templates ORDER BY id_templates DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$r[pembuat]</td>
                <td>$r[folder]</td>
                <td width=5 align=center>$r[aktif]</td>
                <td>
				<a href=$aksi?module=templates&act=aktifkan&id=$r[id_templates]><img src='gfx/icons/small/check.png' title='Activated' alt='edit'></a>
				<a href=?module=templates&act=edittemplates&id=$r[id_templates]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>
				<a href=javascript:confirmdelete('$aksi?module=templates&act=hapus&id=$r[id_templates]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>	                  
		        </tr>";
      $no++;
    }
   echo "</tbody>
	  </table>
					</div>
				</div>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM templates"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    break;
  
  
  // Form Tambah Templates
  case "tambahtemplates":
    echo "<div class='box'>
					<div class='title'>
						Add Templates
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=templates&act=input'>
					  <div class='row'>
					  <label>Templates Name</label>
					  <div class='right'><input type=text name='judul'></div>
					  </div>
					  <div class='row'>
					  <label>Developer</label>
					  <div class='right'><input type=text name='pembuat'></div>
					  </div>
					  <div class='row'>
					  <label>Folder File</label>
					  <div class='right'><input type=text name='folder' value='templates/'></div>
					  </div>
					  <div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
  
  // Form Edit Templates 
  case "edittemplates":
    $edit=mysql_query("SELECT * FROM templates WHERE id_templates='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Templates
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=templates&act=update>
          <input type=hidden name=id value='$r[id_templates]'>
          <div class='row'>
					  <label>Templates Name</label>
					  <div class='right'><input type=text name='judul' value='$r[judul]'></div>
					  </div>
					  <div class='row'>
					  <label>Developer</label>
					  <div class='right'><input type=text name='pembuat' value='$r[pembuat]'></div>
					  </div>
					  <div class='row'>
					  <label>Folder File</label>
					  <div class='right'><input type=text name='folder' value='$r[folder]'></div>
					  </div><div class='right'>
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
