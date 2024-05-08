<?php if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once 'class.admin.php';
if (Admin::log()) {
    
}else{
    header('Location: index.php');
    exit();
} 
require_once 'db.php';
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Secpal-Administration - Ecole Supérieure Polytechnique d&#039;Antsiranana</title>
	<link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./b4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <link rel="stylesheet" type="text/css" href="b4/bootstrap-icons/bootstrap-icons.css">
    <style type="text/css">
        
    input {
        border-radius: 0px;
        font-size: initial;
        box-shadow: none;
        line-height: 40px;
        height: 40px;
        /* width: 100%; */
        margin-bottom: 10px;
        align-content: center;

        writing-mode: horizontal-tb !important;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        -webkit-rtl-ordering: logical;
        text-rendering: auto;
        letter-spacing: normal;
        word-spacing: normal;
    }
    label{

        background: #38a4ff;
        border: none;
        border-radius: 5px;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-family: 'Poppins', sans-serif;
        font-size: inherit;
        font-weight: 600;
        margin-bottom: 1rem;
        outline: none;
        padding: 10px;
        position: relative;
        transition: all 0.3s;
    }
    input[type="file"]{
        overflow: hidden;
        width: 0;

        appearance: none;
        background-color: initial;
        cursor: default;
        align-items: baseline;
        text-overflow: ellipsis;
        white-space: pre;
        text-align: start !important;
        border: initial;
    }

    .preloader{
      position: fixed; 
      left:0px;
      top:0px;
      height:100%;
      width: 100%;
      z-index:999999;
      background-color:#ffffff;
      background-position:center center;
      background-repeat:no-repeat;
      background-image:url(../images/icons/preloader.gif);
    }
    </style>
    <script type="text/javascript" src="b4/js/jquery_3_3_1.js"></script>
    <script type="text/javascript">

        var IDLE_TIMEOUT = 5*60; // 10min of inactivity
        var _idleSecondsCounter = 0;
        document.onclick = function() {
            _idleSecondsCounter = 0;
        };
        document.onmousemove = function() {
            _idleSecondsCounter = 0;
        };
        document.onkeypress = function() {
            _idleSecondsCounter = 0;
        };
        window.setInterval(CheckIdleTime, 1000);
        function CheckIdleTime() {
            _idleSecondsCounter++;
            var oPanel = document.getElementById("SecondsUntilExpire");
            if (oPanel) {
                oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
            }
            if (_idleSecondsCounter == IDLE_TIMEOUT) {
                document.location.href = "deconnexion.php";
                alert('temps ecouler');
            }
        }

        function changeRV() {
          var x = document.getElementById("textRV");  
          var fileInput = document.getElementById('fileRV');   
          var filename = fileInput.files[0].name;
          x.value = filename;
        }
    </script>
</head>
<body id="page-top">

  <!-- .preloader 
    <div class="preloader"></div>
     /.preloader -->
   
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1a1a2e; width: 100%;top: 0; left: 0; position: relative;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls=" navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                    <ul class="navbar-nav" style="margin-left: 1200px; ">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff">
                         Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a href="register.php" class="dropdown-item">Réglage compte</a>
                          <a class="dropdown-item" href="deconnexion.php">Se déconnecter</a>
                        </div>
                      </li>
                    </ul>
                
            </div>
    </nav>
 
