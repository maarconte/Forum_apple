<!DOCTYPE html>
<html lang="fr">
   <head>

      <meta charset="UTF-8">
      <title>Accueil - Episodes</title>
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
   </head>
   <body>      <table>
         <thead>
            <tr>
               <th>Topics</th>
               <th>Catégories</th>
               <th>Auteurs</th>
               <th >Dates</th>
            </tr>
         </thead>
         <tbody>
      <?php 
         include('includes/db.php');
         include("header.php"); 
         
         
         $forum= new Forum($pdo);
         $searchTopic=$forum->searchTopics($_POST['search']);
         $result=$forum->top($searchTopic[0]['id']);
         $ligne=count($searchTopic); 
         
         
         for ($i=0; $i <= $ligne ; $i++) { 
         
            if ($ligne>0) { ?>

            <tr>
            <?php ; ?>

               <td class="topic"><a href="topic.php?id=<?=$searchTopic[$i]['id']?>"><?=$result[$i]['title']?></a></td>
               <td class="creatorId">
                  <a href="categories.php?id=<?=$searchTopic[$i]['categorieId']?>"> <?php 
                     
                     echo $result[$i]['categorieId'];
                     ?>
                  </a>
               </td>
               <td class="creatorId"> 

                  <a href="profil_page.php?id=<?=$searchTopic[$i]['creatorId']?>"><?php 
                     echo $result[$i]['creatorId'];
                     ?></a> 
               </td>
               <td class="date"> <?=$result[$i]['creation']?></td>
               <?php /*die();*/ ?>            
            </tr>
            <?php }

               else{ ?>
            <h2><?= "Pas de réponses  "."<i class='fa fa-exclamation-circle'></i>
               ";?></h2>
            <?php }
               }?>


         </tbody>
      </table>

<?php        
      $result_user=$forum->user($searchTopic[$i]['id']);
      $ligne=count($result_user); 
      for ($i=0; $i <=$ligne ; $i++) { 
      echo $result_user[$i]['id'];
      }
?>

 <?php
      include("footer.php"); ?>  
   </body>
</html>