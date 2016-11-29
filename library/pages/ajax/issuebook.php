<?php 
	include('../dbcon.php');
	$bookname = $_POST['bookname'];
	$query = "SELECT * FROM books_attribute where book_name='".$bookname."' LIMIT 1";
	if ($result=mysqli_query($conn,$query))
	{
		$row=mysqli_fetch_assoc($result);
	}

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($row);

 ?>