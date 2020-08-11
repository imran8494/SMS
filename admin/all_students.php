<h1 class="text-primary" ><i class="fa fa-users"></i> All Student <small>All Student</small> </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php?page=dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-users"></i> All Student</li>
                    </ol>
                </nav>
<div class="table-responsive">
                <table id="table" class="table table-bordered table-hover table-striped " >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>City</th>
                            <th>Class</th>
                            <th>Contact</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $db_result = mysqli_query($conn,"SELECT * FROM `student_info`");

                        while($row = mysqli_fetch_assoc($db_result)){
                        ?>

                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo ucwords($row['name']);?></td>
                            <td><?php echo $row['roll'];?></td>
                            <td><?php echo ucwords($row['city']);?></td>
                            <td><?php echo $row['class'];?></td>
                            <td><?php echo $row['pcontact'];?></td>
                            <td><img width="100px" src="student_images/<?php echo $row['photo'];?>" alt=""></td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="index.php?page=student_edit.php&id=<?php echo base64_encode($row['id']) ;?>"><i class="fa fa-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-xs btn-danger" href="student_delete.php?id=<?php echo base64_encode($row['id']) ;?>"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                       <?php
                       }
                        ?>
                        
                    </tbody>
                </table>
                </div>