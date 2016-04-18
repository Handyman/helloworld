<?php

// if we have submitted the form, try to register the user
if (!empty($_REQUEST['submit'])) {
	include 'user.php';
	$User = new User;
	$Results = $User->createUser();

	// success? show the confirmation page
	if (!empty($Results['success'])) {
		include 'confirmation.php';
	} else {
		// show the registration page - add form errors
		$Errors = $Results['errors'];
		include 'register.php';
	}
} else {
	// just starting out. Show the registratio page.
	include 'register.php';
}
