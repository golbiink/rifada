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
$aksi="modul/mod_menu/aksi_menu.php";
switch($_GET[act]){
  // Tampil Menu Utama
  default:
    echo "<button type='submit' class='orange' onclick=\"window.location.href='?module=menu&act=tambahmenu';\">
		  <span>Add Website Menu</span></button>
		<div class='box'>
	  <div class='title'>
						Website Menu
						<span class='hide'></span>
					</div>
					<div class='content'>
					<table cellspacing='0' cellpadding='0' border='0' class='all'> 
					<thead>
          <tr><th>No</th><th>Menu</th><th>Parent</th><th>Link</th><th>Active</th><th>Action</th></tr></thead>
								<tbody>";
    $tampil=mysql_query("SELECT * FROM menu");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_menu]</td>";
             $parent=mysql_query("SELECT * FROM menu WHERE id_menu=$r[id_parent]");
             $jml=mysql_num_rows($parent);
             if ($jml > 0){
                while($s=mysql_fetch_array($parent)){
                echo"<td>$s[nama_menu]</td>";
                }
             }
             else {
             echo"<td>Main Menu</td>";
             }
             echo"<td align=center>$r[link]</td><td align=center>$r[aktif]</td>
             <td><a href=?module=menu&act=editmenu&id=$r[id_menu]><img src='gfx/icons/small/edit.png' title='Edit' alt='edit'></a>
			  <a href=javascript:confirmdelete('$aksi?module=menu&act=hapus&id=$r[id_menu]&namafile=$r[gambar]') 
   title='Delete' class='with-tip'><img src='gfx/icons/small/delete.png' alt='delete'></a></td></tr>";
      $no++;
    }
       echo "</tbody>
	  </table>
					</div>
				</div>";
    break;

  // Form Tambah Menu Utama
  case "tambahmenu":
   echo "<div class='box'>
					<div class='title'>
						Add Website Menu
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action='$aksi?module=menu&act=input'>
					  <div class='row'>
					  <label>Menu Name</label>
					  <div class='right'><input type=text name='nama_menu'></div>
					  </div>
		              <div class='row'>
					  <label>Parent (Level Menu)</label>
					  <div class='right'>
					  <select name='id_parent'>
            <option value=0 selected>- Menu Utama -</option>";
            $tampil=mysql_query("SELECT * FROM menu ORDER BY id_menu");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_menu]>$r[nama_menu]</option>";
            }
    echo "</select></div>
					  </div>
		  			  <div class='row'>
					  <label>Link</label>
					  <div class='right'><input type=text name='link'></div>
					   
          <tr><td class='left'>Active</td><td class='left'> : <input type=radio name='aktif' value='Y' checked>Y 
                                                             <input type=radio name='aktif' value='N'>N</td></tr>
         		  </div>
					  <div class='right'>
									<button type='submit'><span>Save</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>";
     break;

  // Form Edit Menu Utama
  case "editmenu":
    $edit = mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='box'>
					<div class='title'>
						Edit Website Menu
						<span class='hide'></span>
					</div>
					<div class='content'>
          <form method=POST action=$aksi?module=menu&act=update>
          <input type=hidden name=id value=$r[id_menu]>
          <div class='row'>
					  <label>Menu Name</label>
					  <div class='right'><input type=text name='nama_menu' value='$r[nama_menu]'></div>
					  </div>
		              <div class='row'>
					  <label>Parent (Level Menu)</label>
					  <div class='right'>
					  <select name='id_parent'>";

          $tampil=mysql_query("SELECT * FROM menu ORDER BY id_menu");
          if ($r[parent_id]==0){
            echo "<option value=0 selected>Menu Utama</option>";
          }
          else {
            echo "<option value=0>Menu Utama</option>";
          }

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_parent]==$w[id_menu]){
              echo "<option value=$w[id_menu] selected>$w[nama_menu]</option>";
            }
            else{
				if ($w[id_menu]==$r[id_menu]){
              	echo "<option value=0>-- Tanpa Parent --</option>";
				}
				else{
				echo "<option value=$w[id_menu]>$w[nama_menu]</option>";	
				}
            }
            
          }
           
    echo "</select></div>
					  </div>";
	if ($r[aktif]=='Y'){
      echo "<tr><td class='left'>Active</td> <td class='left'> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td class='left'>Active</td> <td class='left'> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }
      echo"<div class='row'>
					  <label>Link</label>
					  <div class='right'><input type=text name='link' value='$r[link]'></div>
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
