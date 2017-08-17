<?php 

	require 'mysql_connection.php';

	$data = json_decode(file_get_contents('php://input'), true);

	$id = $data['id'];

	$sql= "select dinero from consultas where id = $id";//haciendo la consulta a la base de datos

	$result = $conn->query($sql);//almacenando el resultado de la query

	if($result->num_rows > 0 ){//verificando que haya resultado
		$row = $result->fetch_assoc();
		$resultado = array('dinero' => $row['dinero']);
	}

	echo json_encode($resultado);

 ?>