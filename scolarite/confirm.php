<?php require_once 'db.php';
if (isset($_POST['etudiant'])) {
	$error = null;
	if (empty($_POST['nom']) || !isset($_POST['prenom']) || empty($_POST['pass'])) {

		$error = "Veuillez remplir les champs";

	}else{
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mdp = htmlspecialchars($_POST['pass']);
		$mdp = trim($mdp);
		$mdp = strip_tags($mdp);
		$mdp = strtolower($mdp);
 		
		$select = $db->prepare("SELECT * FROM resultat WHERE nom = ? AND prenom = ? AND code = ?");
		$secure_tab = [$nom,$prenom,$mdp];
		$select->execute($secure_tab);
		$f = $select->fetch();
		
		if (!$f) {
			$error = "Code Invalide, veuillez consulter votre résultat";			
		}else{

			session_start();
			$_SESSION['Auth'] = array(
				'nom' => $nom,
				'prenom' => $prenom,
				'code' => $mdp
				
				);
				
			header('Location: inscription.php');
			exit();
		}
		
	}
	if ($error != null) {
			$errors = "Code Invalide, veuillez consulter votre résultat";
			setcookie('etudiant', $errors, time()+1, '/');
			//$_SESSION['etudiant'] = $error;
			header('Location: index.php');
			exit();
	}
}
?>