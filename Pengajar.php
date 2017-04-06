<?php
//	include("Kelas.php");
	class Pengajar {
		/* Member variables */
		public static $lastPengajarId;
		public $pengajarId;
		public $name;
		public $kelasName;
		public $start;
		public $end; 
		public $days = array(0,1,1,1,1,1);

		public $currentRuang;
		public $currentStartTime;
		public $currentDay;
		public $isAssigned;

		/* Member functions */
		public function __construct($nm, $s, $e, $kls, $d1, $d2, $d3, $d4, $d5) {

			$this->name = $nm;
			$this->start = $s;
			$this->end = $e;
			$this->kelasName = $kls;
			$this->days[1] = $d1;
			$this->days[2] = $d2;
			$this->days[3] = $d3;
			$this->days[4] = $d4;
			$this->days[5] = $d5;
			$this->isAssigned = 0;
			$this->pengajarId = Pengajar::$lastPengajarId++;
		}


		function getId(){
			return $this->pengajarId;
		}
		
		function getName() {
			return $this->name;
		}

		function getStartTime(){
			return $this->start;
		}

		function getEndTime(){
			return $this->end;
		}
		
		function getKelasName() {
			return $this->kelasName;
		}
		
		function getCurrentRuang() {
			return $this->currentRuang;
		}
		
		function getCurrentStartTime() {
			return $this->currentStartTime;
		}
		
		function getCurrentDay() {
			return $this->currentDay;
		}
		
		//predikat
		function isDayAvail($i) {
			return $this->days[$i];
		}
		
		function isTimeAvail($b, $e) {
			return ($this->start <= $b && $b <= $this->end && $this->start <= $e && $e <= $this->end);
		}
		
		function isAvailable($day, $b, $e) {
			return isDayAvail($day) && isTimeAvail($b, $e);
		}
		
		function isAssigned() {
			return $this->isAssigned;
		}
	}
	
	Pengajar::$lastPengajarId = 0;
	
/*	$pengajar = new Pengajar("ade", 1, 2, 3, 1, 1, 1, 1, 1);
	echo $pengajar->getId();
	echo $pengajar->getName();
	echo $pengajar->getStartTime();
	echo $pengajar->getEndTime();
	echo $pengajar->isDayAvail(1);
	echo "\n";*/
?>
