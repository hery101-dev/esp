<?php if (isset($_GET['id'])): ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="initial-scale=1, minimum-scale=1.0, width=device-width" name="viewport">
	<meta name="robots" content="all,follow">
	<title>Etudiant - Ecole Supérieure Polytechnique d&#039;Antsiranana</title>
	<link rel="stylesheet" href="vendors/fomantic-ui/semantic.min.css">
  	<link rel="stylesheet" href="css/main.css">
  	<link rel="icon" href="../favicon.ico" type="image/x-icon" sizes="32x32">
</head>
<body>

 
	<div class="ui container centered grid">
        <div class="five wide computer sixteen wide tablet sixteen wide phone column" style="margin-top: 10%;">
            <form method="POST" accept-charset="utf-8" action="confirm.php">
            	<fieldset>
            		<legend><h2>Connexion étudiant</h2></legend><br>
              
                    
                    <div class="ui form">
                    	<label for="nom">NOM :</label>
                        <div class="field">
			         
			                                <?php 
			                                	$get = addslashes($_GET['id']);
			                                	$get = htmlspecialchars($get);
			                                	$get = trim($get);
			                                	$get = strip_tags($get);
			                                	$get = strtolower($get);
			                                	require_once 'db.php';
			                                 	$s = $db->prepare("SELECT * FROM resultat WHERE id = ?");
			                                	$s->execute([$get]);
			                                	$fetch = $s->fetch();
			                                  ?>
			             	<input name="nom" id="nom" placeholder="Votre Nom Complet" value="<?= $fetch->nom ?>" type="text" required readonly>     
			            </div>
			            <label for="prenom">PRENOM(S) :</label>
			            <div class="field">
			            	<input name="prenom" id="prenom" placeholder="Votre Prénom(s)" value="<?= $fetch->prenom ?>" type="text" required readonly>
			            </div>
			            <label for="pass">CODE :</label>
                        <div class="field">
                            <input name="pass" id="pass" minlength="6" maxlength="6" placeholder="Entrer votre code" type="password" required>
                        </div>
                    </div>  
                    <br>
                    <button type="submit" name="etudiant" style="width: 100%;" class="ui blue button">
                        <i class="sign in alternate icon"></i>
                      CONNEXION
                    </button>
                    <br><br>
              
                </fieldset>
            </form>
        </div>
    </div>


</body>
</html>
<?php endif; ?>