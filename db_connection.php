$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "ElderlyHome";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
