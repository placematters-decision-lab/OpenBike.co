
 <?php
// Make a MySQL Connection
$con = mysql_connect("localhost","radroute_user","Radroute2012");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("radroute_database", $con);

// Retrieve all the data from the "example" table

$query = "SELECT Avg(Difficulty) As Difficulty,Avg(Safety) As Safety,Avg(Beauty) As Beauty,legID,legName FROM radroute_database.rankings group by legName order by (Difficulty+Safety+Beauty) desc LIMIT 3";

$result = mysql_query($query);
$num=mysql_numrows($result);
$top = array();
$i = 0;
while ($i < $num) {
        $legName = mysql_result($result,$i,"legName");
        $Difficulty = mysql_result($result,$i,"Difficulty");
        $Safety = mysql_result($result,$i,"Safety");
        $Beauty = mysql_result($result,$i,"Beauty");
        $ratingArray = array($legName,($Difficulty + $Safety + $Beauty)/3,$Difficulty,$Safety,$Beauty);
        array_push($top, $ratingArray);
        $i++;
}

$query = "SELECT Avg(Difficulty) As Difficulty,Avg(Safety) As Safety,Avg(Beauty) As Beauty,legID,legName FROM radroute_database.rankings group by legName order by (Difficulty+Safety+Beauty) LIMIT 3";

$result = mysql_query($query);
$num=mysql_numrows($result);
$bottom = array();
$i = 0;
while ($i < $num) {
        $legName = mysql_result($result,$i,"legName");
        $Difficulty = mysql_result($result,$i,"Difficulty");
        $Safety = mysql_result($result,$i,"Safety");
        $Beauty = mysql_result($result,$i,"Beauty");
        $ratingArray = array($legName,($Difficulty + $Safety + $Beauty)/3,$Difficulty,$Safety,$Beauty);
        array_push($bottom, $ratingArray);
        $i++;
}
print_r($top);
print_r($bottom);

mysql_close($con);

?>