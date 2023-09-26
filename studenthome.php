<?php

session_start();

    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
        
    }
    elseif($_SESSION['usertype']!="student")
    {
        header("location:login.php");

    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>

	<link rel="stylesheet" type="text/css" href="admin.css">
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

		<H1>Student Dashboard</H1>

	</div>

</body>
</html>
