<?php
if (isset($_POST['submitted'])) {
	$email = isset($_POST['email']) ? htmlentities(trim($_POST['email'])) : "";
	$mdp1 = isset($_POST['mdp1']) ? htmlentities(trim($_POST['mdp1'])) :  "";
	$mdp2 = isset($_POST['mdp2']) ? htmlentities(trim($_POST['mdp2'])) :  "";

	$errors = [];
	if (mb_strlen($email) === 0)
		array_push($errors, "Veuillez saisir une adresse mail");
	elseif (!(filter_var($email, FILTER_VALIDATE_EMAIL)))
		array_push($errors, "Veuillez saisir une adresse mail conforme");
//	if (mb_strlen($mdp1) === 0 || mb_strlen($mdp2) === 0)
//		array_push($errors, "Veuillez rentrer votre mot de passe dans les deux champs!");
	if ($mdp1 !== $mdp2)
		array_push($errors, "Veuillez saisir deux fois le meme mot de passe!");

	if (count($errors) > 0)
		affich_eror($errors);
	else {
		if (verifier_utilisateur($email))
			supprimer($email);
		
	}
}

?>
	<h1>Login</h1>
	<form action="" method="post" class="wrap2" id="desinscription"  novalidate>
        	<label for="email" class="fondnoir">E-mail :</label>
        	<input class="input" type="email" name="email" id="email" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">
        	<span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
		
		<label for="mdp" class="fondnoir">Mot de Passe:</label>
		<input class="input" type="password" name="mdp" id="mdp" />
		<span class="error"><?php  ?></span>
		
		<label class="fondnoir"  for="mdp2">Verification Mot de Passe :</label>
		<input class="input" type="password" name="mdp" id="mdp" />
		<span class="error"><?php ?></span>
		
		<input class='input' id="submit" type="submit" name="submitted" value="Supprimer" >
	</form>
