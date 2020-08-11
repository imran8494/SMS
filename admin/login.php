<?php

require_once('conn.php');
session_start();

if(isset($_SESSION['user_login'])){
    header('location:index.php');
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,"SELECT * FROM `users` WHERE `username`='$username'");

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        if($row['password']==md5($password)){
            if($row['status'] == 'active'){
                
                $_SESSION['user_login'] = $username;
                header('location:index.php');


            }else{
                $status_match = "Your status is inactive";
            }
        }else{
            $pass_match = "Password not match";
        }
        
    }else{
        $user_existence = "Username doesnt exist";
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
    <title>Admin Login</title>

    <!-- Bootstrap -->
    <link href="../old/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

   
  </head>
  <body>
    <div class="container animate__animated animate__backInDown">
            <br><br><br>
        <h1 class="text-center">Student Management System</h1>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">                
                 <br>
                <h2 class="text-center">Admin Login Form</h2>
                <form action="#" method="POST">
                    <div>
                        <input type="text" name="username" required="" placeholder="Username" class="form-control" value="<?php if(isset($username)){echo $username;} ?>" >
                    </div>
                    <br>
                    <div>
                        <input type="password" name="password" required="" placeholder="Password" class="form-control" value="<?php if(isset($password)){echo $password;} ?>">
                    </div>
                    <br>

                    <div>
                        <input type="submit" name="submit" value="Login" class="btn btn-info pull-right">
                    </div>
                </form>
            </div>
            
        </div>
        <br>
        <?php if(isset($user_existence)){echo '<div class="alert alert-warning col-sm-4 col-sm-offset-4">'.$user_existence.'</div>';} ?>
        <?php if(isset($pass_match)){echo '<div class="alert alert-warning col-sm-4 col-sm-offset-4">'.$pass_match.'</div>';} ?>
        <?php if(isset($status_match)){echo '<div class="alert alert-warning col-sm-4 col-sm-offset-4">'.$status_match.'</div>';} ?>
    </div>


  </body>
</html>