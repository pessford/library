<?php

include('dbcon.php');
// Storing Session

$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$ses_sql="select username from client_detail where username='$user_check'";
 $result=mysqli_query($conn,$ses_sql);
 $get_data = mysqli_fetch_assoc($result);
 
$login_session =$get_data['username'];
 
if(!isset($login_session)){

mysqli_close($conn); // Closing Connection
header('Location: http://localhost/library/pages/index.php'); // Redirecting To Home Page
}
?>