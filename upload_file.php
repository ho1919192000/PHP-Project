<?php

// Need the session:
session_start();


include('inc/page-begin.php');

/* This script displays and handles an HTML form. This script takes a file upload and stores it on the server. */

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.
    print '<div class="panel panel-default">
            <div class="panel-heading">';
    
    $dbc = mysqli_connect('localhost', 'root', 'root', 'myimages') or die("Error with connction!");
    
    //Set the character set:
    mysqli_set_charset($dbc, 'utf8');
    
    // Validate and secure the form data:
    $problem = FALSE;
    if (!empty($_POST['title'])) {
        $title = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
        $path  = mysqli_real_escape_string($dbc, "uploads/{$_FILES['the_file']['name']}");
    } else {
        print '<p style="color: red;">Please submit a title.</p>';
        $problem = TRUE;
    }
    
    if (!$problem) {
        
        // Define the query:
        $query = "INSERT INTO imagedata ( title, path) VALUES ( '$title', '$path')";
        
        // Execute the query:
        if (@mysqli_query($dbc, $query)) {
            if (move_uploaded_file($_FILES['the_file']['tmp_name'], "uploads/{$_FILES['the_file']['name']}")) {
                
                print '<h1>Your file has been uploaded.</h1></div><div class="panel-body" id="modify">';
                print '<p>Name: ' . $_FILES['the_file']['name'] . "</p>";
                print '<p>Title: ' . $title . "</p></div></div>";
                
            } else { // Problem!
                
                print '<h1>Your file could not be uploaded because:</h1></div><div class="panel-body" id="modify"> ';
                
                // Print a message based upon the error:
                switch ($_FILES['the_file']['error']) {
                    case 1:
                        print '<p>The file exceeds the upload_max_filesize setting in php.ini';
                        break;
                    case 2:
                        print '<p>The file exceeds the MAX_FILE_SIZE setting in the HTML form';
                        break;
                    case 3:
                        print '<p>The file was only partially uploaded';
                        break;
                    case 4:
                        print '<p>No file was uploaded';
                        break;
                    case 6:
                        print '<p>The temporary folder does not exist.';
                        break;
                    default:
                        print '<p>Something unforeseen happened.';
                        break;
                }
                
                print '.</p></div></div>'; // Complete the paragraph.
                
            } // End of move_uploaded_file() IF.
        } else {
            print '<p style="color: red;">Could not add the picture because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }
        
    } // No problem!
    
    mysqli_close($dbc); // Close the connection.
    
    // Try to move the uploaded file:
    
    
} else {
    print '<div class="panel panel-default">
        <div class="panel-heading">
            <h1>Please upload a image</h1>
            </div>
        <div class="panel-body" id="modify">
            <form action="upload_file.php" enctype="multipart/form-data" method="post">
                <p>Upload a file using this form:</p>
                
                <p><label>Title: </label><input type="test" name="title" /></p>
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                <p>
                    <input type="file" name="the_file" />
                </p>
                <p>
                    <input type="submit" name="submit" value="Upload This File" />
                </p>
            </form>

        </div>
    </div>';
} // End of submission IF.



include('inc/page-end.php');
?>