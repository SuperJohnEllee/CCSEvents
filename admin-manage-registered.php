<!DOCTYPE html>
<?php
    session_start();
    include('connection.php');
    include('function/function.php');
    
    if(!isset($_SESSION['username']))
    {
        header("location: index.php");
    }
    
    //Display number of registered students
    $reg_sql = "SELECT * FROM register";
    $reg_res = mysqli_query($conn, $reg_sql);
    $reg_count = mysqli_num_rows($reg_res);
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CPU Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/cpu.png">
</head>
<body class="mdb-color lighten-5">
    <?php include('library/html/navbar.php');  ?>
    <div class="container">
        <div class="page-header">
            <h2 class="text-center"><span class="fa fa-users"></span> Registered Students(<?php echo htmlspecialchars($reg_count); ?>)</h2>
            <h3>List of Registered Students</h3>
			<hr class="theo-footer-hr">
        </div>
		<form action="" method="post">
			<div class="form-group">
				<div class="input-group col-md-9">
					<input type="text" name="student_search" id="student_search" onkeyup="filterSearch()" class="form-control">
					<button class="btn btn-primary" name="btn_search"><span class="fa fa-search"></span> Search</button>
				</div>
			</div>
		</form>
        <div class="table-responsive">
            <table class="table table-hover text-dark" id="student_table">
                <thead class="thead-inverse">
                    <tr>
                        <th>Registered ID</th>
                        <th>Student ID Number</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Date Registered</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $display_register = "SELECT * FROM register RIGHT OUTER JOIN students ON students.StudentID = register.StudentID";
                        $display_result = mysqli_query($conn, $display_register);
                        $display_count = mysqli_num_rows($display_result);

                        if($display_count > 0)
                        {
                            while($display_row = mysqli_fetch_assoc($display_result))
                            {
                                $fullname = htmlspecialchars($display_row['StudentLName']) . ', ' . htmlspecialchars($display_row['StudentFName']) . ' ' . htmlspecialchars($display_row['StudentMName']);
                                echo "<tr>
                                    <td>".htmlspecialchars($display_row['RegisterID'])."</td>
                                    <td>".htmlspecialchars($display_row['StudentNumber'])."</td>
                                    <td>".htmlspecialchars($fullname)."</td>
                                    <td>".htmlspecialchars($display_row['Gender'])."</td>
                                    <td>".htmlspecialchars($display_row['Course'])."</td>
                                    <td>".htmlspecialchars($display_row['Year'])."</td>
                                    <td>".htmlspecialchars($display_row['RegisterDate'])."</td>
                                </tr>";
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-info-circle'></span> Registered Students Not Found</h3></td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<!--JavaScript Libraries-->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>   
<script src="js/style.js"></script>   
</body>
</html>