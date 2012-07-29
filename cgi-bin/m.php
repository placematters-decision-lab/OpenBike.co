<?

$body = "accountType=GOOGLE&Email=mark.scheel@email.ucdenver.edu&Passwd=mark1234&service=fusiontables"; 

        // Set up the cURL 
        $c = curl_init ("https://www.google.com/accounts/ClientLogin"); 
        curl_setopt($c, CURLOPT_POST, true); 
        curl_setopt($c, CURLOPT_POSTFIELDS, $body); 
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true); 
        $response = curl_exec($c); 

print($response);

print("\n\n");

        // Parse the response to obtain just the Auth token 
        // Basically, we remove everything before the "Auth=" 
        $auth =  preg_replace("/[\s\S]*Auth=/", "", $response); 
	$auth = trim($auth);
print($auth);
print("next");
############
$query="INSERT INTO 18dujim1_jH7n4mM6XEP9Pj5ks_zwhTgiuOd7me0 (Safety) VALUES (1)";

$body = "sql=" . urlencode($query) . "&key=AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI"; 

print("\n" . $body . "\n" . strlen($body) . "\n");
                        $c = curl_init 
("https://www.googleapis.com/fusiontables/v1/query"); 
curl_setopt($c,CURLOPT_VERBOSE,1);
                        curl_setopt($c, CURLOPT_POST, 1); 
                        curl_setopt($c, CURLOPT_RETURNTRANSFER, true); 
                        curl_setopt($c, CURLOPT_HTTPHEADER, array( 
                                "Content-length: " . strlen($body), 
				"Content-type: application/x-www-form-urlencoded", 
                                "Authorization: GoogleLogin auth=" . $auth)); 
                        curl_setopt($c, CURLOPT_POSTFIELDS, $body); 

                        // Place the lines of the output into an array 
                        $results = preg_split("/\n/", curl_exec ($c)); 
print("\n\n");
print_r($results);
?>
