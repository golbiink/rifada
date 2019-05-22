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
$aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
switch($_GET[act]){
  // Tampil Halaman Statis
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=halamanstatis&act=tambahhalamanstatis';\">
		<span>Add New Pages</span></button>
		<div class='box'>
	  <div class='title'>
						Static Pages
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Tittle</th><th>Link</th><th>Posted Date</th><th>Action</th></tr></thead>
								<tbody>";

    $tampil = mysql_query("SELECT * FROM halamanstatis ORDER BY id_halaman DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
				<td>page-$r[id_halaman]-$r[judul_seo].html</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>
		                <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody>
	  </table>
					</div>
				</div>";
    break;

  case "tambahhalamanstatis":
    echo "<div class='box'>
					<div class='title'>
						Add Statics Pages
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
						<div class='row'>
								<label>Pages Tittle</label>
								<div class='right'><input type=text name='judul'></div>
						</div>
						<div class='row'>
								<label>Content</label><br /><br />
								<textarea name='isi_halaman' id='loko' style='width: 350px; height: 350px;'></textarea>
					  		</div>
						<div class='row'>
								<label>Images</label>
								<div class='right'><input type=file name='fupload' size=40></div>
							</div>
							<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
    
  case "edithalamanstatis":
    $edit = mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Statics Pages
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
          <input type=hidden name=id value=$r[id_halaman]>
						<div class='row'>
								<label>Tittle</label>
								<div class='right'><input type=text name='judul' value='$r[judul]'></div>
						</div>
						<div class='row'>
								<label>Content</label><br /><br />
								<textarea name='isi_halaman' id='loko' style='width: 350px; height: 350px;'>$r[isi_halaman]</textarea>
							</div>
							
						<div class='row'>
								<label></label>
								<div class='right'>";
					if ($r[gambar]!=''){
              echo "<img src='../foto_banner/$r[gambar]' width='160' height='100'>";  
          }
    echo "</div>
							</div>
							<div class='row'>
								<label>Images</label>
								<div class='right'><input type=file name='fupload' size=40></div>
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
