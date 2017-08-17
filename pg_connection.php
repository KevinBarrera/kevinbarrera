<?php 

	$dbopts = pzrse_url(getenv('DATABASE_URL'));

	$host = $dbopts["host"];
	$port = $dbopts["port"];
	$db = ltrim($dbopts["path"],'/');
	$user = $dbopts["user"];
	$pass = $dbopts["pass"];

	$conn = pg_connect("host=".$host" port=".$port" dbname=".$db" user=".$user" password=".$pass) or die("Falló la conexiónm");
 ?>