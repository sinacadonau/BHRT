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
  	/* Login und Register
  	/* ****************************************************** */

  	function login($email , $password){
  		$sql = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."';";
  		return get_result($sql);
  	}

  	function register($email , $password, $name){
      $sql = "INSERT INTO user (email, password, name) VALUES ('$email', '$password', '$name');";
  		return get_result($sql);
  	}


		/* *********************************************************
			/* Fragebogen
			/* ****************************************************** */

// Fragen aus Datenbank
				function get_question($q_id){
	  		$sql = "SELECT question FROM question WHERE q_id = $q_id";
	  		return get_result($sql);
	  		}

// Antworten aus Datenbank
				function get_answers($q_id){
				$sql = "SELECT * FROM answer WHERE q_id = $q_id;";
				return get_result($sql);
				}

// Typologien mit User abspeichern
				function save_typo($typo , $user_id){
							$sql = "INSERT INTO user_typology (u_id, t_id) VALUES ($user_id, $typo);";

				return get_result($sql);
				}


		/* *********************************************************
			/* Einstellungen
			/* ****************************************************** */

			function get_user($user_id){
			    $sql = "SELECT * FROM user WHERE u_id = $user_id;";
					return get_result($sql);
				}

				function update_user($user_id, $name, $email, $password){
			   	$sql_ok = false;
			   	$sql = "UPDATE user SET ";
					if($name != ""){
						$sql .= "name = '$name', ";
					 $sql_ok = true;
					}
					if($email != ""){
			   		$sql .= "email = '$email', ";
			   		$sql_ok = true;
			     }
			     if($password != "") {
			       $sql .= "password = '$password', ";
			   		$sql_ok = true;
			     }

			     // Das Komma an der vorletzten Position des $sql-Strings durch ein Leerzeichen ersetzen
			     $sql = substr_replace($sql, ' ', -2, 1);

			     // $sql-String vervollständigen
			     $sql .= " WHERE u_id = $user_id ;";

			   	if($sql_ok){
			   	  return get_result($sql);
			   	}else{
			   		return false;
			   	}
			   }

// FUNKTIONIERT NOCH NICHT!!!
				 function delete_user($user_id){
					$sql = "DELETE * FROM user WHERE u_id = $user_id;";
					get_result($sql);

					header("Location:../index.php");
					echo "Dein Benutzerkonto wurde erfolgreich gelöscht!";
				 }


?>
