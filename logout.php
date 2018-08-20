<?php
/* This is the logout page. It destroys the session information. */

// Need the session:
session_start();

// Reset the session array:
$_SESSION = array();

// Destroy the session data on the server:
session_destroy();

include('inc/page-begin.php');

?>

<h2>You are now logged out</h2>
<p>You can login again to enjoy more features.</p>

<?php include('inc/page-end.php'); ?>