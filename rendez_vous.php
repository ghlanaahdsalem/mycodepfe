<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('medecin_place.php'); ?>
	<h4> listes des mes disponibilite </h4>
	<?php
    if(isset($_POST['ajouter'])){
      $date = $_POST['date'];
	  $heure = $_POST['heure'];
	   $jour = $_POST['jour'];
	   $nom_medecin = $_POST['nom_medecin'];
	   $disponibilite = $_POST['disponibilite'];
	   if((!empty($date)) && (!empty($heure)) && (!empty($jour) )){
	      require_once('db.php');
	     $sqlState = $pdo->prepare(query:'INSERT INTO rendez_vous (date,heure,jour,disponibilite,id,nom_medecin)VALUES (?,?,?,?,null,?)');
	     $sqlState->execute([$date,$heure,$jour,$disponibilite,$nom_medecin]);
		 
	    header ("location:mes_disponibilites.php");
	   }
	   else{
		   ?>
		  <div class="alert alert-danger" role="alert">
          date , heure, jour sont obligatoire!
         </div>
		<?php
	   }
	}
?>
<section id="appnt">
 <div class="container">
 <div>
    <form  method="post" enctype="multipart/form-data" id="formulaire">
        <label class="form-label" >date</label>
        <input type="date" name="date" />
        <br>
        <label class="form-label">heure</label>
		<input type="time" class="form-control" name="heure" /> 
		<br>
		<label class="form-label">jour</label>
		<input type="text" class="form-control" name="jour"/>
		<br>
		<label class="form-label">disponibilite</label>
		<select class="form-control" name="disponibilite"/>
		 <option> oui</option>
		 <option> non </option>
		</select>
		<br>
		<label class="form-label">nom_medecin</label>
		<input type="text" class="form-control" name="nom_medecin"/>
		<br>
        <input type="submit" class="btn btn-primary my-2"name="ajouter" value="ajouter disponibilite">	
    </form>
	</div>

	</div>
	</section>
	</body>
	</html>