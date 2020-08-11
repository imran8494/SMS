<h1 class="text-primary" ><i class="fa fa-user-plus"></i> Add Student <small>Add New Student</small> </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php?page=dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> Add Student</li>
                    </ol>
                </nav>

<?php


if(isset($_POST['add_student'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $p_contact = $_POST['p_contact'];
    $class = $_POST['class'];



    $photo = explode('.',$_FILES['photo']['name']);

    $photo_ex = end($photo);

    $photo_name =$roll.'.'.$photo_ex;

    $insert = mysqli_query($conn,"INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$p_contact','$photo_name')");

    if($insert){
        $success = "Data inserted successfully";
        move_uploaded_file($_FILES['photo']['tmp_name'],'student_images/'.$photo_name);
    }else{
        $error = "Data is not inserted";
    }
    
}


?>
<div class="row">
<?php if(isset($success)){echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';}?>
<?php if(isset($error)){echo '<p class="alert alert-success col-sm-6">'.$error.'</p>';}?>
</div>
<div class="row">

    <div class="col-sm-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" placeholder="Student Name" name="name" id="name" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" placeholder="Roll" name="roll" id="roll" class="form-control" pattern="[0-9]{6}"required="">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" placeholder="City" name="city" id="city" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="p_contact">Parent Contact</label>
                <input type="text" placeholder="01*********" name="p_contact" id="p_contact" pattern="01[1|5|6|7|8|9][0-9]{8}" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required="">
                        <option value="">Select</option>
                        <option value="One">One</option>
                        <option value="Two">Two</option>
                        <option value="Three">Three</option>
                        <option value="Four">Four</option>
                        <option value="Five">Five</option>
                        <option value="Six">Six</option>
                        <option value="Seven">Seven</option>
                        <option value="Eight">Eight</option>
                        <option value="Nine">Nine</option>
                        <option value="Ten">Ten</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file"  name="photo" id="photo">
            </div>
            <div class="form-group">
                <input type="submit"  name="add_student" value="Add Student" class="btn btn-primary pull-right">
                <br>
                <br>
            </div>
        </form>
    </div>
</div>