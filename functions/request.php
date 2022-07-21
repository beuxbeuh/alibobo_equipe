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

function getAllProduct($tables = 'articles', $where = 'DESC')
{
	if ($pdo = pdo()) {
		$sql = "SELECT * FROM $tables ORDER BY designation $where";
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
