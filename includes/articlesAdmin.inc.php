<?php

if (verifierAdmin()) {
	if ($pdo = pdo()) {
		$champ = $_GET['champ'] ?? "designation";
		$orderby = $_GET['orderby'] ?? "asc";
		$sql = "SELECT * FROM articles ORDER BY $champ $orderby"; ?>
	<table id="articles">
	<thead>
	 <tr>
	 <th><?= genererUrl('categories', 'categorie', $champ, $orderby); ?></th>
	 <th>Référence</th>
	 <th><?= genererUrl('Désignation', 'designation', $champ, $orderby); ?></th>
	 <th><?= genererUrl('PUHT', 'puht', $champ, $orderby) ?></th>
	 <th>Taux de TVA</th>
	 <th>Masse</th>
	 <th>id_article</th>
	 <th><?= genererUrl('Quantité en stock','qtestock', $champ, $orderby); ?></th>
	 <th>Stock de sécurité</th>
	 <th colspan="2">Opérations</th>
	 </tr>
	</thead>
	<tbody>
	<?php $articles = $pdo->query($sql)->fetchAll();
	foreach ($articles as $article) { ?>
	 <tr>
	 <td><?= $article['id_categorie']; ?></td>
	 <td><?= $article['reference']; ?>
	 <td><a href="index.php?page=articleDetailAdmin&amp;articleId='<?= $article['id_article']; ?>'"> <?= $article['designation']; ?></a></td>
	 <td><?= $article['puht']; ?></td>
	 <td><?= $article['id_tva']; ?></td>
	 <td><?= $article['masse']; ?></td>
	 <td><?= $article['id_article']; ?></td>
	 <td><?= $article['qtestock']; ?></td>
	 <td><?= $article['qtestockesecu']; ?></td>
	 <td><a href="index.php?page=articleSupp&amp;articleId=<?= $article['id_article'] ?>">Supprimer</a></td>
	 <td><a href="index.php?page=articleEdit&amp;articleId='<?= $article['id_article'] ?>'">Editer</a></td>
	<?php } ?>
	</body>
	</table>
	<?php } else { ?>
	<p>Erreur PDO</p>
	<?php }
	} else { ?>
	<p> Vous allez être redirigé dans 5 secondes <br /> Si la redirection n'est pas automatique, <a href="localhost:index.php">cliquez ici!</a></p>
	<script>
		setTimeout(function() {
		    window.location.replace('http://localhost:8000');
		}, 5000);
	</script>
<?php } ?>
	<label for="addArticle">Ajouter des articles</label>
	<input type="button" id="addArticle" name="addArticle" value="Bouton ajout" >
