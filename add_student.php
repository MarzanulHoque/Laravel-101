<?php

    session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }

    elseif($_SESSION['usertype']!="admin")
    {
        header("location:login.php");

    }
     
    $host="localhost";

    $user="root";

    $password="";

    $db="school";


    $data=mysqli_connect($host,$user,$password,$db);
    

    if(isset($_POST['add_student']))
    {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $usertype = "student";
        $password = $_POST['password'];

        $check = "SELECT * FROM user WHERE username = '$username' ";
        $check_user = mysqli_query($data,$check);

        $row = mysqli_num_rows($check_user);
        if($row)
        {
            echo "<script> alert('Username already exists , try another one') </script>";
        }
        else{
            $sql = "INSERT INTO user(username,phone,email,usertype,password) VALUES('$username','$phone', '$email','$usertype','$password' )" ;


            $result = mysqli_query($data,$sql);

            if($result)
            {
                echo "  <script> alert('Data Uploaded Successfully') ;</script> ";
            }

            else{
                    echo "  <script> alert('Data Upload failed') ;</script> ";

            }
            }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="admin.css">

    <title>Add Student</title>
    <?php
	
	include 'admin_css.php';
	
	?>
    <link rel="stylesheet" href="admin.css">

    <style>
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>


</head>
<body>

    <?php
	
	include 'admin_sidebar.php';
	
	?>

    <div class="content">
		<center>
                <h1>Add Student</h1>

                <div class="div_deg">

                <form action="#" method="POST" >
                    
                <div
                >
                    <label >Name</label>
                    <input type="text" name="name">
                </div>

                <div
                >
                    <label >Email</label>
                    <input type="text" name="email">
                </div>

                <div
                >
                    <label >Phone</label>
                    <input type="text" name="phone">
                </div>
                <div>
                    <label >Password</label>
                    <input type="text" name="password"></input>
                </div>

                <div  >
                    
                    <input class="btn btn-primary" id="submit" type="submit" value="Add Student" name="add_student">
                </div>

                </form>
                </div>
        </center>
	</div>

</body>
</html>