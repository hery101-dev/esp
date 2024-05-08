<?php if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
	require_once 'class.ins.php';
	require_once 'db.php';

	if (isset($_POST['submit'])&&isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]&&isset($_SESSION['Auth']['code'])) {
		$code = $_SESSION['Auth']['code'];
		$error = null;

		
		if (
			empty($_POST['niveau'])||empty($_POST['status'])
			||empty($_POST['nom'])|| empty($_FILES['photo']['name'])||empty($_POST['sexe'])
			||empty($_POST['datenaissance'])||empty($_POST['lieunaissance'])||empty($_POST['villenaissance'])
			||empty($_POST['adresse'])
			||empty($_POST['paysnaissance'])|| empty($_POST['nationalite'])
			||empty($_POST['email'])||empty($_POST['phone'])
			//||empty($_POST['recu'])||empty($_POST['banque'])||empty($_POST['daterecu'])
		   ) {
			
			$error = "Veuillez remplir les champs";

		}else{	

		$dirName = "./photos/";
		$currentFileName = $_FILES['photo']['name'];
		$fileExtension = strtolower(pathinfo($currentFileName, PATHINFO_EXTENSION));
		$newFileName = "file-".time().".".$fileExtension;
		$uploadDir = $dirName.$newFileName;
		$move = move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir);

		

			$nom = strtoupper(htmlspecialchars_decode($_POST['nom']));
			$prenom = ucwords(htmlspecialchars_decode($_POST['prenom']));
			$lieunaissance = strtoupper(addslashes(htmlspecialchars_decode($_POST['lieunaissance'])));
			$villenaissance = strtoupper(addslashes(htmlspecialchars_decode($_POST['villenaissance'])));
			$nationalite = ucfirst(addslashes(htmlspecialchars_decode($_POST['nationalite'])));
			$adresse = strtoupper(addslashes(htmlspecialchars_decode($_POST['adresse'])));
			$cin = addslashes(htmlspecialchars_decode($_POST['cin']));
			$lieucin = strtoupper(addslashes(htmlspecialchars_decode($_POST['lieucin'])));
			$pere = strtoupper(addslashes(htmlspecialchars_decode($_POST['pere'])));
			$mere = strtoupper(addslashes(htmlspecialchars_decode($_POST['mere'])));
			$tuteur = strtoupper(addslashes(htmlspecialchars_decode($_POST['tuteur'])));
			$phone = addslashes(htmlspecialchars_decode($_POST['phone']));
			//$recu = addslashes(htmlspecialchars_decode($_POST['recu']));
			$email = addslashes(htmlspecialchars_decode($_POST['email']));
			$ob_bacc = addslashes(htmlspecialchars_decode($_POST['ob_bacc']));
			$serie_bacc = addslashes(htmlspecialchars_decode($_POST['serie_bacc']));
			$sexe = $_POST['sexe'];


			$select1 = "SELECT * FROM data WHERE code = ?";

			$data = $db->prepare($select1);
			$data->execute([$code]);
			$ver = $data->fetch();

				if ($ver) {

					$error = "Vous êtes déjà inscrit";


				}else{

				if (isset($_POST['mineur'])) {
					if ($_POST['mineur'] != "mineur") {
						if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

							$error = "E-mail invalide";

						}else{

							if ($move) {
								
								$req = "INSERT INTO data(
								niveau, mention, status,
								nom, prenom, path_photo, sexe, 
								date_de_naissance, lieu_de_naissance, ville_de_naissance,adresse,
								pays_de_naissance, nationalite, cin, date_de_delivrance,
								lieu_de_delivrance, nom_du_pere, nom_de_mere, tuteur,
								email, telephone, ob_bacc, serie_bacc, code
								)

								VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

								$stmt = $db->prepare($req);
								$insert1 = [
								$_POST['niveau'],$_POST['mention'],$_POST['status'],
								$nom,$prenom,$newFileName,$_POST['sexe'],
								$_POST['datenaissance'],$lieunaissance,$villenaissance,$adresse, 
								$_POST['paysnaissance'],$nationalite,
								$cin, $_POST['datecin'], $lieucin, 
								$pere, $mere, $tuteur,
								$_POST['email'], $phone, $ob_bacc, $serie_bacc,
								//$recu, $_POST['banque'], $_POST['daterecu'],
								$code
								
								];
								$stmt->execute($insert1);
							}else{
								$error = "Photo invalide";
							}

						}
					}else{
						if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

							$error = "E-mail invalide";

						}else{

							if ($move) {
				
								$req = "INSERT INTO data(
								niveau, mention, status,
								nom, prenom, path_photo,sexe, 
								date_de_naissance, lieu_de_naissance, ville_de_naissance, adresse,
								pays_de_naissance, nationalite, cin, 
								nom_du_pere, nom_de_mere, tuteur,
								email, telephone, ob_bacc, serie_bacc, code
								)
								 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

								$stmt = $db->prepare($req);
								$insert2 = [
								$_POST['niveau'],$_POST['mention'],$_POST['status'],
								$nom,$prenom,$newFileName,$_POST['sexe'],
								$_POST['datenaissance'],$lieunaissance,$villenaissance,$adresse, 
								$_POST['paysnaissance'],$nationalite,
								$_POST['mineur'], 
								$pere, $mere, $tuteur,
								$_POST['email'], $phone, $ob_bacc, $serie_bacc,
								//$recu, $_POST['banque'], $_POST['daterecu'],
								$code
								];
								$stmt->execute($insert2);
							}else{
								$error = "Photo invalide";
							}

						}
					}
				}
				}
				
			}
			
       if ($error != null) {
	        $_SESSION['message'] = $error;
	        header('Location: inscription.php');
	        exit();
       }else{
	        $success = "Votre inscription a été enregistrée";
	        setcookie('SUCCESS', $success, time()+1, '/');
	        header('Location: edit.php');
	        exit();
          
       }
		
		
	}else{
		$captcha = "Le code captcha entré ne correspond pas! Veuillez réessayer.";
		setcookie('ERROR', $captcha, time()+1, '/');
		header('Location: inscription.php');
		exit();
	}
?>