<?php
include('conn.php');
session_start();

if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}



?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMS</title>

    <!-- Bootstrap -->
    <link href="../old/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../old/css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">SMS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><i class="fa fa-user"></i> Welcome: Md. Imran Hossain</a></li>
            <li><a href="registration.php"><i class="fa fa-user-plus"></i> Add User</a></li>
            <li><a href="index.php?page=user_profile.php"><i class="fa fa-user"></i> User Profile</a></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            
        </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
        <ul class="list-group">
            <a href="index.php?page=dashboard.php" class="list-group-item active"> <i class="fa fa-dashboard" ></i> Dashboard</a>
            <a href="index.php?page=add_student.php" class="list-group-item"> <i class="fa fa-user-plus" ></i> Add Student</a>
            <a href="index.php?page=all_students.php" class="list-group-item"> <i class="fa fa-users" ></i> All Students</a>
            <a href="index.php?page=all_users.php" class="list-group-item"> <i class="fa fa-users" ></i> All Users</a>
        </ul>
        </div>
        <div class="col-sm-9">
            <div class="content">
                
            <?php 
            
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 'dashboard.php';
            }

            if(file_exists($page)){
                require_once $page;
            }else{
                require_once('404.php');
            }

            
            
            ?>


            </div>
        </div>
    </div>
</div>
<div class="footer-area">
    <p>&copy; All rights reserved by Md. Imran Hossain</p>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="../old/js/script.js"></script>
  </body>
</html>