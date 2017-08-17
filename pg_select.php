<?php
	require 'pg_connection.php';

	$sql= "select id, nombre from consultas";//haciendo la consulta a la base de datos

	$result = pg_query($conn, $sql);
	$grandote = array();

	while ($row = pg_fetch_row($result)) {
			$chiquitos = array('id' => $row[0], 'nombre'=>$row[1]);
			array_push($grandote, $chiquitos);
	}

	echo json_encode($grandote);
?>