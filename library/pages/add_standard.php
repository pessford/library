<?php
include('header.php');
include('dbcon.php');

$msg_standard=$msg_alias_name="";
$error_status = 0;

if(isset($_POST['submit'])){
    $standard = $_POST['standard'];
    $alias_name = $_POST['alias'];


    if($standard==""){
      $msg_standard="Please enter standard.";
      $error_status=1;
    }elseif ($msg_alias_name=="") {
      $msg_alias_name="Please enter alias name.";
      $error_status=1;
    }
    if($error_status=0){

    $add_stand = "insert into class_standard(standard,alias_name)values('".$standard."','".$alias_name."')";
    $quer=mysqli_query($conn,$add_stand);
      
    $last_id=mysqli_insert_id($conn);
   
  if($quer){
    echo "Records added successfully.";
    } 
  else{
    echo "ERROR: Could not able to execute $insert. " . mysqli_error($conn);
   }
  }
}


?>


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:  #707070;">Add Standard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

                    <!-- 
                    flash message for the input fields in the textboxes..
                     -->
                      <?php

                      $_SESSION["errormsg"]='Error due to server.';
                      $_SESSION["success"]='recod inserted successfully.';

                      $error = $_SESSION["errormsg"];
                      $success = $_SESSION["success"];
                      if(isset($_POST['submit']) && (isset($_SESSION['login_user'])&& $quer && $error_status=0))
                      {
                        echo "<div id='alert'>"; 
                        echo "<div class='alert alert-block alert-info fade in center' style='width:80%'>";
                        echo $success;
                        
                          ?>
                      <script>
                        window.location.href='/library/pages/add_standard.php';
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
                        Book
                    </div>

                    <div class="panel-body">
              <div class="container">
                 <div class="row">

             <div class="col-lg-12">
              <form class="form-horizontal" method="post">
                

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Standard</label>
                  <div class="col-sm-6">
                    <input type="text" name="standard" class="form-control" value="<?php if(isset($_POST['standard'])) { echo $_POST['standard']; }?>">
                    <p1 style="color: red;"><?php echo $msg_standard;?></p1>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Alias  Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="alias" class="form-control" value="<?php if(isset($_POST['alias'])) { echo $_POST['alias']; }?>">
                    <p1 style="color: red;"><?php echo $msg_alias_name;?></p1>
                  </div>
                </div>
                 
               
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Add Standard</button>
                  
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

