<?php
  session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:../index.php");
	}else{
  	$user_id = $_SESSION['userid'];
	}

	require_once("../system/data.php");
	require_once("../system/security.php");

// Änderungen filtern und an Funktion update_user weitergeben
  if(isset($_POST['update-submit'])){
     $name = filter_data($_POST['name']);
     $email = filter_data($_POST['email']);
     $password = filter_data($_POST['password']);

     $result = update_user($user_id, $name, $email, $password);
}

// Benutzerkonto löschen FUNKTIONIERT NOCH NICHT!!!
   if(isset($_POST['delete-submit'])){
     $result = delete_user($user_id);
     if($result){
       header("Location:../index.php");
     }
   }

// Abfrage der Userdaten
  $result = get_user($user_id);
  $user = mysqli_fetch_assoc($result);



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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/form-elements.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body class="body-profil">

    <!-- Top content -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand active" href="profil.php"><img style="max-height: 100%" src="../img/BHRT_logo-01.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="fragebogen.php"><i class="fa fa-pencil"></i> Fragebogen</a></li>
                    <li><a href="resultate.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Resultate</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="einstellungen.php"><i class="fa fa-cog" aria-hidden="true"></i> Einstellungen</a></li>
                    <li><a href="../index.php"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a></li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <h1>Einstellungen</h1>

        <!-- Profildaten des Users -->

        <div class="content-box">
            <dl class="dl-horizontal lead">
                <dt>Name</dt>
                <dd><?php echo $user['name'];?></dd>

                <dt>E-Mail</dt>
                <dd><?php echo $user['email'];?></dd>
            </dl>
            <!-- Button für die Einblendung des modalen Fensters zur Userdatenaktualisierung -->
            <div class="edit-button">
                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#bearbeitenModal">bearbeiten</button>
                <!-- /Button Userdatenaktualisierung -->
                <!-- Button für für die Einblendung des modalen Fensters mit Löschhinweis -->
                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#loeschenModal">löschen</button>
                <!-- /Button Löschhinweis -->
            </div>
        </div>


        <!-- / Profildaten des Users -->

        <!-- Modales Fenster zur Userdatenaktualisierung-->
        <div class="modal fade" id="bearbeitenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-popup">
                    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="modal-header">
                            <h1 class="modal-title" id="myModalLabel">Einstellungen</h1>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="sr-only" for="name">Name</label>
                                <input  type="text" class="form-name form-control"
                                        id="form-name" placeholder="Name"
                                        name="name"
                                        value="<?php echo $user['name'];?>">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="email">E-Mail</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" value="<?php echo $user['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Passwort</label>
                                <input type="password" name="password" id="form-password" class="form-control" placeholder="neues Passwort">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm" name="update-submit">speichern</button>
                            <button type="button" class="btn btn-sm" data-dismiss="modal">abbrechen</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- /Modales Fenster zur Userdatenaktualisierung-->

        <!-- Modales Fenster mit Löschhinweis-->
        <div class="modal fade" id="loeschenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-popup">
                <div class="modal-header">
                    <h1 class="modal-title" id="myModalLabel">Willst du dein Profil wirklich löschen?</h1>
                </div>
                <div class="modal-body">
                    <div>
                      <form action="einstellungen.php" method="post" >
                        <button type="submit" class="btn btn-sm" name="delete-submit">löschen</button>
                        <button type="button" class="btn btn-sm" data-dismiss="modal">abbrechen</button>
                      </form>
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
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.backstretch.min.js"></script>
        <script src="../js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="js/placeholder.js"></script>
        <![endif]-->

</body>

</html>
