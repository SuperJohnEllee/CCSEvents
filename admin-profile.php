<!DOCTYPE html>
<?php
    session_start();
    include('connection.php');
    include('function/function.php');
    $admin_id = htmlspecialchars($_SESSION['admin_id']);
    $admin_fullname = htmlspecialchars($_SESSION['fullname']);
    $admin_lastname = htmlspecialchars($_SESSION['lastname']);
    $admin_firstname = htmlspecialchars($_SESSION['firstname']);
    $admin_midname = htmlspecialchars($_SESSION['midname']);
    $admin_user = htmlspecialchars($_SESSION['username']);
    $admin_type = htmlspecialchars($_SESSION['type']);
    $admin_gender = htmlspecialchars($_SESSION['gender']);
    if(!$admin_user)
    {
        session_destroy();
        session_unset();
        header("location: index.php");
    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CPU Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/cpu.png">
</head>
<body class="mdb-color lighten-5">
<?php include('library/html/navbar.php'); ?>
    <div class="container"><br>
        <div class="page-header">
            <h3 class="text-center"><span class="fa fa-user"></span> <?php echo htmlspecialchars($admin_type); ?>'s Profile</h3>
        </div>
        <hr>
        <div class="col-md-9">
            <div class="form-group">
                <?php adminGender(); ?>
            </div>
            <div class="form-group">
                <h4>Name: <?php echo htmlspecialchars($admin_fullname); ?></h4>
            </div>
            <div class="form-group">
                <h4>Username: <?php echo htmlspecialchars($admin_user); ?></h4>
            </div>
            <div class="form-group">
                <h4>Type: <?php echo htmlspecialchars($admin_type); ?></h4>
            </div>
            <div class="form-group">
                <h4>Gender: <?php echo htmlspecialchars($admin_gender); ?></h4>
            </div>
            <div class="form-group">
                <a class="btn btn-primary btn-lg" data-target="#editModal" data-toggle="modal"><span class="fa fa-edit"></span> Edit Profile</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content teal lighten-5">
            <div class="modal-header text-center teal lighten-3">
                <h4 class="modal-title w-100 font-weight-bold"><span class="fa fa-edit"></span> Edit Profile for Profile
                <i class="text-warning"><?php echo htmlspecialchars($admin_user); ?></i> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<p class="text-center">Note: Change of username has been disabled</p>
            <div class="modal-body mx-3">
			    <form method="post">
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix dark-text"></i>
                        <input type="hidden" name="id" class="form-control" value="<?php echo htmlspecialchars($admin_id); ?>">
                    </div>
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix dark-text"></i>
                        <input type="text" name="lastname" id="username" class="form-control" value="<?php echo htmlspecialchars($admin_lastname); ?>">
                        <label data-error="wrong" data-success="right" for="username">Last Name</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix dark-text"></i>
                        <input type="text" name="firstname" id="username" class="form-control" value="<?php echo htmlspecialchars($admin_firstname); ?>">
                        <label data-error="wrong" data-success="right" for="username">First Name</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix dark-text"></i>
                        <input type="text" name="midname" id="username" class="form-control" value="<?php echo htmlspecialchars($admin_midname); ?>">
                        <label data-error="wrong" data-success="right" for="username">Middle Name</label>
                    </div>
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix dark-text"></i>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($admin_user); ?>" disabled>
                        <label class="disabled" data-error="wrong" data-success="right" for="username">Username</label>
                    </div>
                    <div class="md-form mb-4">
                        <button type="submit" class="btn btn-default pull-right" name="update"><span class="fa fa-save"></span> Save Changes</button>
                    </div>
                </form>
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