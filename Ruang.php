<?php
	class Ruang {
		/* Member variables */
		public static $lastRuangId;
		public $ruangId;
		public $ruangName;
		public $start;
		public $end; 
		public $days = array(1,1,1,1,1,1);

		/* Member functions */
		public function __construct($nm, $s, $e, $d1, $d2, $d3, $d4, $d5) {

			$this->name = $nm;
			$this->start = $s;
			$this->end = $e;
			$this->days[1] = $d1;
			$this->days[2] = $d2;
			$this->days[3] = $d3;
			$this->days[4] = $d4;
			$this->days[5] = $d5;
			$this->ruangId = Ruang::$lastRuangId;
		}


		function getId(){
			return $this->ruangId;
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
	}
	
	Ruang::$lastRuangId = 1;
	
	$ruang = new Ruang("7602", 1, 2, 1, 1, 1, 1, 1);
	echo $ruang->getId();
	echo $ruang->getName();
	echo $ruang->getStartTime();
	echo $ruang->getEndTime();
	echo $ruang->isDayAvail(1);
?>