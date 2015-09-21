         <!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <title>Document</title>
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
      <header>


         <div class="hello"><?php
include('includes/db.php');
            ?>
            
          <p id="profil"> <?= "Bonjour " . $_SESSION['users']['pseudo']."  ";
            ?></p>

            <ul class="profil_nav">
               <li><a href="profil_page.php?id=<?=$_SESSION['users']['id']?>">Profil</a></li>
               <li> <a href="update_profil.php?id=<?=$_SESSION['users']['id']?>">Modifier Profil</a></li>
               <li>  <a href="logout.php"> <i class="fa fa-sign-out"></i> Log out</a></li>   
            </ul>

          

           </div>

         <a href="accueil.php">
            <h1>Forum</h1>
         </a>


   <div class="nav">
         <a href="liste.php">Liste des membres</a>  
   </div>

   <form action="search.php" method="post"><input type="text" name="search" placeholder="Search" id="search"></form>

      </header>

     
  <?php 
$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

         $request = $pdo->query( 'SELECT * FROM topics WHERE title LIKE "%'.$_POST['search'].'%" ORDER BY title;' );
         $result = $request->fetchAll();
         $ligne=count($result); 

     
        for ($i=0; $i <= $ligne ; $i++) { 

         	if ($ligne>0) { ?>
 <table>
         <thead>
            <tr>
               <th>Topics</th>
               <th>Auteurs</th>
               <th >Dates</th>
            </tr>
         </thead>
         <tbody>
         	<tr>
         	<td class="topic"><a href="topic.php?id=<?=$result[$i]['id']?>"><?=$result[$i]['title']?></a></td>
			<td class="creatorId"><a href="profil_page.php?id=<?=$result[$i]['creatorId']?>"><?php 
                  $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$result[$i]['creatorId']. '"' );
                  $result2 = $request2->fetchAll();
                  echo $result2[0]['pseudo'];
                  ?></a> </td>
			 <td class="date"> <?=$result[$i]['creation']?></td>
         	<?php die(); ?>         	
			</tr>

         <?php	}

         	else{ ?>
         		<h2><?= "Pas de réponses  "."<i class='fa fa-exclamation-circle'></i>
";?></h2>
         <?php }
         }?>
         </tbody>
      </table>
   </body>
</html>