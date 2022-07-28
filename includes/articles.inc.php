<h1>Articles</h1>

<?php

$sql_categories = "SELECT * FROM categories WHERE categories_id_categorie = 0 ORDER BY libelle";

$connexion_cat = new Sql();

$resultat_categorie = $connexion_cat->select($sql_categories);
//dump($resultat_categorie);
?>
    <div id="article_front">
    <ul>
	<?php for ($i = 0; $i < count($resultat_categorie); $i++) { ?>
	<li><?php
	    $menuCategories = "<a href=\"index.php?page=articles&amp;id_categorie=" . $resultat_categorie[$i]['id_categorie'] . "\">";
	    $menuCategories .= $resultat_categorie[$i]['libelle'];
	    $menuCategories .= "</a>";
	    echo $menuCategories;
	?></li>
	<?php } ?>
    </ul>
<?php
	if (isset($_GET['id_categorie'])) {
	    $id_categorie = $_GET['id_categorie'];
	    $sql_cat_by_artc = "SELECT * FROM articles WHERE id_categorie = $id_categorie ORDER BY designation";

	    $connexion_artc = new Sql();
	    $result_artc = $connexion_artc->select($sql_cat_by_artc);
?>
    <ul>
	<?php for ($i = 0; $i < count($result_artc); $i++) { ?>
	<li><?= $result_artc[$i]['designation']; ?></li>
	<?php } ?>
    </ul>
<?php }
