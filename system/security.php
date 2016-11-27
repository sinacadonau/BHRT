<?php
  require_once("data.php");

	function filter_data($input){
		$db = get_db_connection();

		// HTML- und PHP-Codes wegfiltern: strip_tags(variable)
		$input = strip_tags($input);
		// Leerzeichen am Anfang und Ende der Zeichenkette entfernen
		$input = trim($input);
		// SQL-Injection (einschmggeln von SQL-Befehlen) verhindern
		$input = mysqli_real_escape_string($db, $input);
		mysqli_close($db);
		return $input;
	}
	?>
