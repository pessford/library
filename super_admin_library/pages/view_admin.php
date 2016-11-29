<?php
include('header.php');
include('dbcon.php');
include('sms_api.php');
$select = "select * from client_detail";
 $quer = mysqli_query($conn, $select);


if(isset($_REQUEST['val'])){
    $delete = "delete from client_detail where id_client='".$_REQUEST['val']."'";
    $del = mysqli_query($conn,$delete);     
     if($del)
      { 
       
        header( "location:  http://localhost/super_admin_library/pages/view_admin.php" );
        die();
      }
      else
      {
        die("Record is not deleted it is query error."); 
      }
    }


  if(isset($_REQUEST['status'])&& isset($_REQUEST['update']))
    {     


         $status =  $_REQUEST['update'];
         
         $update = "UPDATE client_detail SET status='".$status."' WHERE id_client='".$_REQUEST['status']."'";

         $update_status = mysqli_query($conn,$update);
        
        if($update_status){
            echo "success";
            header( "location:  http://localhost/super_admin_library/pages/view_admin.php" );
            die();
        }
        else{
          echo mysqli_error($conn);
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

      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

   

<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

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

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    

</head>

<body>


        <div id="page-wrapper">
        
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Clients</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            View Client Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        
                                        <th>Client Title</th>
                                        <th>Client Name</th>
                                        <th>City</th>
                                        <th>Contact Number</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Sms Balance</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($results = mysqli_fetch_array($quer)){
                                    $balance_url = sprintf("http://123.63.33.43/blank/sms/user/balance_check.php?username=%s&pass=%s",$results['username'],$results['password']);
                                    echo "<tr class='odd gradeX'>";
                                    echo "<td>".$results['id_client']."</td>";
                                    echo "<td>".$results['client_title']."</td>";
                                    echo "<td>".$results['name']."</td>";
                                    echo "<td>".$results['city']."</td>";
                                    echo "<td>".$results['mobile']."</td>";
                                     echo "<td>".$results['username']."</td>";
                                      echo "<td>".$results['password']."</td>";
                                    ?>
                                	<td><?php balurl($balance_url);?>
                                    </td>
                                    <?php  
                                	echo "<td><a href='edit_client.php?asdf=".$results['id_client']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                    <a href='view_admin.php?val=".$results['id_client']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>";
                                     if($results['status']=='ACTIVE'){  
                                   echo " <a href='view_admin.php?status=".$results['id_client']."&update=DEACTIVE' ><i class='fa fa-ban' aria-hidden='true'  id='button_id' value='DEACTIVE' name='update''></i></a>";
                                    }
                                   elseif($results['status']=='DEACTIVE'){
                                    echo " <a href='view_admin.php?status=".$results['id_client']."&update=ACTIVE'><i class='fa fa-check-square' aria-hidden='true'  id='button_id' value='ACTIVE' name='update' '></i></a>";   
                                    }
                                    echo "</td>";
                                	echo "</tr>";

                                }
                                ?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
