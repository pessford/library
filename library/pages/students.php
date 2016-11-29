
<?php

include('header.php');
include('dbcon.php');
include('error.php');




//If I want a 3-digit PIN code.

  function generatePIN($digits = 3){
      $i = 0; //counter
      $pin = ""; //our default pin is blank.
      while($i < $digits){
          //generate a random number between 0 and 9.
          $pin .= mt_rand(0, 9);
          $i++;
      }
      return $pin;
}
 
/*
array of the country for drop down .

*/

$indian_all_states  = array (
 'AP' => 'Andhra Pradesh',
 'AR' => 'Arunachal Pradesh',
 'AS' => 'Assam',
 'BR' => 'Bihar',
 'CT' => 'Chhattisgarh',
 'GA' => 'Goa',
 'GJ' => 'Gujarat',
 'HR' => 'Haryana',
 'HP' => 'Himachal Pradesh',
 'JK' => 'Jammu & Kashmir',
 'JH' => 'Jharkhand',
 'KA' => 'Karnataka',
 'KL' => 'Kerala',
 'MP' => 'Madhya Pradesh',
 'MH' => 'Maharashtra',
 'MN' => 'Manipur',
 'ML' => 'Meghalaya',
 'MZ' => 'Mizoram',
 'NL' => 'Nagaland',
 'OR' => 'Odisha',
 'PB' => 'Punjab',
 'RJ' => 'Rajasthan',
 'SK' => 'Sikkim',
 'TN' => 'Tamil Nadu',
 'TR' => 'Tripura',
 'UK' => 'Uttarakhand',
 'UP' => 'Uttar Pradesh',
 'WB' => 'West Bengal',
 'AN' => 'Andaman & Nicobar',
 'CH' => 'Chandigarh',
 'DN' => 'Dadra and Nagar Haveli',
 'DD' => 'Daman & Diu',
 'DL' => 'Delhi',
 'LD' => 'Lakshadweep',
 'PY' => 'Puducherry'
);

