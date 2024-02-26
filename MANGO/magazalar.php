<!doctype html>
<html lang="en">

<head>
	<title>MANGO</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="magaza.css">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js"
		integrity="sha512-MC1YbhseV2uYKljGJb7icPOjzF2k6mihfApPyPhEAo3NsLUW0bpgtL4xYWK1B+1OuSrUkfOTfhxrRKCz/Jp3rQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        </nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Anasayfa</span></a>
						</li>
						<li><a href="urunler.php" class=""><i class="lnr lnr-shirt"></i> <span>Ürünler</span></a></li>
						<li><a href="satislar.php" class=""><i class="lnr lnr-cart"></i> <span>Satışlar</span></a></li>
						<li><a href="magazalar.php" class=""><i class="lnr lnr-pushpin"></i> <span>Mağaza CR Oranı</span></a>
						</li>
						<li><a href="personeller.php" class=""><i class="lnr lnr-users"></i>
								<span>Kampanyalar</span></a></li>
						<li><a href="musteriler.php" class=""><i class="lnr lnr-smile"></i> <span>Potansiyel Müşteriler</span></a>
						</li>
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
					<div style="display: flex; justify-content:center;">
						<div class="cards text-white bg-primary mb-3"
							style="max-width: 30rem;position:relative;display:inline-block;margin-left: 0px;margin-bottom:50px;margin:40px;"">
							<div class=" card-header" style="text-align:center;">Aralık ayında en az satış yapan mağaza</div>
						<div class="card-body">
							<h5 class="card-title"></h5>
							<hr>
							<p class="card-text" style="text-align:center;">
								<?php


								$baglan = mysqli_connect("localhost", "root", "", "kds");
								$baglan->set_charset("utf8");
								$sql = "SELECT magazalar.magaza_ad, satislar.aralik from magazalar,satislar WHERE magazalar.magaza_id=satislar.magaza_id and satislar.aralik = (SELECT min(satislar.aralik) from satislar) GROUP BY magazalar.magaza_id;";
								$result1 = mysqli_query($baglan, $sql);


								while ($row = mysqli_fetch_array($result1)) {
									echo $row[0];
								}



								?>
							</p>
						</div>
					</div>
					<div class="cards text-white bg-primary mb-3"
							style="max-width: 30rem;position:relative;display:inline-block;margin-left: 0px;margin-bottom:50px;margin:40px;"">
							<div class=" card-header" style="text-align:center;">Aralık ayında en çok satış yapan mağaza</div>
						<div class="card-body">
							<h5 class="card-title"></h5>
							<hr>
							<p class="card-text" style="text-align:center;">
								<?php


								$baglan = mysqli_connect("localhost", "root", "", "kds");
								$baglan->set_charset("utf8");
								$sql = "SELECT magazalar.magaza_ad, satislar.aralik from magazalar,satislar WHERE magazalar.magaza_id=satislar.magaza_id and satislar.aralik = (SELECT MAX(satislar.aralik) from satislar) GROUP BY magazalar.magaza_id;";
								$result1 = mysqli_query($baglan, $sql);


								while ($row = mysqli_fetch_array($result1)) {
									echo $row[0];
								}



								?>
							</p>
						</div>
					</div>
				</div>
				<div class="main-content">
				<div class="container-fluid" style="display:block;">
					<div class="pieChart" style="margin-left: 25px;display:inline-block;float:left;">
						<html>
							<head>
							<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
							<script type="text/javascript">
								google.charts.load("current", {packages:['corechart']});
								google.charts.setOnLoadCallback(drawChart);
								function drawChart() {
								var data = google.visualization.arrayToDataTable([
									["Element", "Density", { role: "style" } ],
									["Karşıyaka Mağazası",<?php 		
									$baglan=mysqli_connect("localhost","root","","kds");
									$baglan->set_charset("utf8");
									$sql = "SELECT magazalar.magaza_ad,magaza_cr.cr_orani as cr_orani
									FROM magazalar,magaza_cr
									WHERE magazalar.magaza_id = magaza_cr.magaza_id AND magazalar.magaza_ad = 'Karşıyaka Mağaza';";
									$result1 = mysqli_query($baglan, $sql);
									while($row = mysqli_fetch_array($result1)){                                             
									echo $row["cr_orani"];
									}
									
									?>, "#c7afd2"],
									["Gaziemir Mağazası",<?php 		
									$baglan=mysqli_connect("localhost","root","","kds");
									$baglan->set_charset("utf8");
									$sql = "SELECT magazalar.magaza_ad,magaza_cr.cr_orani as cr_orani
									FROM magazalar,magaza_cr
									WHERE magazalar.magaza_id = magaza_cr.magaza_id AND magazalar.magaza_ad = 'Gaziemir Mağaza';";
									$result1 = mysqli_query($baglan, $sql);
									while($row = mysqli_fetch_array($result1)){                                             
									echo $row["cr_orani"];
									}
									
									?>, "#f6b4cb"],
									["Aliağa Mağazası",<?php 		
									$baglan=mysqli_connect("localhost","root","","kds");
									$baglan->set_charset("utf8");
									$sql = "SELECT magazalar.magaza_ad,magaza_cr.cr_orani as cr_orani
									FROM magazalar,magaza_cr
									WHERE magazalar.magaza_id = magaza_cr.magaza_id AND magazalar.magaza_ad = 'Aliğa Mağazası';";
									$result1 = mysqli_query($baglan, $sql);
									while($row = mysqli_fetch_array($result1)){                                             
									echo $row["cr_orani"];
									}
									
									?>, "#86E5FF"],
									
									
									
								]);

								var view = new google.visualization.DataView(data);
								view.setColumns([0, 1,
												{ calc: "stringify",
													sourceColumn: 1,
													type: "string",
													role: "annotation" },
												2]);

								var options = {
									title: "CR Oranı En Yüksek 3 Mağaza",
									width: 500,
									height: 350,
									bar: {groupWidth: "50%"},
									legend: { position: "none" },
								};
								var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
								chart.draw(view, options);
							}
							</script>
							</head>
							<body>
							<div id="columnchart_values" style=" box-shadow: 3px 7px #888888; width: 500px; height: 350px;"></div>
							</body>
						</html>
					</div>
					<div class="chart1" id="graph2" style="width:500px;height:350px; position:relative; float:left;margin-left: 25px;box-shadow: 3px 7px #888888;">
						<html>
						<head>
							<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
							<script type="text/javascript">
							google.charts.load("current", {packages:["corechart"]});
							google.charts.setOnLoadCallback(drawChart);
							function drawChart() {
							var data = google.visualization.arrayToDataTable([
								["Element", "Density", { role: "style" } ],
								["Buca Mağazası",<?php 		
									$baglan=mysqli_connect("localhost","root","","kds");
									$baglan->set_charset("utf8");
									$sql = "SELECT magazalar.magaza_ad,magaza_cr.cr_orani as cr_orani
									FROM magazalar,magaza_cr
									WHERE magazalar.magaza_id = magaza_cr.magaza_id AND magazalar.magaza_ad = 'Buca Mağazası';";
									$result1 = mysqli_query($baglan, $sql);
									while($row = mysqli_fetch_array($result1)){                                             
									echo $row["cr_orani"];
									}
									
									?>, "#DC0000"],
									["Bayraklı Mağazası",<?php 		
									$baglan=mysqli_connect("localhost","root","","kds");
									$baglan->set_charset("utf8");
									$sql = "SELECT magazalar.magaza_ad,magaza_cr.cr_orani as cr_orani
									FROM magazalar,magaza_cr
									WHERE magazalar.magaza_id = magaza_cr.magaza_id AND magazalar.magaza_ad = 'Bayraklı Mağaza';";
									$result1 = mysqli_query($baglan, $sql);
									while($row = mysqli_fetch_array($result1)){                                             
									echo $row["cr_orani"];
									}
									
									?>, "#FFC93C"],
									["Forum Bornova Mağazası",<?php 		
									$baglan=mysqli_connect("localhost","root","","kds");
									$baglan->set_charset("utf8");
									$sql = "SELECT magazalar.magaza_ad,magaza_cr.cr_orani as cr_orani
									FROM magazalar,magaza_cr
									WHERE magazalar.magaza_id = magaza_cr.magaza_id AND magazalar.magaza_ad = 'Forum Bornova Mağaza';";
									$result1 = mysqli_query($baglan, $sql);
									while($row = mysqli_fetch_array($result1)){                                             
									echo $row["cr_orani"];
									}
									
									?>, "#86E5FF"],
									
									
							]);

							var view = new google.visualization.DataView(data);
							view.setColumns([0, 1,
											{ calc: "stringify",
												sourceColumn: 1,
												type: "string",
												role: "annotation" },
											2]);

							var options = {
								title: "CR Oranı En Düşük Olan 3 Mağaza",
								width: 500,
								height: 350,
								bar: {groupWidth: "65%"},
								legend: { position: "none" },
							};
							var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
							chart.draw(view, options);
						}
						</script>
						
						</head>
						<body>
							<div id="barchart_values" style="width: 500px; height: 350px;"></div>
						</body>
						</html>
					</div>
				</div>

				
					
				</div>




			</div>
		</div>
		<!-- END MAIN CONTENT -->
	</div>
	<!-- END MAIN -->

	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
