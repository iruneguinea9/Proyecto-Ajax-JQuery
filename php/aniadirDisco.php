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
echo "Received data: ";
var_export($data);
$imagen = $data['imagen'];
$titulo = $data['titulo'];
$autor = $data['autor'];
$descripcion = $data['descripcion'];
$precio = $data['precio'];
$categoria = $data['categoria'];

$sql = "INSERT INTO disco (imagen, titulo, autor, descripcion, precio, categoria,visualizaciones) VALUES ('$imagen', '$titulo', '$autor', '$descripcion', $precio, '$categoria',0)";

if ($conn->query($sql) === TRUE) {
 echo "Nuevo disco añadido";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>
