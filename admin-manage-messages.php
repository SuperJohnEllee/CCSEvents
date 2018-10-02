<!DOCTYPE html>
<?php
	session_start();

	$admin_user = htmlspecialchars($_SESSION['username']);

	if (!$admin_user) {
		header("location: index.php");
	}
	include('connection.php');
	include('function/function.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="IE=edge">
	<meta name="author" content="CCS Events">
	<title>CCS Events</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/mdb.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/design.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="img/logo/CCSLogo.png">
</head>
<body class="mdb-color lighten-5">
	<?php include('library/html/navbar.php'); ?>
	<div class="container">
		<div class="page-header">
			<h2 class="text-center">Create Messages</h2>
		</div>
		<ul class="nav nav-tabs md-tabs nav-justified">
			<li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#create_messages" role="tab"><span class="fa fa-pencil"></span> Create Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#inbox" role="tab"><span class="fa fa-inbox"></span> Inbox</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#sentMessages" role="tab"><span class="fa fa-paper-plane-o"></span> Sent Messages</a>
            </li>
		</ul><br>
	<div class="tab-content card">
		<div class="tab-pane fade in show active" id="create_messages" role="tabpanel">
			<form method="post">
				<div class="md-form">
					<i class="fa fa-user prefix text-dark"></i>
					<input class="form-control" type="text" name="number">
					<label>To</label>
				</div>
				<div class="md-form">
					<i class="fa fa-envelope prefix text-dark"></i>
					<textarea class="form-control md-textarea" rows="5"></textarea>
					<label>Message</label>
				</div>
				<button class="btn btn-primary pull-right" type="submit" name="send"><span class="fa fa-paper-plane-o"></span> SEND</button>
			</form>
		</div>
	</div>
</div>
    <!--JavaScript Libraries -->
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/mdb.min.js"></script>
</body>
</html>