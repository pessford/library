<?php
include('header.php');
include('dbcon.php');

  $quer=NULL;
  $errormessage=NULL;


  if(isset($_FILES["file"]["type"]))
{
  $validextensions = array("jpeg", "jpg", "png");
  $temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
  if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
  ) && ($_FILES["file"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
  && in_array($file_extension, $validextensions)) {
  if ($_FILES["file"]["error"] > 0)
  {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
  }
  else
  {
  if (file_exists("upload/" . $_FILES["file"]["name"])) {
  echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
  }
  else
  {
  $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
  $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
  move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
  
    }
  }
}
  else
  {
  echo "<span id='invalid'>***Invalid file Size or Type***<span>";
  }
}

if(isset($_POST['submit'])){
  
  $errormessage=NULL;
  $error_status = FALSE;

 
  
  $client_id = $_POST['client_id'];
  $client_title = $_POST['client_title'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $email = $_POST['email'];
  $state = $_POST['state'];
  $user_name = $_POST['username'];
  $mobile = $_POST['mobile'];
  $city = $_POST['city'];
  $pincode = $_POST['pincode'];
  $password = $_POST['password'];
  $phone_num = $_POST['phone_num'];
  $api_username = $_POST['api_username'];
  $api_pass = $_POST['api_password'];
  $sender_id = $_POST['sender_id'];
  $api_sms = $_POST['api_sms'];
  $api_bal = $_POST['api_bal'];
  $api_delivery_check = $_POST['api_delivery_check'];
  $company_logo = $_FILES['image']['name'];
  


    // if($client_id==''){
    //   $errormessage  = 'Please Enter Client Id.';
    //   $error_status = TRUE;
    // }elseif($client_title==''){
    //   $errormessage  = 'Please Enter client_title.';
    //   $error_status = TRUE;
    // }elseif($name==''){
    //   $errormessage  = 'Please Enter Client Name.';
    //   $error_status = TRUE;
    // }elseif($address==''){
    //   $errormessage  = 'Please Enter Client Address.';
    //   $error_status = TRUE;
    // }elseif($country ==''){
    //   $errormessage  = 'Please Enter Country.';
    //   $error_status = TRUE;
    // }elseif($email==''){
    //   $errormessage  = 'Please Enter Email Address.';
    //   $error_status = TRUE;
    // }elseif($state==''){
    //   $errormessage  = 'Please Enter State.';
    //   $error_status = TRUE;
    // }elseif($user_name==''){
    //   $errormessage  = 'Please Enter User Name.';
    //   $error_status = TRUE;
    // }elseif($mobile==''){
    //   $errormessage  = 'Please Enter Mobile Number.';
    //   $error_status = TRUE;
    // }elseif($city==''){
    //   $errormessage  = 'Please Enter City.';
    //   $error_status = TRUE;
    // }elseif($pincode==''){
    //   $errormessage  = 'Please Enter Pincode.';
    //   $error_status = TRUE;
    // }elseif($password==''){
    //   $errormessage  = 'Please Enter Password.';
    //   $error_status = TRUE;
    // }elseif($phone_num==''){
    //   $errormessage  = 'Please Enter Phone number.';
    //   $error_status = TRUE;
    // }elseif($api_username==''){
    //   $errormessage  = 'Please Enter API Username.';
    //   $error_status = TRUE;
    // }elseif($api_pass==''){
    //   $errormessage  = 'Please Enter API Password.';
    //   $error_status = TRUE;
    // }

      if($error_status == FALSE){
        
        $insert = "insert into client_detail(client_id,client_title,name,address,country,email,state,username,mobile,city,pincode,password,phone_num,sms_api_un,sms_api_pass,sender_id,api_send_sms,api_bal_check,api_delivery_status,company_logo)VALUES('".$client_id."','".$client_title."','".$name."','".$address."','".$country."','".$email."','".$state."','".$user_name."','".$mobile."','".$city."','".$pincode."','".$password."','".$phone_num."','".$api_username."','".$api_pass."','".$sender_id."','".$api_sms."','".$api_bal."','".$api_delivery_check."','".$company_logo."')";
 
        $quer=mysqli_query($conn,$insert);
            
        $last_id=mysqli_insert_id($conn);

        if($quer){
          echo "Records added successfully.";
        } else{
          echo "ERROR: Could not able to execute $insert. " . mysqli_error($conn);
        } 
      }
  
  
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
<style>
label{
    color:  #900000 ;
}
div.img {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.img:hover {
    border: 1px solid #777;
}

div.img img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
.error_color{
  color:red;
}
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

   

       <script >
    setTimeout(function() {
        $('#alert').fadeOut('slow');  
    }, 1000); 

    </script>
 
</head>

 <body>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:  #707070;">Client Registration Form</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Register Students
                    </div>

                    <div class="panel-body">
              <div class="container">
                 <div class="row">
               <?php
          
              $_SESSION["errormsg"]='please try again';
              $_SESSION["success"]='recod inserted successfully';

              $error = $_SESSION["errormsg"];
              $success = $_SESSION["success"];
              if(isset($_POST['submit']) && (isset($_SESSION['errormsg'])&& $quer))
              {
                echo "<div id='alert'>"; 
                echo "<div class='alert alert-block alert-info fade in center' style='width:80%'>";
                echo $success;
                
                echo "</div></div>"; 
              }
              elseif($quer){
                echo "<div id='alert'>"; 
                echo "<div class='alert alert-block alert-info fade in center' style='width:80%'>";
                echo $error;
                echo "</div></div>"; 
             
              }
              
               ?>  
             <div class="col-lg-8">
              <form class="form-horizontal"  id="uploadimage"   method="post" enctype="multipart/form-data">
                <div class="form-group ">
                  <label class="control-label col-sm-2" for="email" >Client Id</label>
                  <div class="col-md-2">
                    <input type="text" name="client_id" class="form-control"required >
                  </div>
                 <div class="error_color"><?php echo $errormessage; ?></div> 
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Client title</label>
                  <div class="col-sm-6">
                    <input type="text" name="client_title" class="form-control" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Address</label>
                  <div class="col-sm-6">
                      <textarea class="form-control" name="address" rows="5" required></textarea>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Country</label>
                  <div class="col-md-2">
                    <input type="text" name="country" class="form-control" required>
                  </div>

                   <label class="control-label col-sm-2" for="email">Email</label>
                  <div class="col-md-2">
                    <input type="email" name="email" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">State</label>
                  <div class="col-md-2">
                    <input type="text" name="state" class="form-control" required>
                  </div>

                  <label class="control-label col-sm-2" for="email">Mobile</label>
                  <div class="col-md-2">
                    <input type="text" name="mobile" class="form-control" required>
                  </div>

                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">City</label>
                  <div class="col-md-2">
                    <input type="text" name="city" class="form-control" required>
                  </div>

                  <label class="control-label col-sm-2" >Username</label>
                  <div class="col-md-2">
                    <input type="text" name="username" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Pin Code</label>
                  <div class="col-md-2">
                    <input type="text" name="pincode" class="form-control" required>
                  </div>

                  <label class="control-label col-sm-2" >Password</label>
                  <div class="col-md-2">
                    <input type="password" name="password" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Phone Number</label>    
                  <div class="col-md-6">
                    <input type="text" name="phone_num" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">SMS API User Name</label>    
                  <div class="col-md-6">
                    <input type="text" name="api_username" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">SMS API Password</label>    
                  <div class="col-md-6">
                    <input type="text" name="api_password" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Sender Id</label>    
                  <div class="col-md-6">
                    <input type="text" name="sender_id" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">SMS API Send SMS</label>    
                  <div class="col-md-6">
                    <input type="text" name="api_sms" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">SMS API Balance Check</label>    
                  <div class="col-md-6">
                    <input type="text" name="api_bal" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">SMS API Delivery Check</label>    
                  <div class="col-md-6">
                    <input type="text" name="api_delivery_check" class="form-control"required >
                  </div>
                </div>
               
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary" value="Upload" class="submit">Submit</button>
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
            <div class="col-sm-2" id="selectImage">
            <?php
            if(isset($_FILES["file"]["type"]))
                  {
                   echo "<div id='image_preview'><img  id='blah' src='#' class='img-rounded' alt='Cinque Terre' width='150' height='180'></div>";
                  }
            
                 else{
              
                 echo  "<div id='image_preview'><img  id='blah' src='upload.png' class='img-rounded' alt='Cinque Terre' width='150' height='180'></div>";
                 
                  }
                 ?> 
                   <hr id="line">
                  </div>
                  </div>
            <input type="file"  onchange="readURL(this);" name="image" required /> 
            </div>
            </div>

              </form>
          
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

     <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

        reader.onload = function (e) {
          $('#blah')
          .attr('src', e.target.result)
          .width(120)
          .height(120);
        };

          reader.readAsDataURL(input.files[0]);
        }
      }
      </script> 


</body>

</html>

<?php


?>