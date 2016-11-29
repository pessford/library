<?php
include('header.php');

    $get_session = "select * from student_session";
    $quer = mysqli_query($conn,$get_session);

    if(isset($_POST['submit'])){
        $session = $_POST['session'];
        $batch_name = $_POST['batch_name'];
        $alias_name = $_POST['alias_name'];

    $add_session = "insert into student_batch(session_id,batch_name,alias_name)VALUES('".$session."','".$batch_name."','".$alias_name."')";
     $result_session = mysqli_query($conn,$add_session);

    }
   

?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:  #707070;">Add Batch</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>


             <?php

                      $_SESSION["errormsg"]='Error due to server.';
                      $_SESSION["success"]='recod inserted successfully.';

                      $error = $_SESSION["errormsg"];
                      $success = $_SESSION["success"];
                      if(isset($_POST['submit']) && (isset($_SESSION['login_user'])&& $quer))
                      {
                        echo "<div id='alert'>"; 
                        echo "<div class='alert alert-block alert-info fade in center' style='width:80%'>";
                        echo $success;
                        
                          ?>
                      <script>
                        window.location.href='/library/pages/add_batch.php';
                      </script>
                      <?php            
                      }
                      elseif(empty($quer) && isset($_POST['submit'])){
                        echo "<div id='alert'>"; 
                        echo "<div class='alert alert-block alert-info fade in center' style='width:80%'>";
                        echo $error;
                        echo "</div></div>"; 
             
              }
                    ?>

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Batch
                    </div>

                    <div class="panel-body">
              <div class="container">
                 <div class="row">

             <div class="col-lg-12">
              <form class="form-horizontal" method="post">
                <div class="form-group ">
                  <label class="control-label col-sm-2" for="email" > Session</label>
                  <div class="col-md-2">
                    <select class="form-control" name="session">

                  <?php
                  while($results = mysqli_fetch_array($quer)){
                    
                    echo"<option value=".$results['id'].">".$results['session']."</option>";
                      }
                  ?>
                   
                </select>
                  </div>
        
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Batch Name</label>
                  <div class="col-sm-6">
                    <input type="" class="form-control" name="batch_name" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Alias  Name</label>
                  <div class="col-sm-6">
                    <input type="" class="form-control" name="alias_name" required>
                  </div>
                </div>
                 
               
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Add Subject</button>
                  
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

        <script >
    setTimeout(function() {
        $('#alert').fadeOut('slow');  
    }, 1000); 
    </script>


  <?php


 include('footer.php');
 ?>

