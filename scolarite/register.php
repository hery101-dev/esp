<?php session_start();
require_once 'class.admin.php';
if (Admin::log()) {
    
}else{
    header('Location: index.php');
    exit();
}
	require_once 'db.php';
			
	$use = '';
	$mail = '';
			if (isset($_SESSION['log']['pseudo'])) {
				$session_pseudo = $_SESSION['log']['pseudo'];

				$mila_select="SELECT * FROM users WHERE pseudo = ? ";

				$result = $db->prepare($mila_select);
				$result->execute([$session_pseudo]);
					$row = $result->fetch();
					$use = $row->pseudo;
					$mail = $row->email;
					$pass = $row->mdp;
			}
					
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Secpal-Administration - Ecole Supérieure Polytechnique d&#039;Antsiranana</title>
	<link rel="icon" href="../favicon.ico" type="image/x-icon" sizes="32x32">
	<link rel="stylesheet" type="text/css" href="./b4/css/bootstrap.min.css">
	<style type="text/css">
		label{
			font-size: 20px;
		}
	</style>
</head>
<body style="background-image: url('img/banner-bg.png'); background-repeat: no-repeat; ">
	<?php if (isset($_SESSION['register'])): ?>
		            <script type="text/javascript">
		                alert('<?php echo $_SESSION['register'];    
		                  unset($_SESSION['register']);  ?>');
		            </script>
  	<?php endif; ?>
	<div class="container">
		<h1 class="text-right">Réglage de compte</h1><br><br>
		<div class="row">

			<div class="col-lg-4 offset-lg-8">
				<form action="trait_register.php" method="POST" accept-charset="utf-8">
				
				    <div class="form-group">
				      <label>Pseudo ou Identifiant :</label>
				      <input type="text" class="form-control" name="pseudo" value="<?= $use ?>" required>
				    </div>
				
				  <div class="form-group">
				    <label>Address E-mail :</label>
				    <input type="email" class="form-control" name="email" value="<?= $mail ?>" required>
				  </div>
				  <div class="form-group">
				    <label>Nouveau Mot De Passe :</label>
				    <input type="password" class="form-control" name="mdp" required>
				  </div>
				  <div>
				  	<label>Retapez votre Du Mot De Passe :</label>
				  	<input type="password" class="form-control" name="mdp1" required>
				  </div><br>
				  <div class="form-group text-center">
				  	<button type="submit" name="register" class="btn btn-primary">Modifier</button><br>
				  	
				  </div>
				</form>			
			</div>
		</div>
	</div>

</body>
</html>