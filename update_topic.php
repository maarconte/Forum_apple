<!DOCTYPE html>
<html lang="FR-fr">
<head>

      <meta charset="UTF-8">
      <title>Modifier un topic - Episodes</title>
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


  $forum=new Forum($pdo);
  $topic=$forum->afficherTopic($_GET['id']);
?>

<div class="container" >
<h2>Topic</h2>
<form action="update_topic_db.php?id=<?=$topic[0]['id']?>" method="post" >
  <input type="text" value="<?=$topic[0]['title']?>" name="title" >
  <textarea placeholder="<?= $topic[0]['description']?>" name="description"><?= $topic[0]['description']?></textarea>
  <input type="submit">
</form>
</div>
</body>
</html>