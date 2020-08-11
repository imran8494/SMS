<?php

require_once('conn.php');
session_start();

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];



  $photo = $_FILES['photo']['name'];

  $photo = explode('.',$photo);

  $photo = end($photo);

  $file_name = $username.'.'.$photo;

  $input_errors = array();

  if(empty($name)){
    $input_errors['name'] = "The name fields is required";
  }
  if(empty($email)){
    $input_errors['email'] = "The email fields is required";
  }
  if(empty($username)){
    $input_errors['username'] = "The username fields is required";
  }
  if(empty($password)){
    $input_errors['password'] = "The password fields is required";
  }
  if(empty($c_password)){
    $input_errors['c_password'] = "The confirm password fields is required";
  }

  if(count($input_errors)==0){
    $email_check = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email'");

    if(mysqli_num_rows($email_check)==0){
      $username_check = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = '$username'");

      if(mysqli_num_rows($username_check)==0){

        if(strlen($username)>7){
          
          if(strlen($password)>7){

            if($password == $c_password){
              
              $password = md5($password);

              $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$file_name','Inactive')";

              $result = mysqli_query($conn,$query);

              if($result){
                $_SESSION['Data_inserted_successfully'] = "Data inserted successfully";

                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$file_name);

              }else{
                $_SESSION['Data_is_not_inserted'] = "Data is not inserted";
              }



            }else{
              $pass_error = "Password and confirm password is not matched";
            }

          }else{
            $pass_len = "Password must be more than 8 characters";
          }
        }else{
          $user_len = "Username must be more than 8 characters";
        }
      }else{
        $user_error = "This username already exists";
      }
      
    }else{
      $email_errors = "This email has already an account";
    }
  }


  
}









?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration Form</title>

    <!-- Bootstrap -->
    <link href="../old/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="style.css">
   
  </head>
  <body>
    <div class="container">
        <h1>User Registration Form</h1>
        <?php if(isset($_SESSION['Data_inserted_successfully'])){echo '<div class="alert alert-success">'. $_SESSION['Data_inserted_successfully']. '</div>' ;} ?>
        <?php if(isset($_SESSION['Data_is_not_inserted'])){echo '<div class="alert alert-success">'. $_SESSION['Data_is_not_inserted']. '</div>' ;} ?>
        
        <hr>
        <div class="row">

            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-1">Name</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php if(isset($name)){echo $name;};?>">
                        </div>
                        <label class="errors" for="name"><?php if(isset($input_errors['name'])){ echo $input_errors['name']; }?></label>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-sm-1">Email</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="<?php if(isset($email)){echo $email;} ?>">
                        </div>
                        <label class="errors" for="email"><?php if(isset($input_errors['email'])){ echo $input_errors['email']; }?></label>
                        <label class="errors" for="email"><?php if(isset($email_errors)){ echo $email_errors; }?></label>
                        

                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label col-sm-1">Username</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username" value="<?php if(isset($username)){echo $username;};?>">
                        </div>
                        <label class="errors" for="username"><?php if(isset($input_errors['username'])){ echo $input_errors['username']; }?></label>
                        <label for="username" class="errors"><?php if(isset($user_error)){echo $user_error;} ?></label>
                        <label for="username" class="errors"><?php if(isset($user_len)){echo $user_len;} ?></label>
                        

                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label col-sm-1">Password</label>
                        <div class="col-sm-4">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" value="<?php if(isset($password)){echo $password;};?>">
                        </div>
                        <label class="errors" for="password"><?php if(isset($input_errors['password'])){ echo $input_errors['password']; }?></label>
                        <label class="errors" for="password"><?php if(isset($pass_len)){ echo $pass_len; }?></label>
                        

                    </div>
                    <div class="form-group">
                        <label for="c_password" class="control-label col-sm-1">Confirm Password</label>
                        <div class="col-sm-4">
                          <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Enter Your Confirm Password" value="<?php if(isset($c_password)){echo $c_password;};?>">
                        </div>
                        <label class="errors" for="c_password"><?php if(isset($input_errors['c_password'])){ echo $input_errors['c_password']; }?></label>
                        <label class="errors" for="password"><?php if(isset($pass_error)){ echo $pass_error; }?></label>

                    </div>
                    <div class="form-group">
                        <label for="photo" class="control-label col-sm-1">Photo</label>
                        <div class="col-sm-4">
                          <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <input type="submit" name="submit" value="Registration" class="btn btn-primary ">
                    </div>
                </form>
            </div>
       
             
        </div>
        <br>
        <p>If you have an account? then please <a href="login.php">Login</a></p>

        <hr>
        <footer>
            <p>&copy; All rights reserved By Md. Imran Hossain from 2016-<?php echo date('Y')?>.</p>
        </footer>
    </div>


  </body>
</html>