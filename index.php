<!DOCTYPE html>
<html>
<body>

<form action="Problem.php" method="post" onsubmit="return Validate(this);" enctype="multipart/form-data">
    Data pengajar:
    <input type="file" name="dataPengajar" onchange="ValidateSingleInput(this);" id="fileToUpload">
	<br>
    Data kelas kursus:
    <input type="file" name="dataKelasKursus" onchange="ValidateSingleInput(this);" id="fileToUpload">
	<br>
    Data ruang:
    <input type="file" name="dataRuang" onchange="ValidateSingleInput(this);" id="fileToUpload">
	<br>
    <input type="submit" value="Jadwalkan" name="submit">	
</form>

</body>
</html>

<script>
	var _validFileExtensions = [".csv"];    
	function ValidateSingleInput(oInput) {
		if (oInput.type == "file") {
			var sFileName = oInput.value.split('\\').pop();
			 if (sFileName.length > 0) {
				var blnValid = false;
				for (var j = 0; j < _validFileExtensions.length; j++) {
					var sCurExtension = _validFileExtensions[j];
					if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
						blnValid = true;
						break;
					}
				}
				 
				if (!blnValid) {
					alert("Maaf, " + sFileName + " bukan file yang tepat. Pastikan file berformat " + _validFileExtensions.join(", "));
					oInput.value = "";
					return false;
				}
			}
		}
		return true;
	}
	
	function Validate(oForm) {
		var arrInputs = oForm.getElementsByTagName("input");
		for (var i = 0; i < arrInputs.length; i++) {
			var oInput = arrInputs[i];
			if (oInput.type == "file") {
				var sFileName = oInput.value;
				if (sFileName.length == 0) {
					alert("Tidak ada berkas yang diunggah. Pastikan sudah mengisi file di semua form");
					return false;
				}
			}
		}
  
		return true;
	}
</script>