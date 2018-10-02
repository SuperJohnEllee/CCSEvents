<?php
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
?>