$country_list = array(
    "Afghanistan",
    "Albania",
    "Algeria",
    "Andorra",
    "Angola",
    "Antigua and Barbuda",
    "Argentina",
    "Armenia",
    "Australia",
    "Austria",
    "Azerbaijan",
    "Bahamas",
    "Bahrain",
    "Bangladesh",
    "Barbados",
    "Belarus",
    "Belgium",
    "Belize",
    "Benin",
    "Bhutan",
    "Bolivia",
    "Bosnia and Herzegovina",
    "Botswana",
    "Brazil",
    "Brunei",
    "Bulgaria",
    "Burkina Faso",
    "Burundi",
    "Cambodia",
    "Cameroon",
    "Canada",
    "Cape Verde",
    "Central African Republic",
    "Chad",
    "Chile",
    "China",
    "Colombi",
    "Comoros",
    "Congo (Brazzaville)",
    "Congo",
    "Costa Rica",
    "Cote d'Ivoire",
    "Croatia",
    "Cuba",
    "Cyprus",
    "Czech Republic",
    "Denmark",
    "Djibouti",
    "Dominica",
    "Dominican Republic",
    "East Timor (Timor Timur)",
    "Ecuador",
    "Egypt",
    "El Salvador",
    "Equatorial Guinea",
    "Eritrea",
    "Estonia",
    "Ethiopia",
    "Fiji",
    "Finland",
    "France",
    "Gabon",
    "Gambia, The",
    "Georgia",
    "Germany",
    "Ghana",
    "Greece",
    "Grenada",
    "Guatemala",
    "Guinea",
    "Guinea-Bissau",
    "Guyana",
    "Haiti",
    "Honduras",
    "Hungary",
    "Iceland",
    "India",
    "Indonesia",
    "Iran",
    "Iraq",
    "Ireland",
    "Israel",
    "Italy",
    "Jamaica",
    "Japan",
    "Jordan",
    "Kazakhstan",
    "Kenya",
    "Kiribati",
    "Korea, North",
    "Korea, South",
    "Kuwait",
    "Kyrgyzstan",
    "Laos",
    "Latvia",
    "Lebanon",
    "Lesotho",
    "Liberia",
    "Libya",
    "Liechtenstein",
    "Lithuania",
    "Luxembourg",
    "Macedonia",
    "Madagascar",
    "Malawi",
    "Malaysia",
    "Maldives",
    "Mali",
    "Malta",
    "Marshall Islands",
    "Mauritania",
    "Mauritius",
    "Mexico",
    "Micronesia",
    "Moldova",
    "Monaco",
    "Mongolia",
    "Morocco",
    "Mozambique",
    "Myanmar",
    "Namibia",
    "Nauru",
    "Nepal",
    "Netherlands",
    "New Zealand",
    "Nicaragua",
    "Niger",
    "Nigeria",
    "Norway",
    "Oman",
    "Pakistan",
    "Palau",
    "Panama",
    "Papua New Guinea",
    "Paraguay",
    "Peru",
    "Philippines",
    "Poland",
    "Portugal",
    "Qatar",
    "Romania",
    "Russia",
    "Rwanda",
    "Saint Kitts and Nevis",
    "Saint Lucia",
    "Saint Vincent",
    "Samoa",
    "San Marino",
    "Sao Tome and Principe",
    "Saudi Arabia",
    "Senegal",
    "Serbia and Montenegro",
    "Seychelles",
    "Sierra Leone",
    "Singapore",
    "Slovakia",
    "Slovenia",
    "Solomon Islands",
    "Somalia",
    "South Africa",
    "Spain",
    "Sri Lanka",
    "Sudan",
    "Suriname",
    "Swaziland",
    "Sweden",
    "Switzerland",
    "Syria",
    "Taiwan",
    "Tajikistan",
    "Tanzania",
    "Thailand",
    "Togo",
    "Tonga",
    "Trinidad and Tobago",
    "Tunisia",
    "Turkey",
    "Turkmenistan",
    "Tuvalu",
    "Uganda",
    "Ukraine",
    "United Arab Emirates",
    "United Kingdom",
    "United States",
    "Uruguay",
    "Uzbekistan",
    "Vanuatu",
    "Vatican City",
    "Venezuela",
    "Vietnam",
    "Yemen",
    "Zambia",
    "Zimbabwe"
  );


 /*
 @desc: get all batch generated and session  and 
 */
  
    $get_all_batch = "select * from student_batch";
    $quer=mysqli_query($conn,$get_all_batch);


 /*
 @desc: get all batch generated and session  and 
 */
  $invalid_type=0;

  $get_all_stand = "select * from class_standard";
  $standardsql =mysqli_query($conn,$get_all_stand);

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
        $invalid_type=1;
      echo "<span id='invalid'>***Invalid file Size or Type***<span>";
      }
}

$msg=NULL;
$error_status=0;
$msg_roll=$msg_first_name=$msg_gender=$msg_address=$msg_country=$msg_state=$msg_email=$msg_city=$msg_pincode=$msg_batch=$msg_standard=$msg_dob=$msg_father_mob=$msg_mother_mob=$msg_profile_image=$msg_stu_mob=$msg_phone_num=$msg_middle_name=$msg_last_name="";

