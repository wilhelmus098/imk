<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['cat']))
	{
		$_SESSION['cat']='';
	}
	include 'conn.php';
	//include 'checksession.php';
	$cat = '';

	$limit = 10;  
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
	$start_from = ($page-1) * $limit;  

	if(isset($_GET['cat']))
	{
		$cat = $_GET['cat'];
		$_SESSION['cat'] = $cat;
	}

	if($_SESSION['cat'] != '')
	{
		$sql = "SELECT * FROM tProduk WHERE produk_kategori='" . $_SESSION['cat'] . "' ORDER BY produk_nama ASC LIMIT $start_from, $limit";
	}
	if($_SESSION['cat'] == '')
	{
		$sql = "SELECT * FROM tProduk ORDER BY produk_kategori ASC LIMIT $start_from, $limit";
	}
	if(isset($_GET['search']))
	{
		$sql = "SELECT * FROM tProduk WHERE produk_nama LIKE '%" . $_GET['search'] . "%' OR produk_kategori LIKE '%" . $_GET['search'] . "%' ORDER BY produk_kategori ASC LIMIT $start_from, $limit";
	}

	$result = mysqli_query($mysqli, $sql);
	?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product List</title>
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
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">PRODUCT LIST</li>
			</ol>
		</div><!--/.row-->
		<div class="form-group">
		<form method="POST" action=controller/barang.php>
							<div class="form-group" style="padding-top:10px;">
								<label>Search product by name or category</label>
								<input type="text" class="form-control" name="search" placeholder="Keyword">
							</div>
							<button type="submit" class="btn btn-primary" name="btn_search"><i class="glyphicon glyphicon-search"></i> Search</button>
							<!-- <button type="submit" class="btn btn-primary" name="btn_clear" >Clear</button> -->
		<form>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<!-- <div class="text-center" style="margin: 8px;">
				<button onclick='myFunction()'  class='btn btn-primary m-2' style="width:200px">Print</button>
			</div> -->
				<div class="panel panel-default"  id="section-to-print">
					<div class="panel-body">
						<div class="col-md-12">
							<form method="POST" action=controller/barang.php>

<!--////////////////////////////////////////////////////////////////KLO GAK LOGIN COY !!!//////////////////////////////////////////////////////////////////////////////////////. -->

<?php
if (!isset($_SESSION["user_logged_in"]))
{ ?>

							<table class="table table-hover">
								<thead>
								  <tr>
									<th>NAME</th>
									<th>CATEGORY</th>
									<th>UNIT PRICE</th>
									<th>STOCK</th>
									<th>DETAIL</th>
								  </tr>
								</thead>
								<tbody>
								<?php while($row = $result->fetch_assoc()) { ?>
									<tr>
										<td><?=$row["produk_nama"]?></td>
										<td><?=$row["produk_kategori"]?></td>
										<td><?=$row["produk_harga"]?></td>
										<td>
										<?php
											if($row['produk_kuantitas'] == '0')
											{
												echo "Out of Stok";
											}
											if($row['produk_kuantitas'] < 50 && $row['produk_kuantitas'] > 1)
											{
												echo "< 50";
											}
											if($row['produk_kuantitas'] >= 50)
											{
												echo "> 50";
											}
										?>
										</td>
										<td>
										<button type="submit" class="btn btn-warning" name="btn_view" value="<?=$row["produk_id"]?>"><i class="glyphicon glyphicon-info-sign"></i></button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
						  	</table>
<?php } ?>

<?php //print_r($_SESSION);?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<!--////////////////////////////////////////////////////////////////KLO DAH LOGIN COY !!!//////////////////////////////////////////////////////////////////////////////////////. -->

<?php
if (isset($_SESSION["user_logged_in"]))
{ ?>

							<table class="table table-hover">
								<thead>
								  <tr>
									<th>ID</th>
									<th>NAME</th>
									<th>CATEGORY</th>
									<th>UNIT PRICE</th>
									<th>STOCK</th>
									<th>ACTION</th>
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
										<td>
											<button type="submit" class="btn btn-info" name="btn_edit" value="<?=$row["produk_id"]?>"><i class="glyphicon glyphicon-pencil"></i></button>
											<button type="submit" class="btn btn-warning" name="btn_view" value="<?=$row["produk_id"]?>"><i class="glyphicon glyphicon-info-sign"></i></button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
						  	</table>
<?php } ?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
						 	</form> 
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			
		</div><!-- /.row -->
<?php
	//print_r($_SESSION);
?>
		<?php  

		if($_SESSION['cat'] != '')
		{
			$sql = "SELECT COUNT(produk_id) FROM tProduk WHERE produk_kategori='" . $_SESSION['cat'] . "'";
			$rs_result = mysqli_query($mysqli, $sql);  
			$row = mysqli_fetch_row($rs_result);  
			$total_records = $row[0];  
			$total_pages = ceil($total_records / $limit);  
			$pagLink = "<nav><ul class='pagination'>";  
			for ($i=1; $i<=$total_pages; $i++) 
			{  
				$pagLink .= "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
			};  
			echo $pagLink . "</ul></nav>";  
		}

		else
		{
			$sql = "SELECT COUNT(produk_id) FROM tProduk";  
			$rs_result = mysqli_query($mysqli, $sql);  
			$row = mysqli_fetch_row($rs_result);  
			$total_records = $row[0];  
			$total_pages = ceil($total_records / $limit);  
			$pagLink = "<nav><ul class='pagination'>";  
			for ($i=1; $i<=$total_pages; $i++) 
			{  
				$pagLink .= "<li><a href='index.php?page=".$i."'>".$i."</a></li>";
			};  
			echo $pagLink . "</ul></nav>";
		 }
			  
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
					hrefTextPrefix : 'index.php?page='
			    });
		});
    </script>
		
</body>
</html>