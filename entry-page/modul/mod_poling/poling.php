<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_poling/aksi_poling.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=poling&act=tambahpoling';\">
		  <span>Add Polling</span></button>
		<div class='box'>
	  <div class='title'>
						Polling
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Tittle</th><th>Status</th><th>Rating</th><th>Active</th><th>Action</th></tr></thead>
								<tbody>";
          
    $no = 1;
    $tampil=mysql_query("SELECT * FROM poling ORDER BY id_poling DESC");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr>
            <td>$no</td>
            <td>$r[pilihan]</td>
            <td>$r[status]</td>
            <td align=center>$r[rating]</td>
            <td align=center>$r[aktif]</td>
            <td><a href=?module=poling&act=editpoling&id=$r[id_poling]><img src='gfx/icons/small/edit.png' alt='edit'></a>
            </td></tr>";
      $no++;
    }
	echo "</tbody>
	  </table>
					</div>
				</div>";
    break;

  case "tambahpoling":
    echo "<div class='box'>
					<div class='title'>
						Add Polling
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=poling&act=input'>
								<div class='row'>
								<label>Tittle</label>
								<div class='right'><input type=text name='pilihan'></div>
								</div>
								<div class='row'>
								<label>Make As.</label>
								<div class='right'>
									<input type='radio' name='status' id='radio-1' value='Jawaban' checked='checked'/> 
									<label for='radio-1'>Jawaban</label>
									<input type='radio' name='status' id='radio-2' value='Pertanyaan'/> 
									<label for='radio-2'>Pertanyaan</label></div>
								</div>
								<div class='row'>
								<label>Active</label>
								<div class='right'>
									<input type='radio' name='aktif' id='radio-3' value='Y' checked='checked'/> 
									<label for='radio-3'>Y</label>
									<input type='radio' name='aktif' id='radio-4' value='N'/> 
									<label for='radio-4'>N</label></div>
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
 
  case "editpoling":
    $edit = mysql_query("SELECT * FROM poling WHERE id_poling='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Polling
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=poling&act=update>
          <input type=hidden name=id value='$r[id_poling]'>
         <div class='row'>
								<label>Tittle</label>
								<div class='right'><input type=text name='pilihan' value='$r[pilihan]'></div>
								</div>";          
    if ($r[aktif]=='Y'){
      echo "<div class='row'>
			<label>Active</label>
			<div class='right'>
			<input type='radio' name='aktif' id='radio-3' value='Y' checked='checked'/> 
			<label for='radio-3'>Y</label>
			<input type='radio' name='aktif' id='radio-4' value='N'/> 
			<label for='radio-4'>N</label></div>
			</div>";
    }
    else{
      echo "<div class='row'>
			<label>Active</label>
			<div class='right'>
			<input type='radio' name='aktif' id='radio-3' value='Y'/> 
			<label for='radio-3'>Y</label>
			<input type='radio' name='aktif' id='radio-4' value='N' checked='checked'/> 
			<label for='radio-4'>N</label></div>
			</div>";
    }
    if ($r[status]=='Jawaban'){
      echo "<div class='row'>
			<label>Make As.</label>
			<div class='right'>
			<input type='radio' name='status' id='radio-1' value='Jawaban' checked='checked'/> 
			<label for='radio-1'>Jawaban</label>
			<input type='radio' name='status' id='radio-2' value='Pertanyaan'/> 
			<label for='radio-2'>Pertanyaan</label></div>
			</div>";
    }
    else{
      echo "<div class='row'>
			<label>Make As.</label>
			<div class='right'>
			<input type='radio' name='status' id='radio-1' value='Jawaban'/> 
			<label for='radio-1'>Jawaban</label>
			<input type='radio' name='status' id='radio-2' value='Pertanyaan' checked='checked'/> 
			<label for='radio-2'>Pertanyaan</label></div>
			</div>";
    }
    echo "<div class='row'>
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
