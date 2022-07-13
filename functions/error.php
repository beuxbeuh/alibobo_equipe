<?php

function affich_eror($tab)
{
	$message = '<ul>';
	for ($i = 0; $i < count($tab); $i++) {
		$message .= '<li>';
		$message .= $tab[$i];
		$message .= '</li>';
	}
	$message .= '</ul>';
	debug($message);
}

function supprimer($email)
{
	if ($pdo = pdo()) {
		$sql = "UPDATE utilisateurs SET compte_actif = 0 WHERE email = '$email'";
		$query = $pdo->prepare($sql);
//		$query->bindValue('$email', $email, PDO::PARAM_STR);
		$query->execute();
		return $query->fetch();
	}
}

function gestion_erreur($tab)
{

}
