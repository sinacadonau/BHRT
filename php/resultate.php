<?php
  session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:../index.php");
	}else{
  	$user_id = $_SESSION['userid'];
	}

	require_once("../system/data.php");

$result = get_typo($user_id);
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

<body class="body-resultate">

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
        <h1>Resultate</h1>

    <!-- Deine Resultate -->
        <div class="resultate-box">

        <div class="container-fluide">
            <h1>Dein Typologienprofil</h1>

<table class="table">
<?php while ( $user_typology = mysqli_fetch_assoc($result)) { ?>
  <tbody>
    <tr>
      <td> <?php echo $user_typology["typology"];?></td>
      <td> <?php echo $user_typology["sum"]*10; echo "%"?></td>
    </tr>
  </tbody>
      <?php } ?>
</table>



          </div>
            </div>

    <!-- / Deine Resultate -->

    <!-- Typologien-Container Test-Box -->
    <div class="resultate-box">

      <!-- Typologien-Container -->
    <div class="container-fluide">
    <div class="row">
      <div class="col-md-12">
        <h1>Die 4 Typologien</h1>
        <p>Jeder Mensch ist anders.</p>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
          <h3>Der Bastler</h3>
          <p>Bastler lieben es, die Welt mit ihren Händen und mit ihren Augen zu erforschen,
            sie zu fühlen und zu untersuchen mit kühlem Rationalismus und geistreicher Neugier. Bastler gehen von
            einem Projekt zum nächsten, erschaffen das Nützliche nur des Spaßes wegen und lernen gleichzeitig von
            ihrem Umfeld. Oft sind Bastler Mechaniker oder Ingenieure, welche die größte Freunde daran haben, ihre
            Hände dreckig zu machen, um Dinge auseinander zu nehmen und sie wieder zusammen zu setzen, nur ein
            bisschen besser, als sie vorher waren.</p>
        </div>
        <div class="col-md-6">
          <h3>Der Macher</h3>
          <p>Der Macher ist ein selbstbewusster und sehr unabhängiger Mensch.
            Er ist eine ruhige und sachliche Person, sehr rational, ein ausgesprochener Verstandesmensch.
            Seinen Individualismus pflegt er intensiv und er genießt es, seine analytischen Fähigkeiten an neuen Aufgaben
            zu messen. Dabei ist er jedoch ein sehr spontaner und impulsiver Mensch, der gerne seinen plötzlichen
            Eingebungen folgt.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
          <h3>Der Denker</h3>
          <p>Der Denker ist für gewöhnlich sehr selbstsicher und lässt sich von Konflikten und Kritik
            nicht aus der Ruhe bringen. Er besitzt ein ausgeprägtes Bewusstsein für seine eigenen Stärken und zweifelt nicht
            an seinen Fähigkeiten. Häufig sind Menschen dieses Persönlichkeitstypus‘ beruflich sehr erfolgreich, da sie Kompetenz
            und Zielstrebigkeit in sich vereinen.</p>
        </div>
        <div class="col-md-6">
          <h3>Der Organisator</h3>
          <p>Sie sind Repräsentanten der Tradition und Ordnung und wissen ihr Verständnis für das, was richtig
            und falsch ist, einzusetzen. Sie sind gesellschaftlich anerkannt, sodass sie Menschen zusammenführen können. Da sie Werte
            wie Ehrlichkeit, Hingabe und Würde hoch schätzen, sind Organisatoren häufige Ansprechpartner, wenn es um Rat und Anweisung
            geht, und sie schätzen sich glücklich, den Weg aus schwierigen Lagen vorzugeben.</p>
        </div>
    </div>

    </div>
<!-- / Typologien Container -->
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
