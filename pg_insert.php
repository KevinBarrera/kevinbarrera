<?php 

	require 'pg_connection.php';

	$data = json_decode(file_get_contents('php://input'), true);

	$nombre = $data[0]['value'];
	$dinero = $data[1]['value'];

	error_reporting(E_ALL & ~E_WARNING);

	$sql = "insert into consultas(nombre,dinero) values ('$nombre', $dinero) returning id";

	$result = pg_query($conn, $sql);

  	if ($result) {
  		$row = pg_fetch_row($result);
  		$resultado = array('msg' => "Insertado correctamente con id ". $row[0]);
  	} else {
  		$error = pg_last_error($conn);
  		if (preg_match("/duplicada/i", $error)) {
  			$resultado = array('msg' => "Llave duplicada");
  		}
  		else {
  			$resultado = array('msg' => $error);
  		}
  		
  	};

	echo json_encode($resultado);

 ?>