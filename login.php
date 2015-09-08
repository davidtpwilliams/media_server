<?php
   include("./class/config.php");
   include("./class/class_hash.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST")
      {
      // Password is hashed so hash the password before checking
      $hash = new PassHash();
      $mypassword = $_POST['password'];
      $myusername = $_POST['username'];

      // Prepare with parameters to prevent SQL injection
      $stmt = $db->prepare("SELECT * FROM login WHERE username=?");
      $stmt->bind_param('s', $myusername);
      $stmt->execute();

      $res = $stmt->get_result();
      $row = $res->fetch_assoc();

      // Hash password and check against DB hashed password 
      if($res->num_rows == 1 && $hash->check_password($row['password'], $_POST['password']))
         {
         session_register("myusername");
         $_SESSION['login_user']=$myusername;
         header("location: " . MEDIA_URL);
         exit();
         }
      else
         {
         $error="Your Login Name or Password is invalid";
         }
      }
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Davideo Media Server Login</h1>
<div id="login">
<h2>Login Form</h2>
<form action="" method="post">
<label> User Name :</label>
<input id="name" name="username" placeholder="username" type="text">
<p>&nbsp;
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<p>&nbsp;
<input name="submit" type="submit" value=" Login ">
</br>
<span><?php echo $error; ?></span>
<span><?php echo $debug; ?></span>
</form>
</div>
</div>
</body>
</html>
