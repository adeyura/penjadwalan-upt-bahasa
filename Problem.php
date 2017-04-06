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
				echo $course->getCurrentPengajar();
				echo "<br>";
			}
		}
		
		public function solve($temperature, $descentRate, $n, $maxSteps) {
			$this->initByRandom();
			$stepCounter = 0;
			$problem = $this;
			$tempEvalValue = $this->countConflictCourses();
			
			while($tempEvalValue > 0 && $stepCounter++ < $maxSteps) {
				echo "Eval ";
				echo $tempEvalValue;
				echo "<br>";
				for($i = 0; $i < $n; $i++) {
					$tempSolution = $this->modifySolution($this);
					$newEvalValue = 0;
					if($tempSolution != null) {
						$newEvalValue = $tempSolution->countConflictCourses();
					}
					$deltaEval = $newEvalValue - $tempEvalValue;
					if($deltaEval < 0) {
						$name = 'this';
						$$name = $tempSolution;
						$tempEvalValue = $this->countConflictCourses();
					} else if (exp(-$deltaEval/max(0.0, $temperature)) > ((float) mt_rand() / (float) mt_getrandmax())) {
						$name = 'this';
						$$name = $tempSolution;
						$tempEvalValue = $this->countConflictCourses();
					}
					if ($tempEvalValue == 0) break;
				}
				$temperature = $temperature - $descentRate;
			}
		}
		
		public function modifySolution($p) {
			$j = rand(0, count($p->courses) - 1);
			if($p->courses[$j]->getCurrentPengajar() != null) {
				$p->teachers[$p->courses[$j]->getCurrentPengajar()]->isAssigned = 0;
			}
			
			
			$i = null;
			
			
			// Set Pengajar
			do {
				$valid = true;
				do {
					do {
						$i = rand(0, count($p->teachers) - 1);
					} while ($p->teachers[$i]->isAssigned == 1);
					
				} while (!(strpos($p->courses[$j]->getName(), $p->teachers[$i]->getKelasName()) !== false)
					|| !($p->teachers[$i]->isTimeAvail($p->courses[$j]->getStartTime(), $p->courses[$j]->getEndTime())));
				// berhenti sampai nama kelas sama dan waktu mengajar memenuhi	
				
				foreach ($p->courses[$j]->defaultdays as $key=>$val) {
					if($val == 1) {
						if(!$p->teachers[$i]->isDayAvail($key)) {

							$valid = false;
							// tidak valid jika guru tersebut tidak available saat jam kursus
						}
					}
				}
			} while (!$valid);
			
			$p->courses[$j]->currentPengajar = $p->teachers[$i]->getId();
			$p->teachers[$i]->isAssigned = 1;
			
			
			
			// Set Ruang
			$j = array_rand($p->rooms);
			$p->courses[$j]->currentRuang = $p->rooms[$j]->getName();

			foreach ($p->courses as $course) {
				echo $course->getName();
				echo " ";
				echo $course->getCurrentRuang();
				echo " ";
				echo $course->getCurrentPengajar();
				echo "<br>";
			}
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
						$maks = max($this->courses[$i]->getStartTime(), $this->courses[$i]->getStartTime());
						$minim = min($this->courses[$i]->getEndTime(), $this->courses[$i]->getEndTime());
						if($maks <= $minim) {
							$count += $countSameDay * ($minim - $maks);
						}
					}
				}
			}
			return $count;
		}
	}
	
	$problem = new Problem;
	$problem->solve(1, 0.002, 100, 600);
?>