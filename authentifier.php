<?php
  session_start();
  
  if(isset($_SESSION['user'])){
	  $connect = $_SESSION['user'];
  if($connect == 'admin'){
	  header("location:administrateur.php");
  }
  elseif($connect == 'patient'){
	   header("location:page_pricipale.php");
  }
   elseif($connect == 'medecin'){
	   header("location:medecin_place.php");
  }
   elseif($connect == 'secretaire'){
	   header("location:secretaire_place.php");
  }
  }
  ?>