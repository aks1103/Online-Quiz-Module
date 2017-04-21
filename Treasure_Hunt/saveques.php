<?php
	
	include('session.php');

	$email = $_POST['email'];

	$sql = "SELECT current FROM participants_hunt WHERE email = '$email'";
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	$current = $row['current'];

	
	$response = $_POST['response'];

	if($email == $login_session){


		$correct = 0;
		switch($current){

			case 0: return "failure";
					break;

			case 1: 
					if(strtolower($response) == "saarc" || strtolower($response) == "saarc nations"){
						$correct = 1 ;
					} break;
			case 2: 
					if(strtolower($response) == "harry potter"){
						 $correct = 1 ;
					} break; 
			case 3: 
					if(strtolower($response) == "silence of the lambs"){
						 $correct = 1 ;
					} break;
			case 4: 
					if(strtolower($response) == "australia"){
						 $correct = 1 ;
					} break;

			case 5: 
					if(strtolower($response) == "taylor swift"){
						 $correct = 1 ;
					} break;
			case 6: 
					if(strtolower($response) == "kodak"){
						 $correct = 1 ;
					} break;

			case 7: 
					if(strtolower($response) == "volkswagen"){
						 $correct = 1 ;
					} break;

			case 8: 
					if(strtolower($response) == "nirma"){
						 $correct = 1 ;
					} break;

			case 9: 
					if(strtolower($response) == "harvard"){
						 $correct = 1 ;
					} break;

			case 10: 
					if(strtolower($response) == "germany"){
						 $correct = 1 ;
					} break;

			case 11: 
					if(strtolower($response) == "maverick"){
						 $correct = 1 ;
					} break;

			case 12: 
					if(strtolower($response) == "elon musk"){
						 $correct = 1 ;
					} break;

			case 13: 
					if(strtolower($response) == "james cameron"){
						 $correct = 1 ;
					} break;
			case 14: 
					if(strtolower($response) == "rajdeep sardesai"){
						 $correct = 1 ;
					} break;

			case 15: 
					if(strtolower($response) == "honeycomb"){
						 $correct = 1 ;
					} break;

			case 16: 
					if(strtolower($response) == "krypton"){
						 $correct = 1 ;
					} break;

			case 17: 
					if(strtolower($response) == "keibul lamjao"){
						 $correct = 1 ;
					} break;
			case 18: 
					if(strtolower($response) == "bob dylan"){
						 $correct = 1 ;
					} break;

			case 19: return "completed" ;
						break;
			default : 
					return "failure" ;

		}



		if($correct == 1){

			$temp = $current + 1;
			$sql =  "UPDATE participants_hunt SET current = $temp WHERE email='$email'";
			$db->query($sql);
			return "success";

		} 

		else{ 
			return "failure";
		}
		
	}

?>