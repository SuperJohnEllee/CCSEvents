<?php
	/*
		Function php file
	*/
        function countStudentData(){

            include('connection.php');

            $student_data = "SELECT * FROM students";
            $students_res = mysqli_query($conn, $student_data);
            $students_count = mysqli_num_rows($students_res);

            echo htmlspecialchars($students_count);
        }

        function countActiveNews(){

            include('connection.php');

            $active_news_sql = "SELECT NewsID FROM news WHERE Status = 'Active'";
            $active_news_res = mysqli_query($conn, $active_news_sql);
            $active_news_count = mysqli_num_rows($active_news_res);

            echo htmlspecialchars($active_news_count);
        }

        function countInactiveNews(){

            include('connection.php'); 

            $inactive_news_sql = "SELECT NewsID FROM news WHERE Status = 'Inactive'";
            $inactive_news_res = mysqli_query($conn, $inactive_news_sql);
            $inactive_news_count = mysqli_num_rows($inactive_news_res);

            echo htmlspecialchars($inactive_news_count);
        }

        function countAllNews(){

            include('connection.php');

            $all_news = "SELECT NewsID FROM news";
            $all_news_res = mysqli_query($conn, $all_news);
            $all_news_count = mysqli_num_rows($all_news_res);

            echo htmlspecialchars($all_news_count);
        }


		function adminGender(){

			if ($_SESSION['gender'] == "Male") {

				echo ' <img style="border-radius: 50%;" src="img/home/img_avatar_2.png" height="200" width="200">';
			
			} elseif ($_SESSION['gender'] == "Female") {
				
				echo '<img style="border-radius: 50%;" src="img/home/img_avatar.png" height="200" width="200">';
			}
		}

        function replyFeedback(){

            include('connection.php');
            include('PHPMailer/PHPMailerAutoload.php');

            if (isset($_POST['send'])) {

                $mail = new PHPMailer();

                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->mailer = "smtp";
                $mail->Port = 465;
                $mail->isHTML(true);
                $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 
                'verify_peer_name' => false, 'allow_self_signed' => true));
            
            }

        }

        function updateProfile(){

            include('connection.php');

            if (isset($_POST['update'])) {
                
                $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
                $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
                $midname = mysqli_real_escape_string($conn, $_POST['midname']);
                $username = mysqli_real_escape_string($conn, $_POST['username']);

                $update_profile = "UPDATE admin SET 
                AdminLName = '$lastname',
                AdminFName = '$firstname',
                AdminMName = '$midname',
                AdminUser = '$username'
                WHERE AdminID =  '$session_id'
                ";
                $update_res = mysqli_query($conn, $update_profile);

                if ($update_res) {
                    echo "<script>
                        alert('Profile update Successfully');
                    </script>
                    <meta http-equiv='refresh' content='0; url=admin-profile.php'>";
                }
            }
        }

        function importStudentData(){

            include('connection.php');

        $output = '';
        $sql = "SELECT StudentID FROM students";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if(isset($_POST['btn_import']))
        {
            $filename = $_FILES['file']['tmp_name'];

        if($_FILES['file']['size'] > 0)
        {
            $file = fopen($filename, 'r');

            while(($data = fgetcsv($file, 1000, ",")) !== FALSE)
            {
                $csv_query = "INSERT INTO students(StudentNumber, StudentFName, StudentMName, 
                StudentLName, Gender, Course, Year)
                VALUES('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."', '".$data[4]."', '".$data[5]."', 
                '".$data[6]."')";
                $csv_res = mysqli_query($conn, $csv_query);
            }
            if(isset($csv_res))
                {
                    echo "<script>
                        alert('Import Sucessfull');
                    </script>
                    <meta http-equiv='refresh' content='0; url=admin-master-list.php'>
                    ";
                }
                else 
                {
                    echo "<script>
                    alert('Failure in importing');
                    </script>";
                }
            }
        }
        elseif (isset($_POST['btn_export'])) {
            
            $exp_sql = "SELECT * FROM students ORDER BY StudentID ASC";
            $exp_res = mysqli_query($conn, $exp_sql);
            $exp_count = mysqli_num_rows($exp_res);

            if ($exp_count > 0) {
                    
            $output .= '<table class="table table-border">
                        <thead>    
                            <tr>
                                <th>ID</th>
                                <th>ID Number</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Year</th>
                        </thead>
                            </tr>';
                        while ($exp_row = mysqli_fetch_array($exp_res)) {
                            
                            $output .= '
                            <tbody>
                            <tr>
                                <td>'.htmlspecialchars($exp_row['StudentID']).'</td>
                                <td>'.htmlspecialchars($exp_row['StudentNumber']).'</td>
                                <td>'.htmlspecialchars($exp_row['Name']).'</td>
                                <td>'.htmlspecialchars($exp_row['Course']).'</td>
                                <td>'.htmlspecialchars($exp_row['Year']).'</td>
                            </tbody>
                            </tr>';
                        }

                        $output .= '</table>';
                        header("Content-Type: application/xls");
                        header("Content-Disposition: attachment; filename=students.xls");
                        echo $output;
            }
        }
    }

    function createEvents(){

        include('connection.php');
        date_default_timezone_set('Asia/Manila');

        if (isset($_POST['btn_add_event'])) {
            
            $event_image = mysqli_real_escape_string($conn, 'event_image/'.$_FILES['image']['name']);
            $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
            $event_type = mysqli_real_escape_string($conn, $_POST['event_type']);
            $event_desc = mysqli_real_escape_string($conn, $_POST['event_desc']);
            $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);

            $check_event_name = mysqli_query($conn, "SELECT * FROM events WHERE EventName = '$event_name'");
            $event_count = mysqli_num_rows($check_event_name);

            if ($event_count > 0) {
                
                echo "<script>
                    alert('This event is already existing');
                </script>";
            } else {

                $insert_events = mysqli_query($conn, "INSERT INTO  events (EventName, EventType, EventDescription, EventDate) VALUES ('$event_name', '$event_type')");

                if ($insert_events) {
                    echo "<script>

                    </script>";
                } else {

                }
            }

        }
    }

    function createAdmin(){

        include('connection.php');
        date_default_timezone_set('Asia/Manila');
        if(isset($_POST['btn_add']))
        {
            $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
            $midname = mysqli_real_escape_string($conn, $_POST['midname']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $check_user = "SELECT * FROM admin 
            WHERE AdminUser = '$username'";
            $res_user = mysqli_query($conn, $check_user);
            $count = mysqli_num_rows($res_user);

            if ($count > 0) {
                echo "<script>
                    alert('Username is already existing');
                  </script>";
                    exit;
              } else if(str_word_count($username) > 1)
              {
                    echo "<script>
                        alert('Username must not contain spaces');
                    </script>";
              }

            //insertion
            $insert_query = "INSERT INTO admin
            (AdminLName, AdminFName, AdminMName, AdminGender, 
            AdminType, AdminStatus, AdminUser, AdminPass) VALUES
            ('$lastname','$firstname','$midname', '$gender', '$type', 'Active', '$username','$password')";
            $result = mysqli_query($conn, $insert_query);

            if ($result) {
                echo "<script>
                    alert('Successfully created an account');
                  </script>
                  <meta http-equiv='refresh' content='0; url=admin-manage-account.php'>";
            } else {
                echo "<script>
                    alert('Failure in account submission');
                </script>";
            }

    }
    }

		function createNews(){

			include('connection.php');

    		$admin_user = htmlspecialchars($_SESSION['username']);
    		$admin_name = htmlspecialchars($_SESSION['name']);
			
			if(isset($_POST['btn_post'])){
        
        		$news_image = mysqli_real_escape_string($conn, 'news_image/'. $_FILES['image']['name']);
        		$title = mysqli_real_escape_string($conn, $_POST['title']);
        		$content = mysqli_real_escape_string($conn, $_POST['content']);

        		if(preg_match("!image!", $_FILES['image']['type'])) {
            		if(copy($_FILES['image']['tmp_name'], $news_image)) {
                		
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
}

    function viewAttendance(){

        include('connection.php');

            $display_register = "SELECT * FROM register RIGHT JOIN students ON students.StudentID = register.StudentID";
            $display_result = mysqli_query($conn, $display_register);
            $display_count = mysqli_num_rows($display_result);

                if($display_count > 0)
                {
                    while($display_row = mysqli_fetch_assoc($display_result))
                    {
                        $fullname = htmlspecialchars($display_row['StudentLName']) . ', ' . htmlspecialchars($display_row['StudentFName']) . ' ' . htmlspecialchars($display_row['StudentMName']);
                        echo "<tr>
                                <td>".htmlspecialchars($display_row['StudentID'])."</td>
                                <td>".htmlspecialchars($display_row['StudentNumber'])."</td>
                                <td>".htmlspecialchars($fullname)."</td>
                                <td>".htmlspecialchars($display_row['Gender'])."</td>
                                <td>".htmlspecialchars($display_row['Course'])."</td>
                                <td>".htmlspecialchars($display_row['Year'])."</td>
                                <td>".htmlspecialchars($display_row['RegisterDate'])."</td>
                                <td><a class='btn btn-primary' href='admin-activate-deactivate.php?reg=".$display_row['StudentID']."'><span class='fa fa-check'></span> Register</a></td>
                                <td><a class='btn btn-danger' href='admin-activate-deactivate.php?unreg=".$display_row['StudentID']."'><span class='fa fa-close'></span> Unregister</a></td>
                            </tr>";
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-info-circle'></span> Registered Students Not Found</h3></td></tr>";
                        }
            }

    function viewUserFeedbacks(){

        include('connection.php');

        $feed_sql = "SELECT * FROM feedback ORDER BY DateSend DESC";
        $feed_res = mysqli_query($conn, $feed_sql);
        $feed_count = mysqli_num_rows($feed_res);

        if ($feed_count > 0) {
            while ($row = mysqli_fetch_assoc($feed_res)) {
                echo "<tr>
                    <td>".htmlspecialchars($row['feedbackID'])."</td>
                    <td>".htmlspecialchars($row['Name'])."</td>
                    <td>".htmlspecialchars($row['Email'])."</td>
                    <td>".htmlspecialchars($row['Subject'])."</td>
                    <td>".htmlspecialchars($row['Message'])."</td>
                    <td>".htmlspecialchars($row['DateSend'])."</td>
                    <td><a class='btn btn-primary'><span class='fa fa-reply'></span> Reply</a></td>                    
                    <td><a class='btn btn-danger' href='admin-delete.php?feed_del=".$row['feedbackID']."'><span class='fa fa-trash'></span> Delete</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-warning'></span> There no feedbacks</h3></td></tr>";
        }
    }
    
    function viewActiveAdmins(){

        include('connection.php');

        $active_admin_sql = "SELECT * FROM admin WHERE AdminStatus = 'Active' ORDER BY AdminID DESC";
        $active_admin_res = mysqli_query($conn, $active_admin_sql);
        $active_admin_count = mysqli_num_rows($active_admin_res);

        if ($active_admin_count > 0) {
            while ($row = mysqli_fetch_assoc($active_admin_res)) {
                $fullname = htmlspecialchars($row['AdminLName']) . ", " . htmlspecialchars($row['AdminFName']) . " " . htmlspecialchars($row['AdminMName']);
                 
                 echo '<tr>
                        <td>'.htmlspecialchars($row['AdminID']).'</td> 
                        <td>'.htmlspecialchars($fullname).'</td>
                         <td>'.htmlspecialchars($row['AdminType']).'</td>
                         <td>'.htmlspecialchars($row['AdminStatus']).'</td>
                         <td>'.htmlspecialchars($row['AdminUser']).'</td>
                         <td>'.htmlspecialchars($row['AdminPass']).'</td>
                         <td><a class="btn btn-warning" href="admin-activate-deactivate.php?admin_deact='.$row['AdminID'].'"><span class="fa fa-close"></span> Disabled</a></td>
                         <td><a class="btn btn-danger" href="admin-delete.php?admin_del='.$row['AdminID'].'"><span class="fa fa-close"></span> Delete</a></td>
                    </tr>';
            }
        } else {
             echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-warning'></span> Admins Not Found</h3></td></tr>";
        }
    }
    function viewInactiveAdmins(){

        include('connection.php');

        $inactive_admin_sql = "SELECT * FROM admin WHERE AdminStatus = 'Inactive' ORDER BY AdminID DESC";
        $inactive_admin_res = mysqli_query($conn, $inactive_admin_sql);
        $inactive_admin_count = mysqli_num_rows($inactive_admin_res);

        if ($inactive_admin_count > 0) {
                while ($row = mysqli_fetch_assoc($inactive_admin_res)) {
                    $fullname = htmlspecialchars($row['AdminLName']) . ", " . htmlspecialchars($row['AdminFName']) . " " . htmlspecialchars($row['AdminMName']);
                     echo '<tr>
                        <td>'.htmlspecialchars($row['AdminID']).'</td> 
                        <td>'.htmlspecialchars($fullname).'</td>
                         <td>'.htmlspecialchars($row['AdminType']).'</td>
                         <td>'.htmlspecialchars($row['AdminStatus']).'</td>
                         <td>'.htmlspecialchars($row['AdminUser']).'</td>
                         <td>'.htmlspecialchars($row['AdminPass']).'</td> 
                         <td><a class="btn btn-primary" href="admin-activate-deactivate.php?admin_act='.$row['AdminID'].'"><span class="fa fa-check"></span> Enabled</a></td>
                         <td><a class="btn btn-danger" href="admin-delete.php?admin_del='.$row['AdminID'].'"><span class="fa fa-close"></span> Delete</a></td>
                    </tr>';

                }
        } else {
             echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                    <span class='fa fa-warning'></span> Admins Not Found</h3></td></tr>";
        }
    }

    function viewStudentData(){

        include('connection.php');

        $display_csv = "SELECT * FROM students";
        $display_result = mysqli_query($conn, $display_csv);
        $display_count = mysqli_num_rows($display_result);
        
        if($display_count > 0)
        {
            while($row = mysqli_fetch_assoc($display_result))
            {
                $fullname =  htmlspecialchars($row['StudentLName']) . ", " . htmlspecialchars($row['StudentFName']) . " " . htmlspecialchars($row['StudentMName']);
                echo "<tr>
                        <td>".htmlspecialchars($row['StudentID'])."</td>
                        <td>".htmlspecialchars($row['StudentNumber'])."</td>
                        <td>".$fullname."</td>
                        <td>".htmlspecialchars($row['Gender'])."</td>
                        <td>".htmlspecialchars($row['Course'])."</td>
                        <td>".htmlspecialchars($row['Year'])."</td>
                    </tr>";
            }
            } else {
                    echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-warning'></span> Students Not Found</h3></td></tr>";
                }
        }

	function viewActiveNews(){

		include('connection.php');

            $active_news_sql = "SELECT * FROM news WHERE PostDate >= CURRENT_DATE() - INTERVAL 36 DAY_HOUR AND Status = 'Active' ORDER BY PostDate DESC";
            $active_news_res = mysqli_query($conn, $active_news_sql);
            $active_news_count = mysqli_num_rows($active_news_res);

                if ($active_news_count > 0) {
			
                    while ($row = mysqli_fetch_assoc($active_news_res)) {
                        echo '<tr><td><img src="'.$row['Image'].'" style="width:170px; height:200px;"></td>';
                        echo '<td>'.htmlspecialchars($row['NewsID']);'</td>';
                        echo '<td>'.htmlspecialchars($row['Title']).'</td>';
                        echo '<td>'.htmlspecialchars($row['Content']).'</td>';
                        echo '<td>'.htmlspecialchars($row['Status']).'</td>';
                        echo '<td>'.htmlspecialchars($row['PostDate']).'</td>';
                        echo '<td>'.htmlspecialchars($row['PostBy']).'</td>';
                        echo '<td><a class="btn btn-warning" href="show_hide_news.php?hide='.$row['NewsID'].'"><span class="fa fa-eye-slash"></span> Hide</a></td></tr>';
                    }
                    
                    } else {
                            echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-warning'></span> No News Found</h3></td></tr>";
                        }
				}

    function viewInactiveNews(){

        include('connection.php');

        $inactive_news_sql = "SELECT * FROM news WHERE Status = 'Inactive' ORDER BY PostDate DESC";
        $inactive_news_res = mysqli_query($conn, $inactive_news_sql);
        $inactive_news_count = mysqli_num_rows($inactive_news_res);

            if ($inactive_news_count > 0) {
               while ($row = mysqli_fetch_assoc($inactive_news_res)) {
                    echo '<tr><td><img src="'.$row['Image'].'" style="width:170px; height:200px;"></td>';
                        echo '<td>'.htmlspecialchars($row['NewsID']);'</td>';
                        echo '<td>'.htmlspecialchars($row['Title']).'</td>';
                        echo '<td>'.htmlspecialchars($row['Content']).'</td>';
                        echo '<td>'.htmlspecialchars($row['Status']).'</td>';
                        echo '<td>'.htmlspecialchars($row['PostDate']).'</td>';
                        echo '<td>'.htmlspecialchars($row['PostBy']).'</td>';
                        echo '<td><a class="btn btn-info" href="show_hide_news.php?show='.$row['NewsID'].'"><span class="fa fa-eye"></span> Show</a></td></tr>';
               }
            } else {
                 echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                            <span class='fa fa-warning'></span> No News Found</h3></td></tr>";
            }
    }

    function viewAllNews(){

        include('connection.php');

        $all_news_sql = "SELECT * FROM news ORDER BY PostDate DESC";
        $all_news_res = mysqli_query($conn, $all_news_sql);
        $all_news_count = mysqli_num_rows($all_news_res);

        if ($all_news_count > 0) {
            while ($row = mysqli_fetch_assoc($all_news_res)) {
                 echo '<tr><td><img src="'.$row['Image'].'" style="width:170px; height:200px;"></td>';
                        echo '<td>'.htmlspecialchars($row['NewsID']);'</td>';
                        echo '<td>'.htmlspecialchars($row['Title']).'</td>';
                        echo '<td>'.htmlspecialchars($row['Content']).'</td>';
                        echo '<td>'.htmlspecialchars($row['Status']).'</td>';
                        echo '<td>'.htmlspecialchars($row['PostDate']).'</td>';
                        echo '<td>'.htmlspecialchars($row['PostBy']).'</td>';
                        echo '<td><a class="btn btn-info" href="show_hide_news.php?show='.$row['NewsID'].'"><span class="fa fa-eye"></span> Show</a></td>';
                        echo '<td><a class="btn btn-primary"><span class="fa fa-edit"></span> Edit</a></td>';
                        echo '<td><a class="btn btn-danger" href="admin-delete.php?news_del='.$row['NewsID'].'"><span class="fa fa-trash"></span> Delete</a></td></tr>';
            }
        } else {
             echo "<tr><td colspan='7'><h3 class='alert alert-warning text-center'>
                    <span class='fa fa-warning'></span> No News Found</h3></td></tr>";
            }
    }

?>