<?php
	class Kelas {
		/* Member variables */
		public static $lastKelasId;
		public $kelasId;
		public $name;
		public $defaultstart;
		public $defaultend;
		public $defaultdays = array(0,1,1,1,1,1);
		
		public $currentPengajar;
		public $currentRuang;

		/* Member functions */
		public function __construct($nm, $s, $e, $d1, $d2, $d3, $d4, $d5) {
			$this->name = $nm;
			$this->defaultstart = $s;
			$this->defaultend = $e;
			$this->defaultdays[1] = $d1;
			$this->defaultdays[2] = $d2;
			$this->defaultdays[3] = $d3;
			$this->defaultdays[4] = $d4;
			$this->defaultdays[5] = $d5;
			$this->kelasId = Kelas::$lastKelasId++;
		}


		function getId(){
			return $this->kelasId;
		}
		
		function getName() {
			return $this->name;
		}
		
		function getStartTime(){
			return $this->defaultstart;
		}
		function getEndTime(){
			return $this->defaultend;
		}
		
		function getCurrentPengajar() {
			return $this->currentPengajar;
		}
		
		function getCurrentRuang() {
			return $this->currentRuang;
		}
		
		//predikat
		function isDayDefault($i) {
			return $this->defaultdays[$i];
		}
		
		function isTimeDefault($b, $e) {
			return ($this->defaultstart <= $b && $b <= $this->defaultend && $this->defaultstart <= $e && $e <= $this->defaultend);
		}
		
		function isDefault($day, $b, $e) {
			return isDayDefault($day) && isTimeDefault($b, $e);
		}
	}
	
	Kelas::$lastKelasId = 0;
/*	
	$kelas = new Kelas("waw");
	echo $kelas->getId();
	echo $kelas->getName();
	
	$kelos = new Kelas("wew");
	echo $kelos->getId();
	echo $kelos->getName();*/
?>
