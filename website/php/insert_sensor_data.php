<?php

include "config.php";

$servername = "localhost";
$username = "############"; // Redacted
$password = "############";
$dbname = "##########";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$timestamp = time();

//$table_id = date("Y_m_d");
$table_id = date("Y");


$date_ymd = date("Y_m_d");

$tablename = $table_id."_".$device_id;


$tablename = SENSOR_TABLE;

/*$create_table_sql = "CREATE TABLE IF NOT EXISTS ". $tablename;
$create_table_sql .= " ( external_hum FLOAT, breed_hum FLOAT, breed_temp FLOAT, ".
						"larva_temp1 FLOAT, larva_temp2 FLOAT, external_temp FLOAT, light INT, ".
						"timestamp BIGINT, date CHAR(12))";
						
echo $create_table_sql;

if ($conn->query($create_table_sql) === TRUE) {
    echo "New table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/


$device_id = $_POST['device_id'];
$external_hum = $_POST['external_hum'];
$breed_hum = $_POST['breed_hum'];
$breed_temp = $_POST['breed_temp'];
$larva_temp1  = $_POST['larva_temp1'];
$larva_temp2 = $_POST['larva_temp2'];
$external_temp = $_POST['external_temp'];
$light = $_POST['light'];


/*$external_hum = 0;
$breed_hum = 0.1;
$breed_temp = 0.2;
$larva_temp1  = 0.3;
$larva_temp2 = 0;
$external_temp = 20;
$light = 0;
*/


$sql = "INSERT INTO $tablename( external_hum, breed_hum, breed_temp, ".
						"larva_temp1, larva_temp2, external_temp, light, timestamp, date ) ".
						"VALUES ( $external_hum , $breed_hum , $breed_temp , $larva_temp1 , $larva_temp2 , $external_temp, $light , $timestamp, '$date_ymd' )";

echo "</br>".$sql;

if ($conn->query($sql) === TRUE) {
    echo "</br>New record created successfully";
} else {
    echo "</br> Error: " . $sql . "<br>" . $conn->error;
}



$tablename = REAL_TIME_SENSOR_TABLE;



/*$create_table_sql = "CREATE TABLE IF NOT EXISTS ". $tablename;
$create_table_sql .= " ( external_hum FLOAT, breed_hum FLOAT, breed_temp FLOAT, ".
						"larva_temp1 FLOAT, larva_temp2 FLOAT, external_temp FLOAT, light INT, ".
						"timestamp BIGINT, date CHAR(12), ID INT, PRIMARY KEY(ID) )";
						
echo "</br>".$create_table_sql;

if ($conn->query($create_table_sql) === TRUE) {
    echo "New table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$sql = "INSERT INTO $tablename( external_hum, breed_hum, breed_temp, ".
						"larva_temp1, larva_temp2, external_temp, light, timestamp, date, ID ) ".
						"VALUES ( ".$external_hum." , ".$breed_hum." , ".$breed_temp." , ".$larva_temp1." , ".$larva_temp2." , ".$external_temp.", ".$light." , ".$timestamp.", '".$date_ymd."', 1 )";


echo "</br>".$sql;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

$sql = "UPDATE $tablename  SET external_hum = ".$external_hum.", breed_hum = ".$breed_hum.", ".
							"breed_temp = ".$breed_temp.", larva_temp1 = ".$larva_temp1.", ".
							"larva_temp2 = ".$larva_temp2.", external_temp = ".$external_temp.", ".
							"light = ".$light.", timestamp = ".$timestamp.", date = '".$date_ymd."' ".
							" WHERE ID = 1";

echo "</br>".$sql;

if ($conn->query($sql) === TRUE) {
    echo "</br>Record Updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();


?>