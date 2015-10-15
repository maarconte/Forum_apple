<!DOCTYPE html>
<html lang="fr">
   <head>
<?php 
         include('includes/db.php');
         include("header.php"); 
         
         $forum= new Forum($pdo);
         $listeTopics = $forum->afficherTopic($_GET["id"]);
         $ligne   = count($listeTopics);
         
?>
      <title><?=$listeTopics[0]['title']?> - Episodes</title>
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

   </head>

   <body>

      <?php 
         for ($i=0; $i <$ligne ; $i++){ ?>

      <div class="head_post">
         <h2><?php 
            $creatorId = $forum->selectCreatorId($listeTopics[$i]['creatorId']);
            echo $listeTopics[$i]['title']?></h2>
            
<a href="https://twitter.com/share" class="twitter-share-button" data-via="Episodes" data-lang="fr" data-count="none">Tweeter</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
             <div class="fb-like" data-layout="button" ></div>
         <a href="profil_page.php?id=<?=$listeTopics[$i]['creatorId']?>">
            <p class="creator"><?=$creatorId[0]['pseudo']?></p>
         </a>

        

         <span class="creation"><?=$listeTopics[0]['creation'];?></span> 
      </div>
      <div class="post_first" >
         <p><?= $listeTopics[$i]['description'] ?></p>
      </div>

      

      <div class="message">

         <?php
            $listeMessages = $forum->selectMessages($_GET["id"]);
            $ligne=count($listeMessages);
            
            for ($i=0; $i<$ligne;$i++){ 
           
            $messageCreator=$forum->selectMessageCreator($listeMessages[$i]['creatorId']);
               ?>
         


         <div class="post">
                  <h4><?=$messageCreator[0]['pseudo']?></h4>

                   <div class="dd">
                  <?php 
                     $forum= new Forum($pdo);
                     $avatar = $forum->selectUser($listeMessages[$i]['creatorId']);
                     ?> 
                  <img src="<?=$avatar['0']['avatar']?>" alt="user">
               </div>
              <div class="txt">

            <p> <?= $listeMessages[$i]['message']?></p>
            <span class="date date_message"><?=$listeMessages[0]['creation'];?></span> 

              </div>
                        </div>
         <?php }
            ?>
      </div>
      <h2>Répondre</h2>
      <form id="reponse" action="message.php?id=<?=$_GET['id']?>" method="post">
         <textarea name="message" id="message" cols="30" rows="10"></textarea>
         <input type="submit">
      </form>
      <?php 
         }?>
      <script src="js/facebook_login.js"> </script>
      <script src="js/like_FB.js"> </script>
                  <script type="text/javascript">
         $(function(){
         
            $('.icon').click(function(e){
               $('.profil_nav').toggle(400);
                  e.stopPropagation();
               });
         });
         
               $(function(e){
                  $('#btn').click(function(){
                     $('#menu').toggle(400);
                  }); 
               });
         
      </script>
      <?php include("footer.php"); ?>  
   </body>
</html>