<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('administrateur.php'); ?>
	<h4> modifier medecin</h4>
	<?php
    if(isset($_POST['modifier'])){
      $civilite = $_POST['civilite'];
	  $nom = $_POST['nom'];
	   $prenom = $_POST['prenom'];
	   $specialite = $_POST['specialite'];
		$filename="";
		if(isset($_FILES['image'])){
			$image = $_FILES['image']['name'];
			$filename = uniqid().$image;
			move_uploaded_file($_FILES['image']['tmp_name'], '' .$filename);
		}
	    if((!empty($civilite)) && (!empty($nom)) && (!empty($prenom))){
		   if(!empty($filename)){
			   $query = "UPDATE medecin SET civilite=? , nom=? , prenom=? , specialite=? , image=? WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$civilite,$nom,$prenom,$filename,$id]);
	   
	   }
	   else{
		     $query = "UPDATE medecin SET civilite=? , nom=? , prenom=?  WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$civilite,$nom,$prenom,$id]);
	   
	   }
	   header ("location:medecins.php");}
	   else{
		   ?>
		  <div class="alert alert-danger" role="alert">
         civilite , nom, prenom sont obligatoire!
         </div>
		<?php
	   }
	}
?>

    <form  method="post" enctype="multipart/form-data">
        <label class="form-label" >civilite</label>
        <input type="text" name="civilite" />
        <br>
        <label class="form-label">nom</label>
		<input type="text" class="form-control" name="nom" /> 
		<br>
		<label class="form-label">prenom</label>
		<input type="text" class="form-control" name="prenom"/>
		<br>
		<br>
		<label class="form-label">specialite</label>
		<input type="text" class="form-control" name="specialite"/>
		<label class="form-label">image</label>
		<input type="file" class="form-control" name="image"/>
		
        <input type="submit" class="btn btn-primary my-2"name="modifier" value="modifier medecin">	
    </form>
	
	</body>
	</html>
	</body>
	</html>