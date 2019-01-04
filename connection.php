<?php

	function ConnectToDatabase()
	{

		$connectionString = 'odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=E:\\xampp\\htdocs\\assignment5.mdb';

		$connection = new PDO($connectionString);
		$connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $connection;

	}

?>



