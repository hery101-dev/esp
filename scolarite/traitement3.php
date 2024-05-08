<?php if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (isset($_POST['login'])) {
	$error = null;
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Veuillez remplir les champs";
	}else{

		$pseudo = $_POST['username'];
		$pseudo = addslashes($pseudo);
		$pseudo = htmlspecialchars($pseudo);
		$pseudo = trim($pseudo);
		$pseudo = strip_tags($pseudo);

		$mdp = $_POST['password'];

		require_once 'db.php';
	
		$select = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
		$select->execute([$pseudo]);
		$data = $select->fetch();
		

		if ($data) {

		 $pass = $data->mdp;

			if ($mdp != $pass) {
				$error = "Mot de passe incorrect";
			}
			
		}else{
			$error = "Identifiant invalide";
		}
	}
		
	if ($error != null) {
		$_SESSION['error_admin'] = $error;
		header('Location: login.php');
		exit();
	}else{
		$_SESSION['log'] = array(
					'pseudo' => $pseudo,
					'mdp' => $mdp
				);
				header('Location: admin.php');
				exit();
	}
}
?>