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

$id_disco = $_POST['id_disco'];
$id_user = $_POST['id_user'];

$sql = "SELECT * FROM listafav WHERE id_disco = ? AND id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_disco, $id_user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(array("added" => false));
} else {
    $sql = "INSERT INTO listafav (id_disco, id_user) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_disco, $id_user);
    $stmt->execute();
    echo json_encode(array("added" => true));
}

$conn->close();
?>
