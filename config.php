<?php
   // Add you own values where you see ...
   define('DB_SERVER', '...');
   define('DB_USERNAME', '...');
   define('DB_PASSWORD', '...');
   define('DB_DATABASE', '...');
   define('MEDIA_URL', 'http://...');
   $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   // Check connection
   if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
   }  
?>
