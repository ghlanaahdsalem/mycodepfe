<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('medecin_place.php'); ?>
	<div>
	<table class="table table=striped table-hover" id="grande_boite">
  <tr>
  <th> id </th>
  <th>nom_patient</th>
  <th>prenom_patient</th>
  <th>num_national</th>
  <th>date_naissance</th>
  <th> date_consultation </th>
  <th> jour_consultation </th>
  <th>descrip_maladie_patient</th>
  <th>taille_patient</th>
  <th>poids_patient</th>
  <th>prochaine_rdv</th>
  <th> action</th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM dossiers_patients')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['id'] ?></td>
			<td><?php echo $value['nom_patient'] ?></td>
            <td><?php echo $value['prenom_patient'] ?></td>
            <td><?php echo $value['num_national'] ?></td>
			<td><?php echo $value['date_naissance'] ?></td>
			<td><?php echo $value['date_consultation'] ?></td>
			<td><?php echo $value['jour_consultation'] ?></td>
			<td><?php echo $value['descrip_maladie_patient'] ?></td>
			<td><?php echo $value['taille_patient'] ?></td>
			<td><?php echo $value['poids_patient'] ?></td>
			<td><?php echo $value['prochaine_rdv'] ?></td>
			<td>
			<a href="modifier_dossier_patient.php?id=<?php echo $value['id']?>" class="btn">modifier</a>
			<a href="supprimer_dossier_patient.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer');" class="btn">supprimer</a></td>
			</tr>
		<?php
		}
?>
</tbody>
  </table>
 </div>
		</body>
	</html>