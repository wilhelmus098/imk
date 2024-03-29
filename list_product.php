<!DOCTYPE html>
<?php
	include 'conn.php';
	include 'checksession.php';

	$limit = 4;  
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
	$start_from = ($page-1) * $limit;  

	$sql = "SELECT * FROM tProduk ORDER BY produk_kategori ASC LIMIT $start_from, $limit";  
	$result = mysqli_query($mysqli, $sql);
	?>
<html>
<head>
	<link rel="stylesheet" href="pag/dist/simplePagination.css" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LIST PRODUCT BACKEND</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    </script>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

    
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php
	require_once('sidemenu.php');
	// if($_SESSION['jabatan'] == "PENDETA")
	// {
	// 	require_once('sidemenupendeta.php');
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">LIST PRODUCT</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
			<!-- <div class="text-center" style="margin: 8px;">
				<button onclick='myFunction()'  class='btn btn-primary m-2' style="width:200px">Print</button>
			</div> -->
				<div class="panel panel-default"  id="section-to-print">
					<div class="panel-body">
						<div class="col-md-12">
							<form method="POST" action=edit_barang.php>
							<table class="table table-hover">
								<thead>
								  <tr>
								  <th>ID PRODUK</th>
									<th>NAMA PRODUK</th>
									<th>KATEGORI PRODUK</th>
									<th>HARGA PRODUK</th>
									<th>KUANTITAS PRODUK</th>
									<th>DESC PRODUK</th>
								  </tr>
								</thead>
								<tbody>
								<?php while($row = $result->fetch_assoc()) { ?>
									<tr>
										<td><?=$row["produk_id"]?></td>
										<td><?=$row["produk_nama"]?></td>
										<td><?=$row["produk_kategori"]?></td>
										<td><?=$row["produk_harga"]?></td>
										<td><?=$row["produk_kuantitas"]?></td>
										<td><?=$row["produk_deskripsi"]?></td>
										<td>
											<button type="submit" class="btn btn-success" name="edit_produk" value="<?=$row["produk_id"]?>"><i class="glyphicon glyphicon-edit"></i></button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
						  	</table>

						 	</form> 
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			
		</div><!-- /.row -->
		<?php  
			$sql = "SELECT COUNT(produk_id) FROM tProduk";  
			$rs_result = mysqli_query($mysqli, $sql);  
			$row = mysqli_fetch_row($rs_result);  
			$total_records = $row[0];  
			$total_pages = ceil($total_records / $limit);  
			$pagLink = "<nav><ul class='pagination'>";  
			for ($i=1; $i<=$total_pages; $i++) 
			{  
			    $pagLink .= "<li><a href='list_produk.php?page=".$i."'>".$i."</a></li>";  
			};  
			echo $pagLink . "</ul></nav>";  
		?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src="pag/dist/jquery.simplePagination.js"></script>

	<script>
        function myFunction() {
            var printContents = document.getElementById("section-to-print").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            return true;
        }

        $(document).ready(function(){
			$('.pagination').pagination({
			        items: <?php echo $total_records;?>,
			        itemsOnPage: <?php echo $limit;?>,
			        cssStyle: 'light-theme',
					currentPage : <?php echo $page;?>,
					hrefTextPrefix : 'list_produk.php?page='
			    });
		});
    </script>
		
</body>
</html>