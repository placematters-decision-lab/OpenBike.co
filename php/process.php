<?php
// Make a MySQL Connection
$con = mysql_connect("localhost","radroute_user","Radroute2012");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("radroute_database", $con);

// Retrieve all the data from the "example" table
$legId = $_POST['legid']; 
$legName = $_POST['legname'];
$Safety = $_POST['safety'];
$Difficulty = $_POST['difficulty'];
$Beauty = $_POST['beauty'];
$query = "INSERT INTO rankings (legID,legName,Safety,Difficulty,Beauty) VALUES (".$legId.',"'.$legName.'",'.$Safety.",".$Difficulty.",".$Beauty.")";

mysql_query($query) or die(mysql_error());

mysql_close($con);

header("Location: http://50.116.114.160/~radroute");
?>