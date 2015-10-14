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
   </head>
   <body>
      <?php 
         include('includes/db.php');
         include("header.php"); 
         
         $forum= new Forum($pdo);
         $listeTopics = $forum->selectTopics();
         $ligne   = count($listeTopics);
         
               ?>
      <h2>
         <a href="formulaire_topic.php" class="hvr-icon-forward">
            Nouveau topic 
         </a>
         </i>
      </h2>
      <table>
         <thead>
            <tr>
               <th class="topic">Topics</th>
               <th >Catégorie</th>
               <th>Auteurs</th>
               <th >Dates</th>
            </tr>
         </thead>
         <tbody>
            <?php for ($i=0; $i<$ligne;$i++){ ?>
            <tr>
               <td ><a href="topic.php?id=<?=$listeTopics[$i]['id']?>"> <p><?=$listeTopics[$i]['title']?></p> </a></td>
               <td class="creatorId">
                  <a href="categories.php?id=<?=$listeTopics[$i]['categorieId']?>"> <?php 
                     $categories = $forum->selectCategoriesTopics($listeTopics[$i]['categorieId']);
                     echo $categories[0]['name'];
                     ?>
                  </a>
               </td>
               <td class="creatorId"> 
                  <?php 
                     $creatorId = $forum->selectCreatorId($listeTopics[$i]['creatorId']);
                      
                     ?>
                  <a href="profil_page.php?id=<?=$listeTopics[$i]['creatorId']?>"><?php 
                     echo $creatorId[0]['pseudo'];
                     ?></a> 
               </td>
               <td class="date"> <?=$listeTopics[$i]['creation']?></td>
            </tr>
            <?php }
               ?>
         </tbody>
      </table>
      <table>
         <thead>
            <tr>
               <th>Catégories</th>
               <th>Topics</th>
               <th>Dernier ajout</th>
            </tr>
         </thead>
         <tbody>
            <?php   
               foreach  ($listeCategories=$forum->selectCategories() as $row) { ?>
            <tr>
               <td class="topic"><a href="categories.php?id=<?=$row['categorieId']?>"> <?php print $row['name'] ?></a></td>
               <td class="creatorId"><?php print  $row['nombre'] ?></td>
               <td class="date"><?php print  $row['creation'] ?></td>
            </tr>
            <?php  } ?> 
         </tbody>
      </table>
   </body>
</html>