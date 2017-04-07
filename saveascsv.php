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
	echo $string;
	$list[] = $string;

	$file = fopen("jadwal.csv","w");

	foreach ($list as $line)
	{
		fputcsv($file,explode(',',$line));
	}

	fclose($file);
	mysqli_close($conn)
?>