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
<body>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Update User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
							<div class="col-md-6">
							<?php
								$usname = $_SESSION['uname'];
								$sql = "SELECT * FROM tUser WHERE user_uname='" . $usname . "'";
								$result = mysqli_query($mysqli, $sql);
								$uname = "";
								$pass = "";
								$pos = "";
								if ($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{
										$uname = $row["user_uname"];
										$pass = $row["user_pword"];
										$pos = $row["user_jabatan"];
									}
								}
						    ?>
						    <div class="alert alert-danger" role="alert" id="error" style="display: none;">...</div>
							<form role="form" id="update-form" method="POST" > 
								<label>User Name</label>
								<div class="form-group">
									<input class="form-control" placeholder="Username" name="username" type="username" autofocus="" value="<?PHP echo $uname; ?>" disabled>
								</div>
								<div class="form-group">
									<input type="hidden" class="form-control" placeholder="" name="uname" type="text" autofocus="" value="<?PHP echo $uname; ?>">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Old Password" id="password" name="password" type="password" value="" required>
								</div>
								<div class="form-group" id="message">
									<input class="form-control" placeholder="New Password" id="password1" name="password1" type="password" value="" required>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Retype New Password" id="password2" name="password2" type="password" value="" required>
								</div>
								<input type="submit" class="btn btn-success" name="btnUpdate" id="btnUpdate" value="UPDATE">
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
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>		
	<script type="text/javascript">
		
			$("#update-form").validate({
				rules: {
					password: {
						required: true,
					},
					username: {
						required: true,
					},
					password1: {
						required: true,
					},
					password2: {
						required: true,
					},
				},
				messages: {
					password:{
					  required: "Please enter your old password"
					 },
					 password1:{
					  required: "Please enter your new password"
					 },
					 password2:{
					  required: "Please retype your new password"
					 },
					username: "Please enter your username",
					password2: "Please enter your username",
				},
				submitHandler: submitForm 
			});
			function submitForm() {		
					var data = $("#update-form").serialize();
					$.ajax({				
						type : 'POST',
						url  : 'controller/users.php',
						data : data,
						beforeSend: function(){	
							$("#error").fadeOut();
						},
						success : function(response){	
							if($.trim(response) === "ok"){
					          setTimeout(' window.location.href = "logout.php"; ', 0);
					         }
							else if($.trim(response) === "err1"){								
								$("#error").fadeIn(0, function(){						
									 $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   password lama tidak cocok!</div>');
								});
							}
							else if($.trim(response) === "err2"){								
								$("#error").fadeIn(0, function(){						
									 $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   password baru tidak sama!</div>');
								});
							}
							else{
								$("#error").html(response).show();
							}
						}
					});
					return false;
				}
				// action="controller/login.php"
</script>
</body>
</html>