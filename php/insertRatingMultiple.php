<?php

$debug=FALSE;

// GET parameters
$legids = $_POST['legid']; 
$legNames = $_POST['legname'];
$Safety = $_POST['safety'];
$Ease = $_POST['ease'];
$Beauty = $_POST['beauty'];
$Sum = $Safety + $Beauty + $Ease;

if($debug) {
	$legids = "2,4,6";
	$legNames = "mark,mike,jeremy";
	$Safety = 3;
	$Ease = 1;
	$Beauty = 1;
	$Sum = $Safety + $Beauty + $Ease;
}

$auth = getToken();
$query = "(legID,legName,Safety,Ease,Beauty,TimeStamp,Score)";

$alegids = explode(",", $legids);
$alegnames = explode(",", $legNames);
$size = count($alegids);
$i = 0;
while($i < $size) {
	$legid = $alegids[$i];
	$legName = $alegnames[$i];

	$query2 = "(".$legid.",'".$legName."',".$Safety.",".$Ease.",".$Beauty.",'".date("Y-m-d H:i:s", time())."',$Sum)";
	insertRanking($auth, $query, $query2);
	$i++;
}
//print $query2;
//print $query;

// header("Location: http://50.116.114.160/~radroute");

print "Success!  You rated " . $size . " bike path legs.";

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

function insertRanking($token, $columns, $values) {

	$query="INSERT INTO 1Mdglx_V5GVWMnM1Sk6W_FhE57KGWdym28PeEyxs " . $columns . " VALUES " . $values;

// Name:	rankings
// Numeric ID:	4733553
// Encrypted ID:	1Mdglx_V5GVWMnM1Sk6W_FhE57KGWdym28PeEyxs
// Description:	rad route app

	$body = "sql=" . urlencode($query) . "&key=AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI";

	//print("\n\n" . $body . "\n\n");

	$c = curl_init
	("https://www.googleapis.com/fusiontables/v1/query");
	//curl_setopt($c,CURLOPT_VERBOSE,1);
	curl_setopt($c, CURLOPT_POST, 1);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, array(
			"Content-length: " . strlen($body),
			"Content-type: application/x-www-form-urlencoded",
			"Authorization: GoogleLogin auth=" . $token));
	curl_setopt($c, CURLOPT_POSTFIELDS, $body);

	// Place the lines of the output into an array
	$results = preg_split("/\n/", curl_exec ($c));
	//print_r($results);
}


?>
