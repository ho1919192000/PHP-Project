<?php 
session_start();
include('inc/page-begin.php');

?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Delete the Picture</h1>
        </div>
        <div class="panel-body" id="modify">
        
        <?php 

        // Connect and select:
        $dbc = mysqli_connect('localhost', 'root', 'root', 'myimages');

        if (isset($_GET['id']) && is_numeric($_GET['id']) ) { // Display the entry in a form:

            // Define the query:
            $query = "SELECT* FROM imagedata WHERE id={$_GET['id']}";
            if ($r = mysqli_query($dbc, $query)) { // Run the query.

                $row = mysqli_fetch_array($r); // Retrieve the information.

                // Make the form:
                print "
                <form action=\"delete_entry.php\" method=\"post\">
                <p>Are you sure you want to delete this entry?</p>
                <p><h3>{$row['title']}</h3> 
                <img  src=\"{$row['path']}\" class=\"img-size\"  alt=\"{$row['title']}\"/> <br>
                <input type=\"hidden\" name=\"id\" value=\"{$_GET['id']}\">
                <input type=\"submit\" name=\"submit\" value=\"Delete this Picture!\"></p>
                </form>";

            } else { // Couldn't get the information.
                print '<p style="color: red;">Could not retrieve the picture because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
            }

        } elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { // Handle the form.

            // Define the query:
            if ($r = mysqli_query($dbc, "SELECT* FROM imagedata WHERE id={$_POST['id']}")) { // Run the query.

                $row = mysqli_fetch_array($r); 
                
                 if (!unlink($row['path']))//delete the picture in upload folder
                  {
                  echo ("Error deleting {$row['path']}");
                  }else
                  {
                  echo ("Deleted {$row['path']}");
                  }
            } else { // Couldn't get the information.
                print '<p style="color: red;">Could not retrieve the picture because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
            }
            
            $query = "DELETE FROM imagedata WHERE id={$_POST['id']} LIMIT 1";
            $r = mysqli_query($dbc, $query); // Execute the query.
                
            
            


            // Report on the result:
            if (mysqli_affected_rows($dbc) == 1) {
                print '<p>The picture has been deleted.</p>';
            } else {
                print '<p style="color: red;">Could not delete the picture because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
            }

        } else { // No ID received.
            print '<p style="color: red;">This page has been accessed in error.</p>';
        } // End of main IF.

        mysqli_close($dbc); // Close the connection.

        ?>
     
        </div>
    </div>

<?php include('inc/page-end.php'); ?>