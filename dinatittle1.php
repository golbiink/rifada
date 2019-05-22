<?php
if (isset($_GET['id'])){
    $sql = mysql_query("select judul from berita where id_berita='$_GET[id]'");
    $j   = mysql_fetch_array($sql);
		echo "$j[judul]";
}
else{
$sql1 = mysql_query("select meta_deskripsi from identitas LIMIT 1");
      $j1   = mysql_fetch_array($sql1);
		  echo "$j1[meta_deskripsi]";
		  }
?>
