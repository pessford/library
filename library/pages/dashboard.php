
<?php

include('session.php');     
include('sms_api.php');  

if(!isset($_SESSION['login_user'])) {
?>
<script>window.location.href='index.php';</script>
    <?php
   // header("Location: index.php");
    exit;
}

if(isset($_SESSION['login_user'])){

include('header.php');

 $date   =  date("Y-m-d"); 
 $query = "SELECT * FROM stu_time_detail where date='".$date."'";
 
 $quer_time = mysqli_query($conn,$query);
    
    


    $count = "SELECT COUNT('date') FROM stu_time_detail where date='".$date."'";

    $result = mysqli_query($conn,$count);
    $tot_puch = $result->fetch_row();
    


    /*
    get vlaues of datatable
    */

    $get_student_list = "select count(*) from students_details ";
    $q = mysqli_query($conn,$get_student_list);
    $row = $q->fetch_row();

   


  

$username = $_SESSION['login_user'];
$pass = $_SESSION['login_pass'];
$balance_url = sprintf("http://123.63.33.43/blank/sms/user/balance_check.php?username=%s&pass=%s",$username,$pass);

?>
   
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php  echo $row[0];?></div>
                                    <div>Registered Students</div>
                                </div>
                            </div>
                        </div>
                        <a href="student_view.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $tot_puch[0];?></div>
                                    <div>Today's total punches</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo balurl($balance_url);?></div>
                                    <div>Sms Balance Units</div>
                                </div>
                            </div>
                        </div>
                        <a href="dashboard.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                    
             

                <!-- /.panel-heading -->
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            View Students Details
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Roll Number</th>
                                        <th>Name</th>
                                        <th>Session</th>
                                        <th>Batch</th>
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                        <th>Totol Duration</th>
                                        
                                            
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($results = mysqli_fetch_array($quer_time)){
    
                                        //get time from stu_time_detail table
                                       $get_time = "select * from students_details where student_unique_id='".$results['student_id']."'";
                                    
                                       $query2 = mysqli_query($conn,$get_time);
                                       $result_data = mysqli_fetch_array($query2);

                                        //get session from session table..
                                         
                                       $get_session = "select * from student_session where id='".$result_data['session_id']."'";
                                    
                                       $query3 = mysqli_query($conn,$get_session);
                                       $result_session = mysqli_fetch_array($query3);
                                       
                                       //get batch form batch tabel.... 


                                       $get_batch = "select * from student_batch where batch_id='".$result_data['batch_id']."'";
                                    
                                       $query4 = mysqli_query($conn,$get_batch);
                                       $result_batch = mysqli_fetch_array($query4);


                                        echo"<tr class='odd gradeX'>";
                                        echo "<td>".$result_data['roll_num']."</td>";
                                        echo "<td>".$result_data['first_name']."</td>";
                                        echo "<td>".$result_session['session']."</td>";
                                        echo "<td>".$result_batch['batch_name']."</td>";
                                        echo "<td>".$results['time_in']."</td>";
                                        echo "<td>".$results['time_out']."</td>";
                                        echo "<td>".$results['tot_duration']."</td>";
                                        echo "</tr>";
                                    
                                    }   
                                    ?>
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        
                        
                       </div>
                    </div>
                  </div>
                       
            </div>
        </div>


            <!--  table for data -->

    
<?php


 include('footer.php');
 }?>