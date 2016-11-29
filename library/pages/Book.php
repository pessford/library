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

 $msg_book_id=$msg_book_name=$msg_author_name=$msg_pub_name=$msg_cost=$msg_pur_date=$msg_pub_name=$msg_bill_num=$msg_city=$msg_pub_year="";
 $error_status =0;

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
        $book_image = $_FILES['file']['name'];
        


      if($book_id==""){
        $msg_book_id="Please enter book Id.";
        $error_status =1;
      }elseif($book_name==""){
        $msg_book_name="Please enter book name";
        $error_status =1;
      }elseif($author_name==""){
        $msg_author_name="Please enter book name";
        $error_status =1;
      }elseif($pub_name==""){
        $msg_pub_name="Please enter book name";
        $error_status =1;
      }elseif($cost==""){
        $msg_cost="Please enter book name";
        $error_status =1;
      }elseif($purchase_date==""){
        $msg_pur_date="Please enter book name";
        $error_status =1;
      }elseif($pub_year==""){
        $msg_pub_year="Please enter book name";
        $error_status =1;
      }elseif($bill_num==""){
        $msg_bill_num="Please enter book name";
        $error_status =1;
      }elseif($city==""){
        $msg_city="Please enter book name";
        $error_status =1;
      }elseif($book_image==""){
        $msg_book_image="Please enter book name";
        $error_status =1;
      }




          if($error_status==0){
        
      $insert = "insert into books_attribute(barcode_id,book_name,author_name,publisher_name,date_publication,cost_book,date_purchase,city,image_book)VALUES('".$book_id."','".$book_name."','".$author_name."','".$pub_name."','".$pub_year."','".$cost."','".$purchase_date."','".$city."','".$book_image."')";  

        $quer=mysqli_query($conn,$insert);
        $last_id=mysqli_insert_id($conn);


        if($quer){
            
          } else{
            echo "ERROR: Could not able to execute $insert. " . mysqli_error($conn);
        }
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

                     <!--  
                     flash messages .........
              
                     --> 

                     <?php

                      $_SESSION["errormsg"]='Error due to server.';
                      $_SESSION["success"]='recod inserted successfully.';

                      $error = $_SESSION["errormsg"];
                      $success = $_SESSION["success"];
                      if(isset($_POST['submit']) && (isset($_SESSION['login_user'])&& $quer && $error_status==0))
                      {
                        echo "<div id='alert'>"; 
                        echo "<div class='alert alert-block alert-info fade in center' style='width:80%'>";
                        echo $success;
                        
                          ?>
                      <script>
                        window.location.href='/library/pages/book.php';
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






                    <div class="panel-body">
              <div class="container">
                 <div class="row">

             <div class="col-lg-8">
              <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data">
                <div class="form-group ">
                  <label class="control-label col-sm-2" for="email" >Book Id</label>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="book_id" value="<?php if(isset($_POST['book_id'])) { echo $_POST['book_id']; }?>">
                    <p1 style="color: red;"><?php echo $msg_book_id;?></p1>
                  </div>
        
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Book Name</label>
                  <div class="col-sm-6">
                    <input type="" id="bookname_ajax_call" class="form-control" name="book_name" value="<?php if(isset($_POST['book_name'])) { echo $_POST['book_name']; }?>">
                    <p1 style="color: red;"><?php echo $msg_book_name;?></p1>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Author Name</label>
                  <div class="col-sm-6">
                    <input type="" id="authorname_ajax_call" class="form-control" name="author_name" value="<?php if(isset($_POST['author_name'])) { echo $_POST['author_name']; }?>">
                    <p1 style="color: red;"><?php echo $msg_author_name;?></p1>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Publisher Name</label>
                  <div class="col-sm-6">
                      <input type="text" id="publishername_ajax_call" class="form-control" name="pub_name" value="<?php if(isset($_POST['pub_name'])) { echo $_POST['pub_name']; }?>"></input>
                      <p1 style="color: red;"><?php echo $msg_pub_name;?></p1>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Cost Of Book</label>
                  <div class="col-md-2">
                    <input type="text" id="cost_ajax_call" class="form-control" name="book_cost" value="<?php if(isset($_POST['book_cost'])) { echo $_POST['book_cost']; }?>">

                    <p1 style="color: red;"><?php echo $msg_cost;?></p1>
                  </div>
<label class="control-label col-sm-2" for="email">Bill No</label>
                  <div class="col-md-2">
                    <input type="text" id="billno_ajax_call" class="form-control" name="bill_num" value="<?php if(isset($_POST['bill_num'])) { echo $_POST['bill_num']; }?>">
                    <p1 style="color: red;"><?php echo $msg_bill_num;?></p1>
                  </div>

                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Date of publication</label>
                  <div class="col-md-4">
                    <input type="date" id="yearofpub_ajax_call" class="form-control" name="pub_year" value="<?php if(isset($_POST['pub_year'])) { echo $_POST['pub_year']; }?>">
                    <p1 style="color: red;"><?php echo $msg_pub_year;?></p1>
                  </div>

                  
                  
                   <label class="control-label col-sm-2" for="email">Purchase Date</label>
                  <div class="col-md-4">
                    <input type="date" id="purchasedate_ajax_call" class="form-control" name="purchase_date" value="<?php if(isset($_POST['purchase_date'])) { echo $_POST['purchase_date']; }?>">
                    <p1 style="color: red;"><?php echo $msg_pur_date?></p1>
                  </div>
                </div>
               
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Generate Bar Code</button>
                  
                  </div>
                </div>
             
            </div>

           
           <div class="col-lg-4">
            <div class="col-sm-2" id="selectImage">
            <?php
            if(isset($_FILES["file"]["type"]))
                  {
                   echo "<div id='image_preview'><img  id='blah' src='upload.png' class='img-rounded' alt='Cinque Terre' width='150' height='180'></div>";
                  }
                 else{
                  echo  "<div id='image_preview'><img  id='blah' src='upload.png' class='img-rounded' alt='Cinque Terre' width='150'  height='180'></div>";
                  }
                 ?> 
                   <hr id="line">
                  </div>
                  </div>
               <input type="file"  onchange="readURL(this);" name="file" /> 
                

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
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
       <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

        reader.onload = function (e) {
          $('#blah')
          .attr('src', e.target.result)
          .width(120)
          .height(120);
        };

          reader.readAsDataURL(input.files[0]);
        }
      }
      </script> 

        
        <script >
    setTimeout(function() {
        $('#alert').fadeOut('slow');  
    }, 1000); 
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#bookname_ajax_call").blur(function(){
          var bookname = $("#bookname_ajax_call").val();

              //-----------------------------------------------------------------------
              // 2) Send a http request with AJAX 
              //-----------------------------------------------------------------------
              $.ajax({   
                type: 'POST',                                   
                url: 'ajax/issuebook.php',                  //the script to call to get data          
                data: { 
                          'bookname': bookname
                      },
                dataType: 'json',                //data format      
                success: function(data)          //on recieve of reply
                {
                 if (data) {
                  debugger
                  $("#authorname_ajax_call").val(data['author_name']);
                  $("#publishername_ajax_call").val(data['publisher_name']);
                  $("#cost_ajax_call").val(data['cost_book']);
                  $("#purchasedate_ajax_call").val(data['date_purchase']);
                  $("#yearofpub_ajax_call").val(data['date_publication']);
                  $("#billno_ajax_call").val(data['bill_no']);
                 }
                } 
              });
        });
      }); 
    </script>

  
  <?php


 include('footer.php');
 ?>