if(isset($_POST['submit'])){

    $pin = generatePIN();

 
    $roll_num=isset($_POST['roll_num']) ? $_POST['roll_num'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $first_name=isset($_POST['f_name']) ? $_POST['f_name'] : '';
    $middle_name=isset($_POST['m_name']) ? $_POST['m_name'] : '';
    $last_name=isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $address=isset($_POST['address']) ? $_POST['address'] : '';
    $country=isset($_POST['country']) ? $_POST['country'] : '';
    $state=isset($_POST['state']) ? $_POST['state'] : '';
    $email=isset($_POST['email']) ? $_POST['email'] : '';
    $city=isset($_POST['city']) ? $_POST['city'] : '';
    $pincode=isset($_POST['pincode']) ? $_POST['pincode'] : '';
    $father_mob=isset($_POST['father_mob']) ? $_POST['father_mob'] : '';
    $mother_mob=isset($_POST['mother_mob']) ? $_POST['mother_mob'] : '';
    $student_mob=isset($_POST['student_mob']) ? $_POST['student_mob'] : '';
    $phone_num=isset($_POST['phone_num']) ? $_POST['phone_num'] : '';
    $dob=isset($_POST['dob']) ? $_POST['dob'] : '';
    $image_profile =isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';

    $batch = isset($_POST['student_batch']) ? $_POST['student_batch'] : '';
    $standard =isset($_POST['student_standard']) ? $_POST['student_standard'] : '';


    $error_status=0;
    if($roll_num==""){
      $msg_roll="Please enter roll number.";
      $error_status=1;
    }elseif($first_name==""){
      $msg_first_name="Please enter first name.";
      $error_status=1;
    }
    // elseif($middle_name==""){
    //   $msg_middle_name="Please enter your middle name";   Developer 3
    //   $error_status=1;
    // }
    elseif($last_name==""){
      $msg_last_name="Please enter last name.";
      $error_status=1;
    }elseif($gender==""){
      $msg_gender="Please select gender.";
      $error_status=1;
    }elseif($address==""){
      $msg_address="Please eneter address.";
      $error_status=1;
    }elseif($country==""){
      $msg_country="Please select country.";
      $error_status=1;
    }elseif($email==""){
      $msg_email="Please enter your email address.";
      $error_status=1;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg_email = 'Please enter a valid email address !'; // Developer 3
    $error_status=1;
    }elseif($state==""){
      $msg_state="Please select state.";
      $error_status=1;
    }elseif($father_mob==""){
      $msg_father_mob="Please enter fathers mobile number.";
      $error_status=1;
    }elseif(strlen($father_mob)<10 || strlen($father_mob)>10){
      $msg_father_mob="Please enter mobile number of 10 digit only.";
      $error_status=1;
    }
    elseif($city==""){
      $msg_city="Please select city.";
      $error_status=1;
    }elseif($mother_mob==""){
      $msg_mother_mob="Please enter mother mobile number.";
      $error_status=1;
    }elseif(strlen($mother_mob)<10 || strlen($mother_mob)>10){
      $msg_mother_mob="Please enter mobile number of 10 digit only.";
      $error_status=1;
    }
    elseif($pincode==""){
      $msg_pincode="Please enter pincode.";
      $error_status=1;
    }elseif($student_mob=="") {
      $msg_stu_mob="Please enter student mobile number.";
      $error_status=1;
    }elseif(strlen($student_mob)<10 || strlen($student_mob)>10){
      $msg_stu_mob="Please enter mobile number of 10 digit only.";
      $error_status=1;
    }
    elseif($phone_num==""){
      $msg_phone_num="Please enter phone number.";
      $error_status=1;
    }elseif(strlen($phone_num)<10 || strlen($phone_num)>10){
      $msg_phone_num="Please enter mobile number of 10 digit only.";
      $error_status=1;
    }
    elseif($dob==""){
      $msg_dob="Please select date of birth.";
      $error_status=1;
    }elseif($batch==""){
      $msg_batch="Please select batch.";
      $error_status=1;
    }
    elseif($standard==""){
      $msg_standard="Please select standard.";
      $error_status=1;
    }elseif($image_profile==""){
      $msg_profile_image="Please select image.";
      $error_status=1;
    }elseif($invalid_type==1){
      $msg_profile_image="Please select image of size 1mb and correct format.";
      $error_status=1;
    }



    if($error_status==0){
          
     $insert = "insert into students_details(roll_num,gender,first_name,middle_name,last_name,address,country,email,state,city,pincode,fathers_mob,mother_mob,stu_mob,phone_num,dob,image_profile,student_unique_id,stand_id,batch_id)VALUES('".$roll_num."','".$gender."','".$first_name."','".$middle_name."','".$last_name."','".$address."','".$country."','".$email."','".$state."','".$city."','".$pincode."','".$father_mob."','".$mother_mob."','".$student_mob."','".$phone_num."','".$dob."','".$image_profile."','".$pin."','".$standard."','".$batch."')";  

          $quer=mysqli_query($conn,$insert);
              
          $last_id=mysqli_insert_id($conn);
      }
}




?>


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:  #707070;">Students Registration Form</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Register Students
                    </div>

                    <!-- 
                    flash message for the input fields in the textboxes..
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
                        window.location.href='/library/pages/students.php';
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
              <div class=""> <!-- Developer 3 -->
                 <div class="row">

             <div class="col-lg-8">
              <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data">
                <div class="form-group ">
                  <label class="control-label col-sm-2" for="email" >Roll number</label>
                  <div class="col-md-2">
                    <input type="text" name="roll_num" class="form-control" value="<?php if(isset($_POST['roll_num'])) { echo $_POST['roll_num']; }?>"> 
                    <p style="color: red;"><?php echo $msg_roll;?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">First Name</label>
                  <div class="col-sm-8">
                    <input type="text"  name="f_name" class="form-control" value="<?php if(isset($_POST['f_name'])) { echo $_POST['f_name']; }?>">
                    <p style="color: red;"><?php echo $msg_first_name;?></p>
                  </div>
                </div>

                    <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Middle Name</label>
                  <div class="col-sm-8">
                    <input type="text" name="m_name" class="form-control" value="<?php if(isset($_POST['m_name'])) { echo $_POST['m_name']; }?>">
                    <p style="color: red;"><?php echo $msg_middle_name;?></p>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Last Name</label>
                  <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control" value="<?php if(isset($_POST['last_name'])) { echo $_POST['last_name']; }?>">
                    <p style="color: red;"><?php echo $msg_last_name;?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="gender">Gender</label>
                  <div class="col-sm-6">
                   <div class="radio">
          					  <label><input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) && $_POST['gender']=='male') { echo "checked";  }?> >Male</label> <!-- Developer 3 -->
          					</div>
          					<div class="radio">
          					  <label><input type="radio" name="gender" value="female" <?php if(isset($_POST['gender']) && $_POST['gender']=='female') { echo "checked";  }?> >Female</label> <!-- Developer 3 -->
                      <p style="color: red;"><?php echo $msg_gender;?></p>
          					</div>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Street Address</label>
                  <div class="col-sm-8">
                      <textarea name="address" class="form-control" rows="5" > <?php if(isset($_POST['address'])) { echo $_POST['address']; }?> </textarea> <!-- Developer 3 -->
                      <p style="color: red;"><?php echo $msg_address;?></p>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Country</label>
                  <div class="col-md-3">
                     <select class="form-control" name="country" >

                  <?php
                  foreach ($country_list as $key => $value) {
                    echo"<option value=".$value;
                     if(isset($_POST['country']) && $_POST['country']==$value) { echo " selected"; }
                     echo ">".$value."</option>";
                  }
                  ?>
                   
                </select>    
                    <p style="color: red;"><?php echo $msg_country;?></p>
                  </div>

                   <label class="control-label col-sm-3" for="email">Email</label>
                  <div class="col-md-3">
                    <input type="text" name="email" class="form-control" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; }?>" >
                    <p style="color: red;"><?php echo $msg_email;?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">State</label>
                  <div class="col-md-3">
                     <select class="form-control" name="state">

                     <?php
                  foreach ($indian_all_states as $key => $value) {
                    echo"<option value=".$value;
                     if(isset($_POST['state']) && $_POST['state']==$value) { echo " selected"; }
                     echo ">".$value."</option>";
                  }
                  ?>
                  
                   
                </select>    
                    <p style="color: red;"><?php echo $msg_state;?></p>
                  </div>

                  <label class="control-label col-sm-3" for="email">Fathers Mobile</label>
                  <div class="col-md-3">
                    <input type="text" name="father_mob" class="form-control" value="<?php if(isset($_POST['father_mob'])) { echo $_POST['father_mob']; }?>">
                    <p style="color: red;"><?php echo $msg_father_mob;?></p>
                  </div>

                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">City</label>
                  <div class="col-md-3">
                    <input type="text" name="city" class="form-control" value="<?php if(isset($_POST['city'])) { echo $_POST['city']; }?>">
                    <p style="color: red;"><?php echo $msg_city;?></p>
                  </div>

                  <label class="control-label col-sm-3" for="email">Mothers mobile</label>
                  <div class="col-md-3">
                    <input type="text" name="mother_mob" class="form-control" value="<?php if(isset($_POST['mother_mob'])) { echo $_POST['mother_mob']; }?>">
                    <p style="color: red;"><?php echo $msg_mother_mob;?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Pin Code</label>
                  <div class="col-md-3">
                    <input type="text" name="pincode" class="form-control" value="<?php if(isset($_POST['pincode'])) { echo $_POST['pincode']; }?>">
                    <p style="color: red;"><?php echo $msg_pincode;?></p>
                  </div>

                  <label class="control-label col-sm-3" for="email">Student Mobile</label>
                  <div class="col-md-3">
                    <input type="text" name="student_mob" class="form-control" value="<?php if(isset($_POST['student_mob'])) { echo $_POST['student_mob']; }?>">
                    <p style="color: red;"><?php echo $msg_stu_mob;?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Phone Number</label>    
                  <div class="col-md-3">
                    <input type="text" name="phone_num" class="form-control" value="<?php if(isset($_POST['phone_num'])) { echo $_POST['phone_num']; }?>">
                    <p style="color: red;"><?php echo $msg_phone_num;?></p>
                  </div>
                  <label class="control-label col-sm-3" for="email">Date of Birth</label>
                  <div class="col-md-3">
                    <input type="date" name="dob" class="form-control" value="<?php if(isset($_POST['dob'])) { echo $_POST['dob']; }?>">
                    <p style="color: red;"><?php echo $msg_dob;?></p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Select Batch</label>    
                  <div class="col-md-3">
                  <select class="form-control" name="student_batch">

                  <?php
                  while($results = mysqli_fetch_array($quer)){
                    
                    echo"<option value=".$results['batch_id'].">".$results['batch_name']."</option>";
                      }
                  ?>
                   
                </select>
                <p style="color: red;"><?php echo $msg_batch;?></p>
                </div>
                 
                  <label class="control-label col-sm-3" for="email">Select Standard</label>
                  <div class="col-md-3">
                    <select class="form-control" name="student_standard">

                    <?php
                    while($results = mysqli_fetch_array($standardsql)){
                        
                      echo"<option value=".$results['id'].">".$results['standard']."</option>";
                        }
                  ?>
                </select>
                <p style="color: red;"><?php echo $msg_standard;?></p>
                  </div>
                </div>
           
               
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
            </div>
           
          <div class="col-lg-4">
            <div  id="selectImage"> <!-- Developer 3 -->
              <?php
                if(isset($_FILES["file"]["type"]))
                {
                  echo "<div id='image_preview'><img  id='blah' src='".$targetPath."' class='img-rounded' alt='Cinque Terre' width='150' height='180'></div>";
                }else{
                  echo  "<div id='image_preview'><img  id='blah' src='upload.png' class='img-rounded' alt='Cinque Terre' width='150'  height='180'></div>";
                }
              ?> 
              <hr id="line">
              <input type="file"  onchange="readURL(this);" name="file"/>
              <p style="color: red;"><?php echo $msg_profile_image;?></p><br> <!-- Developer 3 -->
              <p style="color: green;">Accepted Formats : jpeg,jpg,png <br> Accepted Formats :  less then 1MB  </p> <!-- Developer 3 -->
            </div>
          </div>
        </form>

          <!-- form open when submit showing the image of barcode  -->


          <!--  -->
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
    


  <?php


 include('footer.php');
 ?>

        

