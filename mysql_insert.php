<?php 

	require 'mysql_connection.php';

	$data = json_decode(file_get_contents('php://input'), true);

	$nombre = $data[0]['value'];
	$dinero = $data[1]['value'];

	$sql = "insert into consultas(nombre, dinero) values('$nombre', $dinero)";

	if($conn->query($sql)== TRUE){
		$id = $conn->insert_id;
		$resultado = array('msg' => "Insertado correctamente con id ".$id);
	} else if ($conn->errno == 1062) {
		$resultado = array('msg' => "Entrada duplicada ");
	}
	else{
		$resultado = array('msg' => $conn->error);
	}

	echo json_encode($resultado);

 ?>