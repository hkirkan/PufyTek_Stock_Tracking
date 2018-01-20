<?php 
include("ek/vt_baglantisi.php");
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:giris.php");
}
$id = @$_GET['id'];
$icerik=mysql_query("select * from depolar where depoID = '$id'");		
$goster=mysql_fetch_array($icerik);
@extract($goster);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head
<title><?=$baslik;?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
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
                                <li class=""><a href="index.php">Ürün Yönetimi</a>
                                </li>
                                <li class="active"><a href="depolar.php" data-toggle="">Depo Yönetimi</a>
                                </li>
                                
								<button class="right-div btn btn-primary"><a style="color:white;" href="cikis.php">Çıkış Yap</a>
                                </button>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="urunler">
                                    <h4>Depo Düzenle</h4>
                                    <div class="table-responsive">
                                <div class="panel panel-danger">
									     
                        <div class="panel-body">
                            <form role="form" method="post" action="?duzenle">
                                        
                                 
								 <div class="form-group">
                                            <label>Depo Adı</label>
                                            <input class="form-control" name="depo" type="text" value="<?=$depoAdi;?>">
                                 </div>
								 
                                            
                                <input type="hidden" name="uid" value="<?=$id;?>">
                                 
                                        <button type="submit" class="btn btn-danger">Kaydet </button>

                                    </form>
                            </div>
								
						
                       
                       
					<?php
					
					if(isset($_GET['duzenle'])){
					$dadi=$_POST['depo'];
					$uid=$_POST['uid'];
					
						
					$guncelle=mysql_query("update depolar set depoAdi='$dadi' where depoID=$uid");	
if(isset($guncelle)){
	header("location:depolar.php");
	
}else{
	
	echo "<h1 style='color:red; align:center;'>Hata! Tekrar Deneyin!</h1>";
}
					}
					
					?>


                  <center><?=$alt;?></center>          
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom.js"></script>
   <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

					</body>
</html>