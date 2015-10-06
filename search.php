<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <title>Episodes</title>
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link rel="stylesheet" type="text/css" href="css/connect.css">
      <link rel="stylesheet" type="text/css" href="css/accueil.css">
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
   </head>
   <body>
      <?php 
         include('includes/db.php');
         include("header.php"); 
         
         
         $forum= new Forum($pdo);
         $searchTopic=$forum->searchTopics($_POST['search']);
         $ligne=count($searchTopic); 
         
         
         for ($i=0; $i <= $ligne ; $i++) { 
         
            if ($ligne>0) { ?>
      <table>
         <thead>
            <tr>
               <th>Topics</th>
               <th>Catégories</th>
               <th>Auteurs</th>
               <th >Dates</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td class="topic"><a href="topic.php?id=<?=$searchTopic[$i]['id']?>"><?=$searchTopic[$i]['title']?></a></td>
               <td class="creatorId">
                  <a href="categories.php?id=<?=$searchTopic[$i]['categorieId']?>"> <?php 
                     $categories = $forum->selectCategoriesTopics($searchTopic[$i]['categorieId']);
                     echo $categories[0]['name'];
                     ?>
                  </a>
               </td>
               <td class="creatorId"> 
                  <?php 
                     $creatorId = $forum->selectCreatorId($searchTopic[$i]['creatorId']);
                     ?>
                  <a href="profil_page.php?id=<?=$searchTopic[$i]['creatorId']?>"><?php 
                     echo $creatorId[0]['pseudo'];
                     ?></a> 
               </td>
               <td class="date"> <?=$searchTopic[$i]['creation']?></td>
               <?php die(); ?>            
            </tr>
            <?php }
               else{ ?>
            <h2><?= "Pas de réponses  "."<i class='fa fa-exclamation-circle'></i>
               ";?></h2>
            <?php }
               }?>
         </tbody>
      </table>
   </body>
</html>