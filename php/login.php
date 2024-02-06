<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendadiscos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$usuario = $_POST['username'];
$contra = $_POST['password'];


$sql = "SELECT * FROM usuario WHERE username = ? AND contra = ? LIMIT 1";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param('ss', $usuario, $contra);

if ($stmt->execute()) {
 $result = $stmt->get_result();
 $user = $result->fetch_assoc();

 if ($user) {
      echo json_encode(["success"=>true,"id_user"=>$user["id_user"]]);
 } else {
      echo json_encode(["success"=>false]);
 }
} else {
 echo json_encode(["success"=>false]);
}

$conn->close();
?>