<?php if (isset($_SESSION['err'])): ?>
            <script type="text/javascript">
                
                alert('<?php echo $_SESSION['err'];
                  unset($_SESSION['err']);   ?>');
                
            </script>
<?php endif; ?>

  <?php if (isset($_SESSION['validation'])): ?>
            <script type="text/javascript">
                alert('<?php echo $_SESSION['validation'];    
                  unset($_SESSION['validation']);  ?>');
            </script>
  <?php endif; ?>

    <?php if (isset($_SESSION['valide'])): ?>
            <script type="text/javascript">
                alert('<?php echo $_SESSION['valide'];    
                  unset($_SESSION['valide']);  ?>');
            </script>
  <?php endif; ?>

  <?php if (isset($_SESSION['register'])): ?>
            <script type="text/javascript">
                alert('<?php echo $_SESSION['register'];    
                  unset($_SESSION['register']);  ?>');
            </script>
  <?php endif; ?>

<div class="container">
<div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12">
    <nav id="sidebar-wrapper" >
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="javascript:void(0)" class="js-scroll-trigger">DASHBOARD</a>
            </li>
            
            <li class="sidebar-nav-item">
                <a href="#Import" class="js-scroll-trigger">Importer résultat / Exporter code</a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#Liste" class="js-scroll-trigger">Liste / Validation</a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#Effectif" class="js-scroll-trigger">Effectif / Exporter données</a>
            </li>
        </ul>
    </nav>
    </div>
    <div class="col-md-8" style="position: relative;">
    
    <section id="Import">
        <h2>Importer les résultats et Exporter le code</h2>
        <h3>Importer en excel seulement comme l'image ci-dessous</h3>
        <img src="img/img.jpg">
        <div class="container">
             <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                           <form method="POST" action="PHPExcel/import.php" accept-charset="utf-8" enctype="multipart/form-data">
                           
                                <input type="file" name="doc" id="fileRV" onchange="changeRV()">
                                <label for="fileRV" class="btn-3"><span>Parcourir</span></label>
                                <input type="text" id="textRV" readonly="">
                         
                                
                                    <button type="submit" name="submit" class="btn btn-success">Importer résultats</button>
                                     <a href="PHPExcel/export_code.php" class="btn btn-info">Exporter code</a>
                                
                            </form>
                        </div>
                        <div class="col-md-12">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom </th>
                                <th scope="col">Prénom(s)</th>
                                <th scope="col">Code</th>
                              </tr>
                            </thead>
                            <?php $page1 = isset($_GET['resultat']) ? $_GET['resultat'] : 1;
                              const LIMITE = 25;
                              $debut1 = ($page1-1)*LIMITE;

                              $count1 = $db->query("SELECT * FROM resultat");
                              $row1 = count($count1->fetchAll());
                              $nbPage1 = ceil($row1/LIMITE);
                            
                              $req1 = $db->query("SELECT * FROM resultat LIMIT $debut1, ".LIMITE." ");
                              $data = $req1->fetchAll();

                              $next1 = $page1 == $nbPage1 ? 1: $page1 + 1;
                              $previous1 = $page1 == 1 ? $nbPage1 : $page1 - 1; ?>
                            <tbody>
                              <?php foreach ($data as $value): ?>
                              <tr>
                                <td><?php echo $value->id ?></td>
                                <td><?php echo $value->nom ?></td>
                                <td><?php echo $value->prenom ?></td>
                                <td><?php echo $value->code ?></td>
                              </tr>
                                <?php endforeach ?>
                            </tbody>
                          </table>
                          <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="admin.php?resultat=<?php echo $previous1; ?>">Previous</a>
                              </li>
                              <?php for ($i=1; $i <= $nbPage1 ; $i++) { ?>
                                <li class="page-item">
                                <a class="page-link" href="admin.php?resultat=<?php echo $i;?>"><?php echo $i;?></a>
                                </li>
                              <?php } ?>
                              <li class="page-item">
                                <a class="page-link" href="admin.php?resultat=<?php echo $next1; ?>">Next</a>
                              </li>
                           </ul>
                          </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><hr>
    
     <section id="Liste">
        <h2>Liste des élèves inscrits et validation de l'agent</h2>

        <div class="container">
             <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                
                                <th scope="col">Niveau</th>
                                <th scope="col">Mention</th>
                                <th scope="col">Status</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Sexe</th>
                              
                                <th scope="col">Nationalite</th>
                                
                                <th scope="col">Bordereau</th>
                                <th scope="col">Banque</th>
                                <th scope="col">Date paiement</th>
                                <th scope="col">Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php $page = isset($_GET['liste_inscrit']) ? $_GET['liste_inscrit'] : 1;
                              const LIMITES = 25;
                              $debut = ($page-1)*LIMITES;

                              $count = $db->query("SELECT * FROM data");
                              $row = count($count->fetchAll());
                              $nbPage = ceil($row/LIMITES);
                            
                              $req = $db->query("SELECT * FROM data ORDER BY id DESC LIMIT $debut, ".LIMITES." ");
                              $datas = $req->fetchAll();

                              $next = $page == $nbPage ? 1: $page + 1;
                              $previous = $page == 1 ? $nbPage : $page - 1; ?>
                                                
                              <?php $id =''; foreach ($datas as $values): ?>
                              <tr>
                              
                                <td><?php echo $values->niveau ?></td>
                                <td><?php echo $values->mention ?></td>
                                <td><?php echo $values->status ?></td>
                                <td><?php echo htmlspecialchars($values->nom) ?></td>
                                <td><?php echo htmlspecialchars($values->prenom) ?></td>
                                
                                
                                <td><?php echo $values->sexe ?></td>
                                
                                <td><?php echo htmlspecialchars($values->nationalite) ?></td>
                              
                                <td><?php echo htmlspecialchars($values->numero_recu) ?></td>
                                <td><?php echo $values->nom_de_banque ?></td>
                                <td><?php echo $values->date_de_paiement ?></td>
                                <td>
                                <?php $efa_misy = "SELECT id_prim FROM id_numero WHERE id_prim = ? "; 
                                       $efa_misy1 = $db->prepare($efa_misy);  
                                       $efa_misy1->execute([$values->id]);
                                       $verify1 = $efa_misy1->fetch();
                                       if ($verify1) { ?>
                                       <a href="javascript:void(0)" class="btn btn-success">Validée</a>       
                                       
                                <?php  }else{  ?>
                                    <a href="validation.php?id=<?php echo $values->id ?>" class="btn btn-primary">Validation</a>
                               <?php  }  ?>
                                 
                                </td>
                                
                              <?php endforeach ?>
                              </tr>
                            </tbody>
                          </table>
                          <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="admin.php?liste_inscrit=<?php echo $previous; ?>">Previous</a>
                              </li>
                              <?php for ($i=1; $i <= $nbPage ; $i++) { ?>
                                <li class="page-item">
                                <a class="page-link" href="admin.php?liste_inscrit=<?php echo $i;?>"><?php echo $i;?></a>
                                </li>
                              <?php } ?>
                              <li class="page-item">
                                <a class="page-link" href="admin.php?liste_inscrit=<?php echo $next; ?>">Next</a>
                              </li>
                           </ul>
                          </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><hr>
        
    <section id="Effectif">
        <h2>Effectif des étudiants de l'ESP et Export données</h2>
        <div class="container">
          <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-dark">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">GM</th>
                                  <th scope="col">GC</th>
                                  <th scope="col">GE</th>
                                  <th scope="col">STIC</th>
                                  <th scope="col">HE</th>
                                  <th scope="col">Total</th>
                                  <th scope="col">Exporter les données</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 1 ";
                            $pre1 = $db->query($select_niveau_1);
                            $nb1 = $pre1->fetchColumn(); ?>
                                  <th scope="row">TCI</th>
                                  <td>#</td>
                                  <td>#</td>
                                  <td>#</td>
                                  <td>#</td>
                                  <td>#</td>
                                  <td><?php echo $nb1; ?></td>
                                  <td>
                                      <a href="export/export1.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;TCI ou 1ère année</a>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">L2</th>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 2 AND mention = 'GM'";
                            $gm = $db->query($select_niveau_1);
                            $gm2 = $gm->fetchColumn(); ?>
                                  <td><?php echo $gm2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 2 AND mention = 'GC'";
                            $gc = $db->query($select_niveau_1);
                            $gc2 = $gc->fetchColumn(); ?>
                                  <td><?php echo $gc2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 2 AND mention = 'GE'";
                            $ge = $db->query($select_niveau_1);
                            $ge2 = $ge->fetchColumn(); ?>
                                  <td><?php echo $ge2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 2 AND mention = 'STIC'";
                            $stic = $db->query($select_niveau_1);
                            $stic2 = $stic->fetchColumn(); ?>
                                  <td><?php echo $stic2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 2 AND mention = 'HE'";
                            $he = $db->query($select_niveau_1);
                            $he2 = $he->fetchColumn(); ?>
                                  <td><?php echo $he2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 2";
                            $t = $db->query($select_niveau_1);
                            $tot = $t->fetchColumn(); ?>
                                  <td><?php echo $tot ?></td>
                                  <td>
                                      <a href="export2.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;L2 ou 2ème année</a>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">L3</th>
                                  <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 3 AND mention = 'GM'";
                            $gm = $db->query($select_niveau_1);
                            $gm2 = $gm->fetchColumn(); ?>
                                  <td><?php echo $gm2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 3 AND mention = 'GC'";
                            $gc = $db->query($select_niveau_1);
                            $gc2 = $gc->fetchColumn(); ?>
                                  <td><?php echo $gc2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 3 AND mention = 'GE'";
                            $ge = $db->query($select_niveau_1);
                            $ge2 = $ge->fetchColumn(); ?>
                                  <td><?php echo $ge2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 3 AND mention = 'STIC'";
                            $stic = $db->query($select_niveau_1);
                            $stic2 = $stic->fetchColumn(); ?>
                                  <td><?php echo $stic2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 3 AND mention = 'HE'";
                            $he = $db->query($select_niveau_1);
                            $he2 = $he->fetchColumn(); ?>
                                  <td><?php echo $he2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 3";
                            $t = $db->query($select_niveau_1);
                            $tot = $t->fetchColumn(); ?>
                                  <td><?php echo $tot ?></td>
                                  <td>
                                      <a href="export/export3.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;L3 ou 3ème année</a>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">M1</th>
                                 <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 4 AND mention = 'GM'";
                            $gm = $db->query($select_niveau_1);
                            $gm2 = $gm->fetchColumn(); ?>
                                  <td><?php echo $gm2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 4 AND mention = 'GC'";
                            $gc = $db->query($select_niveau_1);
                            $gc2 = $gc->fetchColumn(); ?>
                                  <td><?php echo $gc2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 4 AND mention = 'GE'";
                            $ge = $db->query($select_niveau_1);
                            $ge2 = $ge->fetchColumn(); ?>
                                  <td><?php echo $ge2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 4 AND mention = 'STIC'";
                            $stic = $db->query($select_niveau_1);
                            $stic2 = $stic->fetchColumn(); ?>
                                  <td><?php echo $stic2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 4 AND mention = 'HE'";
                            $he = $db->query($select_niveau_1);
                            $he2 = $he->fetchColumn(); ?>
                                  <td><?php echo $he2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 4";
                            $t = $db->query($select_niveau_1);
                            $tot = $t->fetchColumn(); ?>
                                  <td><?php echo $tot ?></td>
                                  <td>
                                      <a href="export/export4.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;M1 ou 4ème année</a>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">M2</th>
                                  <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 5 AND mention = 'GM'";
                            $gm = $db->query($select_niveau_1);
                            $gm2 = $gm->fetchColumn(); ?>
                                  <td><?php echo $gm2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 5 AND mention = 'GC'";
                            $gc = $db->query($select_niveau_1);
                            $gc2 = $gc->fetchColumn(); ?>
                                  <td><?php echo $gc2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 5 AND mention = 'GE'";
                            $ge = $db->query($select_niveau_1);
                            $ge2 = $ge->fetchColumn(); ?>
                                  <td><?php echo $ge2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 5 AND mention = 'STIC'";
                            $stic = $db->query($select_niveau_1);
                            $stic2 = $stic->fetchColumn(); ?>
                                  <td><?php echo $stic2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 5 AND mention = 'HE'";
                            $he = $db->query($select_niveau_1);
                            $he2 = $he->fetchColumn(); ?>
                                  <td><?php echo $he2 ?></td>
                            <?php $select_niveau_1 = "SELECT count(id) FROM data WHERE niveau = 5";
                            $t = $db->query($select_niveau_1);
                            $tot = $t->fetchColumn(); ?>
                                  <td><?php echo $tot ?></td>
                                  <td>
                                      <a href="export/export5.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;M2 ou 5ème année</a>
                                  </td>
                                </tr>
                                  <tr>
                                    <th>Féminin</th>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                            <?php $select = "SELECT count(id) FROM data WHERE sexe = 'F' ";
                            $t = $db->query($select);
                            $tot = $t->fetchColumn(); ?>
                                    <td><?php echo $tot ?></td>
                                    <td>
                                      <a href="feminin.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;Féminin</a>
                                  </td>
                                </tr>
                                  <tr>
                                    <th>Masculin</th>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                            <?php $select = "SELECT count(id) FROM data WHERE sexe = 'M' ";
                            $t = $db->query($select);
                            $tot = $t->fetchColumn(); ?>
                                    <td><?php echo $tot ?></td>
                                    <td>
                                      <a href="masculin.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;Masculin</a>
                                  </td>
                                </tr>
                                <tr>
                                    <th>ESP</th>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                            <?php $select = "SELECT count(id) FROM data ";
                            $t = $db->query($select);
                            $tot = $t->fetchColumn(); ?>
                                    <td><?php echo $tot ?></td>
                                    <td>
                                      <a href="export.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;Tous les étudiants</a>
                                  </td>
                                </tr>
                                <tr>
                                    <th>ESP</th>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                            <?php $select = "SELECT count(id) FROM data ";
                            $t = $db->query($select);
                            $tot = $t->fetchColumn(); ?>
                                    <td><?php echo $tot ?></td>
                                    <td>
                                      <a href="canevas.php" class="btn btn-primary"><i class="bi bi-download"></i>&nbsp;&nbsp;Canevas Inscription 2022-2023 (Ministère)</a>
                                  </td>
                                </tr>
                               

                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><hr>
    </div>
</div>
</div>



<!--jquery js -->
        <script type="text/javascript" src="b4/js/jquery_3_3_1.js"></script>
        <script type="text/javascript" src="include/bootstrap.bundle.min.js"></script>
        <script src="../js/isotope.js"></script>
        <script src="../js/masterslider.js"></script>
        <script src="../js/script.js"></script>
        <script type="text/javascript" src="include/jquery.easing.min.js"></script>
    <script type="text/javascript" src="include/main.js"></script>
</body>
</html>