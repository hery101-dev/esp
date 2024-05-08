<?php require_once 'db.php';
$error = null;
if (isset($_GET['id'])) {

$get = $_GET['id'];	
$select = "SELECT * FROM data WHERE id = ?";
$req = $db->prepare($select);
$req->execute([$get]);
$data = $req->fetchAll();

	foreach ($data as $values) {
		//var_dump($values->nom);
		$select1 = "SELECT id FROM id_numero WHERE nom = ? AND prenom = ? AND sexe = ? AND telephone = ?";
			$sd = $db->prepare($select1);
			$sd->execute([
				 $values->nom,
				 $values->prenom,
				 $values->sexe,
				 $values->telephone
			]);
			$verify = $sd->fetch();

			if ($verify) {
				$error = "Déjà validée";
			}else{
				$req1 = "INSERT INTO id_numero(id_prim, status, nom, prenom, sexe, telephone) VALUES (?,?,?,?,?,?)";
				$stmt_req1 = $db->prepare($req1);
				$stmt_req1->execute([
					 $values->id,
					 $values->status,	
					 $values->nom,
					 $values->prenom,
					 $values->sexe,
					 $values->telephone
				]);
			}
	
	}



$select_id_num = $db->query("SELECT * FROM id_numero");
$data_select = $select_id_num->fetchAll();


$number = 1;
$digit = 3;
$numero_inscription='';
$date = date('y');
foreach ($data_select as $val) {
		if ($val->status == 'Nouveau') {
			if ( $val->sexe == 'F') {
				$inc = sprintf('%0'.$digit.'d',$number);
				$numero_inscription = "SIA".$date.'2'.$inc."ESP";
			}
			if ( $val->sexe == 'M') {
				$inc = sprintf('%0'.$digit.'d',$number);
				$numero_inscription = "SIA".$date.'1'.$inc."ESP";	
			}
		}else{
			if ( $val->sexe == 'F') {
				$inc = sprintf('%0'.$digit.'d',$number);
				$numero_inscription = "SIA".'00'.'2'.$inc."ESP";
			}
			if ( $val->sexe == 'M') {
				$inc = sprintf('%0'.$digit.'d',$number);
				$numero_inscription = "SIA".'00'.'1'.$inc."ESP";	
			}
		}
		$number++;
}


	foreach ($data as $value) {

		$select2 = "SELECT id FROM datas WHERE nom=? AND prenom=? AND sexe=? AND cin=?";

			$comp = $db->prepare($select2);
			$id = [
				$value->nom,
				$value->prenom,
				$value->sexe,
				$value->cin
			];
			$comp->execute($id);
			$ver = $comp->fetch();

		if ($ver) {
			$error = "Déjà validée";
		}else{
			$insert = "INSERT INTO datas(
			niveau, mention, status,
			nom, prenom, path_photo, sexe, 
			date_de_naissance, lieu_de_naissance, adresse,
			pays_de_naissance, nationalite, cin, date_de_delivrance,
			lieu_de_delivrance, nom_du_pere, nom_de_mere, tuteur, email, telephone,
			numero_recu, nom_de_banque, date_de_paiement, numero_cartedetudiant, date_inscription
		) 
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $db->prepare($insert);
		$tab_data = [
				 $value->niveau,
		 	     $value->mention,
		 		 $value->status,
		 		 $value->nom,
		 		 $value->prenom,
		 		 $value->path_photo,
		 		 $value->sexe,
		 		 $value->date_de_naissance,
		 		 $value->lieu_de_naissance,
		 		 $value->adresse,
		 		 $value->pays_de_naissance,
		 		 $value->nationalite,
		 		 $value->cin,
		 		 $value->date_de_delivrance,
		 		 $value->lieu_de_delivrance,
		 		 $value->nom_du_pere,
		 		 $value->nom_de_mere,
		 		 $value->tuteur,
		 		 $value->email,
		 		 $value->telephone,
		 		 $value->numero_recu,
		 		 $value->nom_de_banque,
		 		 $value->date_de_paiement,
		 		 $numero_inscription,
		 		 $value->date_inscription

		];
		$stmt->execute($tab_data);
		}
	}

session_start();
if ($error != null) {
	$_SESSION['validation'] = $error;
	header('Location: admin.php');
	exit();
}else{
	$_SESSION['valide'] = "Validée";
	header('Location: admin.php');
	exit();
}

}
header('Location: admin.php');
exit();
?>