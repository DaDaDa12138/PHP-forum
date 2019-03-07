<?php
include "db.php";

extract($_POST);

	$fname = str_replace("'","`",$fname); 
	$fname = mysql_real_escape_string($fname);
	
	$lname = str_replace("'","`",$lname); 
	$lname = mysql_real_escape_string($lname); 
	        
	$username = str_replace("'","`",$username); 
	$username = mysql_real_escape_string($username); 

	$password = str_replace("'","`",$password); 
	$password = mysql_real_escape_string($password);
	$password = md5($password);

$sql = "INSERT INTO `tbluser`(`fname`, `lname`, `gender`) VALUES ('$fname','$lname','$gender')";
$result = mysql_query($sql);

 if($result)
	{
		$a1 = mysql_query("SELECT * FROM `tbluser` WHERE `fname` = '$fname' ");
		$a2 = mysql_fetch_array($a1);
		
		if($a1)
		{
			$a3= $a2['user_Id'];
			$sqli = "INSERT INTO `tblaccount`(`username`, `password`, `user_Id`) VALUES('$username','$password',$a3)";
			$result = mysql_query($sqli);
			
			if($result==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'alert("Successfully Registered")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=../index.php" />';
                            }

		}
			
		
	}




?>