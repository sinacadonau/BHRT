<?php
  session_start();
	if(!isset($_SESSION['userid'])){
		header("Location:../index.php");
	}else{
  	$user_id = $_SESSION['userid'];
	}

	require_once("../system/data.php");



if (isset($_GET["q_id"])){
  $q_id = $_GET["q_id"];
} else {
  $q_id = 1;
}

if(isset($_POST['typo'])){
  echo $_POST['typo']. " ". $user_id;
}


$result = get_question($q_id);
$question = mysqli_fetch_assoc($result);

$answers = get_answers($q_id);


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
                    	      <a class="period period-active" href="fragebogen.php?q_id=1"><p>1</p></a>
                            <a class="period" href="fragebogen.php?q_id=2"><p>2</p></a>
                            <a class="period" href="fragebogen.php?q_id=3"><p>3</p></a>
                            <a class="period" href="fragebogen.php?q_id=4"><p>4</p></a>
                            <a class="period" href="fragebogen.php?q_id=5"><p>5</p></a>
                            <a class="period" href="fragebogen.php?q_id=6"><p>6</p></a>
                            <a class="period" href="fragebogen.php?q_id=7"><p>7</p></a>
                            <a class="period" href="fragebogen.php?q_id=8"><p>8</p></a>
                            <a class="period" href="fragebogen.php?q_id=9"><p>9</p></a>
                            <a class="period" href="fragebogen.php?q_id=10"><p>10</p></a>
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
                <h3 class="question"><?php echo $question ["question"]; ?></h3>
            </div>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?q_id=<?php echo $q_id+1 ?>" method="post">
            <div class="question-bottom">
      <?php while($answer = mysqli_fetch_assoc($answers)){  ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="typo" class="radio" value="<?php echo $answer["t_id"];?>"><?php echo $answer["answer"];?></label>
                </div>
      <?php } ?>
                <div class="question-button">
                  <a href="fragebogen.php?q_id=<?php echo $q_id-1 ?>">
                  <button type="submit" name="submit" id="back-submit" class="btn" value="zurück">zurück</button>
                  </a>

<!-- PHP noch ergänzen!!! -->

  <!--              <a href="fragebogen.php?q_id=<"> -->

                  <button type="submit" name="submit" id="answer-submit" class="btn" value="weiter">weiter</button>
              </div>
            </div>
          </form>
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
