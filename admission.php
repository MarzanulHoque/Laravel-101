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

    // Fetching Data For Displaying

        $host="localhost";

        $user="root";

        $password="";

        $db="school";


        $data=mysqli_connect($host,$user,$password,$db);

        $sql = "SELECT * FROM admission";

        $result = mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission</title>
    <?php
	
	include 'admin_css.php';
	
	?>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    

<?php
	
	include 'admin_sidebar.php';
	
	?>

    <div class="content">
        <center>
		
		<h1>Admission Applications</h1>
        <br>

        </center>
        <center>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     while($info=$result->fetch_assoc()){

                    ?>
                    <tr>
                    <th scope="row"> <?php echo $info['name']; ?> </th>
                    <td><?php echo $info['email']; ?></td>
                    <td><?php echo $info['phone']; ?></td>
                    <td><?php echo $info['message']; ?></td>
                    </tr>
                    <?php
                     }
                     ?>
                </tbody>
            </table>
        
        </center>

		


	</div>

</body>
</html>