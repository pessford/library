 <?php
 include('header.php');
 include('dbcon.php');


 /*
 @desc: get all batch generated and session  and 
 */
  
    $get_all_batch = "select * from student_batch";
    $quer=mysqli_query($conn,$get_all_batch);


 /*
 @desc: get all batch generated and session  and 
 */

  $get_all_stand = "select * from class_standard";
  $standardsql =mysqli_query($conn,$get_all_stand);

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

 if(isset($_REQUEST['asdf'])){
 	$sel="select * from students_details where student_id='".$_REQUEST['asdf']."' order by student_id desc";
 	$result = mysqli_query($conn,$sel);

 	 $result = mysqli_fetch_assoc($result);


 		if(isset($_REQUEST['submit'])){

 			
 			  $firstname = $_POST['first_name'];
			  $roll_num = $_POST['roll_num'];
			  $last_name = $_POST['last_name'];
			  $address = $_POST['address'];
			  $mobile = $_POST['stu_mob'];
        $email =  $_POST['email'];
        $state = $_POST['state'];
        $city = $_POST['city'];
			 
 			
	 		$update = "UPDATE students_details SET first_name ='".$firstname."',roll_num='".$roll_num."', last_name ='".$last_name."', address = '".$address."', stu_mob = '".$mobile."', email = '".$email."', state = '".$state."', city = '".$city."' WHERE student_id = '".$_REQUEST['asdf']."' ";

	 		$update_client = mysqli_query($conn,$update);		
      
              
     $recordAdded = false;

    if(isset($_POST['submit']))
       $recordAdded = true;

    if($recordAdded)
    {

     echo '
       <script type="text/javascript">
         function hideMsg()
         {
         
            document.getElementById("popup").style.visibility = "hidden";
         }

         document.getElementById("popup").style.visibility = "visible";
         window.setTimeout("hideMsg()", 2000);
       </script>';
    }
 				
 		}
	
 ?>

  <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:  #707070;">Client Registration Form</h1>
            </div>
            <div id="popup">Record updated Successfully </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                Register Students
              </div>
              <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <form class="form-horizontal" method="post">
                      <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group ">
                              <label class="control-label col-sm-4" for="email" >First Name</label>
                              <div class="col-md-8">
                                <input type="text" name="first_name" class="form-control" value="<?php echo $result['first_name'];?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Last Name</label>
                              <div class="col-sm-8">
                                <input type="text" name="last_name" class="form-control"value="<?php echo $result['last_name'];?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Roll Number</label>
                              <div class="col-sm-8">
                                <input type="text" name="roll_num" class="form-control" value="<?php echo $result['roll_num'];?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-4" for="gender">Gender</label>
                              <div class="col-sm-8">
                                <div class="radio">
                                  <label><input type="radio" name="gender" value="male" <?php if($result['gender']=='male') { echo "checked";  }?> >Male</label> <!-- Developer 3 -->
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="gender" value="female" <?php if($result['gender']=='female') { echo "checked";  }?> >Female</label> <!-- Developer 3 -->
                                  <p style="color: red;"><?php echo $msg_gender;?></p>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-sm-4" for="pwd">Address</label>
                              <div class="col-sm-8">
                                <textarea class="form-control" name="address" rows="5" ><?php echo $result['address'];?></textarea> <!-- Developer 3 -->
                              </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          
                        </div>
                      </div>


                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Student Mobile</label>
                          <div class="col-md-4">
                            <input type="text" name="stu_mob" class="form-control" value="<?php echo $result['stu_mob'];?>">
                          </div>
                          
                          <label class="control-label col-sm-2" for="email">Email</label>
                          <div class="col-md-4">
                            <input type="text" name="email" class="form-control" value="<?php echo $result['email'];?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="country">Country</label>
                          <div class="col-md-4">
                            <select class="form-control" name="country" >
                              <?php
                                foreach ($country_list as $key => $value) {
                                  echo"<option value=".$value;
                                  if($result['country']==$value) { echo " selected"; }
                                  echo ">".$value."</option>";
                                }
                              ?>
                            </select>    
                            <p style="color: red;"><?php echo $msg_country;?></p>
                          </div>

                          <label class="control-label col-sm-2" for="email">State</label>
                          <div class="col-md-4">
                            <input type="text" name="state" class="form-control"value="<?php echo $result['state'];?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">City</label>
                          <div class="col-md-4">
                            <input type="text" name="city" class="form-control" value="<?php echo $result['city'];?>">
                          </div>
                          
                          <label class="control-label col-sm-2" for="email">Pin Code</label>
                          <div class="col-md-4">
                            <input type="text" name="pincode" class="form-control" value="<?php echo $result['pincode']; ?>">
                            <p style="color: red;"><?php echo $msg_pincode;?></p>
                          </div>
                        </div>
                      
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Fathers Mobile</label>
                          <div class="col-md-4">
                            <input type="text" name="father_mob" class="form-control" value="<?php echo $result['fathers_mob'];?>">
                            <p style="color: red;"><?php echo $msg_father_mob;?></p>
                          </div>
                    
                          <label class="control-label col-sm-2" for="email">Mothers mobile</label>
                          <div class="col-md-4">
                            <input type="text" name="mother_mob" class="form-control" value="<?php echo $result['mother_mob'];?>">
                            <p style="color: red;"><?php echo $msg_mother_mob;?></p>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Phone Number</label>    
                          <div class="col-md-4">
                            <input type="text" name="phone_num" class="form-control" value="<?php echo $result['phone_num']; ?>">
                            <p style="color: red;"><?php echo $msg_phone_num;?></p>
                          </div>
                          
                          <label class="control-label col-sm-2" for="email">Date of Birth</label>
                          <div class="col-md-4">
                            <input type="date" name="dob" class="form-control" value="<?php echo $result['dob']; ?>">
                            <p style="color: red;"><?php echo $msg_dob;?></p>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-sm-2" for="email">Select Batch</label>    
                          <div class="col-md-3">
                            <select class="form-control" name="student_batch">
                            <?php
                              while($results = mysqli_fetch_array($quer)){                    
                                echo"<option value=".$results['batch_id'];
                                if ($result['batch_id']==$results['batch_id']) {
                                  echo " selected ";
                                }
                                echo ">".$results['batch_name']."</option>";
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
                                echo"<option value=".$results['id'];
                                if ($result['stand_id']==$results['id']) {
                                  echo " selected ";
                                }
                                echo ">".$results['standard']."</option>";
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
                      </form>
                    </div>
                  </div>
              </div>
            </div> 
          </div>
        </div>    
      </div>	
	</body>		
	</html>
	<?php
	}
