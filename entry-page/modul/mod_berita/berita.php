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

function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET[act]){
  // Tampil Berita
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=berita&act=tambahberita';\">
		<span>Add News</span></button>
		<div class='box'>
	  <div class='title'>
						News
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>";

    if (empty($_GET['kata'])){
    echo "<tr><th>No</th><th>Tittle</th><th>Posted Date</th><th>Action</th></tr></thead>
								<tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM berita 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=berita&act=editberita&id=$r[id_berita]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a> 
		                <a href=javascript:confirmdelete('$aksi?module=berita&act=hapus&id=$r[id_berita]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'> <img src='gfx/icons/small/delete.png' alt='delete'></a></td>
						</tr>";
      $no++;
    }
     echo "</tbody>
	  </table>
					</div>
				</div>";
    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    break;    
    }
    else{
    echo "<tr><th>no</th><th>judul</th><th>tgl. posting</th><th>aksi</th></tr></thead>
								<tbody>";

    $p      = new Paging9;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM berita WHERE judul LIKE '%$_GET[kata]%' ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM berita 
                           WHERE username='$_SESSION[namauser]'
                           AND judul LIKE '%$_GET[kata]%'       
                           ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=berita&act=editberita&id=$r[id_berita]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a> 
		                <a href='$aksi?module=berita&act=hapus&id=$r[id_berita]&namafile=$r[gambar]'><img src='gfx/icons/small/delete.png' title='Delete' alt='delete'></a></td></tr>";
      $no++;
    }
 echo "</tbody>
	  </table>
					</div>
				</div>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE judul LIKE '%$_GET[kata]%'"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE username='$_SESSION[namauser]' AND judul LIKE '%$_GET[kata]%'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
 
    break;    
    }

  
  case "tambahberita":
    echo "<div class='box'>
					<div class='title'>
						Add News
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data'>
							<div class='row'>
								<label>Tittle</label>
								<div class='right'><input type=text name='judul'></div>
							</div>
		  					<div class='row'>
								<label>Categori</label>
								<div class='right'>
								<select name='kategori'>
            <option value=0 selected>-Select  Categori-</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></div>
							</div>
							<div class='row'>
								<label>Headline</label>
								<div class='right'>
									<input type='radio' name='headline' id='radio-1' value='Y' checked='checked'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='headline' id='radio-2' value='N'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>
							<div class='row'>
								<label>News Content</label><br /><br />
								<textarea name='isi_berita' id='loko' style='width: 300px; height: 350px;'></textarea></div>
							<div class='row'>
								<label>Images</label>
								<div class='right'><input type=file name='fupload'></div>
							</div>";

   $tag = mysql_query("SELECT * FROM tag ORDER BY tag_seo");
   echo "<div class='row'>
								<label>Tag</label>
								<div class='right'> ";
   while ($t=mysql_fetch_array($tag)){
   echo "<input type=checkbox value='$t[tag_seo]' name=tag_seo[]>$t[nama_tag]";}
   echo "</div></div>
<div class='row'>
								<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;
    
    
  case "editberita":
    $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]' AND username='$_SESSION[namauser]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit News
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=berita&act=update>
          <input type=hidden name=id value=$r[id_berita]>
							<div class='row'>
								<label>Tittle</label>
								<div class='right'><input type=text name='judul' size='60' value='$r[judul]' ></div>
							</div>
					<div class='row'>
								<label>Categori</label>
								<div class='right'>
								<select name='kategori'>
            <option value=0 selected>-Select Categori-</option>";
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }

    echo "</select></div>
							</div>";
   if ($r[headline]=='Y'){
      echo "<div class='row'>
								<label>Headline</label>
								<div class='right'>
									<input type='radio' name='headline' id='radio-1' value='Y' checked='checked'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='headline' id='radio-2' value='N'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
    }
    else{
      echo "<div class='row'>
								<label>Headline</label>
								<div class='right'>
									<input type='radio' name='headline' id='radio-1' value='Y'/> 
									<label for='radio-1'>Y</label>
									<input type='radio' name='headline' id='radio-2' value='N' checked='checked'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
    }
      echo "<div class='row'>
								<label>News Content</label><br /><br />
								<textarea name='isi_berita' id='loko' style='width:300px; height: 350px;'>$r[isi_berita]</textarea></div>";
          if ($r[gambar]!=''){
              echo "<div class='row'>
								<label></label>
								<div class='right'><img src='../foto_berita/small_$r[gambar]'></div>
							</div>";  
          }
    echo "<div class='row'>
								<label>Images</label>
								<div class='right'><input type=file name='fupload'></div>
							</div>";
	$d = GetCheckboxes('tag', 'tag_seo', 'nama_tag', $r[tag]);
	echo "<div class='row'>
								<label>Tag</label>
								<div class='right'>$d </div>
							</div>"; 
    echo  "<div class='right'>
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
