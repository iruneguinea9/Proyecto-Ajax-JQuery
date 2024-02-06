<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendadiscos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Preparar la consulta SQL
$stmt = $conn->prepare("SELECT disco.*, IF(listafav.id_disco IS NULL, false, true) AS liked FROM disco LEFT JOIN listafav ON disco.id_disco = listafav.id_disco WHERE listafav.id_user = ?");
$stmt->bind_param("i", $_POST['id_user']);

// Ejecutar la consulta
$stmt->execute();

// Almacenar los resultados
$result = $stmt->get_result();
$discos = $result->fetch_all(MYSQLI_ASSOC);

// Devolver los resultados como JSON
echo json_encode($discos);

$conn->close();
?>
