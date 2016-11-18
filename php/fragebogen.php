<?php
  session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:../index.php");
	}else{
  	$user_id = $_SESSION['userid'];
	}

	require_once("../system/data.php");

  if(isset($_GET['q_id'])){
    $q_id = $_GET['q_id'];
  } else {
    $q_id =
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/form-elements.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <!-- Timeline -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/timeline.css">
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
        <h1>Fragebogen</h1>

        <!-- Horizontale Timeline -->
        <div class="question-box">
            <div class="question-top">
                <div class="form-top-left">
                <!-- new new Bootstrap Timeline -->
                		<div class="timeline">
                    	    <span class="period period-active">1</span>
                            <span class="period">2</span>
                            <span class="period">3</span>
                            <span class="period">4</span>
                            <span class="period">5</span>
                            <span class="period">6</span>
                            <span class="period">7</span>
                            <span class="period">8</span>
                            <span class="period">9</span>
                            <span class="period">10</span>
                </div>
                <!-- new new Bootstrap Timeline -->
                </div>
                <div class="form-top-right">
                    <i class="fa fa-compass"></i>
                </div>
            </div>
        </div>
        <!-- / Horizontale Timeline -->

        <!-- Fragen und Antworten -->
        <div class="question-box">
            <div class="question-top">
                <h3 class="question">Frage 1</h3>
            </div>

            <div class="question-bottom">
                <div class="radio">
                    <label>
                        <input type="radio" name="optradio" class="radio">Option 1</label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optradio" class="radio">Option 2</label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optradio" class="radio">Option 3</label>
                </div>
                <div class="radio">
                      <label>
                          <input type="radio" name="optradio" class="radio">Option 4</label>
  </div>
                <div class="question-button">
                  <button type="submit" name="submit" id="back-submit" class="btn" value="zurück">zurück</button>


<!-- PHP noch ergänzen!!! -->



                <a href="fragebogen.php?q_id=<?php echo  ?>">







                  <button type="submit" name="submit" id="answer-submit" class="btn" value="weiter">weiter</button>
                </a>
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
    <script src="../js/timeline.js"></script>

    <!--[if lt IE 10]>
            <script src="js/placeholder.js"></script>
        <![endif]-->

</body>

</html>
