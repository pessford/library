<?php

		include('dbcon.php');
	
		$curr_time_stamp = date("Y-m-d");

		$get_student_unique_id = "select * from biometric_log_table where time_stamp='".$curr_time_stamp."'";
		$result = mysqli_query($conn,$get_student_unique_id);
 	    $result = mysqli_fetch_assoc($result);
	
	    $student_unique = 	$result['client_id'];
		
	function student_log_time($student_unique){

		include('sms_api.php');
		include('dbcon.php');
	    
		date_default_timezone_set('Asia/Calcutta');
		

/*
initialize all variable 
for sending sms alert.
*/
		$username="utkarshh"; //use your sms api username
		$pass    = "tech008$*";  //enter your password
		$time = date("H:i:s");
		$senderid    =     "UTKRSH";//use your sms api sender id


		$get_student_details = "select * from students_details where student_unique_id='".$student_unique."'";
		$result=mysqli_query($conn,$get_student_details);
		$get_data = mysqli_fetch_assoc($result);

		$date   =  date("Y-m-d"); 
			if($get_data){

							$select = "select * from stu_time_detail where date = '".$date."' and student_id='".$student_unique."' and time_out='00:00:00'";
							$res=mysqli_query($conn,$select);
							$is_student_exist = mysqli_fetch_assoc($res);
								
							$select = "select * from stu_time_detail";
							$response=mysqli_query($conn,$select);
							$is_stu_enter = mysqli_fetch_assoc($res);
					

						if($is_student_exist)
						{
							if($is_student_exist['time_out']=="00:00:00" && $is_student_exist['tot_duration']=="00:00:00"){
								
							
								$time_diff = round(abs(strtotime($time)-strtotime($is_student_exist['time_in']))/60,2);

								$hours = floor($time_diff / 3600);
								$minutes = floor(($time_diff / 60) % 60);
								$seconds = $time_diff % 60;	

								$time_cal="$hours:$minutes:$seconds";
								
								$update = "update stu_time_detail set time_out='".$time."',tot_duration='".$time_cal."' where student_id='".$student_unique."' and time_out='00:00:00'";	
								
								$quer=mysqli_query($conn,$update);

								/*
								for sending sms alert to student of out time
								*/
									$dest_mobileno   = $get_data['fathers_mob'];//reciever 10 digit number (use comma (,) for multiple users. eg: 9999999999,8888888888,7777777777)

									$sms = 'Respected parents  your Ward'.$get_data['first_name'].'has departed from library at '.$time.'  studying duration :'.$time_cal.' Greets Library';//sms content
									$sms = urlencode($sms);
								    $sms_url = sprintf("http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=%s&pass=%s&senderid=%s&dest_mobileno=%s&message=%s&response=Y", $username, $pass , $senderid, $dest_mobileno, $sms, urlencode($sms));
								   // echo $sms_url;
								    echo openurl($sms_url);
								

							}	
						}elseif($is_stu_enter['time_out']!="00:00:00"){
								
								$dest_mobileno   = $get_data['fathers_mob'];//reciever 10 digit number (use comma (,) for multiple users. eg: 9999999999,8888888888,7777777777)

								$sms = 'Respected parents : your Ward'.$get_data['first_name'].'studying in  from library at '.$time.'Greets Library';//sms content
								$sms = urlencode($sms);
							    $sms_url = sprintf("http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=%s&pass=%s&senderid=%s&dest_mobileno=%s&message=%s&response=Y", $username, $pass , $senderid, $dest_mobileno, $sms, urlencode($sms));
							   // echo $sms_url;
							    echo openurl($sms_url);

						
							

								$insert_student_time = "insert into stu_time_detail(student_id,time_in,date,time_out,tot_duration)VALUES('".$student_unique."','".$time."','".$date."','".NULL."','".NULL."')";
								$quer=mysqli_query($conn,$insert_student_time);
					  			$last_id=mysqli_insert_id($conn);
				  		
						}

						else{

								$dest_mobileno   = $get_data['stu_mob'];//reciever 10 digit number (use comma (,) for multiple users. eg: 9999999999,8888888888,7777777777)

								$sms = 'Hi your library IN TIME is'.$time;//sms content
								$sms = urlencode($sms);
							    $sms_url = sprintf("http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=%s&pass=%s&senderid=%s&dest_mobileno=%s&message=%s&response=Y", $username, $pass , $senderid, $dest_mobileno, $sms, urlencode($sms));
							   // echo $sms_url;
							    echo openurl($sms_url);

						
							

								$insert_student_time = "insert into stu_time_detail(student_id,time_in,date,time_out,tot_duration)VALUES('".$student_unique."','".$time."','".$date."','".NULL."','".NULL."')";
								$quer=mysqli_query($conn,$insert_student_time);
					  			$last_id=mysqli_insert_id($conn);
				  			
					}
						
			}
			else{
				echo " SORRY Invalid user Id Please try again!";
			}


}
student_log_time($student_unique)

 ?>