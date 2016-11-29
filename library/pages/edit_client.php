 <?php
 if(isset($_REQUEST['asdf'])){
 	$sel="select * from client_detail where id='".$_REQUEST['asdf']."' order by id desc";
 	$result = mysqli_query($conn,$sel);
 	$result = mysqli_fetch_assoc($result);

 		if(isset($_REQUEST['submit'])){

 			
 			  $client_id = $_POST['client_id'];
			  $client_title = $_POST['client_title'];
			  $name = $_POST['name'];
			  $address = $_POST['address'];
			  $country = $_POST['country'];
			  $email = $_POST['email'];
			  $state = $_POST['state'];
			  $user_name = $_POST['username'];
			  $mobile = $_POST['mobile'];
			  $city = $_POST['city'];
			  $pincode = $_POST['pincode'];
			  $password = $_POST['password'];
			  $phone_num = $_POST['phone_num'];
 			
	 		$update = "UPDATE user_info SET client_id ='".$client_id."',client_title='".$client_title."', name ='".$name."', address = '".$address."', country = '".$country."', email = '".$email.", state = '".$state.", username = '".$username.", mobile = '".$mobile.", city = '".$city.", pincode = '".$pincode.", email = '".$password.", phone_num = '".$phone_num."  WHERE id = '".$_REQUEST['asdf']."' ";
	 		$result = mysqli_query($conn,$update);		

	  						
 				
 		}
	
 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
	
	             <div class="panel-body">
              <div class="container">
                 <div class="row">

             <div class="col-lg-8">
              <form class="form-horizontal" method="post">
                <div class="form-group ">
                  <label class="control-label col-sm-2" for="email" >Client Id</label>
                  <div class="col-md-2">
                    <input type="text" name="client_id" class="form-control" >
                  </div>
        
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Client title</label>
                  <div class="col-sm-6">
                    <input type="text" name="client_title" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Name</label>
                  <div class="col-sm-6">
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Address</label>
                  <div class="col-sm-6">
                      <textarea class="form-control" name="address" rows="5"></textarea>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Country</label>
                  <div class="col-md-2">
                    <input type="text" name="country" class="form-control" >
                  </div>

                   <label class="control-label col-sm-2" for="email">Email</label>
                  <div class="col-md-2">
                    <input type="text" name="email" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">State</label>
                  <div class="col-md-2">
                    <input type="text" name="state" class="form-control" >
                  </div>

                  <label class="control-label col-sm-2" for="email">Mobile</label>
                  <div class="col-md-2">
                    <input type="text" name="mobile" class="form-control" >
                  </div>

                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">City</label>
                  <div class="col-md-2">
                    <input type="text" name="city" class="form-control" >
                  </div>

                  <label class="control-label col-sm-2" for="email">Username</label>
                  <div class="col-md-2">
                    <input type="text" name="username" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Pin Code</label>
                  <div class="col-md-2">
                    <input type="text" name="pincode" class="form-control" >
                  </div>

                  <label class="control-label col-sm-2" for="email">Password</label>
                  <div class="col-md-2">
                    <input type="text" name="password" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Phone Number</label>    
                  <div class="col-md-2">
                    <input type="text" name="phone_num" class="form-control" >
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
	</body>		
	</html>
	<?php
	}
