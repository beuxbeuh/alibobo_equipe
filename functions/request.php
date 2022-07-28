<?php

function getProduct($id_article, string $tables = '')
{
    if ($pdo = pdo()) {
//	echo 'pdo reussit';
        if ($tables == '')
                return(404);
        $sql = "SELECT * FROM $tables WHERE id_article = $id_article";
        $query = $pdo->prepare($sql);
        $query->execute();
    }
    return $query->fetch();
}


function getJointure(int $id_article,array $tables = [])
{
    if ($pdo = pdo()) {
        if ($tables === [])
                return(404);
        $sql = "SELECT * FROM $tables[0] LEFT JOIN $tables[1] ON $tables[0].id_categorie = $tables[1].id_categorie LEFT JOIN $tables[2] ON $tables[0].id_tva = $tables[2].id_tva WHERE id_article = $id_article";
	$query = $pdo->prepare($sql);
        $query->execute();
    }
    return $query->fetch();
}

function exe_sql(string $sql)
{
    dump($sql);
    if ($pdo = pdo()) {
	$query = $pdo->prepare($sql);
	$query->execute();
    }
    return $query->fetch();
}

function getAllProduct($tables = 'articles', $weh = 'designation', $where = 'ASC')
{
	if ($pdo = pdo()) {
		$sql = "SELECT * FROM $tables ORDER BY $weh $where";
		$query = $pdo->prepare($sql);
		$query->execute();
	}
        return $query->fetchAll();
}

function countArticle($tables = 'articles', $option = '')
{
        global $pdo;
        $sql = "SELECT COUNT(id) FROM $tables $option";
        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchColumn();
}

function abort404() {
        header('HTTP/1.0 404 Not Found');
        header('Location: 404.php');
}

/*
UPDATE `articles` SET `designation` = 'Anan\'ass', `description` = 'un magnifique ananas tres feuillue et bon a croquer', `puht` = '6', `reference` = 'Ananas cosmosu', `qtestock` = '16', `qtestockesecu` = '5', `masse` = '7000', `id_tva` = '2' WHERE `articles`.`id_article` = 1
µ*/
