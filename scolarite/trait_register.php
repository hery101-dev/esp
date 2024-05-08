<?php 

if (isset($_POST['register'])) {
		$ps = htmlspecialchars_decode($_POST['pseudo']);
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];
		$mdp1 = $_POST['mdp1'];	
		$error = null;	
	if (empty($ps) || empty($email) || empty($mdp) || empty($mdp1)) {
		$error = "Veuillez remplir les champs";
	}else{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "E-mail invalide";
		}else{
			if ($mdp != $mdp1) {
				$error = "Confirmer votre mot de passe";
			}else{
				//$passwordHash = password_hash($mdp1, PASSWORD_BCRYPT, ['cost' => 12]);
				session_start();
				if (!isset($_SESSION['log']['pseudo'])) {
					$error = "Veuillez vous connecter";
				}else{
					$session_pseudo = $_SESSION['log']['pseudo'];
					require_once 'db.php';
					$edit = "UPDATE users SET pseudo = '$ps', mdp = '$mdp1', email = '$email'  WHERE pseudo = ?";
					$stmt = $db->prepare($edit);
					$stmt->execute([$session_pseudo]);
				}
				
			}
		}
	}

	if ($error != null) {
		$_SESSION['register'] = $error;
		header('Location: register.php');
		exit();
	}else{
		$_SESSION['register'] = "Modification de compte avec succès";
		header("Location: admin.php");
		exit();
	}
				
}
?>