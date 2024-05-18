<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('medecin_place.php'); ?>
	<h4> modifier disponibilite</h4>
	<?php
    if(isset($_POST['modifier'])){
      $date = $_POST['date'];
	  $heure = $_POST['heure'];
	   $jour = $_POST['jour'];
	    $disponibilite = $_POST['disponibilite'];
	    if((!empty($date)) && (!empty($heure)) && (!empty($disponibilite))){
		  
			   $query = "UPDATE rendez_vous SET date=? , heure=? , jour=? , disponibilite=? WHERE id=?";
	     $sqlState = $pdo->prepare($query);
	   $sqlState->execute([$date,$heure,$jour,$disponibilite,$id]);
	   header ("location:mes_disponibilites.php");}
	}
?>

    <form  method="post" enctype="multipart/form-data">
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
		<option>oui</option>
		<option>non</option>
        <input type="submit" class="btn btn-primary my-2"name="modifier" value="modifier disponibilite">	
    </form>
	
	</body>
	</html>
	</body>
	</html>