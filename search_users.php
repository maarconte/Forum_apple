<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <title>Rechercher un profil - Episodes</title>
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
      <link rel="stylesheet" type="text/css" href="css/topic.css">
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
         header{
         margin-bottom: 30px;
         }
      </style>
   </head>
   <body>
      <?php 
         include('includes/db.php');
         include("header.php");
         
         
              $forum= new Forum($pdo);
              $searchUsers=$forum->searchUsers($_POST['search']);
              $ligne=count($searchUsers); 
          
             for ($i=0; $i <= $ligne ; $i++) { 
         
               if ($ligne>0) { ?>
      <div class="container">
         <div class="row">
            <?php if (empty($searchUsers[$i]['avatar'])) { ?>
            <div class="pp">
               <img src="../images/user.png" alt="user" style="left:inherit">
            </div>
            <a href="profil_page.php?id=<?=$searchUsers[$i]['id']?>">
               <h2><?=$searchUsers[$i]['pseudo']?></h2>
            </a>
            <?php } ?>
            <div class="pp">
               <img src="<?=$searchUsers[$i]['avatar']?>" alt="user">
            </div>
            <a href="profil_page.php?id=<?=$searchUsers[$i]['id']?>">
               <h2><?=$searchUsers[$i]['pseudo']?></h2>
            </a>
         </div>
      </div>
      <?php } die(); } ?>
   </body>
</html>