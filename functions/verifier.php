<?php

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
