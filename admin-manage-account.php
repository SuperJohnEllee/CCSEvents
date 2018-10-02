<!DOCTYPE html>
<?php
    session_start();
    $admin_id = htmlspecialchars($_SESSION['admin_id']);
    $admin_user = htmlspecialchars($_SESSION['username']);
    $admin_fullname = htmlspecialchars($_SESSION['fullname']);
    $admin_type = htmlspecialchars($_SESSION['type']);
    
    if(isset($_SESSION['username'])){
    } else {
        header("location: index.php");
    }

    include('connection.php');
    include('function/function.php');

    $active_admin_sql = "SELECT AdminID FROM admin WHERE AdminStatus = 'Active'";
    $active_admin_res = mysqli_query($conn, $active_admin_sql);
    $active_admin_count = mysqli_num_rows($active_admin_res);

    $inactive_admin_sql = "SELECT AdminID FROM admin WHERE AdminStatus = 'Inactive'";
    $inactive_admin_res = mysqli_query($conn, $inactive_admin_sql);
    $inactive_admin_count = mysqli_num_rows($inactive_admin_res);

    createAdmin();
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CPU Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logo/CPULogo.png">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link ref="stylesheet" href="css/style.css">
</head>
<body class="mdb-color lighten-5">
    <?php include('library/html/navbar.php'); ?>
    <div class="container"><br>
        <div class="page-header">
            <h2 class="text-center"><span class="fa fa-users"></span> Admin Management</h2>
            <h4>Admin List</h4>
        </div>
           <ul class="nav nav-tabs md-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#create_admins" role="tab"><span class="fa fa-pencil"></span> Create Admins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewActiveAdmins" role="tab"><span class="fa fa-eye"></span> View Active Admins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewInactiveAdmins" role="tab"><span class="fa fa-eye-slash"></span> View Inactive Admins</a>
            </li>
        </ul>
        <div class="tab-content card mdb-color lighten-5">
            <div class="tab-pane fade in show active" id="create_admins" role="tabpanel">
                <br>
                        <div class="row main">
            <div class="text-dark ml-5">
                <h3 class="text-center">Create Administrator</h3>
                <br>
                <p>You can only create another Admin, Work Student or Staff</p>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="row">   
                        <div class="form-group col-md-6">
                            <label for="lastname" class="cols-sm-2 control-label">Last Name</label>
                            <div class="cols-sm-10">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstname" class="cols-sm-2 control-label">First Name</label>
                            <div class="cols-sm-10">
                                <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="First Name" required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="midname" class="cols-sm-2 control-label">Middle Name</label>
                            <div class="cols-sm-10">
                                <input type="text" class="form-control" name="midname" id="midname"  placeholder="Middle Name" required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="type" class="cols-sm-2 control-label">Gender</label>
                            <div class="cols-sm-10">
                                <input type="text" class="form-control" name="gender" id="type" placeholder="Male or Female" required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type" class="cols-sm-2 control-label">Type</label>
                            <div class="cols-sm-10">
                                <input type="text" class="form-control" name="type" id="type" placeholder="Admin, Staff, Work Student" required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username" class="cols-sm-2 control-label">Username</label>
                            <div class="cols-sm-10">
                                <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm_password" class="cols-sm-2 control-label">Confirm Password</label>
                            <div class="cols-sm-10">
                                <input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="form-group mx-auto col-md-6">
                            <button type="submit" class="btn btn-success btn-lg col-md-10"  name="btn_add" id="register">Create Account</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>
            <div class="tab-pane fade in" id="viewActiveAdmins" role="tabpanel">
                <br>
                <div class="table-responsive text-dark">
                    <h3 class="text-center">Your Active Admins(<?php echo htmlspecialchars($active_admin_count); ?>)</h3>
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                            <th>Admin ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th class="text-center" colspan="2">Action</th>
                        </thead>
                    <tbody>
                        <?php
                            viewActiveAdmins();
                        ?>
                    </tbody>
                </table>
                 </div>
            </div>
            <div class="tab-pane fade in" id="viewInactiveAdmins" role="tabpanel">
                <br>
                  <div class="table-responsive text-dark">
                    <h3 class="text-center">Your Active Admins(<?php echo htmlspecialchars($inactive_admin_count); ?>)</h3>
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                            <th>Admin ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th class="text-center" colspan="2">Action</th>
                        </thead>
                    <tbody>
                        <?php
                            viewInactiveAdmins();
                        ?>
                    </tbody>
                </table>
                 </div>
            </div>
        </div>
    </div>
<!--JavaScript Libraries-->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>
</body>
</html>