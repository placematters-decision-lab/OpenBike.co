<?

$postdata = http_build_query(
    array(
	'accountType' => 'GOOGLE',
	'Email' => 'mark.scheel@email.ucdenver.edu',
	'Passwd' => 'mark1234',
	'service' => 'fusiontables',
	'Source' => 'radroute'
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = 
file_get_contents('https://www.google.com/accounts/ClientLogin', false, 
$context);

print $result;

print("\n\n");

list($junk,$auth) = explode('Auth=',$result,2);

print $auth;

print "\n\n";

############
#STEP TWO
############

$postdata2 = http_build_query(
    array(
        'key' => 'AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI',
	'sql' => 
'INSERT%20INTO%2018dujim1_jH7n4mM6XEP9Pj5ks_zwhTgiuOd7me0%20(Safet
y)%20VALUES%20(1)'
    )
);

print_r($postdata2);

print("\n\n");

$opts2 = array('http' =>
    array(
        'method'  => 'POST',
        'content' => $postdata2,
	'header' => 'Authorization: GoogleLogin auth=' . $auth
    )
);

print_r($opts2);

$context2  = stream_context_create($opts2);

$result2 =
file_get_contents('https://www.www.googleapis.com/fusiontables/v1/query', 
false,
$context2);

print($result2);


?>
