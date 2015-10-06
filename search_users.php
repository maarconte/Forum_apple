<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/connect.css">
    <link rel="stylesheet" type="text/css" href="css/topic.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!--[if IE]>
    <script type="text/javascript" src="js/modernizr.custom.78869.js">
    </script>
<![endif]-->
   <script type="text/javascript">
$(function(){

   $('#profil').click(function(e){
      $('.profil_nav').toggle();
         e.stopPropagation();
      });
});

</script>
<style>

.container{
  width: 800px;
  margin: 0 auto;
}
   .row{
      height: 200px;
      width: 150px;
      overflow: hidden;
      margin: 0 auto 10px;
      position: relative;
      background:#F7F7F7 ;
    float: left;
    margin-right: 10px;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;

   }  

   .hello{
    
    position: absolute;
    right: 10px;
    top:10px;
    text-align: right;

      }


h1{
  line-height: 300px;
    color: #333333;
}


a>h2{
    color: #333333;
    font: 16px 'Open Sans'; 
 
}

</style>


</head>
<body>

    <?php include('includes/db.php');
    include("header.php");
    /*include('includes/forum.php');*/

   
$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
  $dsn,
  $user,
  $pass
);

         $request = $pdo->query( 'SELECT * FROM users WHERE pseudo LIKE "%'.$_POST['search'].'%" ORDER BY pseudo;' );
         $result = $request->fetchAll();
         $ligne=count($result); 

     
        for ($i=0; $i <= $ligne ; $i++) { 

          if ($ligne>0) { ?>
                  <div class="container">
<div class="row">
<?php if (empty($result[$i]['avatar'])) { ?>
     <div class="pp">
         <img src="../images/user.png" alt="user" style="left:inherit">

      </div>
      <a href="profil_page.php?id=<?=$result[$i]['id']?>"><h2><?=$result[$i]['pseudo']?></h2></a> 
<?php } ?>
     <div class="pp">
         <img src="<?=$result[$i]['avatar']?>" alt="user">
      </div>

<a href="profil_page.php?id=<?=$result[$i]['id']?>"><h2><?=$result[$i]['pseudo']?></h2></a></div>

</div>




          <?php } die(); } ?>


</body>
</html>