<?php
	include("config.php");
   session_start();  

	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET)){

		$email = $_GET['e'];
		$confirm = $_GET['c'];

		$sql = 'SELECT id ,isActive FROM participants_hunt WHERE email = "'.$email.'" AND isActive = "'.$confirm.'"';
   

   		$retval = $db->query($sql);



	   if ($retval->num_rows == 1) {
	      while($row = $retval->fetch_assoc()) {
	          $id = $row["id"];  
	          $isActive = $row["isActive"];

	          if($isActive == '1'){
	          	echo "Email Already confirmed...";
	          }

	          $sql = "UPDATE participants_hunt SET isActive = '1' WHERE id = '$id '";

	          if ($db->query($sql) === TRUE) {

	          	echo "Email Confirmed Sucessfully. <a href='http://hunt.reflux.in/login.php'>Click Here to Login</a>";

	          }else{

	              echo "Error  in connection. Try again.";
	              exit();

	          }
		}
	}else{
		echo "Confirmaton link is invalid";

	}
}

?>