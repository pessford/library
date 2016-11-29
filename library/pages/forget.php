
<?php
    include("dbcon.php");
    
if(isset($_REQUEST['submit']) && !empty($_REQUEST['submit']))
	{
		$mail=$_POST['email'];
		$query="select email,hash from client_detail where email='".$mail."' and status='ACTIVE'";
		//echo $query;
		$res=mysqli_query($conn,$query);
		//$num=mysqli_num_rows($res);
		$num=mysqli_num_rows($res);
		$row=mysqli_fetch_array($res);
		if($num==1)	
		{  
			
			$to=$mail;
			$sub="Library Management Password Reset Message";
			$headers = 'MIME-Version: 1.0'."\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
			$headers .= 'From: yudiakash001@gmail.com'."\r\n";
			$headers .= 'Reply-To:yudiakash001@gmail.com'."\r\n";
			$headers .= 'X-Mailer: PHP/'.phpversion();
			$msg="Please Click On link for change Password: http://wsadeveloper.in/library/pages/forget_pass.php?qazxswedc=".$row['hash']."";
			//echo $msg;
			if(@mail($to,$sub,$headers,$msg)){
            
			$message="Your forget Password Link successfully send on your mail";
            }
		}else{
			$message="Email Does not Exists";

		}
	
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Libraray management system</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <script >
    setTimeout(function() {
        $('#alert').fadeOut('slow');  
    }, 1000); 
    </script>

</head>

<body>

    <div class="container">
        <div class="row">
        
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Forget Password</h3>
                    </div>

                    
                    <div class="panel-body">
                        <form method="post">

                                 <div class="alert">
                                    <a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
                                    <strong><?php if(isset($_REQUEST['submit'])){ echo $message; }?></strong>
                                </div>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User name" name="email" type="text" autofocus>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                 <input class="btn btn-lg btn-success btn-block" name="submit" type="submit" value="Forget">
                                 <a href="index.php">Back To LogIn</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
