<!DOCTYPE html>
<?php
	include 'conn.php';
	include 'checksession.php';

	$sql = "SELECT * FROM tProduk WHERE produk_id = '" . $_GET["id_produk"] . "'";  
	$result = mysqli_query($mysqli, $sql);

	$sql2 = "SELECT DISTINCT produk_kategori FROM tProduk";
	$result2 = mysqli_query($mysqli, $sql2);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Barang</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
<?php
	if (isset($_SESSION["user_logged_in"]))
	{
		require_once('sidemenu.php');
	}
	if (!isset($_SESSION["user_logged_in"]))
	{
		require_once('sidemenu_f.php');
	}
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="list_product.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Barang!</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default"  id="section-to-print">
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="controller/barang.php" enctype="multipart/form-data">
								<?php while($row = $result->fetch_assoc()) { ?>
									<div class="form-group">
										<label>Nama Barang></label>
										<input type="text" class="form-control" name="namaBarang" value="<?=$row['produk_nama']?>" required>
									</div>

									<div class="form-group">
										<label>Kategori</label>
										<select class="form-control" name="kategori" required>
											<?php while($row2 = $result2->fetch_assoc()) {
												if($row['produk_kategori'] == $row2['produk_kategori']) {?>
												<option value="<?=$row2['produk_kategori']?>" selected><?=$row2['produk_kategori']?></option>
											<?php } else{ ?>
												<option value="<?=$row2['produk_kategori']?>"><?=$row2['produk_kategori']?></option>
											<?php }} ?>
										</select>
									</div>

									<div class="form-group">
										<label>Harga</label>
										<input type="text" class="form-control" name="harga" value="<?=$row['produk_harga']?>" required>
									</div>

									<div class="form-group">
										<label>Kuantitas</label>
										<input type="text" class="form-control" name="kuantitas" value="<?=$row['produk_kuantitas']?>" required>
									</div>

									<div class="form-group">
										<label>Deskripsi</label>
										<input type="text" class="form-control" name="deskripsi" value="<?=$row['produk_deskripsi']?>" required>
									</div>
									<div>
										<input type="file" name="image" value="<?php echo"images/".$row['produk_image']; ?>" onchange="readURL(this);">
									</div>
									<div style="margin-top: 10px; margin-bottom: 10px;">
										<img id="imgShow" style="width:200px; height:250px" src="<?php echo"images/".$row['produk_image']; ?>" alt="your image" />
									</div>
									<button class='btn btn-primary m-2' style="width:200px"  type="submit" name="btn_update_barang" value="<?php echo $_GET['id_produk'];?>">SAVE</button>
								<?php } ?>
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
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

	<script>
        function myFunction() {
            var printContents = document.getElementById("section-to-print").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            return true;
        }
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgShow')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>
</html>