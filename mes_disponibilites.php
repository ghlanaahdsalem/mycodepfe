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
  <th>date</th>
  <th>heure</th>
  <th>jour</th>
  <th> disponibilite </th>
  <th> nom_medecin </th>
  <th> action</th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM rendez_vous')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['id'] ?></td>
			<td><?php echo $value['date'] ?></td>
            <td><?php echo $value['heure'] ?></td>
            <td><?php echo $value['jour'] ?></td>
			<td><?php echo $value['nom_medecin'] ?></td>
			<td><?php echo $value['disponibilite'] ?></td>
			<td>
			<a href="modifier_dispo.php?id=<?php echo $value['id']?>" class="btn">modifier</a>
			<a href="supprimer_dispo.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer');" class="btn">supprimer</a></td>
			</tr>
		<?php
		}
?>
</tbody>
  </table>
 </div>
		</body>
	</html>