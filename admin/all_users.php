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
                            <th>Email</th>
                            <th>Username</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $db_result = mysqli_query($conn,"SELECT * FROM `users`");

                        while($row = mysqli_fetch_assoc($db_result)){
                        ?>

                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo ucwords($row['name']);?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><img width="100px" src="images/<?php echo $row['photo'];?>" alt=""></td>
                            
                        </tr>
                       <?php
                       }
                        ?>
                        
                    </tbody>
                </table>
                </div>