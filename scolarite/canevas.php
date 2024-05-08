<?php require 'db.php';
	 $req = $db->prepare("SELECT * FROM data");
	 $req->execute();
	 $data = $req->fetchAll();
	 $datas = array();
	 $nom = '<strong>NOM</strong>';
	 foreach ($data as $value) {
	 	$datas[] = array(
	 		'NOM' => $value->nom,
	 		'PRENOM(S)' => $value->prenom,
	 		'SEXE' => $value->sexe,
	 		'DATE DE NAISSANCE' => $value->date_de_naissance,
	 		'CIN' => $value->cin,
	 		'Date de delivrance' => $value->date_de_delivrance,
	 		'NATIONALITE' => $value->nationalite,
	 		'ANNEE D OBTENTION DU BACC' => $value->ob_bacc,
	 		'SERIE DU BACC' => $value->serie_bacc,
	 		'CODE DE REDOUBLEMENT' => $value->vide,
	 		'BOURSIER' => $value->vide,
	 		'TAUX DE BOURSE' => $value->vide,
	 		'ADRESSE EXACTE' => $value->adresse,
	 		'NUMERO DE TELEPHONE' => $value->telephone,
	 		'Institution' => $value->vide,
	 		'Domaine' => $value->vide,
	 		'Type de formation' => $value->vide,
	 		'Semestre' => $value->vide,
	 		'Adresse e-mail' => $value->email
	 	);
	 }
require 'class.csv.php';
$name = 'Canevas inscription 2022-2023';
CSV::export($datas, $name);
?>





