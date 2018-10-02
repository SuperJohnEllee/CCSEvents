<!DOCTYPE html>
<?php
    /*
        News Page
        Displays the news posted by the admin
    */
    session_start();
    include('connection.php');

    $news_sql = "SELECT NewsID FROM news WHERE Status = 'Active' AND PostDate >= CURRENT_DATE() -  INTERVAL 36 DAY_HOUR ";
    $news_res = mysqli_query($conn, $news_sql);
    $news_count = mysqli_num_rows($news_res);
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
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/mdb.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/cpu.png">
</head>
<body oncontextmenu="return false" class="mdb-color lighten-5">
    <!--Modal Register Here-->
    <?php include('library/html/modalRegister.php'); ?>
    <!--Modal Login Here-->
    <?php include('library/html/modalLogin.php'); ?>
    <!--Navbar Here-->
    <?php include('library/html/navbar.php'); ?>

    <div class="jumbotron cyan lighten-5 text-center">
        <h1>College of Computer Studies Events News</h1>
        <h6>We have <?php echo htmlspecialchars($news_count); ?> news posted here</h6>
        <hr>
        <?php
            $view_sql = "SELECT * FROM news WHERE Status = 'Active' AND PostDate >= CURRENT_DATE() - INTERVAL 36 DAY_HOUR ORDER BY PostDate DESC";
            $view_res = mysqli_query($conn, $view_sql);
            $count = mysqli_num_rows($view_res);
            
            if($count > 0)
            {
                while($row = mysqli_fetch_assoc($view_res))
                {
                    $image = htmlspecialchars($row['Image']);
                    $title = htmlspecialchars($row['Title']);
                    $content = htmlspecialchars($row['Content']);
                    $postBy = htmlspecialchars($row['PostBy']);
                    $postDate = htmlspecialchars($row['PostDate']);
        ?>
        <img height="350" width="400" alt="News" src="<?php echo $image; ?>">
         <h1 class="card-title h2-responsive mt-2"><strong><?php echo $title; ?></strong></h1>
            <p class="text-dark mb-4 font-bold">Posted by <span class="font-weight-bold"><?php echo $postBy; ?></span> on <?php echo $postDate; ?></p>
    <div class="d-flex justify-content-center">
      <h4 class="card-text mb-3 lime accent-2" style="max-width: 43rem;"><?php echo $content; ?></h4>
    </div>
    <hr class="theo-footer-hr">
  <?php } ?>
<?php } else { 
    echo '<h1 class="card-title h2-responsive mt-2 font-weight-bold "><strong>There are no news posted</strong><br>
    </h1><div class="d-flex justify-content-center">
      <h4 class="lime accent-2">Please wait for the incoming news</h4>
    </div>';
     } ?>
    
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