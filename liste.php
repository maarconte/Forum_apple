<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <title>Liste des membres - Episodes</title>
      <!-- Slider header -->
      <link rel="stylesheet" href="cssslider_files/csss_engine1/style.css">
      <!-- Favicon -->
      <link rel="icon" href="images/logo_icon.png" type="image/png">
      <!-- Hover.css -->
      <link rel="stylesheet" href="Hover-master/css/hover.css">
      <!--  CSS -->
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link rel="stylesheet" type="text/css" href="css/connect.css">
      <!-- Font -->
       <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
      <!-- Jquery -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!--[if IE]>
      <script type="text/javascript" src="js/modernizr.custom.78869.js"></script>
      <![endif]-->


      <style>
         .liste{
         width: 800px;
         margin: 0 auto ;
         margin-top: 60px;
         padding: 0;

         }
         .row{
         height: 200px;
         width: 150px;
         overflow: hidden;
         margin: 0 auto 10px; 
         background:#F7F7F7 ;
         float: left;
         margin-right: 10px;
         padding: 10px;
         }  


         

      </style>
   </head>
   <?php
      include('includes/db.php');
      ?>
   <body> 
   <?php  include("header_user_list.php");?>
    <div class="liste">
      <?php 
          
         
         $forum= new Forum($pdo);
         $liste = $forum->selectUsers();
         $ligne   = count($liste);
              
              
              for ($i = 0; $i < $ligne; $i++) {
         ?>
    
         <div class="row">
            <?php
                  if (empty($liste[$i]['avatar'])) {
                  ?>
                     <div class="pp_user">
                        <img src="../images/user.png" alt="user" style="left:inherit">
                     </div>
                     <a href="profil_page.php?id=<?= $liste[$i]['id'] ?>">
                        <h2><?= $liste[$i]['pseudo'];  ?></h2>
                     </a>
               <?php
              
               } 


           else { ?>
                  <div class="pp_liste">
                     <img src="<?= $liste[$i]['avatar'] ?>" alt="user">
                  </div>
                  <a href="profil_page.php?id=<?= $liste[$i]['id'] ?>">
                     <h2><?= $liste[$i]['pseudo'] ?></h2>
                  </a>
                 <?php } ?>
         </div>
     
      <?php
         } ?>
 </div>
     

<?php include("footer.php"); ?> 

   </body>

</html>