<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dudo_wz_cz_backup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$conn->set_charset('utf8');
//var_dump($conn);

$sql = "SELECT id, autor, nadpis, text FROM web_texty";	// texty
//$sql = "SELECT id, autor, nadpis, text FROM web_clanky"; // clanky
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nadpis</th><th>Text</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nadpis"]."</td><td>".$row["text"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>
</body>

</html>