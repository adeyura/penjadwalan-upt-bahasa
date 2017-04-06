<?php
	class Ruang {
		/* Member variables */
		public static $lastRuangId;
		public $ruangId;
		public $name;

		/* Member functions */
		public function __construct($nm) {

			$this->name = $nm;
			$this->ruangId = Ruang::$lastRuangId++;
		}


		function getId(){
			return $this->ruangId;
		}

		function getName() {
			return $this->name;
		}
	}
	
	Ruang::$lastRuangId = 0;
/*	
	$ruang = new Ruang("7602", 1, 2, 1, 1, 1, 1, 1);
	echo $ruang->getId();
	echo $ruang->getName();
	echo $ruang->getStartTime();
	echo $ruang->getEndTime();
	echo $ruang->isDayAvail(1);*/
?>