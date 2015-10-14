<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <title>Inscription - Episodes</title>
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
      <link rel="stylesheet" type="text/css" href="css/topic.css">
      <!-- Font -->
       <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
      <!-- Jquery -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!--[if IE]>
      <script type="text/javascript" src="js/modernizr.custom.78869.js"></script>
      <![endif]-->
		<link rel="stylesheet" type="text/css" href="css/form.css">
		
</head>
<body>

	<h1>Inscription</h1>	

<div class="container">
		<div class="pp_user">
			<img src="images/user.png" alt="user" style="left:inherit">
			<h3></h3>
			<p></p>
		</div>
<form action="inscription.php" method="post" >

<input type="text" name="pseudo" placeholder="Pseudo"/>
<input type="email" name="email" placeholder="email"/>
<input type="password" name="passwordA" placeholder="password" />
<input type="password" name="passwordB" placeholder="password" />
<label for="avatar">Avatar</label><input type="text" name="avatar" placeholder="url image" />

<input type="submit" />
<div id="fb-root"></div>
<?php 
require 'facebook-php-sdk-v4-master/src/Facebook/Facebook.php';    
$facebook = new Facebook(array(  'appId'  => '1506494756332119',  'secret' => '194f00918b03172666d619ee06b9d4f9',  'cookie' => true,));    
$session = $facebook->getSession();    
$me = null;    

if($session){    
 try {    
  $uid = $facebook->getUser();    
  $me = $facebook->api('/me');    
 }    
 catch(FacebookApiException $e){    
  error_log($e);    
 }    
} 
?>


<div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true"></div>


</form>
</div>

<a href="connection.html"> <button>Connection</button> </a>
</body>
</html>
