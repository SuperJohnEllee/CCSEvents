<!DOCTYPE html>
<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }

    include('connection.php');
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CPU Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mdb.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/cpu.png">
</head>
<body oncontextmenu="return false" class="mdb-color lighten-5">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top mdb-color darken-4">
        <a class="navbar-brand"><img src="img/logo/cpu.png" height="30" width="30"></a>
        <button type="button" class="navbar-toggler teal darken-4" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" 
        aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="home.php"><span class="fa fa-home"></span><span class="sr-only">(current)</span> Home</a>
                </li>
            </ul>
        </div>
    </nav><br><br><br>
    <div class="container">
        <div class="page-header">
            <h1 class="text-center"><span class="fa fa-bookmark"></span> Create Events</h1>
            <hr class="theo-footer-hr">
        </div>
            <div class="container">
        <div class="row main">
            <div class="text-dark ml-5"><br>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="row">   
                        <div class="form-group col-md-6">
                            <label for="lastname" class="cols-sm-2 control-label">Event Name</label>
                            <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstname" class="cols-sm-2 control-label">Event Type</label>
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
    </div>
<!--JavaScript Libraries-->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>   
<script src="js/style.js"></script>
<script>
    $(document).ready(function() {
   $('.mdb-select').material_select();
 });
</script>
</body>
</html>