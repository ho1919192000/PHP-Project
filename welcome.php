<?php
/* This is the welcome page. The user is redirected here
after they successfully log in. */

// Need the session:
session_start();


include('inc/page-begin.php');

// Print a greeting:
print '<div class="panel panel-default">
            <div class="panel-heading">
                <h1>Hey, '.$_SESSION['firstName'].'  '.$_SESSION['lastName'].'</h1></div>
            <div class="panel-body"id="modify">';

date_default_timezone_set('America/New_York');
print '<p>You\'ve had an ative session since ' . date('g:i a', $_SESSION['loggedin']) . '-America/New_York!</p>
        </div>
        </div>';

	
include('inc/page-end.php');
?>