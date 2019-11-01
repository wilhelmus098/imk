<!DOCTYPE html>
<?php
include 'conn.php';
//include 'checksession.php';
if (isset($_SESSION["user_logged_in"]))
{
	require_once('sidemenu.php');
}
if (!isset($_SESSION["user_logged_in"]))
{
	require_once('sidemenu_f.php');
}


if(isset($_GET['id_produk']))
{
	$sql = "SELECT * FROM tProduk WHERE produk_id='".$_GET['id_produk']."'";  
	$result = mysqli_query($mysqli, $sql);
}
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

	<title></title>
	<style>
		html, body {
		  height: 100%;
		  width: 100%;
		  margin: 0;
		  font-family: 'Roboto', sans-serif;
		}
		 
		.container {
		  max-width: 1200px;
		  margin: 0 auto;
		  padding: 15px;
		  display: flex;
		}
		.left-column {
		  width: 65%;
		  position: relative;
		}
		 
		.right-column {
		  width: 35%;
		  margin-top: 60px;
		}
		.left-column img {
		  width: 80%;
		  position: absolute;
		  left: 0;
		  top: 0;
		}
		.product-description {
		  border-bottom: 1px solid #E1E8EE;
		  margin-bottom: 20px;
		}
		.product-description span {
		  font-size: 12px;
		  color: #358ED7;
		  letter-spacing: 1px;
		  text-transform: uppercase;
		  text-decoration: none;
		}
		.product-description h1 {
		  font-weight: 300;
		  font-size: 52px;
		  color: #43484D;
		  letter-spacing: -2px;
		}
		.product-description p {
		  font-size: 16px;
		  font-weight: 300;
		  color: #86939E;
		  line-height: 24px;
		}
		.product-price {
		  display: flex;
		  align-items: center;
		}
		 
		.product-price span {
		  font-size: 26px;
		  font-weight: 300;
		  color: #43474D;
		  margin-right: 20px;
		}
		 
		.cart-btn {
		  display: inline-block;
		  background-color: #7DC855;
		  border-radius: 6px;
		  font-size: 16px;
		  color: #FFFFFF;
		  text-decoration: none;
		  padding: 12px 30px;
		  transition: all .5s;
		}
		.cart-btn:hover {
		  background-color: #64af3d;
		}
	</style>
</head>
<body>

	<main class="container">
 
  <!-- Left Column / Headphones Image -->
  <div class="left-column">
    <img src="images/jay.jpg">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
								    	<?php
								    		while($row = $result->fetch_assoc()) {
								    	?>
      <span><?php echo ($row['produk_kategori']); ?></span>
  		
      <h1><?php echo ($row['produk_nama']); ?></h1>
      <p><?php echo ($row['produk_deskripsi']); ?></p>
    </div>
 
    <!-- Product Pricing -->
    <div class="product-price">
		<span><?php echo($row['produk_kuantitas'] . " Unit available"); ?></span>
    </div>
    <div class="product-price">
      <span><?php echo ("Rp." . $row['produk_harga'] . " / Unit"); ?></span>
      
    </div>
    <div class="product-price" style="margin-top: 100px;">

		<span><a href="#" class="cart-btn">Add to cart</a></span>
    </div>

  </div>
  											<?php } ?>
</main>
</body>
</html>

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