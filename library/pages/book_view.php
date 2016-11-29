
<?php
    include('header.php');

     $get_book_detail = "select  * from books_attribute GROUP BY book_name"; 
     $quer = mysqli_query($conn,$get_book_detail);  

?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Books</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            View Books Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Author Name</th>
                                        <th>Publisher</th>
                                        <th>Year of publication</th>
                                        <th>Cost</th>
                                        <th>Total/Available</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                               while($results = mysqli_fetch_array($quer)){
                                        

                                        $count = "SELECT COUNT('book_name') FROM books_attribute where book_name='".$results['book_name']."'";

                                        $result = mysqli_query($conn,$count);
                                        $tot_book = $result->fetch_row();

                                    echo "<tr class='odd gradeX'>";
                                    echo  "<td>".$results['book_name']."</td>";
                                    echo  "<td>".$results['author_name']."</td>";
                                    echo  "<td>".$results['publisher_name']."</td>";
                                    echo  "<td>".$results['date_publication']."</td>";
                                    echo  "<td>".$results['cost_book']."</td>";
                                    echo  "<td><a href='book_issue_view.php?asdf=".$results['book_name']."'>".$tot_book[0]."</a></td>";
                                    
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
  

  <?php


 include('footer.php');
 ?>
