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

h2{
  margin: 0;
}
  </style>
   </head>
   <body>
      <?php include('includes/db.php');
         include("header.php"); 
         
              $forum=new Forum($pdo);
              $listeTopicsCategorie=$forum->listeTopicsCategorie($_GET['id']);
              $ligne=count($listeTopicsCategorie);

              $sql=$pdo->query('SELECT * FROM categories WHERE id="'.$_GET['id'].'"');
              $result2=$sql->fetchAll();
               ?>
     
      <div class="head_post">
         <h2><?=$result2[0]['name']?></h2>
         </div>
          <a href="formulaire_topic.php"><h2>Nouveau topic <i class="fa fa-plus"></i></h2>
      </a>

 <table>
        <thead>
           <tr>
              <th>Topics</th>
              <th>Auteurs</th>
              <th >Dates</th>
           </tr>
        </thead>
        <tbody>

           <?php for ($i=0; $i<$ligne;$i++){ ?>
           <tr>
              <td class="topic"><a href="topic.php?id=<?=$listeTopicsCategorie[$i]['id']?>"><?=$listeTopicsCategorie[$i]['title']?></a></td>
              <td class="creatorId"> 
                 <?php 
                    $request2= $pdo->query('SELECT*FROM users WHERE id="'.$listeTopicsCategorie[$i]['creatorId'].'" ');
                    $result2=$request2->fetchAll();
                    
                    ?>
                 <a href="profil_page.php?id=<?=$listeTopicsCategorie[$i]['creatorId']?>"><?php 
                    $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$listeTopicsCategorie[$i]['creatorId']. '"' );
                    $result2 = $request2->fetchAll();
                    echo $result2[0]['pseudo'];
                    ?></a> 
              </td>
              <td class="date"> <a href="#"><?=$listeTopicsCategorie[$i]['creation']?></a></td>
           </tr>
           <?php }
              ?>
        </tbody>
     </table> 


     

   </body>
</html>