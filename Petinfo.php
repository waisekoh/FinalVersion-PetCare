<?php
session_start();
include('db.php');
include('header.php');
$current = $_SESSION['id'];
$pid = $_POST['pid_in'];
$query = "SELECT * FROM Pets WHERE pid = $pid";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$pname = $row["pet_name"];
$powner =$row["oid"];
$type =$row["pet_type"];
?>



<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title> Pet Information </title>
        <link rel="stylesheet" type="text/css" href="css/petinfo.css">
    </head>
    
    <body>

<div class="box">
        <header>Pet Information</header>
        
        <div class="container row">
            <h4> Pet ID: <?php echo $pid; ?> </h4>
            <h4> Pet Name:  <?php echo $pname; ?></h4>
            <h4> Breed Type: <?php echo $type; ?></h4>
            <h4> Owner: <form class="owner-form" action="profileothers.php" method ="POST">
                    <button  name="oid_in" Value = <?php echo $powner; ?> style="border: none; background: none;"> <?php 
                    $q= "SELECT display_name FROM Users WHERE UserID = $powner";
                    $sql = mysqli_query($con,$q);
                    echo(mysqli_fetch_assoc($sql)['display_name']); ?> </button></a>
                    </form> </h4>
            
            <?php if($powner == $current) { ?>
            <div class="clearfix">
                <button type="next" class="Editbtn">Edit</button></div> <!-- add js-->
            </div>
            <?php } ?>

        
        <p> </p>
        
        <div class="container row">
			<h3> Reviews: </h3>
			<?php
			$pq = "SELECT review from petreview where pid = $pid";
			$pqcont = mysqli_query($con,$pq);
			while($prow = mysqli_fetch_assoc($pqcont)){ ?>
				<h3> <?php echo($prow['review']) ?></h3>
			<?php } ?>
        </div>
	</div>
        
    </body>
</html>