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
mysql_close($con);

?>

	<div id="rankings">
			<table id="top_rank">
				<th>Top Ranked Routes</th>
				<tr>
					<td>Route Name</td>
					<td>Route Rating</td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[0][0]; ?></td>
					<td class="route_score"><?php echo substr($top[0][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[1][0]; ?></td>
					<td class="route_score"><?php echo substr($top[1][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[2][0]; ?></td>
					<td class="route_score"><?php echo substr($top[2][1],0,3); ?></td>
				</tr>
			</table>
			<table id="bottom_rank">
				<th>Bottom Ranked Routes</th>
				<tr>
					<td>Route Name</td>
					<td>Route Rating</td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[0][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[0][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[1][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[1][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[2][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[2][1],0,3); ?></td>
				</tr>
			</table>
	</div><!-- #rankings -->