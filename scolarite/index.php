<?php session_start();
?><!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="initial-scale=1, minimum-scale=1.0, width=device-width" name="viewport">
	<meta name="robots" content="all,follow">
	<title>Etudiant - Ecole Supérieure Polytechnique d&#039;Antsiranana</title>
	<link rel="icon" href="../favicon.ico" type="image/x-icon" sizes="32x32">
	<!-- inject:css -->
  	<link rel="stylesheet" href="vendors/fomantic-ui/semantic.min.css">
  	<link rel="stylesheet" href="css/main.css">
  	<!-- endinject -->
  	<!-- datatables:css -->
	<link rel="stylesheet" href="vendors/datatables.net/datatables.net-se/css/dataTables.semanticui.min.css">
	<link rel="stylesheet" href="vendors/datatables.net/datatables.net-responsive-se/css/responsive.semanticui.min.css">
	<link rel="stylesheet" href="vendors/datatables.net/datatables.net-buttons-se/css/buttons.semanticui.min.css">
	<!-- endinject -->

</head>
<body>
	<?php if (isset($_COOKIE['etudiant'])): ?>
            <script type="text/javascript">
                alert('<?php echo $_COOKIE['etudiant']; ?>');
            </script>
	<?php endif; ?>


    <?php if (isset($_COOKIE['SUCCESS1'])): ?>
            <script type="text/javascript">
                alert('<?php echo $_COOKIE['SUCCESS1'];  ?>');
            </script>
    <?php endif; ?>

   

	<div class="ui grid" id="resultat">
		
		<!-- BEGIN CONTEN -->
		<div class="centered floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<!--<h2><i class="table icon"></i>RESULTATS DES ETUDIANTS</h2> -->
						<!--div class="ui divider"></div-->
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<div class="ui positive message">
									<i class="close icon"></i>
									<div class="header">
										Message !
									</div>
									<p>Après avoir rechercher votre Nom et Prénom(s), cliquez !</p>
								</div>
								<h4></h4>
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="ui blue ribbon icon label">Pour les étudiants seulement </div>
									<br><br>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
									    <thead>
									        <tr>
									            <th>Nom</th>
												<th>Prénom(s)</th>
									            <th>Action</th>
									        </tr>
									    </thead>
									    <?php require_once 'db.php';
									    $select = $db->query("SELECT * FROM resultat");
									    $f = $select->fetchAll();
									     ?>
									    <tbody>
									    	<?php foreach ($f as $value): ?>
									    		<tr>
									            	<td><?php echo $value->nom?></td>
													<td><?php echo $value->prenom ?></td>
									            	<td>
									            		<a href="log.php?id=<?= $value->id ?>" class="ui success button">Cliquez ici !</a>
									            	</td>
									        	</tr>
									    	<?php endforeach ?>
									        
									    </tbody>
									</table>
								</div>
								<!-- END DATATABLE -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
	</div><br><br>



  <footer class="footer ui center aligned container" style="padding: 40px; line-height: 40px;">
        <div class="ui container">
            <div class="row">
                <div class=" text-center">
                   © <script>document.write(new Date().getFullYear());</script>&nbsp;Copyright: <a href="http://esp.univ-antsiranana.edu.mg">Ecole Supérieure Polytechnique d&#039; Antsiranana</a> | <a href="login.php">SECPAL</a>
                </div>
              
            </div>
        </div>
    </footer>
</body>
<!-- inject:js -->
<script src="vendors/jquery/jquery.min.js"></script>
<script src="vendors/fomantic-ui/semantic.min.js"></script>
<script src="js/main.js"></script>
<!-- endinject -->
<!-- datatables:js -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net/datatables.net-se/js/dataTables.semanticui.min.js"></script>
<script src="vendors/datatables.net/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net/datatables.net-responsive-se/js/responsive.semanticui.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net/datatables.net-buttons-se/js/buttons.semanticui.min.js"></script>
<script src="vendors/jszip/jszip.min.js"></script>

<!-- endinject -->
<script>
	$(document).ready(function(){
		// - MESSAGES
		$('.message .close').on('click', function() {
		    $(this)
		      .closest('.message')
		      .transition('fade')
		    ;
		});
		// - DATATABLES
	    $(document).ready(function(){
		    $('#example').DataTable();
		});
		var table = $('#example').DataTable({
	        lengthChange: false,
	        /*buttons: [ 'colvis', 'copy', 'excel', 'pdf' ]*/
	    });
	    table.buttons().container().appendTo(
	    	$('div.eight.column:eq(0)', table.table().container())
	    );
	});
</script>
</html>