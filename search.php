  <?php 
  include('includes/db.php');

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

         	if ($ligne>0) {
         	echo $result[$i]['title'];
         	die();
         	}

         	else{
         		echo "Pas de réponses";
         	}
         
         }
         
         ?>