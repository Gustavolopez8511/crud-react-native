<?php
include 'DBConfig.php';
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
 die("Conexión fallida: " . $conn->connect_error);
} 
$json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 // Populate Student ID from JSON $obj array and store into $S_ID.
 $S_ID = $obj['student_id'];
// Creating SQL command to fetch all records from Table.
$sql = "SELECT * FROM StudentDetailsTable Where student_id = $S_ID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row[] = $result->fetch_assoc()) {
        $item = $row;
        $json = json_encode($item);
    }
}
else
{
 $json= "Id de Estudiante no existe...";
}
echo $json;
$conn->close();
?>