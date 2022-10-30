<?php

require 'config.php';

if(isset($_POST['submit'])){

   $username = $_POST['username'];
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

   if($pass != $cpass){
      $error[] = 'password not matched!';
      
   }else{
      $insert = "INSERT INTO login_user(username, email, password) VALUES('$username','$email','$pass')";
      
      $result = $db->query($insert);
      
      if($result){
         header('location:login_user.php');
      }
   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="input_style.css">
   <title>Register User | Cozy Furniture</title>
</head>
<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>register</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="text" name="username" required placeholder="Username">
         <input type="email" name="email" required placeholder="Email">
         <input type="password" name="password" required placeholder="Password">
         <input type="password" name="cpassword" required placeholder="confirm your password">
         <input type="submit" name="submit" value="register" class="form-btn">
         <p>already have an account? <a href="login_user.php">login here</a></p>
      </form>
   </div>
</body>
</html>