<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('secretaire_place.php'); ?>
      <?php
   if(isset($_POST['connexion'])){
      $login = $_POST['login'];
	  $pwd = $_POST['password'];
	  if((!empty($login)) && (!empty($pwd))){
	     require_once('db.php');
	    $sqlState = $pdo->prepare(query:'SELECT * FROM  secretaire_connect WHERE login=? AND password=?');
		 $sqlState->execute([$login,$pwd]);
		 if($sqlState->rowCount()>=1){
		session_start();
		$_SESSION['secretaire_connect']= $sqlState->fetch();
		 header("location:secretaire_place.php");
		 } else{
	     ?>
		 <div class="alert alert-danger" role="alert">
         login ou password incorrectes!
         </div>
		 <?php
	  }
 }
	  else{
	     ?>
		 <div class="alert alert-danger" role="alert">
         login et password est obligatoire!
         </div>
		 <?php
	  }
   }
   ?>
<?php
   if(isset($_POST['inscrit'])){
      $login = $_POST['login'];
	  $pwd = $_POST['password'];
	  if((!empty($login)) && (!empty($pwd))){
	     require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO secretaire_connect (id, login, password)VALUES (null,?,?)');
		 $sqlState->execute([$login,$pwd]);
		 header ("location:connexion_secretaire.php");
    }
	  
	  else{
	     ?>
		 <div class="alert alert-danger" role="alert">
         login et password et obligatoire!
         </div>
		 <?php
	  }
   }
?>
<h4> connexion </h4>
  <form  method="post" >
        <label for="login">Entrez un login:</label>
        <input type="text" name="login" />
        <br>
        <label for="password">Entre a password:</label>
        <input type="password" name="password" /></br>
        <input type="submit" class="btn btn-primary my-2"name="connexion" value="connexion">	
		 <input type="submit" class="btn btn-primary my-2"name="inscrit" value="inscrit">
    </form>
	
	</body>
	</html>