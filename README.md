The code in this repository will handle logging into the media server.  This is an exercise 
in handling PHP MYSQL requests in a secure manner to do this several actions have been taken;
1. Use mysqli and parameters.
2. Hash the passwords using blowfish, crypt(), a unique salt and adding a parameter to slow the    password hashing function in an effort to thwart brute force attacks.
3. The file class_hash.php is not included as this contains the hashing algorithm.
