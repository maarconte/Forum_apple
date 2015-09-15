<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/connect.css">
	<link rel="stylesheet" type="text/css" href="css/accueil.css">
		<link rel="stylesheet" type="text/css" href="css/form-topic.css">
	 <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--[if IE]<script type="text/javascript" src="js/modernizr.custom.86492.js"></script><![endif]-->
	<title></title>
	<style>
	h3{
		text-align: center;
		font-weight: 600;
		font-size: 30px;
	}

	h2{
		text-align: left;
		font-weight: 600;

	}
	h4{
		font-weight: 600;
		margin: 0;
	}
	.result{
		position:relative;
		overflow: hidden;
		padding: 10px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	
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
 <header>
         <div class="hello"><?php
include('includes/db.php');
            
            if ( empty($_SESSION['users']) ) {
              header('Location: connection.html');
              die();
            }
            
            echo "Bonjour " . $_SESSION['users']['pseudo']."  ";
            ?><a href="logout.php"><button><i class="fa fa-sign-out"></i> Log out</button></a></div>
         <a href="accueil.php">
            <h1>Forum</h1>
         </a>


   <div class="nav">
         <a href="liste.php">Liste des membres</a>
         <a href="update_profil.php?id=<?=$_SESSION['users']['id']?>">Modifier Profil</a>
   </div>
      </header>
<div class="container">
		<div class="pp">
			<img src="images/user.png" alt="user">
		</div>	

		<?php 

$request= $pdo->query('SELECT*FROM users WHERE id="'.$_GET['id'].'" ');
$result=$request->fetchAll();
$ligne=count($result);

 ?>
<h3><?=$result[0]['pseudo']?></h3>
<h2>Topics: </h2>		

<?php 

$request= $pdo->query('SELECT*FROM topics WHERE creatorId="'.$_GET['id'].'" ');
$result=$request->fetchAll();
$ligne=count($result);

for ( $i = 0; $i < count($result); $i++ ) {?>

<div class="result">
	<p><a href="topic.php?id=<?=$result[$i]['id']?>"><?=$result[$i]['title']?>
		
	</a></p><span class="date"><?=$result[0]['creation'];?></span> 
</div>

<?php } ?>

<h2>Derniers messages:</h2>

<?php 

$request= $pdo->query('SELECT*FROM messages WHERE creatorId="'.$_GET['id'].'" ');
$result=$request->fetchAll();
$ligne=count($result);

for ( $i = 0; $i < count($result); $i++ ) {?>


<div class="result"><h4><a href="topic.php?id=<?=$result[$i]['topicId']?>"><?php 
                  $request2 = $pdo->query( 'SELECT * FROM topics WHERE id="' .$result[$i]['topicId']. '"' );
                  $result2 = $request2->fetchAll();
                  echo $result2[0]['title'];?>
                
                  

                  </a></h4> <span class="date"><?=$result[0]['creation'];?></span> 
<p><?=$result[$i]['message']?></p></div>

<?php } ?>

</body>
</html>