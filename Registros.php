<?php

// Incluir el fichero para realizar la conexion
include('BDconect.php');
// La consulta SQL que nos mostrara los registros en la tabla
$query = "SELECT * FROM datos ORDER BY id DESC";

$statement = $connect->prepare($query);

if($statement->execute())
{
// Ciclo PDO que sera en encargado de mostrar los registros de la BD
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }

 echo json_encode($data);
}

?>
