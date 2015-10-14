<?php 
         include('includes/db.php');
         include("header.php"); 
         
         $forum= new Forum($pdo);
         $listeTopics = $forum->afficherTopic($_GET["id"]);
         $ligne   = count($listeTopics);
         
?><!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <title><?=$listeTopics[0]['title']?> - Episodes</title>
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link rel="stylesheet" type="text/css" href="css/connect.css">
      <link rel="stylesheet" type="text/css" href="css/topic.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
      <script>tinymce.init({selector:'textarea'});</script>
      <!--[if IE]>
      <script type="text/javascript" src="js/modernizr.custom.78869.js"></script>
      <![endif]-->
      <style>
         .head_post{
         position:relative;
         background:#FFE100;
         height: 60px;
         line-height: 60px;
         margin: 0 0 10px;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         }
         .date{
         font-size: small;
         color:#616161;
         position: absolute;
         margin: 0;
         }

         .creation{
            top:0;
            right: 100px;
         }
         .creator{
         position: absolute;
         left: 100px;
         top:10px;
         margin: 0;
         }
         .post_first{
         width: 800px;
         margin: 0 auto 30px;
         padding: 10px;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         }
         .post{
         position: relative;
         }
         h2{
            display: block;
            margin: 0 auto;
            width: 980px;
         }
         h4{
         font-weight: 600;
         margin: 0;
         }

         #twitter-widget-0{
            position: absolute;
            top:0;
         }
         .fb_iframe_widget{
            position: relative;
         /* left: 980px;
         top:0px; */
}
      
      </style>
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

        

         <span class="date creation"><?=$listeTopics[0]['creation'];?></span> 
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
            <span class="date"><?=$listeMessages[0]['creation'];?></span> 

              </div>
                        </div>
         <?php }
            ?>
      </div>
      <h2>Répondre</h2>
      <form action="message.php?id=<?=$_GET['id']?>" method="post">
         <textarea name="message" id="message" cols="30" rows="10"></textarea>
         <input type="submit">
      </form>
      <?php 
         }?>
      </tbody>
      </table>
      <script src="js/facebook_login.js"> </script>
      <script src="js/like_FB.js"> </script>
   </body>
</html>