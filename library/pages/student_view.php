
<?php
include('header.php');

/*
@desc:query to get all student details from student_detail table and show in this section 
*/

$get_student_detail = "select * from students_details";
$query = mysqli_query($conn,$get_student_detail);



if(isset($_REQUEST['val'])){
    $delete = "delete from students_details where student_id='".$_REQUEST['val']."'";
    $del = mysqli_query($conn,$delete);     
     if($del)
      { ?>
       
       <script>
                        window.location.href='../pages/student_view.php';
                      </script>

        // header( "location: http://localhost/library/pages/student_view.php" );
        // die();
      <?php  
      }
      else
      {
        die("Record is not deleted it is query error."); 
      }
    }
 

?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Students</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
         <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            View Students Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll Number</th>
                                        <th>Email</th>
                                        <th>Standard</th>
                                        <th>Mobile</th>
                                        <th>Action</th>

                                        
                                        
                                            
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($results = mysqli_fetch_array($query)){

                                        $get_stand = $get_student_detail = "select * from class_standard where id='".$results['stand_id']."'";
                                       $query2 = mysqli_query($conn,$get_stand);
                                       $result_data = mysqli_fetch_array($query2);


                                        echo"<tr class='odd gradeX'>";
                                        echo "<td>".$results['first_name']."</td>";
                                        echo "<td>".$results['roll_num']."</td>";
                                        echo "<td>".$results['email']."</td>";
                                        echo "<td>".$result_data['standard']."</td>";
                                        echo "<td>".$results['stu_mob']."</td>";
                                        echo "<td><a href='edit_student.php?asdf=".$results['student_id']."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a> <a href='student_view.php?val=".$results['student_id']."'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
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

   <?php


 include('footer.php');
 ?>
