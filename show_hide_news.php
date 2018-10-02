<?php
    include('connection.php');
    session_start();
    $admin_name = htmlspecialchars($_SESSION['name']);

    if(isset($_GET['show']) && is_numeric($_GET['show']))
    {
        $show = htmlspecialchars($_GET['show']);
        $show_sql = "UPDATE news SET PostDate = NOW(), Status = 'Active', PostBy = '$admin_name' WHERE NewsID = '$show'";
        $show_res = mysqli_query($conn, $show_sql);
        echo "<script>
            alert('Successfully showed an announcement');
        </script>
		<meta http-equiv='refresh' content='0; url=admin-manage-news.php'>";
    }
    elseif (isset($_GET['hide']) && is_numeric($_GET['hide'])) {

        $hide = htmlspecialchars($_GET['hide']);
        $hide_sql = "UPDATE news SET Status = 'Inactive' WHERE NewsID = '$hide'";
        $hide_res = mysqli_query($conn, $hide_sql);
          echo "<script>
            alert('Successfully hide an announcement');
        </script>
        <meta http-equiv='refresh' content='0; url=admin-manage-news.php'>";
    }

?>