<h1 class="text-primary" ><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small> </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> Dashboard</li>
                    </ol>
                </nav>

<?php

 $dash_std = mysqli_query($conn, "SELECT * FROM `student_info`");
 $rows = mysqli_num_rows($dash_std);

 $dash_user = mysqli_query($conn, "SELECT * FROM `users`");
 $userrows = mysqli_num_rows($dash_user);

?>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="pull-right" style="font-size:45px;"><?= $rows;?></div>
                                            <div class="clearfix"></div>
                                        <div class="pull-right">All student</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?page=all_students.php">
                                <div class="panel-footer">
                                    <span class="pull-left" >All Student</span>
                                    <span class="pull-right" ><i class="fa fa-arrow-circle-o-right" ></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x" ></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="pull-right" style="font-size:45px;"><?= $userrows;?></div>
                                            <div class="clearfix"></div>
                                        <div class="pull-right">All Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="index.php?page=all_users.php">
                                <div class="panel-footer">
                                    <span class="pull-left" >All Users</span>
                                    <span class="pull-right" ><i class="fa fa-arrow-circle-o-right" ></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <hr>
                <h3>New Student</h3>
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
                        </tr>
                       <?php
                       }
                        ?>
                        
                    </tbody>
                </table>
                </div>