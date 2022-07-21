<?php

// dump($_GET);
if (!empty($_GET['articleId'])) {
	$id_article = $_GET['articleId'];
	$article = getProduct($id_article, 'articles');
	if (empty($article))
		abort404();
} else
	abort404();
debug($article);

include ('includes/frmEdit.php');
