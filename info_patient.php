<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('page_pricipale.php'); ?>
	<h4> votre informations personnels</h4>
	<?php
    if(isset($_POST['valider'])){
      $civilite = $_POST['civilite'];
	  $nom = $_POST['nom'];
	   $prenom = $_POST['prenom'];
	    $Date_Naissance = $_POST['Date_Naissance'];
	   $lieu_naissance = $_POST['lieu_naissance'];
	   $num_carte_national = $_POST['num_carte_national'];
		$filename="";
		if(isset($_FILES['image'])){
			$image = $_FILES['image']['name'];
			$filename = uniqid().$image;
			move_uploaded_file($_FILES['image']['tmp_name'], '' .$filename);
		}
	   if((!empty($civilite)) && (!empty($nom)) && (!empty($prenom) )){
	      require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO patient (id,civilite,nom,prenom,Date_Naissance,lieu_naissance,num_carte_national,image)VALUES (null,?,?,?,?,?,?,?)');
	     $sqlState->execute([$civilite,$nom,$prenom,$Date_Naissance,$lieu_naissance,$num_carte_national,$filename]);
		 
	    header ("location:prise_rendezvous.php");
	   }
	   else{
		   ?>
		  <div class="alert alert-danger" role="alert">
         civilite , nom, prenom  et num_carte_natinal sont obligatoire!
         </div>
		<?php
	   }
	}
?>
 <div>
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
		<label class="form-label">Date_Naissance</label>
		<input type="date" class="form-control" name="Date_Naissance"/>
		<br>
		<label class="form-label">lieu_naissance</label>
		<input type="text" class="form-control" name="lieu_naissance"/>
		<br>
		<label class="form-label">num_carte_national</label>
		<input type="text" class="form-control" name="num_carte_national"/>
		<br>
		<label class="form-label">image</label>
		<input type="file" class="form-control" name="image"/>
		
        <input type="submit" class="btn btn-primary my-2"name="valider" value="valider les donnees">	
    </form>
	</div>
	</body>
	</html>