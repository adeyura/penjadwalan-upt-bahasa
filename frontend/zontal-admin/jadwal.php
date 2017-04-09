<!DOCTYPE html>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "penjadwalan_upt";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
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
    <title>Sistem Penjadwalan UPT Pusat Bahasa ITB</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>


		
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">


            <div class="left-div">
                <div class="user-settings-wrapper">
                 
						<h2 style="color: white; text-align: left;">SISTEM PENJADWALAN KURSUS</h2>
						<h3 style="color: white">UPT PUSAT BAHASA ITB</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a  href="index.php">Dashboard</a></li>
                            <li><a class="menu-top-active" href="jadwal.php">Jadwal</a></li>
                            <li><a href="daftarpengajar.php">Daftar Pengajar</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Jadwal Kursus</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->

 <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
		
								<style type="text/css">
								.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
								.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
								.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
								.tg .tg-uqo3{background-color:#efefef;text-align:center;vertical-align:top}
								.tg .tg-j53q{background-color:#c0c0c0;color:#c0c0c0;vertical-align:top}
								.tg .tg-ipa1{font-weight:bold;background-color:#c0c0c0;text-align:center}
								.tg .tg-9tyi{font-weight:bold;font-family:serif !important;;background-color:#9b9b9b;text-align:center}
								.tg .tg-465v{font-weight:bold;background-color:#9b9b9b;text-align:center}
								.tg .tg-pykm{font-weight:bold;background-color:#9b9b9b;text-align:center;vertical-align:top}
								.tg .tg-le8v{background-color:#c0c0c0;vertical-align:top}
								.tg .tg-j4kc{background-color:#efefef;text-align:center}
								.tg .tg-yw4l{vertical-align:top}
								.tg .tg-5mgg{font-weight:bold;background-color:#c0c0c0;vertical-align:top}
								h1, h2 {text-align: center}
								</style>
								
								<h1>Jadwal Kursus UPT Pusat Bahasa ITB</h1>
								<h2>Periode Januari - Maret 2017</h2>
								<br>
								<table class="tg">
								  <tr>
									<th class="tg-9tyi">Time<br>Day</th>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
									?>
												<th class="tg-465v"><?php echo "ROOM "; echo $row['nama']; ?></th>
									<?php	}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-ipa1">Senin</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
									?>
												<td class="tg-le8v"></td>
									<?php	}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">07.00-09.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 7 OR end = 9)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">09.00-10.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 9 OR end = 10.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">10.30-12.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 10.5 OR end = 12)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">13.30-15.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 13.5 OR end = 15)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">15.00-16.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 15 OR end = 16.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">16.30-18.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 16.5 OR end = 18)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">18.30-20.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 18.5 OR end = 20)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-ipa1">Selasa</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
									?>
												<td class="tg-le8v"></td>
									<?php	}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">07.00-09.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 7 OR end = 9)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">09.00-10.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 9 OR end = 10.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">10.30-12.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 10.5 OR end = 12)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">13.30-15.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 13.5 OR end = 15)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">15.00-16.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 15 OR end = 16.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">16.30-18.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 16.5 OR end = 18)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">18.30-20.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 18.5 OR end = 20)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-ipa1">Rabu</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
									?>
												<td class="tg-le8v"></td>
									<?php	}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">07.00-09.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 7 OR end = 9)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">09.00-10.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 9 OR end = 10.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">10.30-12.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 10.5 OR end = 12)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">13.30-15.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 13.5 OR end = 15)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">15.00-16.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 15 OR end = 16.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">16.30-18.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 16.5 OR end = 18)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">18.30-20.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 18.5 OR end = 20)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-ipa1">Kamis</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
									?>
												<td class="tg-le8v"></td>
									<?php	}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">07.00-09.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 7 OR end = 9)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">09.00-10.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 9 OR end = 10.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">10.30-12.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 10.5 OR end = 12)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">13.30-15.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 13.5 OR end = 15)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">15.00-16.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 15 OR end = 16.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">16.30-18.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 16.5 OR end = 18)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">18.30-20.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 18.5 OR end = 20)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-ipa1">Jumat</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
									?>
												<td class="tg-le8v"></td>
									<?php	}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">07.00-09.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 7 OR end = 9)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">09.00-10.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 9 OR end = 10.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">10.30-12.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 10.5 OR end = 12)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">13.30-15.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 13.5 OR end = 15)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">15.00-16.30</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 15 OR end = 16.5)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">16.30-18.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 16.5 OR end = 18)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								  <tr>
									<td class="tg-j4kc">18.30-20.00</td>
									<?php
										$sql = "SELECT * FROM ruang ORDER BY nama";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
												$nama_ruang = $row['nama'];
												$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 18.5 OR end = 20)";
												$result2 = $conn->query($sql);
												if ($result2->num_rows > 0) {
													while($row2 = $result2->fetch_assoc()) {
									?>
														<td class="tg-yw4l"><?php echo $row2['nama_kelas']; ?></td>
									<?php			}
												} else {
									?>
														<td class="tg-yw4l"></td>
									<?php
												}
											}
										} else {
											//echo "0 results";
										}
									?>
								  </tr>
								</table>
                      
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>

                </div>
            </div>
</div>
                </div>
            </div>

        </div>
    </div>
    <div>
		<a href="index.php" class="btn btn-danger btn-lg" style="margin-left:450px"><span class="glyphicon glyphicon-arrow-left"></span> Kembali </a>&nbsp;
                      <a href="daftarpengajar.php" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-user"></span>  Lihat Daftar Pengajar </a>
                      <button onclick="myFunction()" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-save-file"></span>  Cetak </button>
    </div>
    <br>
    
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 IF 2014 C1-G12 | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script>
		function myFunction() {
			$.ajax({ url: "saveascsv.php", data: { foo: 'boo' }, success: function(data){
			  // use this if you want to process the returned data
			   alert(data + " berhasil diunduh");
			}});
		}
    </script>
</body>
</html>
