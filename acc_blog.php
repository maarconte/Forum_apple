<!-- ======================== PHP Includes  ======================================= -->  
     <?php 
      include('includes/db.php');
      include('includes/forum.php');

      ?>
  
<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="utf-8">
    <title>Episode le Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<!-- ======================== Header  ========================================== -->    
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/logo_icon.png">

      <!-- Slider header -->
      <link rel="stylesheet" href="cssslider_files/csss_engine1/style.css">
      <!-- Favicon -->
      <link rel="icon" href="images/logo_icon.png" type="image/png">
      <!-- Hover.css -->
      <link rel="stylesheet" href="Hover-master/css/hover.css">
      <!--  CSS -->
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/bootstrap-responsive.css" rel="stylesheet">
      <link href="css/blog.css" rel="stylesheet">
      <!-- Font -->
       <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
      <!-- Jquery -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!--[if IE]>
      <script type="text/javascript" src="js/modernizr.custom.78869.js"></script>
      <![endif]-->


  </head>

  <body>
<!-- ======================== Menu en haut ====================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a clas s="brand" href="#">Episode le Blog</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Connecté comme <a href="#" class="navbar-link"><?= $_SESSION['users']['pseudo']."  ";?></a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Accueil</a></li>
              <li><a href="accueil.php">Le forum</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
                <form class="navbar-search pull-left">
      <input type="text" class="search-query" placeholder="Recherche">
    </form>
          </div><!--/.nav-collapse -->
        </div> <!--/.container-fluid -->
      </div> <!--/.navbar-inner -->
    </div> <!--/navbar -->
<!-- ============================================================================ -->
    <div class="container-fluid">

      <div class="row-fluid">
<!-- ================ Sidebar de navigation a gauche ============================ -->
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Dernier Articles</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Dernieres Categories</li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Dernier Topics du Forum</li>
              
              <?php  $forum= new Forum($pdo);
                     $listeTopics = $forum->selectTopics();
                     $ligne   = count($listeTopics);
         
               
              for ($i=0; $i<$ligne;$i++){ ?>
              <li><a href="topic.php?id=<?=$listeTopics[$i]['id']?>"> <p><?=$listeTopics[$i]['title']?></p> </a></li>
                <?php }
               ?>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
<!-- ================ Header de la page (photo CSS) ============================= -->
        <div class="span9">
          <div class="hero-unit">
            <h1>Banana Episode !</h1>
            <p>Des series, des series, des series...</p>
          </div> <!--/.hero-unit-->
<!-- ======================= Les articles ======================================= -->
          <div class="row-fluid">
          <!-- Boucle PHP des articles -->
            <div class="span4">
              <h2>Titre</h2>
              <p>Texte de l'article</p>
              <p><a class="btn" href="#">En savoir plus &raquo;</a></p>
            </div><!--/span4-->
          </div><!--/row-->
<!-- ============================================================================= -->
<!-- ======================= Pagination ========================================== -->
          <div class="row">
              <div class="pagination">
                <ul>
                  <li><a href="#">Avant</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">Apres</a></li>
                </ul>
              </div>
            
          </div> <!--/row pagianation-->
        </div><!--/span9-->
      </div><!--/row-fluid-->

    </div><!--/.fluid-container-->
<!-- ========================= footer php ======================================== -->
  <?php include("footer.php"); ?>  
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
