<?php
   include('session.php');


   $sql = "SELECT isStarted FROM participants_hunt WHERE email = '$login_session'";
   $isStarted = 1;
   $retval = $db->query($sql);
    if($retval->num_rows > 0 ){

    	$row = $retval->fetch_assoc();
    	$isStarted = $row['isStarted'];


    }else{
    	echo "Invalid credentials or session expired.";
    }


    if($isStarted == 0 )
{
   
	$email = $_SESSION['login_user'];

	$sql = "UPDATE participants_hunt SET current = 1 , isStarted = 1 WHERE email = '$email'";

	$db->query($sql);



	header("location:quiz.php");
	exit();



}else{
	
	header("location:quiz.php");
}
?>