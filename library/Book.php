<?php
include('header.php');

    if(isset($_FILES["file"]["type"]))
  {
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);

    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
    ) && ($_FILES["file"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
    && in_array($file_extension, $validextensions)) {
          if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
            }
            else
              {
                if (file_exists("upload/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                    }
                    else
                    {
                      $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                      $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
                      move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                    }
             }
        }
      else
      {
      echo "<span id='invalid'>***Invalid file Size or Type***<span>";
      }
}

if(isset($_POST['submit'])){


 
        $book_id=$_POST['book_id'];
        $book_name = $_POST['book_name'];
        $author_name=$_POST['author_name'];
        $pub_name=$_POST['pub_name'];
        $purchase_date=$_POST['purchase_date'];
        $pub_year=$_POST['pub_year'];
        $bill_num=$_POST['bill_num'];
        $cost=$_POST['book_cost'];
        $city=$_POST['city'];
          
        
      $insert = "insert into books_attribute(barcode_id,book_name,author_name,publisher_name,date_publication,cost_book,date_purchase,city)VALUES('".$book_id."','".$book_name."','".$author_name."','".$pub_name."','".$pub_year."','".$cost."','".$purchase_date."','".$city."')";  

        $quer=mysqli_query($conn,$insert);
        $last_id=mysqli_insert_id($conn);


        if($quer){
            echo "Records added successfully.";
          } else{
            echo "ERROR: Could not able to execute $insert. " . mysqli_error($conn);
        }
}



?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:  #707070;">Add New Book</h1>
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
              <form class="form-horizontal" method="post">
                <div class="form-group ">
                  <label class="control-label col-sm-2" for="email" >Book Id</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="book_id">
                  </div>
        
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Book Name</label>
                  <div class="col-sm-6">
                    <input type="" class="form-control" name="book_name">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Author Name</label>
                  <div class="col-sm-6">
                    <input type="" class="form-control" name="author_name">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Publisher Name</label>
                  <div class="col-sm-6">
                      <input type="text" class="form-control" name="pub_name"></input>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Cost Of Book</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="book_cost">
                  </div>

                   <label class="control-label col-sm-2" for="email">Purchase Date</label>
                  <div class="col-md-2">
                    <input type="date" class="form-control" name="purchase_date">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Year of publication</label>
                  <div class="col-md-2">
                    <input type="date" class="form-control" name="pub_year">
                  </div>

                  <label class="control-label col-sm-2" for="email">Bill No</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="bill_num">
                  </div>

                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">City</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="city">
                  </div>
                  </div>
               
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Generate Bar Code</button>
                  
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
