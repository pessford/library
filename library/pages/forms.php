<?php
include('header.php');
include('dbcon.php');

if(isset($_POST['submit'])){
  
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

             <div class="col-lg-8">
              <form class="form-horizontal">
                <div class="form-group ">
                  <label class="control-label col-sm-2" for="email" >Client Id</label>
                  <div class="col-md-2">
                    <input type="text" name="client_id" class="form-control" >
                  </div>
        
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Client title</label>
                  <div class="col-sm-6">
                    <input type="text"  name="client_title" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Address</label>
                  <div class="col-sm-6">
                      <textarea class="form-control" name="address" rows="5"></textarea>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Country</label>
                  <div class="col-md-2">
                    <input type="text" name="country" class="form-control" >
                  </div>

                   <label class="control-label col-sm-2" for="email">Email</label>
                  <div class="col-md-2">
                    <input type="text" name="email" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">State</label>
                  <div class="col-md-2">
                    <input type="text" name="state" class="form-control" >
                  </div>

                  <label class="control-label col-sm-2" for="email">Mobile</label>
                  <div class="col-md-2">
                    <input type="text" name="mobile" class="form-control" >
                  </div>

                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">City</label>
                  <div class="col-md-2">
                    <input type="text" name="city" class="form-control" >
                  </div>

                  <label class="control-label col-sm-2" for="email">State</label>
                  <div class="col-md-2">
                    <input type="text" name="state" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Pin Code</label>
                  <div class="col-md-2">
                    <input type="text" name="pincode" class="form-control" >
                  </div>

                  <label class="control-label col-sm-2" for="email">Password</label>
                  <div class="col-md-2">
                    <input type="text" name="password" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Phone Number</label>    
                  <div class="col-md-2">
                    <input type="text" name="phone_num" class="form-control" >
                  </div>
                </div>

               
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
           
            <div class="col-lg-4">
            <div class="col-sm-2">
                   <img src="upload.png" class="img-rounded" alt="Cinque Terre" width="150" height="180">
                  </div>
                  </div>
            </div>
            </div>

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




</body>

</html>




<?php


?>