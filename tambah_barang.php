<!DOCTYPE html>
<?php
	include 'conn.php';
	include 'checksession.php';
	require_once('sidemenu.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Barang</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
<?php

?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="list_nota_persembahan.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Tambah Barang!</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default"  id="section-to-print">
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="controller/barang.php" enctype="multipart/form-data">
									<div class="form-group">
										<label>Nama Barang</label>
										<input type="text" class="form-control" name="namaBarang" placeholder="" required>
									</div>

									<div class="form-group">
										<label>Kategori</label>
										<select class="form-control" name="kategori" required>
											<option value="KEYBOARD">KEYBOARD</option>
											<option value="MOUSE">MOUSE</option>
											<option value="MONITOR">MONITOR</option>
											<option value="VGA">VGA</option>
											<option value="PSU">PSU</option>
											<option value="CPU">CPU</option>
										</select>
									</div>

									<div class="form-group">
										<label>Harga</label>
										<input type="text" class="form-control" name="harga" placeholder="" required>
									</div>

									<div class="form-group">
										<label>Kuantitas</label>
										<input type="text" class="form-control" name="kuantitas" placeholder="" required>
									</div>

									<div class="form-group">
										<label>Deskripsi</label>
										<input type="text" class="form-control" name="deskripsi" placeholder="" required>
									</div>
									<div>
										<input type="file" name="image">
									</div>
									<button class='btn btn-primary m-2' style="width:200px"  type="submit" name="btn_insert_barang">SAVE</button>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			
		</div><!-- /.row -->
		
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
        function myFunction() {
            var printContents = document.getElementById("section-to-print").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            return true;
        }
    </script>
</body>
</html>