<?PHP
function openurl($url) {
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch,CURLOPT_TIMEOUT, '3');
	 $content = trim(curl_exec($ch));

	 echo $content;
	 curl_close($ch); 

}
function balurl($bal_url) {
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$bal_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch,CURLOPT_TIMEOUT, '3');
	 $content = trim(curl_exec($ch));

	 	echo str_replace("Your Balance is :","",$content);
	 curl_close($ch); 

}
	// $username="utkarshh"; //use your sms api username
	// $pass    = "tech008$*";  //enter your password

	// $dest_mobileno   =     "8090129502";//reciever 10 digit number (use comma (,) for multiple users. eg: 9999999999,8888888888,7777777777)
	// $sms         =     "Hiii kaif check you wallet...";//sms content
	// $senderid    =     "UTKRSH";//use your sms api sender id
	// $sms_url = sprintf("http://123.63.33.43/blank/sms/user/urlsmstemp.php?username=utkarshh&pass=tech008$*&senderid=UTKRSH&dest_mobileno=8090129502&message=hiiii&response=Y", $username, $pass , $senderid, $dest_mobileno, $sms, urlencode($sms));

 //openurl($sms_url);	

 	


?>
