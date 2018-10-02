<?php
    if(!isset($_SESSION['username'])){
?>
        <nav class="navbar navbar-expand-lg navbar-light mdb-color darken-4 fixed-top">
        <a class="navbar-brand" href="#"><img src="img/logo/CCSLogo.png" height="30" width="30"></a>
        <button class="navbar-toggler teal darken-2" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle Navigation">
			<span class="navbar-toggler-icon text-white"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link text-white" href="index.php"><span class="fa fa-home"></span><span class="sr-only">(current)</span> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><span class="fa fa-users"></span> Personnel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="events.php"><span class="fa fa-bookmark"></span> Events Offered</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="about.php"><span class="fa fa-info-circle"></span> About Us</a>
                </li>
			</ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="news.php"><span class="fa fa-newspaper-o"></span> News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" data-toggle="modal" data-target="#registerModal"><span class="fa fa-user-plus"></span> Sign Up</a>
                <li>
                <li class="nav-item">
                    <a class="nav-link text-white"  data-toggle="modal" data-target="#loginModal"><span class="fa fa-sign-in"></span> Login</a>
                </li>
            </ul>
		</div>
    </nav>
<?php
    } else {
?>
    <nav class="navbar navbar-expand-lg navbar-dark cyan darken-3 fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#">
        <span class="d-block d-lg-none"><?php echo htmlspecialchars($_SESSION['username']);?></span>
        <span class="d-none d-lg-block">
          <a href=""><img src="img/logo/CCSLogo.png" height="165" width="165"></a>
          <?php
          /*
            if ($_SESSION['gender'] == "Male") {
          ?>
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/home/img_avatar_2.png" alt="Male">
          <?php
           } elseif ($_SESSION['gender'] == "Female") {
          ?>
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/home/img_avatar.png" align="Female">
        <?php }  */?>
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php"><span class="fa fa-dashboard"></span> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-manage-account.php"><span class="fa fa-users"></span> Manage Accounts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-master-list.php"><span class="fa fa-list"></span> Master List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-manage-news.php"><span class="fa fa-newspaper-o"></span> Manage News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-manage-registered.php"><span class="fa fa-user"></span> Registered Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-manage-attendance.php"><span class="fa fa-list"></span> Manage Attendance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-manage-events.php"><span class="fa fa-user"></span> Manage Events</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="admin-manage-feedbacks.php"><span class="fa fa-comments"></span> Manage User Feedbacks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-manage-messages.php"><span class="fa fa-envelope"></span> Manage Messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-profile.php?<?php echo htmlspecialchars($_SESSION['username']); ?>"><span class="fa fa-user"></span> Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><span class="fa fa-sign-out"></span> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--<nav class="navbar navbar-expand-lg navbar-light mdb-color darken-4 fixed-top">
        <a class="navbar-brand" href="#"><img src="img/logo/CPULogo.png" height="30" width="30"></a>
            <button class="navbar-toggler teal darken-2" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle Navigation">
			    <span class="navbar-toggler-icon text-white"></span>
		    </button>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link text-white" href="home.php"><span class="fa fa-home"></span><span class="sr-only">(current)</span> Home</a>
                </li>
			</ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="admin-profile.php?<?php echo htmlspecialchars($_SESSION['username']); ?>"><span class="fa fa-user"></span> <?php echo htmlspecialchars($_SESSION['username']); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php"><span class="fa fa-sign-out"></span> Logout</a>
                </li>
            </ul>
		</div>
    </nav>-->
<?php
    }
?>