<h1 class="text-primary" ><i class="fa fa-users"></i> Update Student <small>Update Student</small> </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php?page=dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> Update Student</li>
                    </ol>
                </nav>

<?php

$id = base64_decode($_GET['id']);

$get_update = mysqli_query($conn,"SELECT * FROM `student_info` WHERE `id`='$id'");

$row = mysqli_fetch_assoc($get_update);


if(isset($_POST['update_student'])){
    

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $p_contact = $_POST['p_contact'];
    $class = $_POST['class'];
    
    $result = mysqli_query($conn, "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$p_contact' WHERE `id`='$id'");

    if($result){
        header('location:index.php?page=all_students.php');
    }
    
    

}






?>

<div class="row">

    <div class="col-sm-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" placeholder="Student Name" name="name" id="name" class="form-control" required="" value="<?php echo $row['name'];?>">
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" placeholder="Roll" name="roll" id="roll" class="form-control" pattern="[0-9]{6}"required="" value="<?php echo $row['roll'];?>">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" placeholder="City" name="city" id="city" class="form-control" required="" value="<?php echo $row['city'];?>">
            </div>
            <div class="form-group">
                <label for="p_contact">Parent Contact</label>
                <input type="text" placeholder="01*********" name="p_contact" id="p_contact" pattern="01[1|5|6|7|8|9][0-9]{8}" class="form-control" required="" value="<?php echo $row['pcontact'];?>">
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control" required="" value="<?php echo $row['class'];?>">
                        <option value="">Select</option>
                        <option <?php echo $row['class']=='One'? 'selected=""':'' ?> value="One">One</option>
                        <option <?php echo $row['class']=='Two'? 'selected=""':'' ?>value="Two">Two</option>
                        <option <?php echo $row['class']=='Three'? 'selected=""':'' ?>value="Three">Three</option>
                        <option <?php echo $row['class']=='Four'? 'selected=""':'' ?>value="Four">Four</option>
                        <option <?php echo $row['class']=='Five'? 'selected=""':'' ?>value="Five">Five</option>
                        <option <?php echo $row['class']=='Six'? 'selected=""':'' ?>value="Six">Six</option>
                        <option <?php echo $row['class']=='Seven'? 'selected=""':'' ?>value="Seven">Seven</option>
                        <option <?php echo $row['class']=='Eight'? 'selected=""':'' ?>value="Eight">Eight</option>
                        <option <?php echo $row['class']=='Nine'? 'selected=""':'' ?>value="Nine">Nine</option>
                        <option <?php echo $row['class']=='Ten'? 'selected=""':'' ?>value="Ten">Ten</option>
                </select>
            </div>
            
            <div class="form-group">
                <input type="submit"  name="update_student" value="Update Student" class="btn btn-primary pull-right">
                <br>
                <br>
            </div>
        </form>
    </div>
</div>