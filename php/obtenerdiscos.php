<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "tiendadiscos";
   session_start();
   // Crear conexión
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Verificar conexión
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   // Consulta SQL para obtener todos los registros
   $sql = "SELECT * FROM disco";
   $result = $conn->query($sql);

   // Array para almacenar los resultados
   $discos = array();

   if ($result->num_rows > 0) {
       // Recorrer los resultados y añadirlos al array
       while($row = $result->fetch_assoc()) {
           $discos[] = $row;
       }
   } else {
     echo json_encode(array());
   }

   // Devolver los resultados como JSON
   echo json_encode($discos);

   $conn->close();
?>
