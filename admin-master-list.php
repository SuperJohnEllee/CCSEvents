 <!DOCTYPE html>
<?php
    session_start();
    include('connection.php');
    include('function/function.php');

    importStudentData();
    
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
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/mdb.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/cpu.png">
</head>
<body oncontextmenu="return false" class="mdb-color lighten-5">
    <?php include('library/html/navbar.php'); ?>
    <div class="container">
        <div class="page-header">
            <h2 class="text-center"><span class="fa fa-list"></span> Master List(<?php countStudentData(); ?>)</h2>
            <h4>List of Enrolled Students</h4>
			<hr class="theo-footer-hr">
            <form class="ml-4" method="post" enctype="multipart/form-data">
                <div class="row">
                    <input class="form-control col-lg-3" type="file" name="file">
                    <button class="btn btn-primary" type="submit" name="btn_import"><span class="fa fa-cloud-upload"></span> Import</button>
                    <button class="btn btn-default" type="submit" name="btn_export"><span class="fa fa-cloud-download"></span> Export</button>
                </div>
                </div>
            </form>
        </div><br>
    	<form class="container" method="post">
				<div class="form-group col-md-10">
					<div class="input-group">
						<input class="form-control" type="search" id="student_search" onkeyup="filterSearch()" name="student_search" placeholder="Search">
							<button class="btn btn-default" type="submit" name="btn_search"><span class="fa fa-search icon"></span>&nbsp;Search</button>
					</div>
				</div>
			</form>
        <div class="container table-responsive text-dark">
            <h5>Note: Search for ID Number</h5>
            <table class="table table-hover" id="student_table">
                <thead class="thead-inverse">
					<tr>
						<th colspan="1">ID</th>
						<th colspan="1">Student ID</th>
						<th colspan="1">Name</th>
                        <th colspan="1">Gender</th>
						<th colspan="1">Course</th>
						<th colspan="1">Year</th>
					</tr>
                </thead>
                <tbody>
                    <?php
                        viewStudentData();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<script>
//Search for ID Number
function filterSearch() {
 	 var input, filter, table, tr, td, i, j;
  		input = document.getElementById("student_search");
  		filter = input.value.toUpperCase();
  		table = document.getElementById("student_table");
  		tr = table.getElementsByTagName("tr");

  	for (i = 0; i < tr.length; i++) {
    		td = tr[i].getElementsByTagName("td")[1];
    		if (td) {
      			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        			tr[i].style.display = "";
      			} else {
        		tr[i].style.display = "none";
      		}
    	}       
    }
}
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>   
<script src="js/style.js"></script>
</body>
</html>