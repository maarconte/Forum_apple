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
        <?php 
         include('includes/db.php');
         include("header.php"); 
         include('includes/forum.php');

         $forum= new Forum($pdo);
         $searchTopic=$forum->searchTopic($_POST['search']);
         $ligne=count($searchTopic); 

     
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
         	<td class="topic"><a href="topic.php?id=<?=$searchTopic[$i]['id']?>"><?=$searchTopic[$i]['title']?></a></td>
			<td class="creatorId"><a href="profil_page.php?id=<?=$searchTopic[$i]['creatorId']?>"><?php 
                  $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$searchTopic[$i]['creatorId']. '"' );
                  $result2 = $request2->fetchAll();
                  echo $result2[0]['pseudo'];
                  ?></a> </td>
			 <td class="date"> <?=$searchTopic[$i]['creation']?></td>
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