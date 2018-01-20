<?php include "ek/vt_baglantisi.php"; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<?php 

include("ek/vt_baglantisi.php");
ob_start();
session_start();

if(!isset($_SESSION["login"])){
    header("Location:giris.php");
}
?>

<div class="panel panel-default">
                        
                        <div class="panel-body">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="index.php" data-toggle="">Ürün Yönetimi</a>
                                </li>
                                <li class=""><a href="depolar.php" data-toggle="">Depo Yönetimi</a>
                                </li>
                               
								
								
								<button class="right-div btn btn-primary"><a style="color:white;" href="cikis.php">Çıkış Yap</a>
								<button class="right-div btn btn-danger"><a style="color:white;" href="urunekle.php">Ürün Ekle</a>
                                </button>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="urunler">
                                    <h4>Stoktaki Ürünler</h4>
                                    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Ürün Adı</th>
                                            <th>Barkod</th>
                                            <th>Stok Kodu</th>
                                            <th>Adet</th>
                                            <th>Depo</th>
											<th>İşlemler</th>
											<th>Hızlı Artır/Eksilt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$urunsql=mysql_query("select * from urunler");
									while($urun=mysql_fetch_array($urunsql)){
									
					
									echo	 '<tr class="odd gradeX">
                                            <td>'.$urun[1].'</td>
                                            <td>'.$urun[2].'</td>
                                            <td>'.$urun[3].'</td>
                                            <td class="center">'.$urun[4].'</td>
                                            <td class="center">';
												$depocek=mysql_query("select * from depolar where depoID=$urun[5]");
												while($depoGoster=mysql_fetch_array($depocek)){
													echo $depoGoster['1'];
													
												}

									echo		'</td>
											<td><a href="urunduzenle.php?id='.$urun[0].'"><button class="btn btn-simple" data-toggle="modal" data-target="#myModal" ><i class="fa fa-pencil"></i> Düzenle</button></a>|<a href="sil.php?urunsil='.$urun[0].'"><button class="btn btn-simple" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit"></i> Sil</button></a></td>
											<td><form method="get" action="?artir"><input type="hidden" name="uuid" value="'.$urun[0].'"><input type="hidden" name="adet" value="'.$urun[4].'"><input type="text" name="artieksi"><a name="artir" href="?artir='.$urun[0].'"><button name="arti">+</button></a><a href="?eksilt='.$urun[0].'"><button name="eksi">-</button></a></form></td>
											</tr>';
										  
										
									}
									
									?>

                                        
                                    </tbody>
                                </table>
                            </div></div>
                               
                            </div>
                        </div>
                    </div>
					
<center><?=$alt;?></center>
<?php
if(isset($_GET['arti'])){
	$adeti=$_GET['adet'];
	$adeti1=$_GET['artieksi'];
$urunid=$_GET['uuid'];
	$toplam=$adeti+$adeti1;
$islem=mysql_query("update urunler set urunAdet='$toplam' where urunID=$urunid");
header("location:index.php");
	
}else if(isset($_GET['eksi'])){
		$adeti=$_GET['adet'];
	$adeti1=$_GET['artieksi'];
$urunid=$_GET['uuid'];
	$toplam=$adeti-$adeti1;
$islem=mysql_query("update urunler set urunAdet='$toplam' where urunID=$urunid");
	header("location:index.php");
	
}
?>
                            
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom.js"></script>
   <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

					</body>
</html>