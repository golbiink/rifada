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
$aksi="modul/mod_komentar/aksi_komentar.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    echo "
		<div class='box'>
	  <div class='title'>
						Comment
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Name</th><th>Comment</th><th>Active</th><th>Action</th></tr></thead>
								<tbody>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM komentar ORDER BY id_komentar DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td width=80>$r[nama_komentar]</td>
                <td width=290>$r[isi_komentar]</td>
                <td width=5 align=center>$r[aktif]</td>
                <td><a href=?module=komentar&act=editkomentar&id=$r[id_komentar]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a> 
	                   <a href=javascript:confirmdelete('$aksi?module=komentar&act=hapus&id=$r[id_komentar]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
		        </tr>";
      $no++;
    }
    echo "</tbody>
	  </table>
					</div>
				</div>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM komentar"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    break;
  
  case "editkomentar":
    $edit = mysql_query("SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Comment Edit
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=komentar&act=update>
          <input type=hidden name=id value=$r[id_komentar]>
							<div class='row'>
								<label>Name</label>
								<div class='right'><input type=text name='nama_komentar' size=60 value='$r[nama_komentar]'></div>
							</div>
							 <div class='row'>
								<label>Website</label>
								<div class='right'><input type=text name='url' size=60 value='$r[url]'></div>
							</div>
							<div class='row'>
								<label>Comment</label>
								<div class='right'><textarea name='isi_komentar' class='wysiwyg'>$r[isi_komentar]</textarea></div>
							</div>";
    if ($r[aktif]=='Y'){
      echo "<div class='row'>
								<label>Active</label>
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
								<label>Active</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-1' value='Y'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='aktif' id='radio-2' value='N'  checked='checked'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
    }
    echo "<div class='right'>
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
