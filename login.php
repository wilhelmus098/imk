<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["user_logged_in"]))
{
	header("location:index.php");
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<div class="alert alert-danger" role="alert" id="error" style="display: none;">...</div>
					<form role="form" method="POST" id="login-form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" id="username" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" id="password" placeholder="Password" name="password" type="password" value="">
							</div>
							<input type="submit" class="btn btn-primary" id="btn_login" name="btn_login" value="Login"></input><span>
							</span>
							
					</form>
					<br/>
					<br/>
					<font color="red">
					<span class="error" name="error" id="error">  
						
					</span>
					</font>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
		
			$("#login-form").validate({
				rules: {
					password: {
						required: true,
					},
					username: {
						required: true,
					},
				},
				messages: {
					password:{
					  required: "Please enter your password"
					 },
					username: "Please enter your username",
				},
				submitHandler: submitForm 
			});
			function submitForm() {		
					var data = $("#login-form").serialize();
					$.ajax({				
						type : 'POST',
						url  : 'controller/login.php',
						data : data,
						beforeSend: function(){	
							$("#error").fadeOut();
							$("#btn_login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
						},
						success : function(response){	
							console.log(response);
							if($.trim(response) === "ok"){
					          setTimeout(' window.location.href = "index.php"; ',100);
					         }
							else if($.trim(response) === "no"){								
								$("#error").fadeIn(1000, function(){						
									 $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   username atau password salah!.</div>');
								});
							}
						}
					});
					return false;
				}
				// action="controller/login.php"
</script>
</body>
</html>
