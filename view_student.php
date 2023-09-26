<?php

    error_reporting(0);
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

        $sql = "SELECT * FROM user where usertype='student'";

        $result = mysqli_query($data,$sql);

        if($_SESSION['message'])
        {
            echo "<script>alert('Data Updated Successfully')</script>";
            unset($_SESSION['message']);
        }       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
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
            <h1>All Students</h1>
            <?php
                if($_SESSION["message"])
                {
                    echo   $_SESSION["message"];
                }
                unset($_SESSION["message"]);
            ?>
            <br>
            <div class="container">

                <table class="table table-bordered ">
                    <thead>
                        <tr>
                        <th >Name</th>
                        <th >Email</th>
                        <th >Phone</th>
                        <th >Password</th>
                        <th >Delete</th>
                        <th >Update</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($info=$result->fetch_assoc()){

                        ?>
                        <tr>
                        <th > <?php echo $info['username']; ?> </th>
                        <td><?php echo $info['email']; ?></td>
                        <td><?php echo $info['phone']; ?></td>
                        <td><?php echo $info['password']; ?></td>
                        <td >
                            <?php echo " <a class='btn btn-danger' onClick=\" javascript:return confirm('Are You Sure Wanna Delete This ?') \" 
                                        href='delete.php?student_id={$info['id']}'>Delete</a>"; ?>
                        </td>
                        <td >
                            <?php echo " <a class='btn btn-primary' 
                                        href='update.php?student_id={$info['id']}'>Update</a>"; ?>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </center>
	</div>

</body>
</html>