<?php

$auth = getToken();

#TOP

$query = "SELECT AVERAGE(Safety) AS AvgSafety,
AVERAGE(Ease) AS AvgEase, AVERAGE(Beauty) AS AvgBeauty,
legID, legName, Score
FROM 1Mdglx_V5GVWMnM1Sk6W_FhE57KGWdym28PeEyxs
GROUP BY legName, legID
ORDER BY Score DESC
";

$rankings = selectRanking($auth,$query);

$json_output = json_decode($rankings);

print_r($json_output);

$top = array();
$i = 0;
while ($i < 3) {
	$legName = $json_output->rows[$i][4];
	$Ease = $json_output->rows[$i][1];
	$Safety = $json_output->rows[$i][0];
	$json_output->rows[$i][2];
	$ratingArray = array($legName,($Difficulty + $Safety + $Beauty)/3,$Difficulty,$Safety,$Beauty);
	array_push($top, $ratingArray);
	$i++;
}

#BOTTOM

$query = "SELECT AVERAGE(Safety) AS AvgSafety,
AVERAGE(Ease) AS AvgEase, AVERAGE(Beauty) AS AvgBeauty,
legID, legName, Score
FROM 1Mdglx_V5GVWMnM1Sk6W_FhE57KGWdym28PeEyxs
GROUP BY legName, legID
ORDER BY Score";

$rankings = selectRanking($auth,$query);

$json_output = json_decode($rankings);

print_r($json_output);

$bottom = array();
$i = 0;
while ($i < 3) {
	$legName = $json_output->rows[$i][4];
	$Ease = $json_output->rows[$i][1];
	$Safety = $json_output->rows[$i][0];
	$json_output->rows[$i][2];
	$ratingArray = array($legName,($Difficulty + $Safety + $Beauty)/3,$Difficulty,$Safety,$Beauty);
	array_push($bottom, $ratingArray);
	$i++;
}



print_r($bottom);

function getToken() {

	$body = "accountType=GOOGLE&Email=radroute@gmail.com&Passwd=Radroute2012&service=fusiontables";

	// Set up the cURL call to get auth token, a post with no custom header
	$c = curl_init ("https://www.google.com/accounts/ClientLogin");
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_POSTFIELDS, $body);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($c);

	// Parse the response to obtain just the Auth token
	// Basically, we remove everything before the "Auth="
	$auth =  preg_replace("/[\s\S]*Auth=/", "", $response);
	//remove trailing newline!
	$auth = trim($auth);

	return $auth;
}

function selectRanking($token, $query) {

	// Name:	rankings
	// Numeric ID:	4733553
	// Encrypted ID:	1Mdglx_V5GVWMnM1Sk6W_FhE57KGWdym28PeEyxs
	// Description:	rad route app

	$body = "sql=" . urlencode($query) . "&key=AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI";

	print("\n\n" . $body . "\n\n");

	$c = curl_init
	("https://www.googleapis.com/fusiontables/v1/query");
	curl_setopt($c,CURLOPT_VERBOSE,1);
	curl_setopt($c, CURLOPT_POST, 1);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, array(
			"Content-length: " . strlen($body),
			"Content-type: application/x-www-form-urlencoded",
			"Authorization: GoogleLogin auth=" . $token));
	curl_setopt($c, CURLOPT_POSTFIELDS, $body);

	// Place the lines of the output into an array
	//$results = preg_split("/\n/", curl_exec ($c));
	return curl_exec($c);
}


// Retrieve all the data from the "example" table

// $query = "SELECT Avg(Difficulty) As Difficulty,Avg(Safety) As Safety,Avg(Beauty) As Beauty,legID,legName FROM radroute_database.rankings group by legName order by (Difficulty+Safety+Beauty) desc LIMIT 3";

// $result = mysql_query($query);
// $num=mysql_numrows($result);
// $top = array();
// $i = 0;
// while ($i < $num) {
//         $legName = mysql_result($result,$i,"legName");
//         $Difficulty = mysql_result($result,$i,"Difficulty");
//         $Safety = mysql_result($result,$i,"Safety");
//         $Beauty = mysql_result($result,$i,"Beauty");
//         $ratingArray = array($legName,($Difficulty + $Safety + $Beauty)/3,$Difficulty,$Safety,$Beauty);
//         array_push($top, $ratingArray);
//         $i++;
// }

// $query = "SELECT Avg(Difficulty) As Difficulty,Avg(Safety) As Safety,Avg(Beauty) As Beauty,legID,legName FROM radroute_database.rankings group by legName order by (Difficulty+Safety+Beauty) LIMIT 3";

// $result = mysql_query($query);
// $num=mysql_numrows($result);
// $bottom = array();
// $i = 0;
// while ($i < $num) {
//         $legName = mysql_result($result,$i,"legName");
//         $Difficulty = mysql_result($result,$i,"Difficulty");
//         $Safety = mysql_result($result,$i,"Safety");
//         $Beauty = mysql_result($result,$i,"Beauty");
//         $ratingArray = array($legName,($Difficulty + $Safety + $Beauty)/3,$Difficulty,$Safety,$Beauty);
//         array_push($bottom, $ratingArray);
//         $i++;
// }
// mysql_close($con);

?>