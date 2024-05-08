<?php require 'db.php';
	 $req = $db->prepare("SELECT * FROM datas WHERE sexe = 'Masculin' ");
	 $req->execute();
	 $data = $req->fetchAll();
	 $datas = array();
	 foreach ($data as $value) {
	 	$datas[] = array(
	 		'Niveau' => $value->niveau,
	 		'Mention' => $value->mention,
	 		'Status' => $value->status,
	 		'Nom' => $value->nom,
	 		'Prenom' => $value->prenom,
	 		'Sexe' => $value->sexe,
	 		'Date de naissance' => $value->date_de_naissance,
	 		'Lieu de naissance' => $value->lieu_de_naissance,
	 		'Adresse' => $value->adresse,
	 		'Pays de naissance' => $value->pays_de_naissance,
	 		'Nationalite' => $value->nationalite,
	 		'CIN' => $value->cin,
	 		'Date de delivrance' => $value->date_de_delivrance,
	 		'Lieu de delivrance' => $value->lieu_de_delivrance,
	 		'Nom du pere' => $value->nom_du_pere,
	 		'Nom de mere' => $value->nom_de_mere,
	 		'Email' => $value->email,
	 		'Telephone' => $value->telephone,
	 		'Numero de bordereau' => $value->numero_recu,
	 		'Nom de banque' => $value->nom_de_banque,
	 		'Date de paiement' => $value->date_de_paiement,
	 		'Numero inscription' => $value->numero_carteDEtudiant,
	 		'Date inscription' => $value->date_inscription
	 	);
	 }
require 'class.csv.php';
$name = 'etudiants-ESP-masculin'.date('d-m-Y');
CSV::export($datas, $name);
?>





