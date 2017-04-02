<?php
	$dataPengajar = $_FILES['dataPengajar']['tmp_name'];
	$arrayPengajar = array_map('str_getcsv', file($dataPengajar));
	
	foreach ($arrayPengajar as $pengajar) {
		$pengajarDetail = explode(";", $pengajar[0]);
		print_r($pengajarDetail);
	}

	echo "<br>";
	
	$dataKelasKursus = $_FILES['dataKelasKursus']['tmp_name'];
	$arrayKelasKursus = array_map('str_getcsv', file($dataKelasKursus));
	
	foreach ($arrayKelasKursus as $kelasKursus) {
		$kelasKursusDetail = explode(";", $kelasKursus[0]);
		print_r($kelasKursusDetail);
	}
	
	echo "<br>";
	
	$dataRuang = $_FILES['dataRuang']['tmp_name'];
	$arrayRuang = array_map('str_getcsv', file($dataRuang));
	
	foreach ($arrayRuang as $ruang) {
		$ruangDetail = explode(";", $ruang[0]);
		print_r($ruangDetail);
	}
	


	$shop = array( array("title"=>"rose", "price"=>1.25 , "number"=>15),
				   array("title"=>"daisy", "price"=>0.75 , "number"=>25),
				   array("title"=>"orchid", "price"=>1.15 , "number"=>7) 
				 ); 
?>

<?php if (count($shop) > 0): ?>
<table>
  <thead>
    <tr>
      <th><?php echo implode('</th><th>', array_keys(current($shop))); ?></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($shop as $row): array_map('htmlentities', $row); ?>
    <tr>
      <td><?php echo implode('</td><td>', $row); ?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>