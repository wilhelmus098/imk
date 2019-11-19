<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
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
					<?php
						$sql99 = "SELECT DISTINCT tProduk.produk_kategori FROM tProduk";  
						$result99 = mysqli_query($mysqli, $sql99);
					?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>Dynamix </span>Inventory System</a>
				<div class="navbar-brand nav navbar-top-links navbar-right" href="">
				<span>
						<form method="POST" action=controller/users.php>
						<button style="margin-bottom:10px; margin-top:-5px;" type="submit" class="btn btn-info" id="submit" name="btn_login" value="Login">Sign In</button>
						</form>
				</span>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Category <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
					
				<ul class="children collapse" id="sub-item-1">

				<li><a class="" href="index.php?cat=">
						<span class="fa fa-arrow-right">&nbsp;</span> SHOW ALL
				</a></li>
				
					<?php while($row99 = $result99->fetch_assoc()) { ?>
						<li><a class="" href="controller/cat.php?cat=<?=$row99["produk_kategori"]?>">
						<span class="fa fa-arrow-right">&nbsp;</span> <?=$row99["produk_kategori"]?>
						</a></li>

					<?php } ?>
				</ul>
			</li>	
		</ul>
	</div><!--/.sidebar-->
		
	