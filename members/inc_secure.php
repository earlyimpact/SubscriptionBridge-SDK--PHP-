<?php session_start(); ?>
<?php
	if ($_SESSION['IsValidUser']==true) {
		// user is valid... do something
	} else {
		// user is not valid... redirect to login
		header("Location: ../login.php?msg=You were logged out due to inactivity.");
	}
?>