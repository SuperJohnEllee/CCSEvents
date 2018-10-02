<!DOCTYPE html>
<?php
session_start();
$admin_user = htmlspecialchars($_SESSION['username']);
$admin_name = htmlspecialchars($_SESSION['name']);
$admin_fullname = htmlspecialchars($_SESSION['fullname']);
$admin_type = htmlspecialchars($_SESSION['type']);

if(isset($_SESSION['username'])) {
    
} else {
    session_unset();
    session_destroy();
    header("location: index.php");
}

include('connection.php');

//Display number of Admins
$admin_sql = "SELECT AdminID FROM admin";
$admin_res = mysqli_query($conn, $admin_sql);
$admin_count = mysqli_num_rows($admin_res);

//Display number of news

$news_sql = "SELECT NewsID FROM news";
$news_res = mysqli_query($conn, $news_sql);
$news_count = mysqli_num_rows($news_res);

//Display number of students
$stud_sql = "SELECT StudentID FROM students";
$stud_res = mysqli_query($conn, $stud_sql);
$stud_count = mysqli_num_rows($stud_res);

//Display number of registered students
//$reg_sql = "SELECT RegisterID * FROM register";
//$reg_res = mysqli_query($conn, $reg_sql);
//$reg_count = mysqli_num_rows($reg_res);

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CCS Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/CPULogo.png">
</head>
<body oncontextmenu="return false" id="body" onload="startTime()" class="mdb-color lighten-5">
    <!--Navbar here-->
    <?php include('library/html/navbar.php'); ?><br>
    <h6 class="pull-right" id="date_time"></h6>
    <div class="container">
        <div class="page-header">
			    <h3>Welcome, <?php echo htmlspecialchars($admin_name); ?></h3>
				<h5>You're logged in as <span class="font-weight-bold"><?php echo htmlspecialchars($admin_type); ?></span></h5>
        </div>
        <hr class="theo-footer-hr">
       <!-- <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4 text-center">Administration</h1>
            </div>
            <div class="col-lg-4 col-sm-6 text-center mb-4 zoom">
				<a style="text-decoration: none;" href="admin-manage-account.php">
                <img src="img/home/users.png" height="200" width="200">
                <h3>Manage Accounts<br><?php echo htmlspecialchars($admin_count); ?></h3></a>
			</div>
            <div class="col-lg-4 col-sm-6 text-center mb-4 zoom">
				<a style="text-decoration: none;" href="admin-master-list.php">
                <img src="img/home/master_list.png" height="200" width="200">
                <h3>Master List<br><?php echo htmlspecialchars($stud_count); ?></h3></a>
			</div>
            <div class="col-lg-4 col-sm-6 text-center mb-4 zoom">
				<a style="text-decoration: none;" href="admin-manage-news.php">
                <img src="img/home/news.png" height="200" width="200">
                <h3>Manage News<br><?php echo htmlspecialchars($news_count); ?></h3></a>
			</div>
            <div class="col-lg-4 col-sm-6 text-center mb-4 zoom">
				<a style="text-decoration: none;" href="admin-manage-registered.php">
                <img src="img/home/registered_students.png" height="200" width="200">
                <h3>Registered Students<br></h3></a>
			</div>
            <div class="col-lg-4 col-sm-6 text-center mb-4 zoom">
				<a style="text-decoration: none;" href="admin-manage-attendance.php">
                <img src="img/home/attendance.png" height="200" width="200">
                <h3>Manage Attendance<br></h3></a>
			</div>
            <div class="col-lg-4 col-sm-6 text-center mb-4 zoom">
				<a style="text-decoration: none;" href="admin-manage-events.php">
                <img src="img/home/event_generator.png" height="200" width="200">
                <h3>Manage Events<br></h3></a>
			</div>
        </div>-->
    </div>
    <!--<div style="padding: 15px 0;" class="mdb-color darken-4 text-center text-white">
        <h6 class="col-lg-12">Develop by Ellee Solutions &copy 2018. All Rights Reserved</h6>
    </div>-->
 </div>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>   
<script src="js/style.js"></script>
</body>
</html>