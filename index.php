<?php
  session_start();
	if(isset($_SESSION['id'])) unset($_SESSION['id']);
	session_destroy();

// externe Dateien laden
  require_once("system/data.php");
	require_once("system/security.php");

  $error = false;
  $error_msg = "";
  $success = false;
  $success_msg = "";

// Kontrolle, ob die Seite direkt aufgerufen wurde oder vom Login-Formular
  if(isset($_POST['login-submit'])){
// Kontrolle mit isset, ob email und password ausgefüllt wurde
  if(!empty($_POST['email']) && !empty($_POST['password'])){

    // Werte aus POST-Array auf SQL-Injections prüfen und in Variablen schreiben
         $email = filter_data($_POST['email']);
         $password = filter_data($_POST['password']);

         // Liefert alle Infos zu User mit diesen Logindaten
         $result = login($email,$password);

         // Anzahl der gefundenen Ergebnisse in $row_count
     		$row_count = mysqli_num_rows($result);
         if( $row_count == 1){
           session_start();
           $user = mysqli_fetch_assoc($result);
           $_SESSION['userid'] = $user['u_id'];
           header("Location:html/profil.php");
         }else{
           // Fehlermeldungen werden erst später angezeigt
           $error = true;
           $error_msg .= "Leider konnte wir Ihre E-Mailadresse oder Ihr Passwort nicht finden.</br>";
         }
       }else{
         $error = true;
         $error_msg .= "Bitte füllen Sie beide Felder aus.</br>";
       }
     }


     if(isset($_POST['register-submit'])){
       // Kontrolle mit isset, ob email und password ausgefüllt wurde
       if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])){

         // Werte aus POST-Array auf SQL-Injections prüfen und in Variablen schreiben
         $email = filter_data($_POST['email']);
         $password = filter_data($_POST['password']);
         $confirm_password = filter_data($_POST['confirm-password']);
         if($password == $confirm_password){
           // register liefert bei erfolgreichem Eintrag in die DB den Wert TRUE zurück, andernfalls FALSE
           $result = register($email, $password);
           if($result){
             $success = true;
             $success_msg = "Sie haben erfolgreich registriert.</br>
             Bitte loggen Sie sich jetzt ein.</br>";
           }else{
             $error = true;
             $error_msg .= "Es gibt ein Problem mit der Datenbankverbindung.</br>";
           }
         }else{
           $error = true;
           $error_msg .= "Die Passwörter stimmen nicht überein.</br>";
         }
       }else{
         $error = true;
         $error_msg .= "Bitte füllen Sie alle Felder aus.</br>";
       }
     }
   ?>





<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BHRT">
    <meta name="author" content="Monica, Sina, Simone">

    <title>BHRT</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/form-elements.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>

<body class="body-index">

    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>Business Human Resources Typologies</strong> (BHRT)</h1>
                        <div class="description">
                            <p>
                                Du bist unzufrieden mit deinem Job? Suchst berufliche Veränderung?
                                <br>Dann melde dich jetzt an und fülle unseren Typologientest aus!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5">
                        <!-- Login-Formular-->
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login</h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="index.php" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="email">E-Mail</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" id="form-password" class="form-control" placeholder="Passwort">
                                    </div>
                                    <button type="submit" name="login-submit" id="login-submit" class="btn" value="einloggen">einloggen</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login-Formular-->
                    </div>

                    <div class="col-sm-1 middle-border"></div>
                    <div class="col-sm-1"></div>

                    <div class="col-sm-5">
                        <!-- Registrier-Formular-->
                        <div class="form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Registrieren</h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="index.php" method="post" class="registration-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-first-name">Name</label>
                                        <input type="text" name="form-first-name" placeholder="Name" class="form-first-name form-control" id="form-first-name">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="email">E-Mail</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="password">Password</label>
                                        <input type="password" name="password" id="form-password" class="form-control" placeholder="Passwort">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="confirm-password">Passwort bestätigen</label>
                                        <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Passwort bestätigen">
                                    </div>

                                    <button type="submit" name="register-submit" id="register-submit" class="btn" value="jetzt registrieren">jetzt registrieren</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Registrier-Formular-->
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">

                <div class="col-sm-8 col-sm-offset-2">
                    <div class="footer-border"></div>
                    <p>HTW Chur | info@bhrt.ch | 081 286 24 24 </p>
                </div>

            </div>
        </div>
    </footer>

    <!-- Javascript -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/scripts.js"></script>

    <!--[if lt IE 10]>
            <script src="js/placeholder.js"></script>
        <![endif]-->

</body>

</html>
