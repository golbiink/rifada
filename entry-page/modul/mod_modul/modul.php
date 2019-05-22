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
$aksi="modul/mod_modul/aksi_modul.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=modul&act=tambahmodul';\">
		<span>Add Module</span></button>
		<div class='box'>
	  <div class='title'>
						Module
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Module Name</th><th>Link</th><th>Publish</th><th>Active</th><th>Status</th><th>Action</th></tr></thead>
								<tbody>";
    $tampil=mysql_query("SELECT * FROM modul ORDER BY urutan");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$r[urutan]</td>
            <td>$r[nama_modul]</td>
            <td><a href=$r[link]>$r[link]</a></td>
            <td align=center>$r[publish]</td>
            <td align=center>$r[aktif]</td>
            <td>$r[status]</td>
            <td><a href=?module=modul&act=editmodul&id=$r[id_modul]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>
	              <a href=javascript:confirmdelete('$aksi?module=modul&act=hapus&id=$r[id_modul]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
            </td></tr>";
    }
    echo "</tbody>
	  </table>
					</div>
				</div>";
    break;

  case "tambahmodul":
    echo "<div class='box'>
					<div class='title'>
						Tambah Modul
						<span class='hide'></span>
					</div>
					<div class='content'>
						<form method=POST action='$aksi?module=modul&act=input'>
							<div class='row'>
								<label>Module Name</label>
								<div class='right'><input type=text name='nama_modul'></div>
							</div>
							<div class='row'>
								<label>Link</label>
								<div class='right'><input type=text name='link'></div>
							</div>
							<div class='row'>
								<label>Publish</label>
								<div class='right'>
									<input type='radio' name='publish' id='radio-1' value='Y' checked='checked'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='publish' id='radio-2' value='N'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>
							<div class='row'>
								<label>Active</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-3' value='Y' checked='checked'/> 
									<label for='radio-3'>Y</label>
									<input type='radio' name='aktif' id='radio-4' value='N'/> 
									<label for='radio-4'>N</label>
								</div>
							</div>
							<div class='row'>
								<label>Status</label>
								<div class='right'>
									<input type='radio' name='status' id='radio-5' value='admin' checked='checked'/> 
									<label for='radio-5'>admin</label>
									<input type='radio' name='status' id='radio-6' value='user'/> 
									<label for='radio-6'>user</label>
								</div>
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
 
  case "editmodul":
    $edit = mysql_query("SELECT * FROM modul WHERE id_modul='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Module
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=modul&act=update>
          <input type=hidden name=id value='$r[id_modul]'>
							<div class='row'>
								<label>Module Name</label>
								<div class='right'><input type=text name='nama_modul' value='$r[nama_modul]'></div>
							</div>
							<div class='row'>
								<label>Link</label>
								<div class='right'><input type=text name='link' size=30 value='$r[link]'></div>
							</div>";
				 if ($r[publish]=='Y'){							
							echo "<div class='row'>
								<label>Publish</label>
								<div class='right'>
									<input type='radio' name='publish' id='radio-1' value='Y' checked='checked'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='publish' id='radio-2' value='N'/> 
									<label for='radio-2'>N</label>
								</div></div>";
					}
					else{
							echo "<div class='row'>
								<label>Publish</label>
								<div class='right'>
									<input type='radio' name='publish' id='radio-1' value='Y' /> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='publish' id='radio-2' value='N' checked='checked'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
						}
				if ($r[aktif]=='Y'){	
							echo"<div class='row'>
								<label>Active</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-3' value='Y' checked='checked'/> 
									<label for='radio-3'>Y</label>
									<input type='radio' name='aktif' id='radio-4' value='N'/> 
									<label for='radio-4'>N</label>
								</div>
							</div>";
							}
					else {	
							echo"<div class='row'>
								<label>Active</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-3' value='Y' /> 
									<label for='radio-3'>Y</label>
									<input type='radio' name='aktif' id='radio-4' value='N' checked='checked'/> 
									<label for='radio-4'>N</label>
								</div>
							</div>";
							}
			if ($r[status]=='user'){
				echo "<div class='row'>
								<label>Status</label>
								<div class='right'>
									<input type='radio' name='status' id='radio-5' value='admin' checked='checked'/> 
									<label for='radio-5'>admin</label>
									<input type='radio' name='status' id='radio-6' value='user'/> 
									<label for='radio-6'>user</label>
								</div>
							</div>";
							}
				else {
								echo "<div class='row'>
								<label>Status</label>
								<div class='right'>
									<input type='radio' name='status' id='radio-5' value='admin' checked='checked'/> 
									<label for='radio-5'>admin</label>
									<input type='radio' name='status' id='radio-6' value='user'/> 
									<label for='radio-6'>user</label>
								</div>
							</div>";
							}
							echo "
							<div class='row'>
								<label>Urutan</label>
								<div class='right'><input type=text name='urutan' size=1 value='$r[urutan]'></div>
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
