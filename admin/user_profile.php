<h1 class="text-primary" ><i class="fa fa-users"></i> User Profile <small>My Profile</small> </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php?page=dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> User Profile</li>
                    </ol>


<?php

$user = $_SESSION['user_login'];

$user_info = mysqli_query($conn,"SELECT * FROM `users` WHERE `username`='$user'");

$db_row = mysqli_fetch_assoc($user_info);






?>
<div class="row">
    
    <div class="col-sm-6">
        <table class="table table-bordered">
            
            <tr>
                <td>User Id</td>
                <td><?php echo $db_row['id'];?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo ucwords($db_row['name']);?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $db_row['username'];?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $db_row['email'];?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo ucwords($db_row['status']);?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?php echo $db_row['datetime'];?></td>
            </tr>

        </table>
        <a class="btn btn-sm btn-primary pull-right" href="">Edit Profile</a>
    </div>

    <?php
    
    if(isset($_POST['submit'])){
        
        $photo = explode('.',$_FILES['photo']['name']);

        $photo_extension = end($photo);

        $photo_name = $user.'.'.$photo_extension;

        $upload_query = mysqli_query($conn, "UPDATE `users` SET `photo`='$photo_name' WHERE `username`='$user'");

        if($upload_query){
            move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
        }

    }
    
    ?>
    <div class="col-sm-6">
        <img width="180px" height="180px" class="img-thumbnail"src="images/<?php echo $db_row['photo'];?>" alt="">
        <form action="" method="POST" enctype="multipart/form-data">
            <br>
            <br>
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
            <br>
            <input type="submit" value = "Upload" name="submit" id="submit" class="btn btn-sm btn-info">
        </form>
    </div>

</div>


