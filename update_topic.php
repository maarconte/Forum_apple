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
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>  
      <script>tinymce.init({selector:'textarea'});</script>
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
  
$request=$pdo->query('SELECT*FROM topics WHERE id="'.$_GET['id'].'" ');
$result=$request->fetchALL();
?>

<div class="container" >
<h2>Topic</h2>
<form action="update_topic_db.php?id=<?=$result[0]['id']?>" method="post" >
  <input type="text" value="<?=$result[0]['title']?>" name="title" >
  <textarea placeholder="<?= $result[0]['description']?>" name="description"><?= $result[0]['description']?></textarea>
  <input type="submit">
</form>
</div>
</body>
</html>