<?php 
require_once '../db.php';

if (isset($_POST['submit'])) {
	require_once 'PHPExcel/PHPExcel.php';
	require_once 'PHPExcel/PHPExcel/IOFactory.php';

	$error = null;

	$file_info = $_FILES['doc']['name'];

	//$ext = pathinfo($file_info, PATHINFO_EXTENSION);


	$file_directory = "upload/";
	$new_file_name = date('d-m-Y').".".$file_info;

	$move = move_uploaded_file($_FILES['doc']['tmp_name'], $file_directory.$new_file_name);

	if ($move) {
		$file_type = PHPExcel_IOFactory::identify($file_directory.$new_file_name);

		$objReader = PHPExcel_IOFactory::createReader($file_type);
		$objPHPExcel = $objReader->load($file_directory.$new_file_name);

		$sheet_data = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

		foreach ($sheet_data as $row) {

			if (!empty($row['A']) && isset($row['B'])) {
			
				$row1 = htmlspecialchars_decode($row['A']);
				
				$row2 = htmlspecialchars_decode($row['B']);
				//$row3 = ucfirst(htmlspecialchars_decode($row['C']));
				//$row = $row1." ".$row2;
				$code = strtolower(substr(md5(uniqid().rand(0,10000)), 0, 3));
				
				$code = $code.'esp';
					$insert = "INSERT INTO resultat(nom, prenom, code) VALUES(?, ?, ?)";
					$req = $db->prepare($insert);
					$req->execute([$row1, $row2, $code]);
					$success = "Données importer avec succès !";
				
				
			}
		}
	}
		session_start();
	if ($error != null) {
		$_SESSION['err'] = $error;
		header('Location: ../admin.php');
		exit();
	}else{
		$_SESSION['err'] = " Veuillez importer à nouveau !";
		$_SESSION['err'] = $success;
		header('Location: ../admin.php');
		exit();
	}
}
?>

