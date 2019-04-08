<?php
session_start();
include('db.php');
include('header.php');
$cid = $_SESSION['id'];
$query = "SELECT * FROM Users WHERE UserID = $cid";
$result = mysqli_query($con, $query);
$rows = mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title> Profile </title>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
    </head>
    
    <body>
        <center>
            <header><?php echo $rows['display_name']; ?>'s Profile</header>
        
		     
        
			<h2> First name: <?php echo $rows['first_name'];  ?> </h2>
			<h2> Last Name: <?php echo $rows['last_name'];  ?>  </h2>
            <h2> Gender: <?php echo $rows['gENDer']; ?> </h2>
			<h2> Phone Number: <?php echo $rows['phone_number'];  ?> </h2>
            <h2> Email: <?php echo $rows['email']; ?> </h2>
            <h2> Country: <?php echo $rows['country']; ?></h2>
			<h2> Address: <?php echo $rows['address'];  ?> </h2>
            <h2> Age: <?php echo $rows['age']; ?> </h2>
        
            <div class="clearfix">
				<a href=Updateprofile.php><button type="next" class="Addpetbtn">Update Profile</button></a>
				<a href=Updatepassword.php><button type="next" class="Addpetbtn">Change Password</button></a>
            </div>
        </center>
    </body>
</html>    