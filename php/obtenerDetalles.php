<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');   
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   header("Access-Control-Allow-Headers: *");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendadiscos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
   $discId = $_GET['id'];
   $sql = "SELECT * FROM disco WHERE id_disco = ?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("i", $discId);
   $stmt->execute();
   $result = $stmt->get_result();

   // Incrementar visualizaciones
   $sqlUpdate = "UPDATE disco SET visualizaciones = visualizaciones + 1 WHERE id_disco = ?";
   $stmtUpdate = $conn->prepare($sqlUpdate);
   $stmtUpdate->bind_param("i", $discId);
   $stmtUpdate->execute();
} else {
   $sql = "SELECT * FROM disco";
   $result = $conn->query($sql);
}

$discos = array();

if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
       $discos[] = $row;
   }
} else {
   echo "0 results";
}

echo json_encode($discos);

$conn->close();
?>
