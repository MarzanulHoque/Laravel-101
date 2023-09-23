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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    
<header class="header">
    <a href="">Admin Dashboard</a>
    <div class="logout">
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</header>

<aside>
		
		<ul>
			
			<li>
				<a href="">Admission</a>
			</li>

			<li>
				<a href="">Add Student</a>
			</li>

			<li>
				<a href="">View Student</a>
			</li>

			<li>
				<a href="">Add Teacher</a>
			</li>

			<li>
				<a href="">View Teacher</a>
			</li>
			<li>
				<a href="">Add Courses</a>
			</li>
			<li>
				<a href="">View Courses</a>
			</li>


		</ul>


	</aside>

    <div class="content">
		
		<h1>Sidebar Accordion</h1>

		<p>In this example, we have added an accordion and a dropdown menu inside the side navigation.

		Click on both to understand how they differ from each other. The accordion will push down the content, while the dropdown lays over the content.</p>

		<input type="text" name="">


	</div>

</body>
</html>