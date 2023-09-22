<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body background="school2.jpg" class="body_deg">
    <center>

        <div class="form_deg">

        <center class="title_deg">
            Login Form
            <h4>

            <?php
            
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];
            ?>

            </h4>

        </center>
            
            <form action="login_check.php" method="POST" class="login_form">

                <div>
                    <label class="label_deg">Username</label>
                    <input type="text" name="username">
                </div>
            
                <div>
                    <label class="label_deg">Password</label>
                    <input type="password" name="password">
                </div>
            
                <div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                </div>
            </form>
            
        </div>

    </center>
</body>
</html>