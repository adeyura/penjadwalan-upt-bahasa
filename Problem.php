<?php
	include('Pengajar.php');
	include('Kelas.php');
	include('Ruang.php');
	class Problem {
		/* Member variables */
		public $nRooms;
		public $nCourses;
		public $rooms;
		public $courses;
		public $teachers;

		/* Member functions */
		public function __construct() {
			/*** BACA DATA PENGAJAR ***/
			$dataPengajar = $_FILES['dataPengajar']['tmp_name'];
			$arrayPengajar = array();
			$handle = fopen($dataPengajar, "r");
			if ($handle) {
				while (($line = fgets($handle)) !== false) {
					$arrayPengajar[] = array($line);
				}
			}
			fclose($handle);
			
			foreach ($arrayPengajar as $pengajar) {
				$pengajarDetail = explode(";", $pengajar[0]);
//				print_r($pengajarDetail);
				$this->teachers[] = new Pengajar($pengajarDetail[0], $pengajarDetail[1], $pengajarDetail[2], $pengajarDetail[3],
							$pengajarDetail[4], $pengajarDetail[5], $pengajarDetail[6], $pengajarDetail[7], $pengajarDetail[8]);
			}
			print_r($this->teachers);
			echo "<br><br>";
			
			
			/**** BACA DATA KELAS KURSUS ****/
			$dataKelasKursus = $_FILES['dataKelasKursus']['tmp_name'];
			$arrayKelasKursus = array();
			$handle = fopen($dataKelasKursus, "r");
			if ($handle) {
				while (($line = fgets($handle)) !== false) {
					$arrayKelasKursus[] = array($line);
				}
			}
			fclose($handle);
			
			foreach ($arrayKelasKursus as $kelasKursus) {
				$kelasKursusDetail = explode(";", $kelasKursus[0]);
//				print_r($kelasKursusDetail);
				$this->courses[] = new Kelas($kelasKursusDetail[0], $kelasKursusDetail[1], $kelasKursusDetail[2], $kelasKursusDetail[3],
								$kelasKursusDetail[4], $kelasKursusDetail[5], $kelasKursusDetail[6], $kelasKursusDetail[7]);
			}
			print_r($this->courses);
			
			echo "<br><br>";
			
			/**** BACA DATA RUANG ***/
			$dataRuang = $_FILES['dataRuang']['tmp_name'];
			$arrayRuang = array();
			$handle = fopen($dataRuang, "r");
			if ($handle) {
				while (($line = fgets($handle)) !== false) {
					$arrayRuang[] = array($line);
				}
			}
			fclose($handle);
			
			foreach ($arrayRuang as $ruang) {
				$ruangDetail = explode(";", $ruang[0]);
//				print_r($ruangDetail);
				$this->rooms[] = new Ruang($ruang[0]);
			}
			print_r($this->rooms);
			
			echo "<br><br>";
		}
	}
	
	$problem = new Problem;
?>