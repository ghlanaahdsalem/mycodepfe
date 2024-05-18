<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil | Cabinet médical</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<?php include('administrateur.php'); ?>
	<div>
	<table class="table table=striped table-hover" id="grande_boite">
  <tr>
  <th>id</th>
  <th>civilite</th>
  <th>nom</th>
  <th> prenom</th>
  <th> specialite </th>
  <th> image </th>
  </tr>
  </thead>
  <tbody>
  <?php
        require_once('db.php');
        $values = $pdo->query(  'SELECT * FROM medecin')->fetchAll(  PDO::FETCH_ASSOC);
		foreach($values as $value){
			?>
			<tr>
			<td><?php echo $value['id'] ?></td>
            <td><?php echo $value['civilite'] ?></td>
            <td><?php echo $value['nom'] ?></td>
			<td><?php echo $value['prenom'] ?></td>
			<th><?php echo $value['specialite'] ?> </td>
			<td><img src="<?php echo $value['image'] ?>" width="100" ></td>
			<td>
			<a href="modifier_medecin.php?id=<?php echo $value['id']?>" class="btn">modifier</a>
			<a href="supprimer_medecin.php?id=<?php echo $value['id']?>" onclick="return confirm('vouler vous supprimer ');" class="btn">supprimer</a>
		<?php
		}
?>
</tbody>
  </table>
 </div>
		</body>
	</html>