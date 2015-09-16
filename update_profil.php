<?php 
include('includes/db.php');


 ?>


 <!DOCTYPE html>
 <html lang="FR-fr">
 <head>
 	<meta charset="UTF-8">
 	<title>Profil</title>
 		<link rel="stylesheet" type="text/css" href="css/normalize.css">
 		<link rel="stylesheet" type="text/css" href="css/connect.css">
 		<link rel="stylesheet" type="text/css" href="css/form-topic.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
 		<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
 	     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <!--[if IE]>
     <script type="text/javascript" src="js/modernizr.custom.78869.js">
     </script>
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

         <div class="hello">
            
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
      </header>
	<div class="container">
		<div class="pp">
			<img src="images/user.png" alt="user">
		</div>	
<form action="profil.php?id=<?=$_GET['id']?>" method="post">
<?php 

$request= $pdo->query('SELECT*FROM users WHERE id="'.$_GET['id'].'" ');
$result=$request->fetchAll();
$ligne=count($result);

 ?>
<input type="email" name="email" value="<?=$result[0]['email']?>"  />
<input type="text" name="pseudo" value="<?=$result[0]['pseudo']?>" />

<input type="submit" value="Modifier" />

</form>
</div>

 </body>
 </html>