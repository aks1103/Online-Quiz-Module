<?php
   include('session.php');

$msg = '';

if($_SERVER["REQUEST_METHOD"]== "POST"){
	$email1 = $login_session;
	$sql = "SELECT current FROM participants_hunt WHERE email = '$email1'";
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	$current = $row['current'];

	// echo "answer$current";
	if(isset($_POST["answer"])){


		$correct = 0;
	

	$response = $_POST["answer"];

	if($email1 == $login_session){


		
		switch($current){

			case 0: $msg = "Something went wrong please restart the Quiz.";
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
						 $temp = $current + 1;
							$sql =  "UPDATE participants_hunt SET current = $temp WHERE email='$email1'";
							$db->query($sql);
							header("location:thanks.php");
						exit();

					} break;

			case 19: $msg = "Sucessfully completed the quiz. " ;
						header("location:thanks.php");
						exit();
						break;
			default : 
					$msg = "Something went wrong..." ;

		}



		if($correct == 1){

			$temp = $current + 1;
			$sql =  "UPDATE participants_hunt SET current = $temp WHERE email='$email1'";
			$db->query($sql);
			$msg = "Correct Answer !!!";

		} 

		else{ 
			$msg =  "Oops your answer is incorrect. Try Again !!";
		}
		
	}

	}
}


   $sql = "SELECT isStarted FROM participants_hunt WHERE email = '$login_session'";
   $isStarted = 0;
   $retval = $db->query($sql);
    if($retval->num_rows > 0 ){

    	$row = $retval->fetch_assoc();
    	$isStarted = $row['isStarted'];


    }else{
    	echo "Invalid credentials or session expired.";
    }


    if($isStarted == 0 ){
  		
  		header("location:welcome.php");
  		exit();

    }
   

?>


<?php

	$sql = "SELECT isSet FROM participants_hunt WHERE email = '$login_session'";
	$retval = $db->query($sql);
	$row = $retval->fetch_assoc();

	$isSet = $row["isSet"];
	
	

		
		
	$sql = "SELECT current FROM participants_hunt WHERE email = '$login_session'";

	$result = $db->query($sql);

	$current_num  = 0;
	

	if($result->num_rows > 0){

		$row = $result->fetch_array();
		$current_num = $row['current'];

			
		}
		


	if($isSet == 0){

		$time = time();

		// echo "$time";
		
		$sql = "UPDATE participants_hunt SET isSet = 1 , time = $time WHERE email = '$login_session'";

		$db->query($sql);

	
	}




?>
<html>
<head>
	<title>Reflux | Hunt</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<style>
		
	.greenAns{
		color:#33aa77;
	}

		.footer{
			border-top: solid 2px #cccccc;
			background-color: #bababa;
			z-index: 10;
			position: fixed;
			bottom:0;
			width:100%;
			height:6vh;
			padding:10px;

		}

		.space{
			
			height:13vh;
			


		}

		.btn{
			border-radius: 10px;
			padding: 7px;
			width:9vw;
			border:none;
			height:5vh;
			background-color: #fafafa;
			margin-left: 3px;

		}

		.btn2{
			border-radius: 10px;
			padding: 4px;
			width:9vw;
			border:none;
			height:5vh;
			background-color: #fafafa;
			margin-left: 3px;

		}

		.btn3{
			border-radius: 10px;
			padding: 4px;
			width:12vw;
			border:none;
			height:5vh;
			background-color: #fafafa;
			margin-left: 3px;

		}

		.btn2:active{
			border: none;
		}

		.question_ctrl{
			position:fixed;
			bottom: 12vh;
			right:1vw;
			border:solid 2px #039BE5;
			border-radius: 4px;

		}

		body{
			padding:0;
			margin: 0;
			border-width:0;
			background-color: #ffffff;
			overflow-x: hidden;	

		}

		.btn :active{
			border: none;
		}

		#back{
			position: fixed;
			right:23vw;
		}

		#next{
			position: fixed;
			right:13vw;
		}

		#submitBtn{
			position: fixed;
			right:3vw;
			bottom:3vh;
		}

		#start{

		}

	

		#instruction{
			position:fixed;
			

		}

		#instruction ul li{
			color: #229955;
			font-size: 3vh;
			margin: 10px;


		}
		.heading{
			padding-top: 10px;
			margin:0;
			color: #229955;

		}

		.question{
			margin-top:10px;
			margin-left:10px;

		}


		.timer{
			position: relative;
			left:20vw;
			font-size:20px;
			color: #dd5522; 
		}

		.panelbtn_red{
			border:none;
			background-color: #ff2242;
			color: #fafafa;
			width:40px;
			height:40px;
			margin:10px;
			border-radius: 10px;
			font-size: 16px;
		}

		.panelbtn_green{
			border:none;
			background-color: #22ff42;
			color: #fafafa;
			width:40px;
			height:40px;
			margin:10px;
			border-radius: 10px;
			font-size: 16px;
		}

		.answer{
			border:none;
			width:20vw;
			border-bottom: solid 2px #7a7a7a;
			height:5vh;
			padding:4px;
			margin-left: 8px;
		}
	</style>
