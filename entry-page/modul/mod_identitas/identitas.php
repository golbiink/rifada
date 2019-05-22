 
  <?php
  $aksi="modul/mod_identitas/aksi_identitas.php";
  switch($_GET[act]){
  // Tampil identitas
  default:
    $sql  = mysql_query("SELECT * FROM identitas LIMIT 1");
    $r    = mysql_fetch_array($sql);

  
  
   echo "<div class='box'>
					<div class='title'>
						Website Identity
						<span class='hide'></span>
					</div>
					<div class='content'>
    <form method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update>
    <input type=hidden name=id value=$r[id_identitas]>
		  
							<div class='row'>
								<label>Website Name</label>
								<div class='right'><input type=text name='nama_website' value='$r[nama_website]'></div>
							</div>
							<div class='row'>
								<label>Address</label>
								<div class='right'><input type=text name='alamat' value='$r[alamat]'></div>
							</div>
							<div class='row'>
								<label>URL</label>
								<div class='right'><input type=text name='url' value='$r[url]'></div>
								- Apabila di-onlinekan di web hosting, ganti URL dengan URL website anda. <br/>
	contoh: <span class style=\"color:#EA1C1C;\">http://gudangwebsite.net</span>
							</div>
							<div class='row'>
								<label>Facebook Fan Page</label>
								<div class='right'><input type=text name='facebook' value='$r[facebook]'></div>
								- contoh : <span class style=\"color:#EA1C1C;\">https://www.facebook.com/239333572825492</span>
							</div>
							<div class='row'>
								<label>Twitter</label>
								<div class='right'><input type=text name='twitter' value='$r[twitter]'></div>
								- contoh : <span class style=\"color:#EA1C1C;\">gudangwebsite</span>
							</div>
							<div class='row'>
								<label>Meta Description</label>
								<div class='right'><input type=text name='meta_deskripsi' value='$r[meta_deskripsi]'></div>
							</div>
							<div class='row'>
								<label>Meta Keyword</label>
								<div class='right'><input type=text name='meta_keyword' value='$r[meta_keyword]'></div>
							</div>
							<div class='row'>
								<label>Email</label>
								<div class='right'><input type=text name='email' value='$r[email]'></div>
							</div>
							<div class='row'>
								<label>Line</label>
								<div class='right'><input type=text name='line' value='$r[line]'></div>
							</div>
							
							<div class='row'>
								<label>No. Telp</label>
								<div class='right'><input type=text name=no_telp value='$r[no_telp]'></div>
							</div>
							<div class='row'>
								<label>Pin BBM</label>
								<div class='right'><input type=text name=pin_bb value='$r[pin_bb]'></div>
							</div>
							<div class='row'>
								<label>Whatsapp</label>
								<div class='right'><input type=text name=whatsapp value='$r[whatsapp]'></div>
							</div>
							<div class='row'>
								<label>Favicon Images</label>
								<div class='right'><img src='../$r[favicon]'></div>
							</div>
								
							<div class='row'>
								<label>Change Favicon</label>
								<div class='right'><input type='file' name='fupload' /></div>
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