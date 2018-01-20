<?php 
include("ek/vt_baglantisi.php");
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:giris.php");
}
$id = @$_GET['id'];
$icerik=mysql_query("select * from urunler where urunID = '$id'");		
$goster=mysql_fetch_array($icerik);
@extract($goster);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>PufyTek | Stok Takip  v1.0</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
	    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<div class="panel panel-default">
                        
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                                <li class=""><a href="index.php">Ürünler</a>
                                </li>
                                <li class=""><a href="#Depolar" data-toggle="tab">Depo Yönetimi</a>
                                </li>
                                <button class="right-div btn btn-primary"><a style="color:white;" href="cikis.php">Çıkış Yap</a>
                                </button>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="urunler">
                                    <h4>Depo Ekle</h4>
                                    <div class="table-responsive">
                                <div class="panel panel-danger">
									     
                        <div class="panel-body">
                            <form role="form" method="post" action="?ekle">
                                        
                                 
								 <div class="form-group">
                                            <label>Depo</label>
											<input class="form-control" name="depo" type="text">
                                            
                                 </div>
								
								 
								
                                            
                                
                                 
                                        <button type="submit" class="btn btn-danger">Ekle </button>

                                    </form>
                            </div>
								
						
                       
                       
					<?php
					
					if(isset($_GET['ekle'])){
					
					$depo=$_POST['depo'];
					
						
					$guncelle=mysql_query("insert into depolar (depoAdi) values ('$depo')");	
if(isset($guncelle)){
	
header("Location:depolar.php");
}else{
	
	echo "<h1 style='color:red; align:center;'>Hata! Tekrar Deneyin!</h1>";
}
					}
					
					?>


                            
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom.js"></script>
   <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

					</body>
</html>