<?php
    include('connection.php');

    if(isset($_POST['btn_export']))
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=students_enrolled.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Student ID', 'Last Name', 'First Name', 'Middle Name', 'Gender', 'Course', 'Year'));
        $export_sql = "SELECT * FROM students ORDER BY StudentLName DESC";
        $export_res = mysqli_query($conn, $export_sql);

        while($row = mysqli_fetch_assoc($export_res))
        {
            fputcsv($output, $row);
        }
        
        fclose($output);
    }
?>