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
$id = $data['id'];
$imagen = $data['imagen'];
$titulo = $data['titulo'];
$autor = $data['autor'];
$descripcion = $data['descripcion'];
$precio = $data['precio'];
$categoria = $data['categoria'];
$sql ="UPDATE disco set imagen='$imagen', titulo='$titulo',autor='$autor',descripcion='$descripcion',precio='$precio',categoria='$categoria',precio='$precio' where id_disco=$id";

if ($conn->query($sql) === TRUE) {
 echo "Disco editado";
} else {
 echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>
