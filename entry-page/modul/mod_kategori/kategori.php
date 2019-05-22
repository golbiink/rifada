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
$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
  // Tampil Kategori
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=kategori&act=tambahkategori';\">
		<span>Add Categories</span></button>
		<div class='box'>
	  <div class='title'>
						Categories
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Categories Name</th><th>Status</th><th>Action</th></tr>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_kategori]</td>
             <td align=center>$r[aktif]</td>
             <td><a href=?module=kategori&act=editkategori&id=$r[id_kategori]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>
			 <a href=javascript:confirmdelete('$aksi?module=kategori&act=hapus&id=$r[id_kategori]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody>
	  </table>
					</div>
				</div>";
    break;
  
  // Form Tambah Kategori
  case "tambahkategori":
    echo "<div class='box'>
					<div class='title'>
						Add Categories
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=kategori&act=input'>
		  <div class='row'>
								<label>Categories Name</label>
								<div class='right'><input type=text name='nama_kategori'></div>
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
  case "editkategori":
    $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Categories Edit
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=kategori&act=update>
          <input type=hidden name=id value='$r[id_kategori]'>
          <div class='row'>
								<label>Categories Name</label>
								<div class='right'><input type=text name='nama_kategori' value='$r[nama_kategori]'></div>
							</div><div class='row'>
								<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>";
if ($r[aktif]=='Y'){
      echo "<div class='row'>
								<label>Aktif</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-1' value='Y' checked='checked'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='aktif' id='radio-2' value='N'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
    }
    else{
      echo "<div class='row'>
								<label>Aktif</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-1' value='Y'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='aktif' id='radio-2' value='N' checked='checked'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
							echo"
							</div>
						</form>
					</div>
				</div>";
    break;  
}
}
}
?>