</body>

<script>
	function getIlceler() {
		let ilId = document.getElementById("selectIller").value;
		let divIlce = document.getElementById("divIlce");
		let selectIlce = document.getElementById("selectIlce");
		let divMagaza = document.getElementById("divMagaza");

		$.ajax({
			url: "./magazalar1.php",
			type: "GET",
			data: {
				ilId: ilId
			},
			success: function (response) {
				$('#selectIlce option:not(:first)').remove();
				ilceler = JSON.parse(response);
				ilceler.forEach(element => {
					selectIlce.add(new Option(element.ilce_ad, element.ilce_id));
				});

				divIlce.style.display = "block";
				divMagaza.style.display = "block";
			}

		});

	}

	function magazaEkle() {
		let selectIller = document.getElementById("selectIller");
		let selectIlce = document.getElementById("selectIlce");
		let inputMagazaAdi = document.getElementById("inputMagazaAdi");

		$.ajax({
			url: "./magazalar1.php",
			data: {
				ilId: selectIller.value,
				ilceId: selectIlce.value,
				magazaAdi: inputMagazaAdi.value
			},
			type: "POST",
			success: function (response) {
				if (response != 1) {
					alert(response);
				} else {
					window.location.reload();
				}
			}
		});
	}
</script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
	integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</html>