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

		public $idChangedKelas;
		public $idOldPengajar;
		public $idOldRuang;
		public $idNewPengajar;
		public $idNewRuang;
		
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
				$pengajarDetail = explode(",", $pengajar[0]);
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
				$kelasKursusDetail = explode(",", $kelasKursus[0]);
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
				$ruangDetail = explode(",", $ruang[0]);
//				print_r($ruangDetail);
				$this->rooms[] = new Ruang($ruang[0]);
			}
			print_r($this->rooms);
			
			echo "<br><br>";
			
			$this->idChangedKelas = 0;
			$this->idOldPengajar = 0;
			$this->idOldRuang = 0;
			$this->idNewPengajar = 0;
			$this->idNewRuang = 0;
		}
		
		public function initByRandom() {
			$teacherName = array();;
			
			// ambil nama semua data pengajar
	/*		foreach ($this->teachers as $teacher) {
				if(!in_array($teacher->getName(), $teacherName)) {
					$teacherName[] = $teacher->getName();
				}
			}
			print_r($teacherName);*/
			
			foreach ($this->courses as $course) {
				$i = null;
				// Set Pengajar
				do {
					$valid = true;
					do {
						do {
							$i = rand(0, count($this->teachers) - 1);
						} while ($this->teachers[$i]->isAssigned == 1);
						
					} while (!(strpos($course->getName(), $this->teachers[$i]->getKelasName()) !== false)
						|| !($this->teachers[$i]->isTimeAvail($course->getStartTime(), $course->getEndTime())));
					// berhenti sampai nama kelas sama dan waktu mengajar memenuhi	
					
					foreach ($course->defaultdays as $key=>$val) {
						if($val == 1) {
							if(!$this->teachers[$i]->isDayAvail($key)) {

								$valid = false;
								// tidak valid jika guru tersebut tidak available saat jam kursus
							}
						}
					}
				} while (!$valid);
				
				$course->currentPengajar = $this->teachers[$i]->getId();
				$this->teachers[$i]->isAssigned = 1;
				
				
				
				// Set Ruang
				$j = array_rand($this->rooms);
				$course->currentRuang = $this->rooms[$j]->getName();
				
			}
			
			foreach ($this->courses as $course) {
				echo $course->getName();
				echo " ";
				echo $course->getCurrentRuang();
				echo " ";
				echo $this->teachers[$course->getCurrentPengajar()]->getName();
				echo "<br>";
			}
			echo "<br>";
		}
		
		public function solve($temperature, $descentRate, $n, $maxSteps) {
			$this->initByRandom();
			$stepCounter = 0;
			$problem = $this;
			$tempEvalValue = $this->countConflictCourses();
			
			while($tempEvalValue > 0 && $stepCounter++ < $maxSteps) {
				foreach ($this->courses as $course) {
					echo $course->getName();
					echo " ";
					echo $course->getCurrentRuang();
					echo " ";
					echo $this->teachers[$course->getCurrentPengajar()]->getName();
					echo "<br>";
				}
				echo "Nilai Eval ";
				echo $tempEvalValue;
				echo "<br><br>";
				for($i = 0; $i < $n; $i++) {
					$this->modifySolution(); // temporary
					$newEvalValue = 0;
					$newEvalValue = $this->countConflictCourses();
					$deltaEval = $newEvalValue - $tempEvalValue;
					if($deltaEval < 0) {
						$tempEvalValue = $this->countConflictCourses();
					} else if (exp(-$deltaEval/max(0.00000001, $temperature)) > ((float) mt_rand() / (float) mt_getrandmax())) {
						$tempEvalValue = $this->countConflictCourses();
					} else {
						$this->courses[$this->idChangedKelas]->currentPengajar = $this->idOldPengajar;
						$this->courses[$this->idChangedKelas]->currentRuang = $this->idOldRuang;
					}
					if ($tempEvalValue == 0) break;
				}
				$temperature = $temperature - $descentRate;
			}
			foreach ($this->courses as $course) {
				echo $course->getName();
				echo " ";
				echo $course->getCurrentRuang();
				echo " ";
				echo $this->teachers[$course->getCurrentPengajar()]->getName();
				echo "<br>";
			}
			echo "Nilai Eval ";
			echo $tempEvalValue;
			echo "<br><br>";
		}
		
		public function modifySolution() {
			$this->idChangedKelas = rand(0, count($this->courses) - 1);
//			if($p->courses[$j]->getCurrentPengajar() != null) {
				$this->teachers[$this->courses[$this->idChangedKelas]->getCurrentPengajar()]->isAssigned = 0;
//			}
			$this->idOldPengajar = $this->courses[$this->idChangedKelas]->getCurrentPengajar();
			$this->idOldRuang = $this->courses[$this->idChangedKelas]->getCurrentRuang();
			
			$i = null;
			// Set Pengajar
			do {
				$valid = true;
				do {
					do {
						$i = rand(0, count($this->teachers) - 1);
					} while ($this->teachers[$i]->isAssigned == 1);
					
				} while (!(strpos($this->courses[$this->idChangedKelas]->getName(), $this->teachers[$i]->getKelasName()) !== false)
					|| !($this->teachers[$i]->isTimeAvail($this->courses[$this->idChangedKelas]->getStartTime(), $this->courses[$this->idChangedKelas]->getEndTime())));
				// berhenti sampai nama kelas sama dan waktu mengajar memenuhi	
				
				foreach ($this->courses[$this->idChangedKelas]->defaultdays as $key=>$val) {
					if($val == 1) {
						if(!$this->teachers[$i]->isDayAvail($key)) {

							$valid = false;
							// tidak valid jika guru tersebut tidak available saat jam kursus
						}
					}
				}
			} while (!$valid);
			
			$this->courses[$this->idChangedKelas]->currentPengajar = $this->teachers[$i]->getId();
			$this->teachers[$i]->isAssigned = 1;
						
			// Set Ruang
			$j = array_rand($this->rooms);
			$this->courses[$this->idChangedKelas]->currentRuang = $this->rooms[$j]->getName();
		
			$idNewPengajar = $this->courses[$this->idChangedKelas]->getCurrentPengajar();
			$idNewRuang = $this->courses[$this->idChangedKelas]->getCurrentRuang();
		/*
			foreach ($this->courses as $course) {
				echo $course->getName();
				echo " ";
				echo $course->getCurrentRuang();
				echo " ";
				echo $course->getCurrentPengajar();
				echo "<br>";
			}*/
		}
		
		public function countConflictCourses() {
			$count = 0;
			for($i = 0; $i < count($this->courses)-1; $i++) {
				for($j = $i+1; $j < count($this->courses); $j++) {
					if($this->courses[$i]->getCurrentRuang() != null && $this->courses[$j]->getCurrentRuang() != null && $this->courses[$i]->getCurrentRuang() == $this->courses[$j]->getCurrentRuang()) {
						$countSameDay = 0;
						for($k = 1; $k <= 5; $k++) {
							if($this->courses[$i]->isDayDefault($k) == 1 && $this->courses[$j]->isDayDefault($k) == 1) {
								$countSameDay++;
							} 
						}
						$maks = max($this->courses[$i]->getStartTime(), $this->courses[$j]->getStartTime());
						$minim = min($this->courses[$i]->getEndTime(), $this->courses[$j]->getEndTime());
						if($maks <= $minim) {
							$count += $countSameDay * ($minim - $maks);
						}
					}
				}
			}
			return $count;
		}
		
		public function saveToDatabase() {
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
			
			
			/***** TABEL PENGAJAR ****/
			mysqli_query($conn,'TRUNCATE TABLE pengajar');
			foreach($this->teachers as $teacher) {		
				$sql = $conn->prepare("INSERT INTO pengajar (nama, nama_kelas, start, end, senin, selasa, rabu, kamis, jumat)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)") ;
				
				$sql->bind_param("ssddiiiii", $nama, $nama_kelas, $start, $end, $senin, $selasa, $rabu, $kamis, $jumat);
				
				$nama = $teacher->getName();
				$nama_kelas = $teacher->getKelasName();
				$start = $teacher->getStartTime();
				$end = $teacher->getEndTime();
				$senin = $teacher->isDayAvail(1);
				$selasa = $teacher->isDayAvail(2);
				$rabu = $teacher->isDayAvail(3);
				$kamis = $teacher->isDayAvail(4);
				$jumat = $teacher->isDayAvail(5);
				
				$sql->execute();
				
			}
			
			/****** TABEL KELAS *********/
			mysqli_query($conn,'TRUNCATE TABLE kelas');
			foreach($this->courses as $course) {		
				$sql = $conn->prepare("INSERT INTO kelas (nama, start, end, senin, selasa, rabu, kamis, jumat)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)") ;
				
				$sql->bind_param("sddiiiii", $nama, $start, $end, $senin, $selasa, $rabu, $kamis, $jumat);
				
				$nama = $course->getName();
				$start = $course->getStartTime();
				$end = $course->getEndTime();
				$senin = $course->isDayDefault(1);
				$selasa = $course->isDayDefault(2);
				$rabu = $course->isDayDefault(3);
				$kamis = $course->isDayDefault(4);
				$jumat = $course->isDayDefault(5);
				
				$sql->execute();
				
			}
			
			/****** TABEL RUANG *****/
			mysqli_query($conn,'TRUNCATE TABLE ruang');
			foreach($this->rooms as $room) {		
				$sql = $conn->prepare("INSERT INTO ruang (nama)
				VALUES (?)") ;
				
				$sql->bind_param("s", $nama);
				
				$nama = $room->getName();
				
				$sql->execute();
				
			}			

			mysqli_query($conn,'TRUNCATE TABLE jadwal');
			foreach($this->courses as $course) {		
				$sql = $conn->prepare("INSERT INTO jadwal (nama_kelas, nama_pengajar, nama_ruang, start, end, senin, selasa, rabu, kamis, jumat)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") ;
				
				$sql->bind_param("sssddiiiii", $nama_kelas, $nama_pengajar, $nama_ruang, $start, $end, $senin, $selasa, $rabu, $kamis, $jumat);
				
				$nama_kelas = $course->getName();
				$nama_pengajar = $this->teachers[$course->getCurrentPengajar()]->getName();
				$nama_ruang = $course->getCurrentRuang();
				$start = $course->getStartTime();
				$end = $course->getEndTime();
				$senin = $course->isDayDefault(1);
				$selasa = $course->isDayDefault(2);
				$rabu = $course->isDayDefault(3);
				$kamis = $course->isDayDefault(4);
				$jumat = $course->isDayDefault(5);
				
				$sql->execute();
				
			}	
			
			mysqli_close($conn);
		}
	}
	
	$problem = new Problem;
	$problem->solve(1, 0.002, 10, 600);
	$problem->saveToDatabase();
?>