<?php if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
	require_once 'class.ins.php';
	require_once 'db.php';
	

			if (isset($_POST['edit'])&&isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]) {
				
				
				if (isset($_SESSION['Auth']['code'])) {
					$code = $_SESSION['Auth']['code'];
					$error = null;
					
					$select_compt = "SELECT * FROM compteur WHERE code = ?";
					$compt_prepare = $db->prepare($select_compt);
					$compt_prepare->execute([$code]);
					$update_1 = $compt_prepare->fetch();

					if ($update_1) {

						$error = "Vous avez déjà modifiée vos informations";

					}else{

				
							if (
								empty($_POST['niveau'])||empty($_POST['mention'])||empty($_POST['status'])
								||empty($_POST['nom'])||empty($_POST['sexe'])
								||empty($_POST['datenaissance'])||empty($_POST['lieunaissance'])||empty($_POST['villenaissance'])
								||empty($_POST['adresse'])
								||empty($_POST['paysnaissance'])|| empty($_POST['nationalite'])
								||empty($_POST['email'])||empty($_POST['phone'])
								//||empty($_POST['recu'])||empty($_POST['banque'])||empty($_POST['daterecu'])
							   ) {
								
								$error = "Veuillez remplir les champs";

							}else{	
								/*
							$dirName = "./photos/";
							$currentFileName = $_FILES['photo']['name'];
							$fileExtension = strtolower(pathinfo($currentFileName, PATHINFO_EXTENSION));
							$newFileName = "file-".time().".".$fileExtension;
							$uploadDir = $dirName.$newFileName;
							$move = move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir); */

							

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
								$ob_bacc = htmlspecialchars_decode($_POST['ob_bacc']);
								$serie_bacc = addslashes(htmlspecialchars_decode($_POST['serie_bacc']));
								$sexe = $_POST['sexe'];
								$niveau = $_POST['niveau'];
								$mention = $_POST['mention'];
								$status = $_POST['status'];
								$datenaissance = $_POST['datenaissance'];
								$paysnaissance = $_POST['paysnaissance'];
								$datecin = $_POST['datecin'];
									
													if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
														$error = "E-mail invalide";
													}else{
														$req = "UPDATE data SET
													niveau ='$niveau', mention ='$mention', status = '$status',
													sexe = '$sexe', date_de_naissance = '$datenaissance', lieu_de_naissance = '$lieunaissance', 
													ville_de_naissance = '$villenaissance',adresse = '$adresse',
													pays_de_naissance = '$paysnaissance', nationalite = '$nationalite', cin = '$cin', 
													date_de_delivrance = '$datecin',
													lieu_de_delivrance = '$lieucin', nom_du_pere = '$pere', nom_de_mere = '$mere', tuteur = '$tuteur',
													email = '$email', telephone = '$phone', ob_bacc = '$ob_bacc', serie_bacc = '$serie_bacc' WHERE code = ? ";

													$stmt = $db->prepare($req);
													$stmt->execute([$code]);
													}
													

							}
						$compt = "INSERT INTO compteur(code) VALUES (?)";
						$compt1 = $db->prepare($compt);
						$compt1->execute([$code]);		
				
					}


				}

			       if ($error != null) {
				        $_SESSION['message'] = $error;
				        header('Location: edit.php');
				        exit();
			       }else{
				        $success = "Vos informations ont été modifiée avec succès";
				        setcookie('SUCCESS1', $success, time()+1, '/');
				        header('Location: index.php');
				        exit();
			          
			       }
					
						
				}else{
					$captcha = "Le code captcha entré ne correspond pas! Veuillez réessayer.";
					setcookie('ERROR', $captcha, time()+1, '/');
					header('Location: edit.php');
					exit();
				}
	

?>