<!doctype html>
<html lang="en">

<head>
	<style>
        /* personeller.php içinde label etiketleri için stil tanımı */
        label {
            color: #333; /* veya istediğiniz renk değeri */
        }
    </style>


	<title>MANGO</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<!-- MAIN CSS -->
	
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js" integrity="sha512-MC1YbhseV2uYKljGJb7icPOjzF2k6mihfApPyPhEAo3NsLUW0bpgtL4xYWK1B+1OuSrUkfOTfhxrRKCz/Jp3rQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
			<a href="index.php"><img src="fotoğraflar/mavi.jpg" alt="Mavi" class="mavi-resim"></a>
                </a>
            </div>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Anasayfa</span></a></li>
						<li><a href="urunler.php" class=""><i class="lnr lnr-shirt"></i> <span>Ürünler</span></a></li>
						<li><a href="satislar.php" class=""><i class="lnr lnr-cart"></i> <span>Satışlar</span></a></li>
						<li><a href="magazalar.php" class=""><i class="lnr lnr-pushpin"></i> <span>Mağaza CR Oranı</span></a></li>
						<li><a href="personeller.php" class=""><i class="lnr lnr-users"></i> <span>Kampanyalar</span></a></li>
						<li><a href="musteriler.php" class=""><i class="lnr lnr-smile"></i> <span>Potansiyel Müşteriler</span></a></li>
						<li><a href="Login.php" class=""><i class="lnr lnr-exit-up"></i> <span>Çıkış</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid" style="display: inline-block;">
					
				<div class="urunler-list" style="display:flex; width:1100px; text-align: center; justify-content: center;">
					<div style="margin-top: 50px;justify-content: center; padding:20px;display:flex; ">
						<?php 
						
						$baglan=mysqli_connect("localhost","root","","kds");
						$baglan->set_charset("utf8");
						$resultSet = mysqli_query($baglan,"SELECT kampanyalar.kampanya_ad AS kampanya_ad,SUM(kampanya_kullanim.ekim+kampanya_kullanim.kasim+kampanya_kullanim.aralik+kampanya_kullanim.ocak+kampanya_kullanim.subat+kampanya_kullanim.mart) AS alti_aylik_toplam_kullanim
						FROM kampanyalar,kampanya_kullanim
						WHERE kampanyalar.kampanya_id = kampanya_kullanim.kampanya_id
						GROUP BY kampanyalar.kampanya_id;") ;    
					
						echo "<table border=2 style='width:800px; text-align: center;background-color:#A4BE7B;'>";
						echo    "
						<tr style='color:black;'>
							<th style='text-align: center; color:black;'>Kampanya Adı</th>
							<th style='text-align: center; color:black;'>Altı Aylık Toplam Kullanım</th>
							<th style='text-align: center; color:black;'>Öneri</th>
							
						</tr>
						
						
						
						
						";
						if(mysqli_num_rows($resultSet)>0){
							while($row=mysqli_fetch_assoc($resultSet)){
								$oneri = "";
								if((int) $row["alti_aylik_toplam_kullanim"] >= 1500){
									$oneri = "Kampanyanın Reklamını Yap";
								}else{
									$oneri = "Kampanyanın Reklamını Azalt";
								}
								$sayi1 = substr($row["alti_aylik_toplam_kullanim"],0,2);
								$sayi2 = substr($row["alti_aylik_toplam_kullanim"],2,3);         
								echo "<tr style='text-align: center; color:black;'>";
								echo "<td>".$row["kampanya_ad"]."</td>"."<td>".$sayi1.".".$sayi2."</td>"."<td>".$oneri."</td>";
								echo "</tr>";
							}
						}
						echo "</table>";
								
						
						?>
					</div>	
				</div>
				<div class="urunler-list" style="display:flex; width:1100px; text-align: center; justify-content: center">
					<div style="margin-top: 50px;justify-content: center; padding:20px;display:flex; " >
						<?php 
						
						$baglan=mysqli_connect("localhost","root","","kds");
							$baglan->set_charset("utf8");
							$resultSet = mysqli_query($baglan,"SELECT kampanyalar.kampanya_ad AS kampanya_ad,kampanya_kullanim.ekim AS ekim,kampanya_kullanim.kasim AS kasim,kampanya_kullanim.aralik AS aralik,kampanya_kullanim.ocak,kampanya_kullanim.subat,kampanya_kullanim.mart
							FROM kampanyalar,kampanya_kullanim
							WHERE kampanyalar.kampanya_id = kampanya_kullanim.kampanya_id;") ;    
						
							echo "<table border=2 style='width:800px; height:500px;text-align: center;'>";
							echo    "
							<tr>
								<th style='text-align: center; color:black;'>Kampanya ADI</th>
								<th style='text-align: center; color:black;'>Ekim</th>
								<th style='text-align: center; color:black;'>Kasım</th>
								<th style='text-align: center; color:black;'>Aralık</th>
								<th style='text-align: center; color:black;'>Ocak</th>
								<th style='text-align: center; color:black;'>Şubat</th>
								<th style='text-align: center; color:black;'>Mart</th>
								
								
							</tr>
							
							
							
							
							";
							if(mysqli_num_rows($resultSet)>0){
								while($row=mysqli_fetch_assoc($resultSet)){
									echo "<tr>";
									echo "<td>".$row["kampanya_ad"]."</td>"."<td>".$row["ekim"]."</td>"."<td>".$row["kasim"]."</td>"."<td>".$row["aralik"]."</td>"."<td>".$row["ocak"]."</td>"."<td>".$row["subat"]."</td>"."<td>".$row["mart"]."</td>";
									echo "</tr>";
								}
							}
							echo "</table>";
								
						
						?>
					</div>	
				</div>
				<div class="formdiv" style="margin-top: 50px;justify-content: center; padding:20px;display:flex;">
				<iframe src="https://www.google.com/maps/d/u/0/embed?mid=18rvQ6GIYXYAkP5CaFhqu_ppFZHH_OXE&ehbc=2E312F" width="640" height="480"></iframe>

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
</body>

</html>
