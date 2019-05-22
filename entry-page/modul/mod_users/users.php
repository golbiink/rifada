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

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:				
if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM users ORDER BY username");
      echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=user&act=tambahuser';\">
		<span>Add User</span></button>
		<div class='box'>
	  <div class='title'>
						User Table
						<span class='hide'></span>
					</div>
					<div class='content'>";
    }
    else{
      $tampil=mysql_query("SELECT * FROM users 
                           WHERE username='$_SESSION[namauser]'");
      echo "<div class='box'>
	  <div class='title'>
						User Table
						<span class='hide'></span>
					</div>
					<div class='content'>";
    }
    echo "<table cellspacing='0' cellpadding='0' border='0' class='all'> 
							<thead> 
								<tr><th>No</th>
								<th>Username</th>
								<th>Full Name</th>
								<th>Email</th>
								<th>No.Telp/HP</th>
								<th>Blokir</th>
								<th>Action</th></tr>
							</thead>
								<tbody>";
				 $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[username]</td>
             <td>$r[nama_lengkap]</td>
		         <td><a href=mailto:$r[email]>$r[email]</a></td>
		         <td>$r[no_telp]</td>
		         <td align=center>$r[blokir]</td>
             <td><a href=?module=user&act=edituser&id=$r[id_session]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>
			 <a href=javascript:confirmdelete('$aksi?module=user&act=hapus&id=$r[id_session]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a></td></tr>";
	$no++;
    }
	  echo "</tbody>
	  </table>
					</div>
				</div>";
    break;
  //Form Tambah User
  case "tambahuser":
    if ($_SESSION[leveluser]=='admin'){
    echo "<div class='box'>
					<div class='title'>
						Add User
						<span class='hide'></span>
					</div>
					<div class='content'>
						<form method=POST action='$aksi?module=user&act=input'>
							<div class='row'>
								<label>Username</label>
								<div class='right'><input type='text' name='username'/></div>
							</div>
							<div class='row'>
								<label>Password</label>
								<div class='right'><input type='text' name='password'/></div>
							</div>	
							<div class='row'>
								<label>Full Name</label>
								<div class='right'><input type='text' name='nama_lengkap'/></div>
							</div>
							<div class='row'>
								<label>E-mail</label>
								<div class='right'><input type='text' name='email'/></div>
							</div>
							<div class='row'>
								<label>No. Telp</label>
								<div class='right'><input type='text' name='no_telp'/></div>
							</div>
							<div class='row'>
								<label>Level User</label>
								<div class='right'>
								<select name='level'>
            <option value=0 selected>-Select  Level-</option>";
            $level=mysql_query("SELECT * FROM level_user ORDER BY level");
            while($r=mysql_fetch_array($level)){
              echo "<option value=$r[level]>$r[level]</option>";
            }
    echo "</select></div>
							</div>
								<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "edituser":
    $edit=mysql_query("SELECT * FROM users WHERE id_session='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin'){
    echo "<div class='box'>
					<div class='title'>
						Edit User
						<span class='hide'></span>
					</div>
					<div class='content'>
						<form method=POST action=$aksi?module=user&act=update>
						<input type=hidden name=id value='$r[id_session]'>
							<div class='row'>
								<label>Username</label>
								<div class='right'><input type='text' name='username' value='$r[username]' disabled/></div>
							</div>
							<div class='row'>
								<label>Password</label>
								<div class='right'><input type='text' name='password'/></div>
							</div>	
							<div class='row'>
								<label>Full Name</label>
								<div class='right'><input type='text' name='nama_lengkap' value='$r[nama_lengkap]'/></div>
							</div>
							<div class='row'>
								<label>E-mail</label>
								<div class='right'><input type='text' name='email' value='$r[email]'/></div>
							</div>
							<div class='row'>
								<label>No. Telp</label>
								<div class='right'><input type='text' name='no_telp' value='$r[no_telp]'/></div>
							</div>
								<div class='row'>
								<label>Level User</label>
								<div class='right'>
								<select name='level'>
            <option value=$r[level] selected>$r[level]</option>";
            $level=mysql_query("SELECT * FROM level_user ORDER BY level");
            while($r=mysql_fetch_array($level)){
              echo "<option value=$r[level]>$r[level]</option>";
            }
    echo "</select></div>
							</div>";
					 if ($r[blokir]=='Y'){
      echo "<div class='row'>
								<label>Blokir</label>
								<div class='right'>
									<input type='radio' name='blokir' id='radio-1' value='Y' checked ='checked'/> 
									<label for='radio-1'>Y</label>
									
									<input type='radio' name='blokir' id='radio-2' value='N'/> 
									<label for='radio-2'>N</label>
								</div>
							</div>";
    }
    else{
      echo "<div class='row'>
								<label>Blokir</label>
								<div class='right'>
									<input type='radio' name='blokir' id='radio-1' value='Y'/> 
									<label for='radio-1'>Y</label>
									
									<input type='radio' name='blokir' id='radio-2' value='N' checked='checked'   /> 
									<label for='radio-2'>N</label>
								</div>

							</div>";
    }

							echo"<div class='row'>
								<div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";     
    }
    else{
    echo "<div class='box'>
					<div class='title'>
						Edit User
						<span class='hide'></span>
					</div>
					<div class='content'>
						<form method=POST action=$aksi?module=user&act=update>
						<input type=hidden name=id value='$r[id_session]'>
							<div class='row'>
								<label>Username</label>
								<div class='right'><input type='text' name='username' value='$r[username]' disabled/></div>
							</div>
							<div class='row'>
								<label>Password</label>
								<div class='right'><input type='text' name='password'/></div>
							</div>	
							<div class='row'>
								<label>Full Name</label>
								<div class='right'><input type='text' name='nama_lengkap' value='$r[nama_lengkap]'/></div>
							</div>
							<div class='row'>
								<label>E-mail</label>
								<div class='right'><input type='text' name='email' value='$r[email]'/></div>
							</div>
							<div class='row'>
								<label>No. Telp</label>
								<div class='right'><input type='text' name='no_telp' value='$r[no_telp]'/></div>
							</div>
							<div class='row'>
								<div class='right'>
									<button type='submit'><span>Simpan</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";     
    }
    break;  
}
}
?>
