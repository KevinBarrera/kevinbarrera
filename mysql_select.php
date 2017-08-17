<?php
	require 'mysql_connection.php';

	$sql= "select id, nombre from consultas";//haciendo la consulta a la base de datos
	$result = $conn->query($sql);//almacenando el resultado de la query

	$grandote = array();

	if($result->num_rows > 0 ){//verificando que haya resultado
		while ($row = $result->fetch_assoc()) {//asignando cada resultado a la row
			$chiquitos = array('id' => $row['id'], 'nombre'=>$row['nombre']);
			array_push($grandote, $chiquitos);
		}
	}

	echo json_encode($grandote);
?>