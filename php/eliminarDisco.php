<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendadiscos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'])) {
    $id = $data['id'];
} else {
    die("No ID provided.");
}

$sql="delete from disco where id_disco=$id";

if ($conn->query($sql) === TRUE) {
 echo "Disco eliminado";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
