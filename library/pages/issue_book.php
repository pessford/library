<?php
include('header.php');

if(isset($_POST['submit'])){

        $book_id=$_POST['book_id'];
        $student_id = $_POST['student_id'];
        $issue_date=$_POST['issue_date'];
        $date1=date_create($return_date);
        $newdate2=date_format($date1,"Y-m-d");

        $return_date=$_POST['return_date'];
        $date=date_create($return_date);
        $newdate=date_format($date,"Y-m-d");

        $fine=$_POST['late_fine'];
        $issue_at=$_POST['issue_for'];
       $insert = "insert into book_issue(book_id,stu_id,issue_at,issue_time,return_time,late_fine_fee,status)VALUES('".$book_id."','".$student_id."','".$issue_at."','".$newdate2."','".$newdate."','".$fine."','ISSUE')";  
      //echo $insert;
        $quer=mysqli_query($conn,$insert);
        $last_id=mysqli_insert_id($conn);


        if($quer){
          $message="Book Successfully Issued";
            
          } else{
            echo "ERROR: Could not able to execute $insert. " . mysqli_error($conn);
        }
}



?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:  #707070;">Issue Book</h1>
                <h4><?php if(isset($_POST['submit'])){ echo $message;} else{echo ' '; } ?> </h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
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

             <div class="col-lg-8">
              <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data">
                <div class="form-group ">
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Book Id</label>
                  <div class="col-sm-6">
                    <input type="" class="form-control" name="book_id" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Student Id</label>
                  <div class="col-sm-6">
                    <input type="" class="form-control" name="student_id" required> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Issue At</label>
                  <div class="col-sm-6">
                   <select class="form-control" name="issue_for" required="">
                    <option>Issue At</option>
                     <option value="Home">At Home</option>
                      <option value="Library">At Library</option>
                   </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Issue Date</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="issue_date" id="datepicker" required="">
                  </div>
                </div>
                 <div class="form-group uk-form">
                  <label class="control-label col-sm-2" for="pwd">Return Date</label>
                  <div class="col-sm-6">
                      <input type="text" class="form-control" id="datepicker1" name="return_date"  required>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Late Fine Fee</label>
                  <div class="col-sm-6">
                    <input type="" class="form-control" name="late_fine" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">

                    <button type="submit" class="btn btn-primary" name="submit">Issue Book </button>
                  </div>
                </div>
             
            </div>

           
           <div class="col-lg-4">
            
                  </div>
             
                  </div>
                  </div>
            </form>                      <!-- /.col-lg-6 (nested) -->
            

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

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );

  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  </script>




</body>

</html>
