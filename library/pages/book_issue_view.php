
<?php
    include('header.php');
if(isset($_REQUEST['asdf']))
 {
    $get_book_detail = "select * from books_attribute where book_name='".$_REQUEST['asdf']."'";
    $quer = mysqli_query($conn,$get_book_detail);    
?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" >
                    <h1 class="page-header"><?php echo $_REQUEST['asdf'];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <?php
              while($results = mysqli_fetch_array($quer))
             {
            ?>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         Book Id:<?php echo $results['barcode_id'];?> 
                         <p style="float: right;">Status:<?php echo $results['status'];?></p>  
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Book Name</th>                                        
                                        <th>Issue Date</th>                                        
                                        <th>Return Date</th>
                                        <th>Issue At</th>
                                        <th>Late Fine</th>                                        
                                        <th>Remaining Time</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $get_book_detail = "select *,datediff(return_time,curdate()) from book_issue where book_id='".$results['barcode_id']."'";
                                    
                                    $q = mysqli_query($conn,$get_book_detail);    
                                    while($book_issue_detail = mysqli_fetch_array($q)){
                                     
                                        echo "<tr class='odd gradeX'>";
                                        echo  "<td>".$results['book_name']."</td>";
                                        echo  "<td>".$book_issue_detail['issue_time']."</td>";
                                        echo  "<td>".$book_issue_detail['return_time']."</td>";
                                        echo  "<td>".$book_issue_detail['issue_at']."</td>";
                                        echo  "<td>".$book_issue_detail['late_fine_fee']."</td>";
                                        echo  "<td>".$book_issue_detail['datediff(return_time,curdate())']."</td>";  
                                        echo"</tr>";
                                    

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
                <?php } ?>
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
<?php

}
?>