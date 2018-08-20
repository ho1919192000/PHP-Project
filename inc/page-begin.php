        <?php
        ob_start();
        ?>
    <!DOCTYPE html>
    <html lang="">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Project 6: Working with Images</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="css/app.css">
    </head>

    <body>


        <div class="container">
            <!-- Page Heading-->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (session_status() == PHP_SESSION_ACTIVE) {
                        print '<nav class="navbar navbar-inverse">
                          <div class="container-fluid">
                            <div class="navbar-header">
                              <span class="navbar-brand">PHP Project</span>
                            </div>
                            <ul class="nav navbar-nav">
                              <li><a href="welcome.php">Welcome</a></li>
                              <li><a href="upload_file.php">Upload</a></li>
                              <li><a href="view.php">View</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                          </div>
                        </nav>';
                    }else{
                         print '<nav class="navbar navbar-inverse">
                          <div class="container-fluid">
                            <div class="navbar-header">
                              <span class="navbar-brand">PHP Project</span>
                            </div>
                            <ul class="nav navbar-nav navbar-right">   
                              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>
                            </div>
                        </nav>';
                    }
                    ?>

                        <!-- BEGIN CHANGEABLE CONTENT. -->