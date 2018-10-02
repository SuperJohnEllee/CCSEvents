<!DOCTYPE html>
<?php
    session_start();
    include('connection.php');
    include('function/function.php');
    $admin_user = htmlspecialchars($_SESSION['username']);
    $admin_name = htmlspecialchars($_SESSION['name']);
    if(!$admin_user)
    {
        header("location: index.php");
    }

    createNews();
    
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="JER Event Management">
    <title>CPU Events</title>
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
    <?php include('library/html/navbar.php'); ?>
    <div class="container">
        <div class="page-header">
            <h2 class="text-center"><span class="fa fa-newspaper-o"></span> News Management</h2>
        </div>
        <ul class="nav nav-tabs md-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#create_news" role="tab"><span class="fa fa-pencil"></span> Create News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewActiveNews" role="tab"><span class="fa fa-eye"></span> View Active News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewInactiveNews" role="tab"><span class="fa fa-eye-slash"></span> View Inactive News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#viewAllNews" role="tab"><span class="fa fa-newspaper-o"></span> View All News</a>
            </li>
        </ul>
        <div class="tab-content card mdb-color lighten-5">
            <div class="tab-pane fade in show active" id="create_news" role="tabpanel">
                <br>
            <div class="row">
                <div class="col-md-6 col-md-3-offset-3">
                    <form id="AddAnnoucementForm" method="post" enctype="multipart/form-data">
                        <div class="form-group">    
                            <input type="file" name="image" id="image" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="title" name="title" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="AddAnnounceForm_Cont" placeholder="Enter a news" onFocus="countChars('AddAnnounceForm_Cont','text-counter',1000)" onKeyDown="countChars('AddAnnounceForm_Cont','text-counter',1000)"
                            onKeyUp="countChars('AddAnnoucementForm','text-counter',1000)" name="content" rows="7" style="resize: none; margin-bottom:8px;"autofocus required></textarea>
                        </div>
                        <span style="color: gray;">Post as <span class="font-weight-bold"><?php echo htmlspecialchars($admin_user);  ?></span></span>
                        <button class="btn btn-info pull-right" type="submit" name="btn_post" id="AddNewsForm_Submit"><i class="fa fa-paper-plane"></i>&nbsp;Post</button>
                        <span class="pull-right" id="text-counter" style="margin-top:8px;margin-right:8px; color:gray;">&nbsp;1000</span>
                    </form>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="viewActiveNews" role="tabpanel">
                <div class="table-scrol">
                    <h3 class="text-center">Your Active News(<?php countActiveNews(); ?>)</h3>
                <br>
                <div class="table-responsive text-dark">
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                        <tr>
                            <th colspan="1">Image</th>
                            <th colspan="1">News ID</th>
                            <th colspan="1">Title</th>
                            <th colspan="1">Content</th>
                            <th colspan="1">Status</th>
                            <th colspan="1">Date</th>
                            <th colspan="1">Posted By</th>
                            <th class="text-center" colspan="4">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        viewActiveNews();
                    ?>
                        </tbody>
                </table>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="viewInactiveNews" role="tabpanel">
                 <div class="table-scrol">
                    <h3 class="text-center">Your Inactive News(<?php countInactiveNews(); ?>)</h3>
                <br>
                <div class="table-responsive text-dark">
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                        <tr>
                            <th colspan="1">Image</th>
                            <th colspan="1">News ID</th>
                            <th colspan="1">Title</th>
                            <th colspan="1">Content</th>
                            <th colspan="1">Status</th>
                            <th colspan="1">Date</th>
                            <th colspan="1">Posted By</th>
                            <th class="text-center" colspan="4">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        viewInactiveNews();
                    ?>
                        </tbody>
                </table>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="viewAllNews" role="tabpanel">
                <div class="table-scrol">
                    <h3 class="text-center">All News Posted(<?php countAllNews(); ?>)</h3>
                    <br>
                      <div class="table-responsive text-dark">
                    <table class="table table-hover">
                        <thead class="thead-inverse">
                        <tr>
                            <th colspan="1">Image</th>
                            <th colspan="1">News ID</th>
                            <th colspan="1">Title</th>
                            <th colspan="1">Content</th>
                            <th colspan="1">Status</th>
                            <th colspan="1">Date</th>
                            <th colspan="1">Posted By</th>
                            <th class="text-center" colspan="4">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                        viewAllNews();
                    ?>
                        </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
<script>
	function countChars(textbox, counter, max) {
     var count = max - document.getElementById(textbox).value.length;
        if (count < 0) { document.getElementById(counter).innerHTML = "<span style=\"color: red;\">" + count + "</span>";
  	  document.getElementById('AddNewsForm_Submit').disabled = true;
} else { document.getElementById(counter).innerHTML = count;
   }
}
</script>
<!--JavaScript Libraries-->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/mdb.min.js"></script>   
<script src="js/style.js"></script>   
</body>
</html>