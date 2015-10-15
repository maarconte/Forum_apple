 <!DOCTYPE html>
 <html lang="FR-fr">
 <head>
<meta charset="UTF-8">
      <title>Modifier le profil - Episodes</title>
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
      <link rel="stylesheet" type="text/css" href="css/form-topic.css">
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
         $forum=new Forum($pdo);
         $result=$forum->selectUser($_GET['id']);
         $ligne=count($result);

 ?>

	<div class="container">




   <?php if (empty($result[0]['avatar'])) {
               ?>
            <div class="pp_user ">
               <img src="../images/user.png" alt="user" style="left:inherit">
            </div>
            <?php
               }
              else {?>
              <div class="pp_liste">
               <img src="<?=$result['0']['avatar']?>" alt="user">
         </div>
               <?php } ?>








    <h2><?=$result[0]['pseudo']?></h2>
<form action="profil.php?id=<?=$_GET['id']?>" method="post">

<input type="email" name="email" value="<?=$result[0]['email']?>"  />
<input type="text" name="pseudo" value="<?=$result[0]['pseudo']?>" />

<input type="submit" value="Modifier" />

</form>
         
      <ul id="menu_profil">
         <li class="onglet ">
          <a href="update_profil.php?id=<?=$_GET['id']?>"><h4>Topics: </h4></a>  </li>
             <li class="onglet active">
          <a href="#"><h4>Derniers messages:</h4></a></li> </ul>
          
      
      <?php 

        
         $result=$forum->selectMessagesUser($_GET['id']);
         $ligne=count($result);
        
        for ( $i = 0; $i <= ($ligne-1); $i++ ) {
        
        if ($ligne > 0) { ?>
     <ul class="result">
        <li><h3><a href="topic.php?id=<?=$result[$i]['topicId']?>"><?php 
           

          $result2=$forum->topicActiv($result[$i]['topicId']);

           echo $result2[0]['title'] ; ?>
          
           </a>
        </h3>
        <span class="date"><?=$result[0]['creation'];?>
                    <a href="delete_topic.php">&nbsp;&nbsp;<i class="fa fa-times"></i></a>
            <a href="update_topic.php">&nbsp;&nbsp;<i class="fa fa-pencil"></i></a></span> 
        <p><?=$result[$i]['message'];?></p></li>
     </ul>
     <?php
     }
     else{
      echo "Pas de messages";
          die();
     }
        }
        ?> 
</div>
<?php include("footer.php"); ?> 
 </body>
 </html>