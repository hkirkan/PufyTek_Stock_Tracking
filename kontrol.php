<html>
<head>
<title>PufyTek | Stok Takip  v1.0</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Badge Sign In Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<!-- //web font -->
</head>
<?php 

include("ek/vt_baglantisi.php");
ob_start();
session_start();
if(isset($_GET['kadi'])){
	
	header("Location:giris.php");
}
$kadi = mysql_real_escape_string(trim($_POST['kadi']));
$sifre = mysql_real_escape_string(trim($_POST['sifre']));

$sql_check = mysql_query("select * from kullanicilar where kullaniciadi='".$kadi."' and sifre='".$sifre."' ") or die(mysql_error());

if(mysql_num_rows($sql_check))  {
	
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
	
    header("Location:index.php");
}
else {
	if($kadi=="" or $sifre=="") {
		echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Dön</a></center>";
	}
	else {
		echo "<center>Kullanici Adi/Sifre Yanlis.<br><a href=javascript:history.back(-1)>Geri Dön</a></center>";
	}
}

ob_end_flush();
?>
