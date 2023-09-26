<?php

    error_reporting(0);
    session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }

    elseif($_SESSION['usertype']!="student")
    {
        header("location:login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="school";
    $data=mysqli_connect($host,$user,$password,$db);

    $name = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username='$name'";
    $result = mysqli_query($data,$sql);

    $info = $result->fetch_assoc();

    if($_POST['update_profile'])
    {
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $query = "UPDATE user SET email='$email',phone='$phone',password='$password' WHERE username='$name'";
        $result2 = mysqli_query($data,$query);

    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<link rel="stylesheet" type="text/css" href="admin.css">

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

	<?php
		include('admin_css.php');
	?>
	
</head>
<body>

	<header class="header">
		
		<a href="">Student Dashboard</a>
		<div class="logout">
			<a href="logout.php" class="btn btn-primary">Logout</a>
		</div>
	</header>

	<?php
		include('student_sidebar.php');
	?>


	<div class="content">

       <center>
                <h1>Student Profile</h1>

                <div class="div_deg">

                <form action="#" method="POST" >

                <div>
                    <label >Email</label>
                    <input type="text" name="email" value="<?php echo "{$info['email']}" ?>">
                </div>

                <div>
                    <label >Phone</label>
                    <input type="text" name="phone" value="<?php echo "{$info['phone']}" ?>">
                </div>
               
                <div>
                    <label >Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}" ?>" >
                </div>

                <div  >
                    <input class="btn btn-primary" id="submit" type="submit" value="Update Profile" name="update_profile">
                </div>

                </form>
                </div>
        </center>

	</div>

</body>
</html>
