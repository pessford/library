<?php 
include('dbcon.php');

?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/style1.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		<div class="container signuppanelmargin">
			<div class="row">
				<?php
					if(isset($_REQUEST['qazxswedc']) && !empty($_REQUEST['qazxswedc']))
					{
						if(isset($_REQUEST['change_pass']) && !empty($_REQUEST['change_pass']))
						{
							$pass=$_POST['pass'];
							$repass=$_POST['repass'];
							if($pass==$repass)
							{
							$sel="update client_detail set password='".$pass."' where hash='".$_REQUEST['qazxswedc']."' and status='ACTIVE'";
							if(mysqli_query($conn,$sel))
								{
									?>
									<div class='alert alert-success'>
										<center>Password Change Successfully.!plaese Login with New password</center>
									</div>
									<?php
								}
							}else
							{?>
								<div class='alert alert-success'>
									<center>Password is Not matched.</center>
								</div>
							<?php
							}
						}

				?>
				<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<h2 class="loginheadingcolor"><strong>Change Your Password</strong></h2>
					<div class="login-panel panel panel-danger panelcolor">
						
						<div class="panel-body">
							<form role="form" method="post">
								<fieldset>
									<div class="form-group">
										<input class="TextInput TextInput_large"  id="pass1" placeholder="Enter New Passsword" name="pass" type="password" autofocus="" required>
									</div>
									<div class="form-group">
										<input class="TextInput TextInput_large" id="pass2"  placeholder="Confirm Password" name="repass" onKeyUp="checkPass();" type="password" autofocus="" required>
										<div id="confirmMessage" class="confirmMessage" style="display:none;"></div>
									</div>
									<input type="submit" class="btn btn-primary btn-lg btn-block login-button" name="change_pass" value="Change Passwword">
									<a href="index.php">Go To LogIn</a>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			</div>
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js" ></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script>
 			function checkPass()
{
	var pass1 = document.getElementById('pass1');
	var pass2 = document.getElementById('pass2');
	var message = document.getElementById('confirmMessage');
	var goodColor =  "#66cc66";
	var badColor = "#ff6666";
	 if(pass1.value == pass2.value )
	 {
		 message.style.display = 'block';
		 pass2.style.backgroundColor = goodColor;
		 message.style.color = goodColor;
		 message.innerHTML="!Password match";
	 }
	 else
	 {
		 message.style.display = 'block';
		 pass2.style.backgroundColor=badColor;
		 message.style.color= badColor;
		 message.innerHTML="!Password not match";
	 }
}
 		</script>
	</body>
</html>