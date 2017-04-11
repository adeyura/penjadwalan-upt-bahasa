<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Sistem Penjadwalan UPT Pusat Bahasa ITB</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                 
						<h2 style="color: white">SISTEM PENJADWALAN KURSUS</h2>
						<h3 style="color: white">UPT PUSAT BAHASA ITB</h3>
              
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.php">Dashboard</a></li>
                            <li><a href="jadwal.php">Jadwal</a></li>
                            <li><a href="daftarpengajar.php">Daftar Pengajar</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
		<form action="Problem.php" method="post" onsubmit="return Validate(this);" enctype="multipart/form-data">
			<div class="container">
				<div class="row" >
					<div class="col-md-12">
						<h4 class="page-head-line">Dashboard</h4>

					</div>

				</div>
					<div class="row">
						 <div class="col-md-3 col-sm-3 col-xs-6">
							<div class="dashboard-div-wrapper bk-clr-one">
								<i  class="fa fa-edit dashboard-div-icon" ></i>
								<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									</div>
							</div>
								<h4>Unggah File Pengajar</h4>
								<br>
								<input type="file" id="input1" name="dataPengajar" onchange="ValidateSingleInput(this);"  class="file" multiple data-show-upload="false" data-show-caption="false" accept=".csv">

							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6">
							<div class="dashboard-div-wrapper bk-clr-two">
								<i  class="fa fa-edit dashboard-div-icon" ></i>
								<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									</div>
								   
								</div>
								<h4>Unggah File Ruangan</h4>
								<br>
								<input id="input2" name="dataRuang" type="file" onchange="ValidateSingleInput(this);" class="file" multiple data-show-upload="false" data-show-caption="false" accept=".csv">

							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6">
							<div class="dashboard-div-wrapper bk-clr-three">
								<i  class="fa fa-edit dashboard-div-icon" ></i>
								<div class="progress progress-striped active">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									</div>
								   
								</div>
								<h4>Unggah File Kelas Kursus</h4>
								<br>
								<input id="input3" name="dataKelasKursus" type="file" onchange="ValidateSingleInput(this);" class="file" multiple data-show-upload="false" data-show-caption="false" accept=".csv">
								</div>
						</div>
					   

					</div>
			</div>
			<input type="submit" value="Jadwalkan" name="submit"  class="btn btn-primary btn-lg" style="margin-left:110px">
		</form>
        
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 IF 2014 C1-G12 | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
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
</body>
</html>
