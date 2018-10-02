<!DOCTYPE html>
<?php
	session_start();
	include('connection.php');
	include('function/function.php');
	$admin_user = htmlspecialchars($_SESSION['username']);
    if(!$admin_user)
    {
        header("location: index.php");
    }

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="JER Event Management">
    <title>CCS Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/CCSLogo.png">
</head>
<body class="mdb-color lighten-5">
	<?php
		include('library/html/navbar.php');
	?>
	<div class="container">
		<div class="page-header">
			<h2 class="text-center">User Feedbacks</h2>
		</div>
		<div class="table-responsive text-dark">
			<table class="table table-hover">
				<thead class="thead-inverse">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Message</th>
						<th>Date Sent</th>
						<th class="text-center" colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php viewUserFeedbacks(); ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>