<?

$token = 
'DQAAAMsAAADrixBYD8UqkY2jxZoRSWbva-mJGODS-w4UfmYAw0zMBCXIsAwr-JhhVuc9ydSidX2kPbe3mbkI9eBJh_l2_qbxfVAnNFI6opIG1IaMAwXAz4oqy1Bg4g96RPCSC2vFrkg4XHjiIjRqbtUrTmu9lj1qrB0dPC7uujkMni8Duz5Bx08PpzrC38OrmPS9VsML2Dw28vznWuUCothkjhpBsQ_0fx-CplOC77UZ4c6yIF3_XNQPCeaVfdOpfPYnUk5yETy0LpnARSdlARnB2CL6PKbn';

$postdata2 = http_build_query(
    array(
	'sql' => 
urlencode('INSERT INTO 
18dujim1_jH7n4mM6XEP9Pj5ks_zwhTgiuOd7me0%20(Safety) VALUES (1)'),
        'key' => 'AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI'
    )
);

print($postdata2);

print("\n\n");

$opts2 = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata2
    )
);

#$opts2['http']['header'] = ("Authorization: GoogleLogin auth=" . $token);

print_r($opts2);

$context2  = stream_context_create($opts2);

$result2 =
file_get_contents('https://www.googleapis.com/fusiontables/v1/query', 
false, $context2);

print($result2);


?>
