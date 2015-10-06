<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<meta charset="UTF-8">
	<title>Création de Topic</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/connect.css">
    <link rel="stylesheet" type="text/css" href="css/form-topic.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
		 <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>

     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--[if IE]>
    <script type="text/javascript" src="js/modernizr.custom.78869.js">
    </script>
<![endif]-->
<script type="text/javascript">
$(function(){

   $('.icon').click(function(e){
      $('.profil_nav').toggle();
         e.stopPropagation();
      });
});

</script>
</head>
<body>
<?php include('includes/db.php');
 include("header.php"); 
?>



<div class="container" >

<h2>Topic</h2>

<form action="insert_topic.php" method="post" >
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