<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus file ini?")) {
      document.location = delUrl;
   }
}
</script>

<?php
$aksi="modul/mod_sekilasinfo/aksi_sekilasinfo.php";
switch($_GET[act]){
  // Tampil Sekilas Info
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=sekilasinfo&act=tambahsekilasinfo';\">
		  <span>Add Breaking News</span></button>
		<div class='box'>
	  <div class='title'>
						Breaking News
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Info</th><th>Posted Date</th><th>Action</th></tr></thead>
								<tbody>";
    $tampil=mysql_query("SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[info]</td>
                <td>$tgl</td>
                <td><a href=?module=sekilasinfo&act=editsekilasinfo&id=$r[id_sekilas]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a> 
	                  <a href=javascript:confirmdelete('$aksi?module=sekilasinfo&act=hapus&id=$r[id_sekilas]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
		        </tr>";
    $no++;
    }
		echo "</tbody>
	  </table>
					</div>
				</div>";
    break;
  
  case "tambahsekilasinfo":
    echo "<div class='box'>
					<div class='title'>
						Add Breaking News
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=sekilasinfo&act=input' enctype='multipart/form-data'>
					  <div class='row'>
					  <label>Info</label>
					  <div class='right'><input type=text name='info'></div>
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
    
  case "editsekilasinfo":
    $edit = mysql_query("SELECT * FROM sekilasinfo WHERE id_sekilas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Breaking News
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=sekilasinfo&act=update>
          <input type=hidden name=id value=$r[id_sekilas]>
          <div class='row'>
					  <label>Info</label>
					  <div class='right'><input type=text name='info' value='$r[info]'></div>
					  </div>
		              <div class='row'>
					  <label></label>
					  <div class='right'><img src='../foto_info/$r[gambar]' width='130' height='100'></div>
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
?>
