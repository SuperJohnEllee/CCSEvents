<?php
	include('connection.php');
	if(isset($_POST['btn_post']))
    {
        $news_image = mysqli_real_escape_string($conn, 'news_image/'. $_FILES['image']['name']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        if(preg_match("!image!", $_FILES['image']['type']))
        {
            if(copy($_FILES['image']['tmp_name'], $news_image)) 
            {
                $insert_news = "INSERT INTO news(Image, Title, Content, Status, PostBy, PostDate)
                VALUES ('$news_image','$title','$content', 'Active', '$admin_name', NOW())";
                $result = mysqli_query($conn, $insert_news);

                if($result)
                {
                    echo "<script> alert('Successfully created a news'); </script>
                    <meta http-equiv='refresh' content='0; url=admin-manage-news.php'>";
                } 
                else 
                {
                    echo "<script> alert('Failure in creating a news'); </script>";
                }
            }
            else
            {
                echo "<script>alert('Image upload failed');</script>";
            }
        } 
        else
         {
			echo "<script> alert('Invalid type of file'); </script>";
        }

    }
?>