<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    require_once 'class.ins.php';
    require_once 'db.php';
    $ver = "SELECT * FROM data WHERE code = ?";
    $req_ver = $db->prepare($ver);
    $ss = $_SESSION['Auth']['code'];
    $req_ver->execute([$ss]);
    $verify = $req_ver->fetch();
        if ($verify) {
                                 
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification des informations - Ecole Supérieure Polytechnique d&#039;Antsiranana</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="32x32">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <style>
        body{
            opacity: 1;
        }
        h5{
            color: black;
        }
        h4, p{
            color: black;
            font-size: 15px;
            font-weight: bold;
        }
        select, option{
            border: 1px solid lightgray;
            border-radius: 5px;
        }
        .left-content{
          height: 100%;
          padding-left: 15px;
          padding-right: 15px;
          text-align: left;
          background-color: #38a4ff;
        }
        .white{
          color: #fff;
        }
        .centre{
          text-align: center;
        }
        .hide{
            display: none;
        }
        input[type="file"] {
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
    </style>
<script type="text/javascript" src="b4/js/jquery_3_3_1.js"></script>

    <script type="text/javascript">

       
        var IDLE_TIMEOUT = 5*60; // 5min of inactivity
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


        function val() {
          const e = document.getElementById("niveau");
          const c = document.getElementById("mention-select");
          const stic = document.getElementById("STIC");
          const ge = document.getElementById("GE");
          const gc = document.getElementById("GC");
          const gm = document.getElementById("GM");
          const he = document.getElementById("HE");
          const m = document.getElementById("m");
          const nouveau = document.getElementById("nouveau");
          const passan = document.getElementById("passan");
          const redoublant = document.getElementById("redoublant");
          const situation = document.getElementById("passant");
          e.addEventListener("change", function(){
            if (this.value == "1") {
                c.value = "TCI";
                //m.style.display = "none";
                stic.style.display = "none";
                ge.style.display = "none";
                gc.style.display = "none";
                gm.style.display = "none";
                he.style.display = "none";
                nouveau.style.display = "block";
                passan.style.display = "none";
                redoublant.style.display = "block";
                situation.style.display = "block";
            }else{
                c.value = "";
                    n.style.display = "block";
                    deux.style.display = "block";
                    trois.style.display = "block";
                    quatre.style.display = "block";
                    cinq.style.display = "block";

                //m.style.display = "block";
                stic.style.display = "block";
                ge.style.display = "block";
                gc.style.display = "block";
                gm.style.display = "block";
                he.style.display = "block";
                nouveau.style.display = "block";
                passan.style.display = "block";
                redoublant.style.display = "block";
                situation.style.display = "block";
                
            }
          })
        }

        function permut() {

          const stic = document.getElementById("STIC");
          const ge = document.getElementById("GE");
          const gc = document.getElementById("GC");
          const gm = document.getElementById("GM");
          const he = document.getElementById("HE");
          const m = document.getElementById("m");

            const e = document.getElementById("niveau");
            const c = document.getElementById("mention-select");
            const tci = document.getElementById("un");
            const deux = document.getElementById("deux");
            const trois = document.getElementById("trois");
            const quatre = document.getElementById("quatre");
            const cinq = document.getElementById("cinq");
            const n = document.getElementById("n");

            const nouveau = document.getElementById("nouveau");
            const passan = document.getElementById("passan");
            const redoublant = document.getElementById("redoublant");
            const situation = document.getElementById("passant");
            c.addEventListener("change", function(){
                if (this.value == "TCI") {
                    e.value = "1";
                    //n.style.display = "none";
                    deux.style.display = "none";
                    trois.style.display = "none";
                    quatre.style.display = "none";
                    cinq.style.display = "none";


                //m.style.display = "none";
                stic.style.display = "none";
                ge.style.display = "none";
                gc.style.display = "none";
                gm.style.display = "none";
                he.style.display = "none";

                nouveau.style.display = "block";
                passan.style.display = "none";
                redoublant.style.display = "block";
                situation.style.display = "block";


                }else{
                    //n.style.display = "block";
                    deux.style.display = "block";
                    trois.style.display = "block";
                    quatre.style.display = "block";
                    cinq.style.display = "block";

                    nouveau.style.display = "block";
                    passan.style.display = "block";
                    redoublant.style.display = "block";
                    situation.style.display = "block";
                }

            })
        } 
        
        function showcin() {
          const el = document.getElementById("cin-select");
          const cin = document.getElementById("cin");
          const datecin = document.getElementById("datecin");
          const lieucin = document.getElementById("lieucin");
          const pere = document.querySelector("#pere");
          const mere = document.querySelector("#mere");
           el.addEventListener("change", function () {
               if (this.value == "mineur") {
                cin.style.display = "none";
                datecin.style.display = "none";
                lieucin.style.display = "none";
                document.getElementById("req-cin").required = false;
                document.getElementById("req-date").required = false;
                document.getElementById("req-lieu").required = false;
                
               }else{
                cin.style.display = "block";
                datecin.style.display = "block";
                lieucin.style.display = "block";
               
                document.getElementById("req-cin").required = true;
                document.getElementById("req-date").required = true;
                document.getElementById("req-lieu").required = true;
               }
           })
        }


        function changeRV() {
          var x = document.getElementById("textRV");  
          var fileInput = document.getElementById('fileRV');   
          var filename = fileInput.files[0].name;
          x.value = filename;
        }
  
    </script>
</head>
<body>
    <!-- .preloader -->
    <div class="preloader"></div>
    <!-- /.preloader -->

      <!-- main header area -->
    <header class="main-header">

        <!-- header upper -->
         <div class="header-upper">
            <div class="container">
                <ul class="top-left">
                    <li><i class="fa fa-phone"></i>Appeler: (+261) 32-06-900-03 / 32-06-900-04</li>
                    <li><i class="fa fa-envelope"></i>Email: secpal@esp-antsiranana.edu.mg</li>
                </ul>
                <div class="top-right">
                    <div class="search-box-area">
                        <div class="search-toggle"><i class="fa fa-search"></i></div>
                        <div class="search-box">
                            <form method="POST" action="javascript:void(0)">
                                <div class="form-group">
                                    <input type="search" name="search" placeholder="Votre recherche" required>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <ul class="social-top">
                        <li><a href="https://www.facebook.com/groups/etudiantESPA/permalink/5686686138030528/?app=fbl" target="_blank"><i class="fa fa-facebook"></i></a></li>
                      
                    </ul>
                </div>             
            </div>
        </div> 
        <!-- end header upper-->

        <br><br>

    <?php if (isset($_SESSION['message'])): ?>
            <script type="text/javascript">
                alert('<?php echo $_SESSION['message'];
                   unset($_SESSION['message']) ?>');
            </script>
    <?php endif; ?>

    <?php if (isset($_COOKIE['ERROR'])): ?>
            <script type="text/javascript">
                alert('<?php echo $_COOKIE['ERROR'];  ?>');
            </script>
    <?php endif; ?>

        <div class="container">
           <div id="contact">
                <div class="row">
                    <div class="col-md-12">
                                    <div class="col-md-12 " style="background-color: #38a4ff; opacity: 0.9; color: #fff; border-radius: 10px;">
                                        <div class="logo centre"><img src="img/logoESP.png" alt="" width="100" height="100"></div>
                                        
                                        <h3 class="white centre"> ESP Inscription et Réinscription</h3>
                                        <p class="white centre"><em>Année Universitaire <?php echo date('Y').'-'.date('Y')+1; ?></em></p>
                                        <div class="line-dec"></div>
                                        <p class="white centre">Date limite : 30 Novembre 2022 <br></p><br>
                                        <div class="left-content">
                                            <h3 class="white centre" >Comment remplir ce formulaire </h3><br>
                                            <div class="col-md-6">
                                                <h5 class="white"> Information personnelle</h5>
                                            <p class="white">Veuillez remplir les champs en inscrivant toutes les informations identiques à ceux inscrites sur votre CIN si vous êtes majeur.</p>
                                            <p class="white">Vous devez avoir un adresse email et un numéro de téléphone valide.</p>      
                                            </div> 
                                            <div class="col-md-6">
                                                <h5 class="white"> Niveau de formation</h5>
                                            <p class="white">
                                                Choisir votre niveau de formation pour la prochaine rentrée universitaire <?php echo date('Y').'-'.date('Y')+1; ?>. Puis choisir votre mention. <b>Les étudiants en première année ne font pas encore le choix de mention </b>.</p>
                                            <p class="white">Choisir votre situation : " Nouveau " si vous n'êtes pas encore un étudiant de l'ESP. Par contre " Passant ou Redoublant " si vous êtes déjà un etudiant de l'ESP.</p>
                                            </div>
                                                     
                                            <!--div class="col-md-4">
                                                <h5 class="white">Droit d’inscription</h5>
                                            <p class="white">Après avoir effectué le versement de votre droit d’inscription sur le compte de l’ESP Antsiranana, renseigner dans les champs suivants le numéro du bordereau de versement, le nom de la banque ainsi que la date à laquelle vous avez effectué le versement.
                                            </p>
                                            </div-->
                                        </div>
                                    </div>
                                <div class="col-md-12 alert alert-danger" role="alert" id="paper">
                                    <center>
                                      <h5> *** Vous devez nous envoyer vos documents version papier pour que votre inscription ou réinscription soit valide. *** </h5> 
                                    </center>
                                </div>
                    </div>
                </div>

                <div class="row">
        
                            <div class="col-md-12">
                                <p style="text-align: center;">(*) champ obligatoire <span>&#x1F642;</span></p>
                           
            <form  action="update.php" method="POST" id="form" accept-charset="utf-8" enctype="multipart/form-data" >
                            
                            <div class="col-md-12">
                              
                            <h4> INFORMATIONS PERSONNELLES  </h4> 
                              
                            </div> 
                                                                                  
                            <div class="col-md-4">
                               
                            <p>Nom *</p>
                              
                              <fieldset>
                                <input name="nom" type="text" value="<?= $_SESSION['Auth']['nom'] ?>" class="form-control"  id="name" placeholder="Votre NOM ..." required="" readonly>
                              </fieldset>
                            </div>
                            <div class="col-md-4">
                                <p>Prénom(s) </p>
                              <fieldset>

                                <input name="prenom" value="<?= $_SESSION['Auth']['prenom'] ?>" readonly type="text" class="form-control" id="prenom" placeholder="Votre Prénom(s)..." >
                              </fieldset>
                            </div>
                            <div class="col-md-4" id="service-select">
                                          <p>Sexe *</p>
                              <select name="sexe" required="" class="form-control">
                                <option value="">Masculin ou Féminin</option>
                                <option value="M" >Masculin</option>
                                <option value="F" >Féminin</option>				                                    
                              </select>
                            </div>
                             <div class="col-md-4">
                                 <p>Date de naissance *</p>
                              <fieldset>
                                <input name="datenaissance" type="date" value="<?= $verify->date_de_naissance ?>" class="form-control" id="datenaissance" placeholder="Date de naissance..." required="" >
                              </fieldset>
                            </div>
                            <div class="col-md-4">
                                <p>Lieu de naissance *</p>
                              <fieldset>
                                <input name="lieunaissance" type="text" value="<?= $verify->lieu_de_naissance ?>" class="form-control" id="lieunaissance" placeholder="Lieu de naissance..." required="" >
                              </fieldset>
                            </div>
                            <div class="col-md-4">
                                 <p>Ville de naissance *</p>
                              <fieldset>
                                <input name="villenaissance" type="text" class="form-control" value="<?= $verify->ville_de_naissance ?>" id="villenaissance" placeholder="Ville de naissance..." required="" >
                              </fieldset>
                            </div>
                            <div class="col-md-4" >
                                <p>Adresse exacte *</p>
                              <fieldset>
                                <input name="adresse" type="text" id="adresse" value="<?= $verify->adresse ?>" class="form-control" placeholder="Votre adresse..." required="" >
                              </fieldset>
                            </div>
                            <div class="col-md-4">
                                <p>Pays de naissance *</p>
                                <select name="paysnaissance" id="paysnaissance" required="" class="form-control" >
                                  <option value="Madagasikara" >Madagascar</option>
                                  <option value="Autre" >Autre</option>
                                </select>
                            </div>

                            <div class="col-md-4" >
                                <p>Nationalité *</p>
                              <fieldset>
                                <input name="nationalite" type="text" value="<?= $verify->nationalite ?>" class="form-control" id="nationalite" placeholder="Nationalité..." required="" >
                              </fieldset>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-3">
                                        <p>Majeur ou Mineur *</p>
                                        <select name="mineur" id="cin-select" onclick="showcin()" required="" class="form-control">
                                            <option datd-display="" value="">Majeur ou Mineur</option>
                                            <option value="majeur">Majeur</option>
                                            <option value="mineur">Mineur</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" id="cin">
                                        <p>CIN ou Passeport *</p>
                                        <fieldset>
                                            <input name="cin" type="number" value="<?= $verify->cin ?>" minlength="12" maxlength="12" id="req-cin" class="form-control"  placeholder="CIN ou Passeport..."  >
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3"  id="datecin">
                                        <p>Date de délivrance *</p>
                                      <fieldset>
                                        <input name="datecin" type="date" id="req-date" value="<?= $verify->date_de_delivrance ?>" class="form-control" placeholder="Delivrée le..."  >
                                      </fieldset>
                                    </div>
                                    <div class="col-md-3" id="lieucin" >
                                        <p>Lieu de délivrance *</p>
                                      <fieldset>
                                        <input name="lieucin" value="<?= $verify->lieu_de_delivrance ?>" type="text" id="req-lieu" class="form-control" placeholder="Lieu de delivrance ..."  >
                                      </fieldset>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4" id="pere" >
                                <p>Affiliation (fils ou fille de)</p>
                              <fieldset>
                                <input name="pere" value="<?= $verify->nom_du_pere ?>" type="text" class="form-control"  placeholder="Nom du Père..." >
                              </fieldset>
                            </div>
                            <div class="col-md-4" id="mere">
                                <p>Affiliation (fils ou fille de)</p>
                              <fieldset>
                                <input name="mere" value="<?= $verify->nom_de_mere ?>" type="text" class="form-control"  placeholder="Nom de la Mère..." >
                              </fieldset>
                            </div>
                            <div class="col-md-4" id="tuteur">
                                <p>Tuteur</p>
                              <fieldset>
                                <input name="tuteur" value="<?= $verify->tuteur ?>" type="text" class="form-control"  placeholder="Nom de votre tuteur..." >
                              </fieldset>
                            </div>
                         
                                <div class="col-md-6" id="email">
                                     <p>Email *</p>
                                  <fieldset>
                                    <input name="email" value="<?= $verify->email ?>" type="email" class="form-control" id="email" placeholder="adresse email valide..." required="" >
                                  </fieldset>
                                </div>
                                <div class="col-md-6" id="phone">
                                    <p>Numéro de Téléphone (+261) *</p>
                                  <fieldset>
                                    <input name="phone" value="<?= $verify->telephone ?>" id="phone" type="tel" minlength="10" maxlength="13" class="form-control" placeholder="Numéro de télephone valide" required="" >
                                  </fieldset>
                                </div>
                                 <!--div class="col-md-4">
                                    <p>Photo d'identité 4x4 identiques et récentes *</p>
                                    <fieldset>
                                        <input type="file" value="<?php echo $verify->path_photo ?>" name="photo" class="form-control">
                                    </fieldset>
                                </div-->
                                 <div class="col-md-6">
                                    <p>Année d'obtention du bacc *</p>
                                    <fieldset>
                                        <select name="ob_bacc" required="" class="form-control">
                                            <option datd-display="" value="<?= $verify->ob_bacc ?>"><?= $verify->ob_bacc ?></option>
                                            <option value="<?php echo date('Y')-12 ?>"><?php echo date('Y')-12 ?></option>
                                            <option value="<?php echo date('Y')-11 ?>"><?php echo date('Y')-11 ?></option>
                                            <option value="<?php echo date('Y')-10 ?>"><?php echo date('Y')-10 ?></option>
                                            <option value="<?php echo date('Y')-9 ?>"><?php echo date('Y')-9 ?></option>
                                            <option value="<?php echo date('Y')-8 ?>"><?php echo date('Y')-8 ?></option>
                                            <option value="<?php echo date('Y')-7 ?>"><?php echo date('Y')-7 ?></option>
                                            <option value="<?php echo date('Y')-6 ?>"><?php echo date('Y')-6 ?></option>
                                            <option value="<?php echo date('Y')-5 ?>"><?php echo date('Y')-5 ?></option>
                                            <option value="<?php echo date('Y')-4 ?>"><?php echo date('Y')-4 ?></option>
                                            <option value="<?php echo date('Y')-3 ?>"><?php echo date('Y')-3 ?></option>
                                            <option value="<?php echo date('Y')-2 ?>"><?php echo date('Y')-2 ?></option>
                                            <option value="<?php echo date('Y')-1 ?>"><?php echo date('Y')-1 ?></option>
                                            <option value="<?php echo date('Y') ?>"><?php echo date('Y') ?></option>

                                        </select>
                                    </fieldset>

                                </div>
                                 <div class="col-md-6">
                                    <p>Série du bacc *</p>
                                    <fieldset>
                                        <input type="text" name="serie_bacc" value="<?= $verify->serie_bacc ?>" class="form-control" placeholder="Votre série du bacc" required>
                                    </fieldset>
                                </div>
                              <div class="col-md-12">
                          <h4> NIVEAU DE FORMATION </h4> 
                            </div>
                           
                            <div class="col-md-4 niveau" id="niveau-select" >
                                <p>Niveau d'etude *</p>
                                          
                              <select name="niveau" id="niveau" onclick="val()" class="form-control" required="" >
                                <option datd-display="" id="n" value="<?= $verify->ob_bacc ?>">Choisir votre niveau d'etude</option>
                                <option value="1" id="un">Tronc Commun Première année - L1</option>
                                <option value="2" id="deux">Deuxieme Année - L2</option>
                                <option value="3" id="trois">Troisième année - L3 </option>
                                <option value="4" id="quatre">Quatrième année - M1 </option>
                                <option value="5" id="cinq">Cinquième année - M2 </option>
                              </select>
                                
                            </div>
                                                        
                            <div class="col-md-4 mention" >
                                <p>Mention *</p>
                                            
                                <select name="mention" id="mention-select" onclick="permut()" class="form-control" required="">
                                  <option datd-display="" id="m" value="">Choisir votre Mention</option>
                                  <option value="TCI" >Tronc Commun Permière année - L1</option>
                                  <option value="STIC" id="STIC">STIC</option>
                                  <option value="GC" id="GC">GENIE CIVIL</option>
                                  <option value="GE" id="GE">GENIE ELECTRIQUE</option>
                                  <option value="GM" id="GM">GENIE MECANIQUE</option>
                                  <option value="HE" id="HE">HYDRAULIQUE ET ENERGETIQUE</option>                                
                                </select>
                            </div>  
                          
                            <div class="col-md-4" id="niveau-select">
                                              <p>Nouveau / Passant / Redoublant *</p>
                                            
                                <select name="status" id="passant" required="" class="form-control" >
                                  <option datd-display="" id="situation" value="<?= $verify->status ?>"><?= $verify->status ?></option>
                                  <option value="Nouveau" id="nouveau">Nouveau</option>
                                  <option value="Passant" id="passan">Passant</option>
                                  <option value="Redoublant" id="redoublant">Redoublant</option>
                                </select>
                                
                            </div>
                          
                            <!--div class="col-md-12">
                              
                              <h4> DROIT D'INSCRIPTION  </h4> 
                              
                            </div>

                            <div class="col-md-4">
                                <p>Numéro du reçu *</p>
                              <fieldset>
                                <input name="recu" type="number" class="form-control" id="recu" placeholder="Numéro du reçu..." required="" >
                              </fieldset>
                            </div>
                            <div class="col-md-4">
                                <p>Nom de la Banque *</p>
                                <select name="banque" required="" class="form-control">
                                    <option datd-display="" value="">Choisir la banque</option>
                                    <option value="BFV-SG">BFV-SG</option>
                                    <option value="BNI">BNI</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <p>Date de paiement *</p>
                              <fieldset>
                                <input name="daterecu" type="date" class="form-control" id="daterecu" placeholder="Date de paiment..." required="" >
                              </fieldset>
                            </div-->   
							
							<div class="col-md-12">
                              <h4> CONFIRMATION</h4> 
                            </div>

                            
                                <div class="col-md-4">
                                    <fieldset>
                                        <center><img src="captcha.php" style="height: 45px; width: auto; margin-top: 15px;" /></center>
                                    </fieldset>
                                </div>
                                <div class="col-md-4">
                                  <fieldset>
                                    <input name="captcha" placeholder="Ecrivez ici le chiffre dans le cadre rouge (ex: 2546)" class="form-control" required="" type="text" style="height: 45px;  margin-top: 15px;" >
                                  </fieldset>
                                </div>
                                <div class="col-md-4" >
                                        <fieldset>
                                             <button type="submit" name="edit" id="form-submit"  class="btn btn-primary ">Modifier</button>
                                        </fieldset>
                                </div>
                               
                          
                        </div>
                </div>
             </form>
          </div>
        </div>

        <footer class="center">
            <div class="footer-bottom centred">
                <div class="container">
                    <div class="copyright"><p style="text-align: center;">© <script>document.write(new Date().getFullYear());</script> Copyright : Ecole Supérieure Polytechnique d&#039;Antsiranana</p></div>
                </div>
            </div>
        </footer>


    <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-angle-up"></span></div>
  
<!--jquery js -->
     
       
        <script src="../js/wow.js"></script>
    
        <script src="../js/masterslider.js"></script>
       

        <script src="../js/script.js"></script>
</body>
</html>
<?php  }else{
    header('Location: inscription.php');
    exit();
} 
?>