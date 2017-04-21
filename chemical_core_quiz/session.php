<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
      $sql = "SELECT email FROM participants WHERE email = '$user_check'";

   // $sql = "Select email from participants where email = '$user_check' ";


   $ses_sql = $db->query($sql);
   
   $row = $ses_sql->fetch_assoc();
   
   $login_session = $row['email'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>