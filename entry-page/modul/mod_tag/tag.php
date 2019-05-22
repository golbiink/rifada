
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
$aksi="modul/mod_tag/aksi_tag.php";
switch($_GET[act]){
  // Tampil Tag
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=tag&act=tambahtag';\">
		<span>Add Tag</span></button>
		<div class='box'>
	  <div class='title'>
						Tag
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Tag Name</th><th>Action</th></tr></thead>
								<tbody>"; 
    $tampil=mysql_query("SELECT * FROM tag ORDER BY id_tag DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_tag]</td>
             <td><a href=?module=tag&act=edittag&id=$r[id_tag]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>  
	               <a href=javascript:confirmdelete('$aksi?module=tag&act=hapus&id=$r[id_tag]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a></td></tr>
		</td></tr>";
      $no++;
    }
     echo "</tbody>
	  </table>
					</div>
				</div>";
    break;
  
  // Form Tambah Tag
  case "tambahtag":
    echo "<div class='box'>
					<div class='title'>
						Add Tag
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=tag&act=input'>
							<div class='row'>
								<label>Tag Name</label>
								<div class='right'><input type=text name='nama_tag'></div>
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
  
  // Form Edit Kategori  
  case "edittag":
    $edit=mysql_query("SELECT * FROM tag WHERE id_tag='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Tag
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=tag&act=update>
          <input type=hidden name=id value='$r[id_tag]'>
          <div class='row'>
								<label>Tag Name</label>
								<div class='right'><input type=text name='nama_tag' size=60 value='$r[nama_tag]'></div>
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
