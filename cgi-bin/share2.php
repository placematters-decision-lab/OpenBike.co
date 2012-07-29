<?


print("You entered email: " . $_GET["email"]);

print("<br><br>");

print("Do you want to share with this person?");

print("<form><input type = \"submit\" value = \"Yes\"></form>");

# the @ sign suppresses warning output
$file = 
@file_get_contents("https://api.fullcontact.com/v2/person.html?email=" . 
$_GET["email"] . "&apiKey=ff83777bc7a1bac0");

list($version,$status_code,$msg) = explode(' ',$http_response_header[0], 
3);

// Check the HTTP Status code
if($status_code==200) {

print($file);

} else {

print("No additional information available about this user");

}

?>
