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

	$list = array
	(
		"JADWAL PEMBAGIAN KELAS",
		"UPT Pusat Bahasa ITB",
	);
	
	/**** Baris daftar ruang ******/
	$string = "Time Day";
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$string .= ",".substr((string)$row['nama'], 0, -2);
		}
	} else {
		//echo "0 results";
	}
//	echo $string;
	$list[] = $string;

	
	


	/*********** SENIN **********/
	$list[] = "Senin";
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "07.00-09.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 7 OR end = 9)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "09.00-10.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 9 OR end = 10.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "10.30-12.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 10.5 OR end = 12)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "13.30-15.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 13.5 OR end = 15)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "15.00-16.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 15 OR end = 16.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "16.30-18.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 16.5 OR end = 18)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "18.30-20.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 18.5 OR end = 20)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;

	
	/*********** SELASA **********/
	$list[] = "Selasa";
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "07.00-09.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 7 OR end = 9)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "09.00-10.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 9 OR end = 10.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "10.30-12.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 10.5 OR end = 12)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "13.30-15.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 13.5 OR end = 15)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "15.00-16.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 15 OR end = 16.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "16.30-18.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 16.5 OR end = 18)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "18.30-20.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 18.5 OR end = 20)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;	
	
	
	/*********** RABU **********/
	$list[] = "Rabu";
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "07.00-09.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 7 OR end = 9)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "09.00-10.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 9 OR end = 10.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "10.30-12.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 10.5 OR end = 12)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "13.30-15.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 13.5 OR end = 15)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "15.00-16.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 15 OR end = 16.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "16.30-18.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 16.5 OR end = 18)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "18.30-20.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND senin = 1 AND (start = 18.5 OR end = 20)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;	
	
	
	/*********** KAMIS **********/
	$list[] = "Kamis";
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "07.00-09.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 7 OR end = 9)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "09.00-10.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 9 OR end = 10.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "10.30-12.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 10.5 OR end = 12)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "13.30-15.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 13.5 OR end = 15)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "15.00-16.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 15 OR end = 16.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "16.30-18.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 16.5 OR end = 18)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "18.30-20.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND selasa = 1 AND (start = 18.5 OR end = 20)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	
	/*********** JUMAT **********/
	$list[] = "Jumat";
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "07.00-09.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 7 OR end = 9)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "09.00-10.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 9 OR end = 10.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "10.30-12.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 10.5 OR end = 12)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "13.30-15.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 13.5 OR end = 15)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "15.00-16.30";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 15 OR end = 16.5)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "16.30-18.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 16.5 OR end = 18)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;
	
	$sql = "SELECT * FROM ruang ORDER BY nama";
	$result = $conn->query($sql);
	$string = "18.30-20.00";
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$nama_ruang = $row['nama'];
			$sql = "SELECT nama_kelas FROM jadwal WHERE nama_ruang = '$nama_ruang' AND jumat = 1 AND (start = 18.5 OR end = 20)";
			$result2 = $conn->query($sql);
			if ($result2->num_rows > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$string .= ",".$row2['nama_kelas'];
				}
			} else {
				$string .= ",";
			}
		}
	} else {
		//echo "0 results";
	}	
	$list[] = $string;	
	
	
	$file = fopen("jadwal.csv","w");

	foreach ($list as $line)
	{
		fputcsv($file,explode(',',$line));
	}

	fclose($file);
	mysqli_close($conn)
?>