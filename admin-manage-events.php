<!DOCTYPE html>
<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }

    include('connection.php');
    include('function/function.php');

    createEvents();
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
    <link rel="icon" href="img/logo/CCSLogo.png">
</head>
<body oncontextmenu="return false" class="mdb-color lighten-5">
    <?php include('library/html/navbar.php'); ?>
    <div class="container">
        <div class="page-header">
            <h2 class="text-center"><span class="fa fa-bookmark"></span> Manage Events</h2>
            <hr class="theo-footer-hr">
        </div>
        <ul class="nav nav-tabs md-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#create_event" role="tab"><span class="fa fa-pencil"></span> Create Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewActiveNews" role="tab"><span class="fa fa-envelope"></span> View Events</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewInactiveNews" role="tab"><span class="fa fa-paper-plane-o"></span> View Inactive News</a>
            </li> -->
        </ul>
        <div class="tab-content card mdb-color lighten-5">
            <div class="tab-pane fade in show active" id="create_event" role="tabpanel">
                <br>
            <div class="row main">
            <div class="text-dark ml-5"><br>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="event_image">Event Image</label>
                            <div class="cols-sm-10">
                                <input type="file" name="image" id="image" placeholder="Event Image" required>
                            </div>
                        </div>   
                        <div class="form-group col-md-6">
                            <label for="lastname" class="cols-sm-2 control-label">Event Name</label>
                            <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="event_name" id="event_name" placeholder="Event Name" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="firstname" class="cols-sm-2 control-label">Event Type</label>
                            <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="event_type" id="event_type"  placeholder="E.g Acquintance Party, Seminar, Convention, etc." required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description" class="cols-sm-2 control-label">Event Description</label>
                            <div class="cols-sm-10">
                                <textarea class="form-control" name="event_desc" id="event_desc" style="resize: none;" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="midname" class="cols-sm-2 control-label">Event Date</label>
                            <div class="cols-sm-10">
                                    <input type="date" class="form-control" name="event_date" id="event_date"  placeholder="Event Date" required />
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type" class="cols-sm-2 control-label">Event Course</label>
                            <div class="cols-sm-10">
                                    <input type="text" class="form-control" name="event_course" id="event_course" placeholder="e.g BSIT, BSCS, BSDMIA, etc" required />
                            </div>
                        </div>
                        <div class="form-group mx-auto col-md-6">
                            <button type="submit" class="btn btn-success btn-lg col-md-10"  name="btn_add_event" id="btn_add_event">Create Event</button>
                        </div>
                    </div>
                    </form>
                </div>
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