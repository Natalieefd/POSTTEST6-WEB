<?php

@include 'config.php';

session_start();
$username = 'user';
$pass = 'user';

if(isset($_POST['submit'])){

   if ($_POST['username'] == $username && $_POST['password'] == $pass){
         $_SESSION['user_name'] = 'username';
         header('location:home.html');
   
   }else{
      $error[] = 'incorrect username or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link rel="stylesheet" href="input_style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Username">
      <input type="password" name="password" required placeholder="Password">
      <input type="submit" name="submit" value="login" class="form-btn">
      <p>don't have an account? <a href="register_form_user.php">register here</a></p>
   </form>

</div>

</body>
</html>