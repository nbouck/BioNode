<?php

include "config.php";


$servername = "localhost";
$username = "###########";
$password = "###########";
$dbname = "###########";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$tablename = REAL_TIME_SENSOR_TABLE;

$sql = "SELECT * FROM $tablename";



$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $json = json_encode($row);
		echo $json;
    }
} else {
    echo "0 results";
}





$conn->close();
?>