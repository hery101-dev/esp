<?php require '../db.php';
	$s = "SELECT * FROM resultat";
	 $req = $db->prepare($s);
	 $req->execute();
	 $data = $req->fetchAll();
	 $datas = array();
	 foreach ($data as $value) {
	 	$datas[] = array(
	 		'Nom et Prénom(s)' => $value->nom,
			 'Prénom(s)' => $value->prenom,
	 		'Code' => $value->code,
	 	);
	 }
require '../class.csv.php';
$name = 'code-inscription-ESP-'.date('d-m-Y');
CSV::export($datas, $name);
?>





