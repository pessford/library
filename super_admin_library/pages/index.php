<?php

 include("dbcon.php");
$message=NULL;
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];

    $get_login = "select id,password from lib_login where username='".$username."' and password='".$password."'";
    $result=mysqli_query($conn,$get_login);
    $get_data = mysqli_fetch_assoc($result);

    if($get_data){
         $_SESSION['login_user'] = $username;//intialize session with value of php variable.
        $_SESSION['login_pass'] = $password;

        header( "location:  /super_admin_library/pages/view_admin.php" );
         die();
    }
    else{
        $message = 'Failed';
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

    

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>

                    </div>



                      <?php

                      $_SESSION["errormsg"]='Incorrect combination of username and password';
                      $_SESSION["success"]='recod inserted successfully';

                      $error = $_SESSION["errormsg"];
                      $success = $_SESSION["success"];
                      if(isset($_POST['submit']) && (isset($_SESSION['login_user'])&& $get_data))
                      {
                        echo "<div id='alert'>"; 
                        echo "<div class='alert alert-block alert-info fade in center' style='width:80%'>";
                        echo $success;
                        
                          ?>
                      <script>
                        window.location.href='/library/pages/dashboard.php';
                      </script>
                      <?php            
                      }
                      elseif(empty($get_data) && isset($_POST['submit'])){
                        echo "<div id='alert'>"; 
                        echo "<div class='alert alert-block alert-info fade in center' style='width:80%'>";
                        echo $error;
                        echo "</div></div>"; 
             
              }
                    ?>
                    <div class="panel-body">
                        <form method="post">

                                 <div class="alert">
                                    <a class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
                                    <strong><?php echo $message;?></strong>
                                </div>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User name" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                 <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Login</button>
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
