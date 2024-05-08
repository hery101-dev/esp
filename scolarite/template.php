<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
	<meta name="robots" content="all,follow">
	<title>Secpal-Administration - Ecole Supérieure Polytechnique d&#039;Antsiranana</title>
	<link rel="icon" href="../favicon.ico" type="image/x-icon" sizes="32x32">
	<!-- inject:css -->
  	<link rel="stylesheet" href="vendors/fomantic-ui/semantic.min.css">
  	<link rel="stylesheet" href="css/main.css">
  	<!-- endinject -->
  	<!-- chartjs:css -->
	<link rel="stylesheet" href="vendors/chart.js/Chart.min.css">
	<!-- endinject -->
</head>
<body>
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
						<h2><i class="home icon"></i> TABLEAU DE BORD</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<!-- BEGIN STATISTIC ITEM -->
							
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							
							
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads --><!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads --><!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui raised segment">
									<div class="content">
										<div class="ui centered grid">
											<div class="row">
												<div class="six wide computer column">
													<div class="ui small image simpleimage itemcolor3">
															<i class="download icon simpleicon"></i>
													</div>
												</div>
												<div class="ten wide computer column">
													<span><h4>Downloads</h4></span>
													5541 Downloads
													<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- END STATISTIC ITEM

							<div class="eight wide computer sixteen wide phone column justifed">
								<h4>EXAMPLE TITLE</h4>
								<div class="ui divider"></div>
								<div class="ui tall stacked segment">
									<a class="ui blue ribbon label">Chart.js Bar Chart - Multi Axis</a>
									<canvas id="example-multiaxis"></canvas>
									<div class="ui divider"></div>
									<button id="rand-multi-axis" class="ui blue button simplelable">Randomize Data</button>
								</div>
							</div>
							<div class="eight wide computer sixteen wide phone column justifed">
								<h4>EXAMPLE TITLE</h4>
								<div class="ui divider"></div>
								<div class="ui tall stacked segment">
									<a class="ui blue ribbon label">Chart.js Pie Chart - Examples</a>
									<canvas id="example-pie"></canvas>
									<div class="ui divider"></div>
									<button id="rand-pie" class="ui blue button simplelable">Randomize Data</button>
								</div><br>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
	</div>
</body>
<!-- inject:js -->
<script src="vendors/jquery/jquery.min.js"></script>
<script src="vendors/fomantic-ui/semantic.min.js"></script>
<script src="js/main.js"></script>
<!-- endinject -->
<!-- chartjs:js -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/chart.js/Chart.utils.js"></script>
<script src="vendors/chart.js/Chart.example.js"></script>
<!-- endinject -->
</html>