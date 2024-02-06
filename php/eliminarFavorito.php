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

$sql = "delete from listafav where id_disco=$id_disco and id_user=$id_user";

if ($conn->query($sql) === TRUE) {
    echo "Eliminado de favorito";
   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   }


$conn->close();
?>
