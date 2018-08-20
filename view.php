<?php 
session_start();
include('inc/page-begin.php');
?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>View the image</h1>
        </div>
        <div class="panel-body" id="modify">
          <?php
            
            
            $dbc = mysqli_connect('localhost', 'root', 'root', 'myimages');

            // Define the query:
            $query = 'SELECT * FROM imagedata ORDER BY id DESC';

            if ($r = mysqli_query($dbc, $query)) { // Run the query.

                // Retrieve and print every record:
                while ($row = mysqli_fetch_array($r)) {
                    print "<p><h3>{$row['title']}</h3>
                    <img  src=\"{$row['path']}\" class=\"img-size\"  alt=\"{$row['title']}\"/>
                    <br>
                    <a href=\"delete_entry.php?id={$row['id']}\">Delete</a>
                    </p><hr>\n";
                }

            } else { // Query didn't run.
                print '<p style="color: red;">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
            }
        
        ?> 
        </div>
    </div>

<?php include('inc/page-end.php'); ?>