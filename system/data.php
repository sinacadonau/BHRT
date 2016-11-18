<?php

	/* Datenbankverbindung herstellen */
function get_db_connection()
{
  $db = mysqli_connect('localhost', '117799_6_1', '@MtuHIaPoF21', '117799_6_1')
    or die('Fehler beim Verbinden mit dem Datenbank-Server.');
    mysqli_query($db, "SET NAMES 'utf8'");
  return $db;
}

function get_result($sql)
	{
		$db = get_db_connection();
    // echo $sql ."<br>";
		$result = mysqli_query($db, $sql);
		mysqli_close($db);
		return $result;
	}


  /* *********************************************************
  	/* Login
  	/* ****************************************************** */

  	function login($email , $password){
  		$sql = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."';";
  		return get_result($sql);
  	}

  	function register($email , $password){
      $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password');";
  		return get_result($sql);
  	}


	?>
