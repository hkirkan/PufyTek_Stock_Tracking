<?php
//veritabanı bağlantısı
$baglan=mysql_connect("localhost","root","usbw");
mysql_select_db("stok",$baglan);
mysql_query("SET NAMES UTF8");

//Site Sabitleri
$ayarcek=mysql_query("select * from ayarlar");
$ayar=mysql_fetch_array($ayarcek);
extract($ayar);
$baslik=$sayfaBaslik;
$alt=$copright;
?>