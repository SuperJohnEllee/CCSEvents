<?php
	
	/*
		activate-deactivate php

		return keywords

		Active --> activate admin account
		Inactive --> deactivate admin account

		Registered --> registered student
		Unregistered --> unregistered student
	*/
	include('connection.php');

	//registered and unregistered students
	if (isset($_GET['reg']) && is_numeric($_GET['reg'])) {
		
		$reg = htmlspecialchars($_GET['reg']);
		$reg_sql = mysqli_query($conn, "UPDATE students SET Status = 'Registered' WHERE StudentID = '$reg'");
	
	} else if (isset($_GET['unreg']) && is_numeric($_GET['unreg'])) {
		
		$unreg = htmlspecialchars($_GET['unreg']);
		$unreg_sql = mysqli_query($conn, "UPDATE students SET Status = 'Unregistered' WHERE StudentID = '$unreg'");
	}

	//activate and deactivate admins
	if (isset($_GET['admin_act']) && is_numeric($_GET['admin_act'])) {
	
		$admin_act = htmlspecialchars($_GET['admin_act']);
		$admin_act_sql = mysqli_query($conn, "UPDATE admin SET AdminStatus = 'Active' WHERE AdminID  = '$admin_act'");
         echo "<script>
            alert('Successfully activated an admin');
        </script>
        <meta http-equiv='refresh' content='0; url=admin-manage-account.php'>";
	
	} elseif (isset($_GET['admin_deact']) && is_numeric($_GET['admin_deact'])) {
		
		$admin_deact = htmlspecialchars($_GET['admin_deact']);
		$admin_deact_sql = mysqli_query($conn, "UPDATE admin SET AdminStatus = 'Inactive' WHERE AdminID = '$admin_deact'");
          echo "<script>
            alert('Successfully deactivated an admin');
        </script>
        <meta http-equiv='refresh' content='0; url=admin-manage-account.php'>";
	}

?>