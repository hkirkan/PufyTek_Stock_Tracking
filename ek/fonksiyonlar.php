<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php
include "vt_baglantisi.php";
function duyuru(){
$sql="SELECT * FROM duyurular";
$sorgu=mysql_query($sql);
while( $sonuc=mysql_fetch_array($sorgu) ){
    	$duyuruSerit=$sonuc['duyuruTxt'];
		$duyuruTarih=$sonuc['duyuruTarih'];
		
		}
		echo "<marquee>".$duyuruSerit." | ".$duyuruTarih."</marquee>";
}

?>