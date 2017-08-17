<?php 

	require 'mysql_connection.php';

	$data = json_decode(file_get_contents('php://input'), true);

	$id = $data['id'];
	$dinero = $data['dinero'];

	$sql = "update consultas set dinero = $dinero where id = $id"; 
	if ($conn->query($sql) === TRUE) {
		$resultado = array('msg' => 'Actualizado correctamente' );
	} else{
		$resultado = array('msg' => 'Error en la actualización' );
	}

	echo json_encode($resultado);

 ?>