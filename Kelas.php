<?php
	class Kelas {
		/* Member variables */
		public static $lastKelasId;
		public $kelasId;
		public $name;

		/* Member functions */
		public function __construct($nm) {
			$this->name = $nm;
			$this->kelasId = Kelas::$lastKelasId++;
		}


		function getId(){
			return $this->kelasId;
		}
		
		function getName() {
			return $this->name;
		}
	}
	
	Kelas::$lastKelasId = 1;
	
	$kelas = new Kelas("waw");
	echo $kelas->getId();
	echo $kelas->getName();
	
	$kelos = new Kelas("wew");
	echo $kelos->getId();
	echo $kelos->getName();
?>