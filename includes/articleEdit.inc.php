<?php

// dump($_GET);
if (!empty($_GET['articleId'])) {
	verif_id($_GET['articleId'], 'article'); // tables sans 's' pour concatenation
	$id_article = settype($_GET['articleId'], 'int');
	$article = getProduct($id_article, 'articles');
	$jointure = getJointure($id_article, ['articles', 'categories', 'tva']);
	$tvaS = getAllProduct('tva', 'id_tva', 'DESC');
	$categories = getAllProduct('categories', 'id_categorie', 'DESC');
//	dump($tvaS);
	if (empty($article))
		abort404();
	$error = [];
	if (!empty($_POST['submitted'])) {
	    $designation = cleanXss($_POST['designation']);
	    $description = cleanXss($_POST['description']);
	    $puht = cleanXss($_POST['puht']);
	    $reference = cleanXss($_POST['reference']);
	    $qtestock = cleanXss($_POST['qtestock']);
	    $qtestockesecu = cleanXss($_POST['qtestockesecu']);
	    $masse = cleanXss($_POST['masse']);
	    cleanXss($_POST['id_categorie']);
	    cleanXss($_POST['id_tva']);
	    if (count($error) === 0)
		echo 'pas d\'erreur';
	}

} else
	abort404();


include ('includes/frmEdit.php');
