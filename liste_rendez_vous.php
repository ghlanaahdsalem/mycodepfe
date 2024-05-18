 <html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('secretaire_place.php'); ?>
	<div>
	<table class="table table=striped table-hover" id="grande_boite">
  <tr>
  <th>date</th>
  <th>heure</th>
  <th>jour</th>
  <th> nom_medecin </th>
  <th> nom_patient </th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM prise_rendezvous')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['date'] ?></td>
            <td><?php echo $value['Heure'] ?></td>
            <td><?php echo $value['jour'] ?></td>
			<td><?php echo $value['nom_medecin'] ?></td>
			<td><?php echo $value['nom_patient'] ?></td>
			</tr>
		<?php
		}
?>
</tbody>
  </table>
 </div>
		</body>
	</html>