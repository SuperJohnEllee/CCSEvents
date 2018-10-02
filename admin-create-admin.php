<!DOCTYPE html>
<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link ref="stylesheet" href="css/style.css">
</head>
<body class="mdb-color lighten-5">
     <nav class="navbar navbar-expand-lg navbar-light mdb-color darken-4 fixed-top">
        <a class="navbar-brand" href="#"><img src="img/logo/CPULogo.png" height="30" width="30">
    </a>
    <button class="navbar-toggler teal darken-2" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="home.php"><span class="fa fa-home"></span><span class="sr-only">(current)</span> Home</a>
            </li>
        </ul>
    </div>
    </nav><br><br><br>
	<div class="container">
        <div class="row main">
            <div class="text-dark ml-5">
                <h1 class="text-center">Create Administrator</h1>
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
<?php
    include('connection.php');
    if(isset($_POST['btn_add']))
    {
            $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
            $midname = mysqli_real_escape_string($conn, $_POST['midname']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $check_user = "SELECT * FROM admin 
            WHERE AdminUser = '$username'";
            $res_user = mysqli_query($conn, $check_user);
            $count = mysqli_num_rows($res_user);

            if ($count > 0) {
                echo "<script>
                    alert('Username is already existing');
                  </script>";
                    exit;
              } else if(str_word_count($username) > 1)
              {
                    echo "<script>
                        alert('Username must not contain spaces');
                    </script>";
              }

            //insertion
            $insert_query = "INSERT INTO admin
            (AdminLName, AdminFName, AdminMName, AdminGender, 
            AdminType, AdminStatus, AdminUser, AdminPass) VALUES
            ('$lastname','$firstname','$midname', '$gender', '$type', 'Active', '$username','$password')";
            $result = mysqli_query($conn, $insert_query);

            if ($result) {
                echo "<script>
                    alert('Successfully created an account');
                  </script>
                  <meta http-equiv='refresh' content='0; url=admin-create-admin.php'>";
            } else {
                echo "<script>
                    alert('Failure in account submission');
                </script>";
            }

    }
?>
    <!--JavaScript Libraries -->
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/mdb.min.js"></script>
</body>
</html>