<!DOCTYPE html>
<?php
    session_start();
    include('connection.php');
    include('function/function.php');

    if(!isset($_SESSION['username']))
    {
        header("location: index.php");
    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CCS Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/CCSLogo.png">
</head>
<body class="mdb-color lighten-5">
    <?php include('library/html/navbar.php'); ?>
    <div class="container">
        <div class="page-header">
            <h2 class="text-center">Manage Attendance</h2>
        </div>
		<form action="" method="post">
			<div class="form-group">
				<div class="input-group col-md-9">
					<input type="text" name="user_search" id="user_search" onkeyup="searchAttendance()" class="form-control">
					<button class="btn btn-primary" name="btn_search"><span class="fa fa-search"></span> Search</button>
				</div>
			</div>
		</form>
        <table class="table table-hover text-dark" id="tblAttendance">
            <thead class="thead-inverse">
                <tr>
                    <th>Student ID</th> 
                    <th>StudenIDNumber</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Date Registered</th>
                    <th colspan="2" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    viewAttendance();
                ?>  
            </tbody>
        </table>
    </div>
<!--JavaScript Libraries-->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>   
<script src="js/style.js"></script>
<script>
    
    function searchAttendance(){
        
        var input, filter, table, tr, td, i, j, k;
            input = document.getElementById("user_search");
            filter = input.value.toUpperCase();
            table = document.getElementById("tblAttendance");
            tr = table.getElementsByTagName("tr");


    for (j = 0; j < tr.length; j++) {
            td = tr[j].getElementsByTagName("td")[1];//Book Name
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[j].style.display = "";
                } else {
                tr[j].style.display = "none";
            }
        }       
    }
    }
</script>   
</body>
</html>