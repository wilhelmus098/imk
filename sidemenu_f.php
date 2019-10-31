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
				<a class="navbar-brand" href="list_nota_persembahan.php"><span>Dynamix </span></a>
				<div class="navbar-brand nav navbar-top-links navbar-right" href="">

				<span>
						<form method="POST" action=controller/users.php>
						<input type="submit" class="btn btn-primary" id="submit" name="btn_login" value="Login"></input>
						</form>
				</span>
				</div>
				<div class="navbar-brand nav navbar-top-links navbar-right" href="">
				</div>
				
				

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

					<?php while($row99 = $result99->fetch_assoc()) { ?>
						<li><a class="" href="create_nota_persembahan.php">
						<span class="fa fa-arrow-right">&nbsp;</span> <?=$row99["produk_kategori"]?>
						</a></li>

					<?php } ?>
				</ul>
			</li>	
		</ul>
	</div><!--/.sidebar-->
		
	