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
$aksi="modul/mod_katajelek/aksi_katajelek.php";
switch($_GET[act]){
  // Tampil Kata Jelek
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=katajelek&act=tambahkatajelek';\">
		  <span>Add Sensors Word</span></button>
		<div class='box'>
	  <div class='title'>
						Sensors Word
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Bad Word</th><th>Change</th><th>Action</th></tr></thead>
								<tbody>"; 
    $tampil=mysql_query("SELECT * FROM katajelek ORDER BY id_jelek DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[kata]</td>
             <td>$r[ganti]</td>
             <td><a href=?module=katajelek&act=editkatajelek&id=$r[id_jelek]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>
	               <a href=javascript:confirmdelete('$aksi?module=katajelek&act=hapus&id=$r[id_jelek]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
             </td></tr>";
      $no++;
    }
   echo "</tbody>
	  </table>
					</div>
				</div>";
    break;
  
  // Form Tambah Kata Jelek
  case "tambahkatajelek":
    echo "<div class='box'>
					<div class='title'>
						Add Sensors Word
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=katajelek&act=input'>
					  <div class='row'>
					  <label>Bad Word</label>
					  <div class='right'><input type=text name='kata'></div>
					  </div>
					  <div class='row'>
					  <label>Change</label>
					  <div class='right'><input type=text name='ganti'></div>
					  </div>
					  <div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
  
  // Form Edit Kata Jelek 
  case "editkatajelek":
    $edit=mysql_query("SELECT * FROM katajelek WHERE id_jelek='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Sensors Word
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=katajelek&act=update>
          <input type=hidden name=id value='$r[id_jelek]'>
          <div class='row'>
					  <label>Bad Word</label>
					  <div class='right'><input type=text name='kata' value='$r[kata]'></div>
					  </div>
					  <div class='row'>
					  <label>Change</label>
					  <div class='right'><input type=text name='ganti' value='$r[ganti]'></div>
					  </div>
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
