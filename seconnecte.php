<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
      <?php
   if(isset($_POST['connexion'])){
      $login = $_POST['login'];
	  $pwd = $_POST['password'];
	  if((!empty($login)) && (!empty($pwd))){
	     require_once('db.php');
	    $sqlState = $pdo->prepare(query:'SELECT * FROM  utilisateurs WHERE login=? AND password=?');
		 $sqlState->execute([$login,$pwd]);
		 if($sqlState->rowCount()>=1){
		session_start();
		$_SESSION['user']= $sqlState->fetch()['usertype'];
		 header("location:authentifier.php");
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
	  $usertype = $_POST['usertype'];
	  if((!empty($login)) && (!empty($pwd)) && (!empty($usertype))){
	     require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO utilisateurs (id, login, password, usertype)VALUES (null,?,?,?)');
		 $sqlState->execute([$login,$pwd,$usertype]);
		 header ("location:seconnecte.php");
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
        <label >select votre usertype:</label>
		<select name="usertype">
		<option><option>
		<option>patient<option>
		<option>admin<option>
		<option>medecin<option>
		<option>secretaire<option>
		</select>
        <input type="submit" class="btn btn-primary my-2"name="connexion" value="connexion">	
		 <input type="submit" class="btn btn-primary my-2"name="inscrit" value="inscrit">
    </form>
	
	</body>
	</html>