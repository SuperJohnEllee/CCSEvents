<!DOCTYPE html>
<?php 
    include('connection.php');
    
    $disp_stud = mysqli_query($conn, "SELECT StudentID FROM students");
    $disp_count = mysqli_num_rows($disp_stud);
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="CPU Events">
    <title>CCS Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/mdb.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo/CCSLogo.png">
    <style> .arrow{font-size: 25px;} 
    .center{
        margin-right: auto;
        margin-left: auto;
        display: block;
        width: 100%;
    }
    </style>
</head>
<body oncontextmenu="return false" id="body" onload="startTime()" class="teal darken-2" role="document">
    <!--Modal Register Here-->
    <?php include('library/html/modalRegister.php'); ?>
    <!--Modal Login Here-->
    <?php include('library/html/modalLogin.php'); ?>
    <!--Navbar Here-->
    <?php include('library/html/navbar.php'); ?>
    <img class="center" height="460" width="300" src="img/logo/CCSWarriors.jpg" alt="CCS Warriors">
    <!--Carousel Here-->         
    <?php include("library/html/carousel.php"); ?>
<div class="row light-section text-white">
    <div class="col-lg-6 col-lg-md-6 col-sm-12 col-xs-12">
        <h3 class="section-subheader"><span class="fa fa-flag"></span>&nbsp;Our Mission</h3>
        <p style="font-size: 25px;">“To be the leading 
        Event Management Service in Iloilo City, 
        by meeting and exceeding the expectations of our 
        CLIENTS through innovative ideas and the delivery of excellent service.</p>
    </div>
    <div class="col-lg-6 col-lg-md-6 col-sm-12 col-xs-12">
        <h3 class="section-subheader"><span class="fa fa-eye"></span>&nbsp;Our Vision</h3>
        <p style="font-size: 25px;">Within the next five years, CPU EVENT MANAGEMENT will become the leading company in conference and event management to businesses and stakeholders by consistently providing outstanding service 
        that creates an extraordinary event and conferencing experience</p>
    </div>
    <div class="col-lg-12 col-lg-md-6 col-sm-12 mt-4 col-xs-12">
        <h3 class="section-subheader"><span class="fa fa-hdd-o"></span> Our Database</h3>
        <p style="font-size: 25px;">We have  <?php echo htmlspecialchars($disp_count); ?> enrolled students in the University </p>
    </div>
</div>
<div class="banner-1">
      <div class="container">
        <span class="banner-text">"Turning the Ordinary into Extraordinary"</span>
      </div>
</div>

<div class="fixed-action-btn smooth-scroll" style="bottom: 45px; right: 24px;">
    <a href="#top-section" class="btn-floating btn-large mdb-color darken-4">
        <i class="fa fa-arrow-up"></i>
    </a>
</div>

<!--Contact Form-->
<?php include('library/html/modalContact.php'); ?>

    <!--Footer Here-->
<?php include('library/html/footer.php'); ?>

<!--JavaScript Libraries-->       
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
<script src="js/carousel.js"></script>
<script src="js/mdb.min.js"></script>
<script src="js/style.js"></script>
<script>

$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});

    function event_map() {  
    var event_location = new google.maps.LatLng(10.732904, 122.548310);

    var event_map_options = {
        center: event_location,
        zoom: 15,
    };

    var event_map = new google.maps.Map(document.getElementById("event_map"),
        event_map_options);

    var event_marker = new google.maps.Marker({
        position: event_location,
        map: event_map,
        title: "College of Computer Studies",
        animation: google.maps.Animation.DROP,
    });
    event_marker.setMap(event_map);
}
// Initialize maps
google.maps.event.addDomListener(window, 'load', event_map);

</script>
</body>
</html>