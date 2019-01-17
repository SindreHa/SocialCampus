<?php 
	define(dbserver, 'localhost');
	define(dbbrukernavn, 'admin');
	define(dbpassord, 'UrqooQQh1D8Hr0ro');
	define(dbnavn, 'applikasjon');

	// Tilkobler mySQL databaseb
	$link = mysqli_connect(dbserver, dbbrukernavn, dbpassord, dbnavn);

	
?>