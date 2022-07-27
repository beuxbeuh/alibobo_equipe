<?php

function verif_id(string $id, string $tables): bool // le nom des tables sans's' pour pouvoir concatener id_tables
{
    if (!empty($id) && $pdo = pdo()) {
	$itable = 'id_' . $tables . '';
	$tables .= 's';
	$sql = "SELECT COUNT(*) FROM $tables WHERE $itable = $id";
//	dump($sql);	dump($itable);
	$query = $pdo->prepare($sql);
	$query->execute();
	$bolean = $query->fetchAll();
//	dump($bolean[0]['COUNT(*)']);
	if ($bolean[0]['COUNT(*)'] === 1) {
//		echo 'OK';
		return true;
	} else
		return false;
    }
}

function verifierLogin(string $email, string $motdepasse) {
    if ($pdo = pdo()) {
        if (verifierUtilisateur($email)) {
            $recupMdp = "SELECT mdp FROM utilisateurs WHERE email='$email'";
            $resultRecupMdp = $pdo->query($recupMdp);
            $mdpBDD = $resultRecupMdp->fetchAll();
            $mdpBDD = $mdpBDD[0]['mdp'];
	    dump($mdpBDD);
	    dump(password_hash($motdepasse, PASSWORD_DEFAULT));

            if (password_verify($motdepasse, $mdpBDD))
                return true;
            else
                return false;

        } else {
            return false;
        }
    } else {
        return false;
    }
}

function verifierUtilisateur($email) {
    if ($pdo = pdo()) {
        $sql = "SELECT COUNT(*) FROM utilisateurs WHERE email='$email'";
        $reponse = $pdo->query($sql);
        $nbreLigne = $reponse->fetchColumn();
        if ($nbreLigne > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function verifierAdmin(): bool {
    if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] === 'admin') 
        return true;
    else
        return false;
}
