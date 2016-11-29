<?php
include('header.php');
include('dbcon.php');
if(isset($_POST['submit'])){
    $client_id = $_POST['client_id'];
    $machine_id = $_POST['machine_id'];
    $location = $_POST['location'];

    $assign_mac = "insert into allocate_machine(client_id,machine_id,location)values('".$client_id."','".$machine_id."','".$location."')";
    $quer=mysqli_query($conn,$assign_mac);
   
    $last_id=mysqli_insert_id($conn);
   
  if($quer){
    echo "Records added successfully.";
    } 
  else{
    echo "ERROR: Could not able to execute $insert. " . mysqli_error($conn);
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
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Library Management</title>

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
                <h1 class="page-header" style="color:  #707070;">Bio Machine</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Assign Machine
                    </div>

                    <div class="panel-body">
              <div class="container">
                 <div class="row">

             <div class="col-lg-12">
              <form class="form-horizontal" method="post">
                

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Client ID</label>
                  <div class="col-sm-6">
                    <input type="text" name="client_id" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Machine ID</label>
                  <div class="col-sm-6">
                    <input type="text" name="machine_id" class="form-control">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Machine Location</label>
                  <div class="col-sm-6">
                    <input type="text" name="location" class="form-control">
                  </div>
                </div>

                 
               
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  
                  </div>
                </div>
              </form>
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
