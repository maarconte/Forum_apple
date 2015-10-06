<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link rel="stylesheet" type="text/css" href="css/connect.css">
      <link rel="stylesheet" type="text/css" href="css/form-topic.css">
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
      <title>Profil Page</title>
      <style>
         h3{
         text-align: center;
         font-weight: 600;
         font-size: 30px;
         }
         ul{
         text-align: left;
         padding: 0;
         }
         li,ul {
         list-style: none;
         }
         /*          h4{
         font-weight: 600;
         margin: 0;         
         background:#FFE100;
         height: 40px;
         line-height: 40px;
         } */
         #menu_profil{
         font-weight: 600;
         margin-left: 0;
         padding-bottom : 32px; /* à modifier suivant la taille de la police ET de la hauteur de l'onglet dans #onglets li */
         border-bottom : 1px solid #9EA0A1;
         margin-bottom: 10px;
         }
         .onglet{
         float: left;
         height: 32px;
         /*    margin : 2px 2px 0 2px !important;  Pour les navigateurs autre que IE
         margin : 1px 2px 0 2px;  Pour IE   */     
         width: 200px;
         background: #FFE900;
         }
         .onglet h4{
         display: block;
         text-align: center;
         line-height: 30px;
         font-weight: 600;
         margin: 0;
         }
         .active{
         border-bottom: 1px solid #F7F7F7;
         border-right: 1px solid #9EA0A1;
         border-left: 1px solid #9EA0A1;
         border-top: 1px solid #9EA0A1;
         background: #F7F7F7;
         }
         h3{
         font-weight: 600;
         font-size: 20px;
         }
         .result{
         position:relative;
         overflow: hidden;
         padding: 10px;
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         clear: left;
         }
         .result p{
         white-space: nowrap;
         text-overflow:ellipsis;
         overflow: hidden;
         }
         .result:nth-child(odd) {
         background: #e0e0e0;
         }
         .date{
         font-size: small;
         color:#616161;
         position: absolute;
         right: 10px;
         top:10px;
         }
      </style>
   </head>
   <body>
      <?php include('includes/db.php');?>
      <?php include("header.php"); ?>
      <div class="container">
         <div class="pp">
            <?php 
               $Forum  = new Forum($pdo);
               $profil = $forum->selectUser($_SESSION['users']['id']);
               $ligne  = count($profil);
               
                ?> 
            <?php
               if (empty($profil[0]['avatar'])) {
               ?>
            <div class="pp">
               <img src="../images/user.png" alt="user" style="left:inherit">
            </div>
            <?php
               }
               ?>
            <img src="<?=$profil['0']['avatar']?>" alt="user">
         </div>
         <h3><?=$profil[0]['pseudo']?></h3>
         <ul id="menu_profil">
            <li class="onglet active">
               <a href="profil_page.php?id=<?=$_GET['id']?>">
                  <h4>Topics: </h4>
               </a>
            </li>
            <li class="onglet">
               <a href="messages_user.php?id=<?=$_GET['id']?>">
                  <h4>Derniers messages:</h4>
               </a>
            </li>
         </ul>
         <?php 
            $topics  =  $forum->afficherTopicUser($_SESSION['users']['id']);
            $ligne   =  count($topics);
            
            for ( $i = 0; $i < $ligne; $i++ ) {
               if ($ligne > 0) {?>
         <ul class="result">
            <li><a href="topic.php?id=<?=$topics[$i]['id']?>"><?=$topics[$i]['title']?>
               </a>
            </li>
            <span class="date"><?=$topics[0]['creation']; ; die()?></span> 
         </ul>
         <?php }
            else{
            echo "Pas de topics";
            die();
            }
            } ?>
      </div>
   </body>
</html>