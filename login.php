<?php
    session_start();
    include ('connection.php');
    date_default_timezone_set('Asia/Manila');
    
    if(isset($_POST['login'])){
    
        //define variables
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    //Protect from mySQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $username = stripslashes($username);
    $password = stripslashes($password);

    //query start
    $admin_sql = "SELECT AdminID, AdminLName, AdminFName, AdminMName, AdminGender,
    AdminType, AdminStatus, AdminUser, AdminPass FROM admin WHERE AdminUser = '$username'";
    $admin_res = mysqli_query($conn, $admin_sql); // performs a query against the database.
    $admin_count = mysqli_num_rows($admin_res); //count of number of admins exist --> returns number of rows
    $row = mysqli_fetch_assoc($admin_res); //fetch registered admin --> fetch result row in an associative array

    //db var
    $res_id = htmlspecialchars($row['AdminID']);
    $res_fname = htmlspecialchars($row['AdminFName']);
    $res_lname = htmlspecialchars($row['AdminLName']);
    $res_mname = htmlspecialchars($row['AdminMName']);
    $res_name = htmlspecialchars($row['AdminFName']) . ' ' . htmlspecialchars($row['AdminLName']);
    $res_fullname = htmlspecialchars($row['AdminFName']) . ' ' . htmlspecialchars($row['AdminMName']) . ' ' . htmlspecialchars($row['AdminLName']);
    $res_gender = htmlspecialchars($row['AdminGender']);
    $res_type = htmlspecialchars($row['AdminType']);
    $res_user = htmlspecialchars($row['AdminUser']);
    $res_pass = htmlspecialchars($row['AdminPass']);
    $res_status = htmlspecialchars($row['AdminStatus']);

    if($admin_count > 0){
        if ($res_status == "Active") {
            if($res_pass == $password){
                switch($res_type){
                    case 'Admin':
                        echo "Admin";
                        break;
                    case 'Work Student':
                        echo "WorkStudent";
                        break;
                    case 'Staff':
                        echo "Staff";
                        break;
                    case 'Manager':
                        echo "Manager";
                        break;
                        default:
                        echo "error";
                        break;
                        exit;
                }
            //session var
            $_SESSION['admin_id'] = $res_id;
            $_SESSION['username'] = $res_user;
            $_SESSION['lastname'] = $res_lname;
            $_SESSION['firstname'] = $res_fname;
            $_SESSION['midname'] = $res_mname;
            $_SESSION['type'] = $res_type;
            $_SESSION['status'] = $res_status;
            $_SESSION['gender'] = $res_gender;
            $_SESSION['name'] = $res_name;
            $_SESSION['fullname'] = $res_fullname;
            header("location: home.php");

            //Login Admin logs
            $filename = "system/admin_login.txt";
            $fp = fopen($filename, 'a+');
            fwrite($fp, " " . $username . " | " . $password . " | " . date("l jS \of F Y h:i:s A"). "\n");
            fclose($fp);
            die();
        } else {
            echo "<script>
            alert('Incorrect Password');
            window.open('index.php', '_self');
        </script>";
           //Login Admin logs with wrong password
            $filename = "system/admin_login_error.txt";
            $fp = fopen($filename, 'a+');
            fwrite($fp, " " . $username . " | " . $password . " | " . date("l jS \of F Y h:i:s A"). "\n");
            fclose($fp);
            die();
        }
    
    } else {
            echo "<script>
                 alert('Account Deactivated');
                window.open('index.php', '_self');
            </script>";
        }
    
    } else {
        echo "<script>
        alert('Invalid Username');
        window.open('index.php', '_self');
        </script>";
        //Login admin logs with invalid username
        $filename = "system/admin_login_error.txt";
        $fp = fopen($filename, 'a+');
        fwrite($fp, " " . $username . " | " . $password . " | " . date("l jS \of F Y h:i:s A"). "\n");
        fclose($fp);
        die();
    }
    mysqli_close($conn);
}
?>