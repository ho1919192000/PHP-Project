
<?php
include('inc/page-begin.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Handle the form:
	if ( (!empty($_POST['firstName'])) && (!empty($_POST['lastName'])) ) {
            
            
            // Do session stuff:
			session_start();
			$_SESSION['firstName'] = $_POST['firstName'];
            $_SESSION['lastName'] = $_POST['lastName'];
			$_SESSION['loggedin'] = time();

			// Redirect the user to the welcome page!
			ob_end_clean(); // Destroy the buffer!
			header ('Location: http://localhost/Project_6/welcome.php');
			exit();
	

	} else { // Forgot a field.

		print '<p>Please make sure you enter both an First Name and a Last Name!<br />Go back and try again.</p>';
	
	}

} else { // Display the form.

	print '
    <div class="panel panel-default">
    <div class="panel-heading">
        <h1>Login</h1></div>
    <div class="panel-body">
        <form action="login.php" method="post">
            <section>
                <div class="align">
                    <label for="fn">First Name:</label>
                    <input type="text" name="firstName" id="fn" size="20" />
                </div>
                <div class="align">
                    <label for="ln">Last Name:</label>
                    <input type="text" name="lastName" id="ln" size="20" />
                </div>
            </section>
            <input class="btn btn-primary btn-md align" id="buttom1" type="submit" name="submit" value="Submit" />
        </form>
    </div>
</div>';

}

include('inc/page-end.php');
?>


