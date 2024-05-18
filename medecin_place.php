<?php
  session_start();
  $connect = false ;
  if(isset($_SESSION['medecin_connect'])){
	  $connect = true;
  }
  ?>
 <html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
          <ul class="Menu">
		    <li id="Bouton"><a href="medecin_place.php">Accueil</a></li>
			 <?php 
		     if($connect){
				 ?>
			<li id="Bouton"><a href="liste_patientM.php">listes patients</a></li>
			<li id="Bouton"><a href="rendez_vous.php">creer disponibilite</a></li>
			<li id="Bouton"><a href="mes_disponibilites.php">Mes disponibilites</a></li>
			<li id="Bouton"><a href="ajouter_dossier_patient.php">Ajoute dossier patient</a></li>
			<li id="Bouton"><a href="gerer_dossiers_patients.php">gerer dossiers patients</a></li>
			<li id="Bouton"><a href="deconnexion_medecin.php">Deconnexion</a></li>
			 <?php
			 }else{
				 ?>
			<li id="Bouton"><a href="connexion_medecin.php">connexion</a></li>
			 <?php
			 }
		 ?>
		</ul>
		
	</body>
	</html>