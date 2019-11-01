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
				<a class="navbar-brand" href="index.php"><span>DYNAMIX </span></a>
				<div class="navbar-brand nav navbar-top-links navbar-right" href="">
				
					<span>Jabatan : </span>
					<?php
						if (isset($_SESSION["user_logged_in"]))
						{
							echo $_SESSION["jabatan"];
						}	
					?>
					
				</div>
				<div class="navbar-brand nav navbar-top-links navbar-right" href="">
				
					<span>Username : </span>
					<?php
						if (isset($_SESSION["user_logged_in"]))
						{
							echo $_SESSION["uname"];
						}	
					?>
					
				</div>
				
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<div class="divider"></div>
		
		<ul class="nav menu">

			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-navicon">&nbsp;</em> Manage Product <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="create_gereja.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Add Product
					</a></li>
					<li><a class="" href="list_gereja.php">
						<span class="fa fa-arrow-right">&nbsp;</span> List Product
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Category <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<?php while($row99 = $result99->fetch_assoc()) { ?>
						<li><a class="" href="create_nota_persembahan.php">
						<span class="fa fa-arrow-right">&nbsp;</span> <?=$row99["produk_kategori"]?>
						</a></li>
					<?php } ?>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
				<em class="fa fa-navicon">&nbsp;</em> Users <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li><a class="" href="updateUser.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Ubah Password
					</a></li>
				</ul>
			</li>
		
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	