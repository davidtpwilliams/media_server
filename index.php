<?php
   include('class/config.php');
   session_start();

   $user_check=$_SESSION['login_user'];

   $ses_sql=mysqli_query($db,"select username from login where username='$user_check' ");
   $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session=$row['username'];

   if(!isset($login_session))
      {
      header("location: " . MEDIA_URL);
      }
   else
      {
      header("location: http://download.davideo.info");
      }
?>