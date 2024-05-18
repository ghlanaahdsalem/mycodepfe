<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php require_once('db.php');
	include('medecin_place.php'); ?>
	<h4> modfier dossier_patient </h4>
	<?php
    if(isset($_POST['modifier'])){
      $nom_patient = $_POST['nom_patient'];
	   $prenom_patient = $_POST['pernom_patient'];
	   $num_national = $_POST['num_national'];
	   $date_naissance = $_POST['date_naissance'];
	   $date_consultation = $_POST['date_consultation'];
	   $jour_consultation = $_POST['jour_consultation'];
	   $descrip_maladie_patient = $_POST['descrip_maladie_patient'];
	   $taille_patient = $_POST['taille_patient'];
	    $poids_patient = $_POST['poids_patient'];
		 $prochaine_rdv = $_POST['prochaine_rdv'];
	   if((!empty($date_consultationion)) && (!empty($prochaine_rdv)) && (!empty($descrip_maladie_patient) ) && (!empty($nom_patient))){
	      require_once('db.php');
	     $query = "UPDATE rendezvous_confirmee SET nom_patient=? ,pernom_patient=? ,num_national=? ,date_naissance=? ,nom_patient=? ,date_consultation=? ,
		 jour_consultation=? ,descrip_maladie_patient=? ,taille_patient =?,poids_patient=?, prochaine_rdv=? WHERE id=?";
		 $sqlState = $pdo->prepare($query);
	     $sqlState->execute([$nom_patient, $prenom_patient,$num_national,$date_naissance, $date_consultation,$jour_consultation,$descrip_maladie_patient,
		 $taille_patient,$poids_patient,$prochaine_rdv]);
		 
	    header ("location:gerer_dossiers_patients.php");
	   }
	  
	}
?>
<section id="appnt">
 <div class="container">
 <div>
    <form  method="post" enctype="multipart/form-data" id="formulaire">
	 <label class="form-label">nom_patient</label>
		<input type="text" class="form-control" name="nom_patient" /> 
		<br>
		 <label class="form-label">prenom_patient</label>
		<input type="text" class="form-control" name="prenom_patient" /> 
		<br>
		 <label class="form-label">num_national</label>
		<input type="text" class="form-control" name="num_national" /> 
		<br>
        <label class="form-label" >date_naissance</label>
        <input type="date" name="date_naissance" />
        <br>
		<label class="form-label" >date_consultation</label>
        <input type="date" name="date_consultation" />
        <br>
        <label class="form-label">jour_consultation</label>
		<input type="text" class="form-control" name="jour_consultation" /> 
		<br>
		<label class="form-label">descrip_maladie_patient</label>
		<input type="text" class="form-control" name="descrip_maladie_patient"/>
		<br>
		<label class="form-label">taille_patient</label>
		<input type="number" class="form-control" name="taille_patient"/>
		<br>
		<label class="form-label">poids_patient</label>
		<input type="number" class="form-control" name="poids_patient"/>
		<br>
		<label class="form-label">prochaine_rdv</label>
		<input type="date" class="form-control" name="prochaine_rdv"/>
		<br>
        <input type="submit" class="btn btn-primary my-2"name="ajouter" value="ajouter un rendez_vous">	
    </form>
	</div>
	</div>
	</section>
	</body>
	</html>