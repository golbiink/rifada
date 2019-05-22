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
$aksi="modul/mod_agenda/aksi_agenda.php";
switch($_GET[act]){
  // Tampil Agenda
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=agenda&act=tambahagenda';\">
		<span>Add Event</span></button>
		<div class='box'>
	  <div class='title'>
						Event
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Thema</th><th>Start Date</th><th>Finish Date</th><th>Action</th></tr></thead>
								<tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil=mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM agenda 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_agenda DESC LIMIT $posisi,$batas");
    }

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl_mulai   = tgl_indo($r[tgl_mulai]);
      $tgl_selesai = tgl_indo($r[tgl_selesai]);
      echo "<tr><td>$no</td>
                <td width=220>$r[tema]</td>
                <td>$tgl_mulai</td>
                <td>$tgl_selesai</td>
                <td><a href=?module=agenda&act=editagenda&id=$r[id_agenda]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>  
	                 <a href=javascript:confirmdelete('$aksi?module=agenda&act=hapus&id=$r[id_agenda]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a>
		        </td></tr>";
      $no++;
    }
    echo "</tbody>
	  </table>
					</div>
				</div>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    break;

  
  case "tambahagenda":
    echo "<div class='box'>
					<div class='title'>
						Add Event
						<span class='hide'></span>
					</div>
					<div class='content'>
						<form method=POST action='$aksi?module=agenda&act=input' enctype='multipart/form-data'>
							<div class='row'>
								<label>Theme</label>
								<div class='right'><input type=text name='tema'></div>
							</div>
							<div class='row'>
								<label>Event Content</label>
								<div class='right'><textarea name='isi_agenda'></textarea></div>
							</div>
							<div class='row'>
								<label>Place</label>
								<div class='right'><input type=text name='tempat' size=40></div>
							</div>
							<div class='row'>
								<label>Time</label>
								<div class='right'><input type=text name='jam' size=40></div>
							</div>
							<div class='row'>
								<label>Start Date</label>
								<div class='right'>";
			                    combotgl(1,31,'tgl_mulai',$tgl_skrg);
								combonamabln(1,12,'bln_mulai',$bln_sekarang);
								combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);
								echo"</div>
							</div>
							<div class='row'>
								<label>Finish Date</label>
								<div class='right'>";
								combotgl(1,31,'tgl_selesai',$tgl_skrg);
								combonamabln(1,12,'bln_selesai',$bln_sekarang);
								combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);
								echo"</div>
							</div>
							<div class='row'>
								<label>Send</label>
								<div class='right'><input type=text name='pengirim' size=40></div>
							</div>
							<div class='row'>
								<label>Images</label>
								<div class='right'><input type=file name='fupload' size=40></div>
							</div>
							<div class='row'>
								<label>Maps Location</label>
								<div class='right'><textarea name='google_maps'></textarea></div>
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
  

  case "editagenda":
    $edit = mysql_query("SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Event
						<span class='hide'></span>
					</div>
					<div class='content'>
						<form method=POST action=$aksi?module=agenda&act=update enctype='multipart/form-data'>
						<input type=hidden name=id value=$r[id_agenda]>
							<div class='row'>
								<label>Theme</label>
								<div class='right'><input type=text name='tema' size=60 value='$r[tema]'></div>
							</div>
							<div class='row'>
								<label>Event Content</label>
								<div class='right'><textarea name='isi_agenda'>$r[isi_agenda]</textarea></div>
							</div>
							<div class='row'>
								<label>Place</label>
								<div class='right'><input type=text name='tempat' size=40 value='$r[tempat]'></div>
							</div>
							<div class='row'>
								<label>Time</label>
								<div class='right'><input type=text name='jam' size=40 value='$r[jam]' size=40></div>
							</div>
							<div class='row'>
								<label>Start Date</label>
								<div class='right'>";
			                    $get_tgl=substr("$r[tgl_mulai]",8,2);
								combotgl(1,31,'tgl_mulai',$get_tgl);
								$get_bln=substr("$r[tgl_mulai]",5,2);
								combonamabln(1,12,'bln_mulai',$get_bln);
								$get_thn=substr("$r[tgl_mulai]",0,4);
								$thn_skrg=date("Y");
								combothn($thn_sekarang-2,$thn_sekarang+2,'thn_mulai',$get_thn);
								echo"</div>
							</div>
							<div class='row'>
								<label>Finish Date</label>
								<div class='right'>";
								$get_tgl2=substr("$r[tgl_selesai]",8,2);
								combotgl(1,31,'tgl_selesai',$get_tgl2);
								$get_bln2=substr("$r[tgl_selesai]",5,2);
								combonamabln(1,12,'bln_selesai',$get_bln2);
								$get_thn2=substr("$r[tgl_selesai]",0,4);
								combothn($thn_sekarang-2,$thn_sekarang+2,'thn_selesai',$get_thn2);
								echo"</div>
							</div>
							<div class='row'>
								<label>Send</label>
								<div class='right'><input type=text name='pengirim' size=40 value='$r[pengirim]' size=40></div>
							</div>
							<div class='row'>
								<label></label>
								<div class='right'><img src='../foto_agenda/$r[gambar]' width='60' height='60'></div>
							</div>
							<div class='row'>
								<label>Images</label>
								<div class='right'><input type=file name='fupload' size=40></div>
							</div>
							<div class='row'>
								<label></label>
								<div class='right'><iframe width='225' height='160' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='$d[google_maps]'></iframe></div>
							</div>
							<div class='row'>
								<label>Maps Location</label>
								<div class='right'><textarea name='google_maps'>$r[google_maps]</textarea></div>
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