</head>
<body>
	

	

	<div class="instruction" id="instruction" hidden style="width:100%;">
				<center><u>
				<h2 class="heading"> General Instruction </span></u></h2></center>
				<ul>
					<li>Fill your answer in the space provided corresponding to each question.</li>
					<li>You can answer next question only when you have successfully answered the present question.</li>
					<li><button class="btn2" disabled>Evaluate</button> use this to evaluate your answer and continue.<b>Status will be shown on bottom right.</b></li>
					<li>Answer are not case sensative but any type of spelling error will not be taken into account.</li>
				</ul>


				
	</div>


<?php 

{

	$j = $current_num;
	echo <<<SOM
<form method= "POST" action="">
	<div id='page1'>
	<center><h2 style='color:#229955'>Question $j</h2></center>
		<div class="question"  >
			
			<center><img src="./questions/q$current_num.png" /></center><br/><br/>
		 
			<div id='question$j'>
			<input type='text' placeholder='Answer' name='answer' class='answer'/>
		  </div>
		</div>
	</div>

	<div class="question_ctrl">

			<button name="saveques" class="btn2" id="saveques">Evaluate</button>
	</div>
	</form>

SOM;
}

?>
	
	
	<div class='space'></div>

	<center><span style="position:fixed; bottom:10vh; color:#dd2222;right:40vw;"><?php echo $msg; ?></span></center>

	<div class="footer">
				
				<button	class="btn" id="instructbtn" onclick="instruct();">Instructions</button>
				
				<button class="btn2" id="gobacktoques" onclick="gobacktoques();">Back to Questions</button>
			    <span class="timer" >Ends On 26th March 4:00 p.m.</span>
			   				 
				<span></span>
	</div>


	<script type="text/javascript">
		
	var page_count = 1;


	window.onload = onloadfunction();

	function onloadfunction(){

	
		// document.getElementById("page"+page_count).hidden = false;
		// document.getElementById("panel").hidden = true;
		document.getElementById("instruction").hidden = true;

		document.getElementById("gobacktoques").disabled = true;
		// document.getElementById("back").disabled = true;




	}


		function submitQues(value){
			
			var quesnum = value;
			$selectq = 'input:text[name=answer'+ quesnum +']'
			var response = $($selectq).val();

			
			var email = "<?php echo mysqli_escape_string($db,$login_session); ?>";
		    $.post("saveques.php",
		    {
		        email: email,
		        quesnum: quesnum,
		        response : response
		       },

		    function(data, status){

		    	alert(data + " 1 " + status);
		        if(status.toLowerCase() == "success"){

		        	location.reload();

		        }
		        if(status.toLowerCase() == "failure"){

		        	document.getElementById('message').hidden = false ;


		        };
		    	
		    });

		    
		}

			
		

function instruct()
{

	document.getElementById("page"+page_count).hidden = true;	
	// document.getElementById("panel").hidden = true;
	document.getElementById("instruction").hidden = false;

	// document.getElementById("panelbtn").disabled = false;
	document.getElementById("instructbtn").disabled = true;
	document.getElementById("gobacktoques").disabled = false;

	


}

function gobacktoques(){

	
	document.getElementById("page"+page_count).hidden = false;	
	// document.getElementById("panel").hidden = true;
	document.getElementById("instruction").hidden = true;




	document.getElementById("gobacktoques").disabled = true;
	// document.getElementById("panelbtn").disabled = false;
	document.getElementById("instructbtn").disabled = false;

}


</script>
</body>
</html>