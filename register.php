<?php
    error_reporting(1);
    session_start();
    include('connection.php');

    if(isset($_POST['register']))
    {
        //define student variables
        $idNumber = htmlspecialchars($_POST['idnum']);
        $idNumber = stripslashes($idNumber);
        $idNumber = mysqli_real_escape_string($conn, $idNumber);
       
        $check_idnumber = mysqli_query($conn, "SELECT * FROM register 
        ");
        $check_count = mysqli_num_rows($check_idnumber);
        $check_row = mysqli_fetch_assoc($check_idnumber);

        $res_idnum = htmlspecialchars($check_row['StudentNumber']);

        if($check_count > 0)
        {
            echo "<script>
            alert('This ID Number is already existing');
            window.open('index.php', '_self');
        </script>";
        }
        else 
        {
            $register_sql = "INSERT INTO register(StudentNumber, RegisterDate)
            VALUES('$idNumber', NOW());";

            $register_result = mysqli_query($conn, $register_sql);

            if($register_result)
            {
                echo "<script>
                alert('Successfully registered');
                window.open('index.php?remarks=success', '_self');
            </script>";
            }
            else
            {
                echo "<script>
                alert('Error in registration');
                window.open('index.php', '_self');
            </script>";
            }
        }
        mysqli_close($conn);
    }
?>