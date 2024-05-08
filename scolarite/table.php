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

   

	<div class="ui grid">
		<div class="row">
			<div class="ui grid">
			<!-- BEGIN NAVBAR -->
				<!-- computer only navbar -->
				<div class="computer only row">
					<div class="column">
						<div class="ui top fixed menu navcolor">
							<div class="item">
								<img src="../images/logo/logoESP.png" alt="SimpleIU">
							</div>
							<div class="left menu">
								<div class="nav item">
									<strong class="navtext">SECPAL ADMINISTRATION</strong>
								</div>
							</div>
							<div class="ui top pointing dropdown admindropdown link item right">
								<img class="imgrad" src="../images/event/chef.jpg" alt="">
								<span class="clear navtext"><strong>Bonjour </strong></span>
								<i class="dropdown icon navtext"></i>
								<div class="menu">
									<div class="item"><p><i class="settings icon"></i> Réglage de compte</p></div>
									<a href="deconnexion.php" class="item"><i class="sign out alternate icon"></i> Se déconnecter</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end computer only navbar -->
				<!-- mobile and tablet only navbar -->
				<div class="tablet mobile only row">
					<div class="column">
					<div class="ui top fixed menu navcolor">
						<a id="showmobiletabletsidebar" class="item navtext"><i class="content icon"></i></a>
						<div class="right menu">
							<div class="item">
								<strong class="navtext">Bonjour </strong>
							</div>
							<div class="item">
								<img src="../images/event/chef.jpg">
							</div>
						</div>
					</div>
					</div>
				</div>
				<!-- end mobile and tablet only navbar -->
				<!-- END NAVBAR -->

				<!-- BEGIN SIDEBAR -->
				<!-- mobile and tablet only sidebar -->
				<div class="tablet mobile only row">
					<div id="mobiletabletsidebar" class="mobiletabletsidebar animate hidden">
						<div class="ui left fixed vertical menu scrollable">
							<div class="item">
								<table>
									<tr>
										<td>
											<img class="ui mini image" src="../images/event/chef.jpg">
										</td>
										<td>
											<span class="clear"><strong>SECPAL</strong></span>
										</td>
									</tr>
								</table>
							</div>
							<a class="item" href="javascript:void(0)"><i class="home icon"></i> Tableau de bord</a>
							<a class="item" href="table.php"><i class="table icon"></i> Table</a>
							<!-- Begin Simple Accordion --><!--
							<div class="ui accordion simpleaccordion item">
								<div class="title titleaccordion item"><i class="dropdown icon"></i> Settings</div>
								<div class="content contentaccordion">
									<a class="item itemaccordion" href="#"><i class="settings icon"></i> Account Setting</a>
									<a class="item itemaccordion" href="#"><i class="settings icon"></i> Site Setting</a>
								</div>
							</div> -->
							<!-- End Simple Accordion -->
							<a class="item"><i class="settings icon"></i> Réglage de compte</a>	
							<a href="deconnexion.php" class="item"><i class="sign out alternate icon"></i> Se déconnecter</a>
					    <!-- <a class="item" href="https://fomantic-ui.com/"><i class="heart icon"></i>More Components</a>-->
							<div class="item" id="hidemobiletabletsidebar">
								<button class="fluid ui button">
									Fermer
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end mobile and tablet only sidebar -->
				<!-- computer only sidebar -->
				<div class="computer only row">
					<div class="left floated three wide computer column" id="computersidebar">
						<div class="ui vertical fluid menu scrollable" id="simplefluid">
							<div class="clearsidebar"></div>
							<div class="item">
								<img src="../images/event/chef.jpg" id="sidebar-image">
							</div>
							<a class="item" href="javascript:void(0)"><i class="home icon"></i> Tableau de bord</a>
							<a class="item" href="table.php"><i class="table icon"></i> Table</a>
							<!-- Begin Simple Accordion -->	<!--
							<div class="ui accordion simpleaccordion item">
								<div class="title titleaccordion item"><i class="dropdown icon"></i> Settings</div>
								<div class="content contentaccordion">
									<a class="item itemaccordion" href="#"><i class="settings icon"></i> Account Setting</a>
									<a class="item itemaccordion" href="#"><i class="settings icon"></i> Site Setting</a>
								</div>
							</div> -->
							<!-- End Simple Accordion -->
							<a href="" class="item"><i class="settings icon"></i> Réglage de compte</a>
							<a href="deconnexion.php" class="item"><i class="sign out alternate icon"></i> Se déconnecter</a>
						</div>
					</div>
				</div>
				<!-- end computer only sidebar -->
				<!-- END SIDEBAR -->
			</div>
		</div>
		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
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
									            <th>Code</th>
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
									            	<td><?php echo $value->code ?></td>
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
<script src="vendors/pdfmake/pdfmake.min.js"></script>
<script src="vendors/pdfmake/vfs_fonts.js"></script>
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
	        buttons: [ 'colvis', 'copy', 'excel', 'pdf' ]
	    });
	    table.buttons().container().appendTo(
	    	$('div.eight.column:eq(0)', table.table().container())
	    );
	});
</script>
</html>