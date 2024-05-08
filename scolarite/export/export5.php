<style type="text/css">
	td{
		height: 50px;
		width: 100px;
	}
</style>
<?php 
require_once '../db.php';
	$output = '';
	$query = $db->query("SELECT * FROM datas WHERE niveau = 5");
	$f = $query->fetchAll();
	if ($f) {
		
	
		$output .='
		<strong style="text-align: center;">TOUS LES ETUDIANTS EN ESP</strong>
			<table border="2">
				<thead>
					<th  style="width: 100px;"><strong>NIVEAU</strong></th>
					<th  style="width: 100px;"><strong>MENTION</strong></th>
					<th  style="width: 100px;"><strong>STATUS</strong></th>
					<th  style="width: 100px;"><strong>NOM</strong></th>
					<th  style="width: 100px;"><strong>PRENOM(S)</strong></th>
					<th  style="width: 250px;"><strong>PHOTO</strong></th>
					<th  style="width: 100px;"><strong>SEXE</strong></th>
					<th  style="width: 100px;"><strong>DATE DE NAISSANCE</strong></th>
					<th  style="width: 100px;"><strong>LIEU DE NAISSANCE</strong></th>
					<th  style="width: 100px;"><strong>ADRESSE</strong></th>
					<th  style="width: 100px;"><strong>PAYS DE NAISSANCE</strong></th>
					<th  style="width: 100px;"><strong>NATIONALITE</strong></th>
					<th  style="width: 100px;"><strong>CIN</strong></th>
					<th  style="width: 100px;"><strong>DATE DE DELIVRANCE</strong></th>
					<th  style="width: 100px;"><strong>LIEU DE DELIVRANCE</strong></th>
					<th  style="width: 100px;"><strong>NOM DU PERE</strong></th>
					<th  style="width: 100px;"><strong>NOM DE LA MERE</strong></th>
					<th  style="width: 100px;"><strong>EMAIL</strong></th>
					<th  style="width: 100px;"><strong>TELEPHONE</strong></th>
					<th  style="width: 100px;"><strong>NUMERO BORDEREAU</strong></th>
					<th  style="width: 100px;"><strong>NOM DE BANQUE</strong></th>
					<th  style="width: 100px;"><strong>DATE DE PAIEMENT</strong></th>
					<th  style="width: 100px;"><strong>NUMERO CARTE ETUDIANT</strong></th>
					<th  style="width: 100px;"><strong>DATE INSCRIPTION</strong></th>
				</thead>
				<tbody>
		';
	
		foreach ($f as $value) {

			$img = $value->path_photo;
			$output .= '
				<tr style="height: 150px; width: 200px;">
					<td>'.$value->niveau.'</td>
					<td>'.$value->mention.'</td>
					<td>'.$value->status.'</td>
					<td>'.$value->nom.'</td>
					<td>'.$value->prenom.'</td>
					<td><img src="http://localhost/esp/scolarite/photos/'.$img.'" height="100" width="100"  ></td>
					<td>'.$value->sexe.'</td>
					<td>'.$value->date_de_naissance.'</td>
					<td>'.$value->lieu_de_naissance.'</td>
					<td>'.$value->adresse.'</td>
					<td>'.$value->pays_de_naissance.'</td>
					<td>'.$value->nationalite.'</td>
					<td>'.$value->cin.'</td>
					<td>'.$value->date_de_delivrance.'</td>
					<td>'.$value->lieu_de_delivrance.'</td>
					<td>'.$value->nom_du_pere.'</td>
					<td>'.$value->nom_de_mere.'</td>
					<td>'.$value->email.'</td>
					<td>'.$value->telephone.'</td>
					<td>'.$value->numero_recu.'</td>
					<td>'.$value->nom_de_banque.'</td>
					<td>'.$value->date_de_paiement.'</td>
					<td>'.$value->numero_cartedetudiant.'</td>
					<td>'.$value->date_inscription.'</td>
				</tr>
			';
		}
		$output .= '</tbody></table>';
		header('Content-Type: application/force-download');
		header('Content-Description: File Transfer');
		header('Content-Disposition: attachment; filename= ETUDIANT-ESP.xls');
		header('Content-Transfer-Encoding: BINARY');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		echo "\xEF\xBB\xBF";

		echo $output;

	}
?>