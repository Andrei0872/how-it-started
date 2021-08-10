<?php
$servername = "localhost";
$username = "linndows_user";
$password = "???";
$dbname = "linndows_learn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

$sql = "SHOW TABLES FROM $dbname";
$result = $conn->query($sql);

  
while ($row = mysqli_fetch_row($result)) {
   echo "Table: {$row[0]}<br/>";
}
echo"<br><br><hr/><br>";
$query = "SELECT * FROM note WHERE elev=29";
$result = $conn->query($query);

   while ($row = mysqli_fetch_row($result)) {
       printf ("%s.| %s | %s | %s | %s | %s |<br>", $row[0], $row[1],$row[2], $row[3], $row[4], $row[5]);
   }
$conn->close();
?>