<?php
  session_start();
  $connect = false ;
  if(isset($_SESSION['secretaire_connect'])){
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
		    <li id="Bouton"><a href="secretaire_place.php">Accueil</a></li>
			 <?php 
		     if($connect){
				 ?>
			<li id="Bouton"><a href="liste_patientS.php">listes patients</a></li>
			<li id="Bouton"><a href="liste_rendez_vous.php">liste de rendez_vous prise par patient</a></li>
			<li id="Bouton"><a href="liste_rendez_vous_dispo.php">liste de disponibilites de medecin</a></li>
			<li id="Bouton"><a href="liste_rendez_vous_confirme.php">liste rendez_vous confirme</a></li>
			<li id="Bouton"><a href="ajouter_rendez_vous.php"> ajouter rendez_vous</a></li>
			<li id="Bouton"><a href="deconnexion_secretaire.php">Deconnexion</a></li>
			 <?php
			 }else{
				 ?>
			<li id="Bouton"><a href="connexion_secretaire.php">connexion</a></li>
			 <?php
			 }
		 ?>
		</ul>
		
	</body>
	</html>