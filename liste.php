<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <title>Liste des membres</title>
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link rel="stylesheet" type="text/css" href="css/connect.css">
      <link rel="stylesheet" type="text/css" href="css/topic.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
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
         .liste{
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
         header{
         margin-bottom: 30px;
         }
         a>h2{
         color: #333333;
         font: 16px 'Open Sans'; 
         }

         

      </style>
   </head>
   <?php
      include('includes/db.php');
      ?>
   <body>
      <?php 
         include("header_user_list.php"); 
         
         $forum= new Forum($pdo);
         $liste = $forum->selectUsers();
         $ligne   = count($liste);
              
              
              for ($i = 0; $i < $ligne; $i++) {
         ?>
      <div class="liste">
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
      </div>
      <?php
         } ?>
   </body>
</html>