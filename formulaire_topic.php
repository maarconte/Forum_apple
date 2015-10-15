<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<meta charset="UTF-8">
	<title>Création de Topic</title>
      <meta charset="UTF-8">
      <title>Topic - Episodes</title>
      <!-- Slider header -->
      <link rel="stylesheet" href="cssslider_files/csss_engine1/style.css">
      <!-- Favicon -->
      <link rel="icon" href="images/logo_icon.png" type="image/png">
      <!-- Hover.css -->
      <link rel="stylesheet" href="Hover-master/css/hover.css">
      <!--  CSS -->
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link rel="stylesheet" type="text/css" href="css/accueil.css">
      <link rel="stylesheet" type="text/css" href="css/connect.css">
      <link rel="stylesheet" type="text/css" href="css/form-topic.css">
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
<?php include('includes/db.php');
 include("header.php"); 
 ?>

<div class="container_formulaire_topic" >

<h2>Topic</h2>

<form id="formulaire_topic"action="insert_topic.php" method="post" >
 <select name="categorie" >  

        <?php 
        $forum= new Forum($pdo);
        $listeCategories=$forum->listeCategories();
         $ligne=count($listeCategories);
          
          for ($i=0;  $i<$ligne ; $i++) { ?>

          	<option name="categorie" value="<?=$listeCategories[$i]['id']?>"><?=$listeCategories[$i]['name']?></option>

         <?php } ?>
</select> 
	<input type="text" placeholder="Titre" name="title" >
	<textarea placeholder="Texte" name="description"></textarea>

	<input type="submit">

</form>
</div>
</body>
</html>