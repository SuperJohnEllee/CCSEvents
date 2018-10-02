<?php
    
    include('connection.php');

    //Delete News
	if (isset($_GET['news_del']) && is_numeric($_GET['news_del'])) {
		
		$news_del = htmlspecialchars($_GET['news_del']);
		$news_del_sql = "DELETE FROM news WHERE NewsID = '$news_del'";
		$news_del_res = mysqli_query($conn, $news_del_sql);
      
        echo "<script>
            alert('Successfully deleted an announcement');
        </script>
        <meta http-equiv='refresh' content='0; url=admin-manage-news.php'>";
	}

	//Delete Admins
	if (isset($_GET['admin_del']) && is_numeric($_GET['admin_del'])) {
	 	
	 	$admin_del = htmlspecialchars($_GET['admin_del']);
	 	$admin_del_sql = "DELETE FROM admin WHERE AdminID = '$admin_del'";
	 	$admin_del_res = mysqli_query($conn, $admin_del_sql);

	 	echo "<script>
            alert('Successfully deleted an admin');
        </script>
        <meta http-equiv='refresh' content='0; url=admin-manage-account.php'>";

	 }

	 //Delete Feedbacks
	if (isset($_GET['feed_del']) && is_numeric($_GET['feed_del'])) {
		
		$feed_del = htmlspecialchars($_GET['feed_del']);  	
		$feed_del_sql = "DELETE FROM feedback WHERE feedbackID = '$feed_del'";
		$feed_del_res = mysqli_query($conn, $feed_del_sql);

		echo "<script>
            alert('Successfully deleted an feedback');
        </script>
        <meta http-equiv='refresh' content='0; url=admin-manage-feedbacks.php'>";
	} 
?>