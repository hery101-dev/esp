<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?><!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
	<meta name="robots" content="all,follow">
	<title>Login - Ecole Supérieure Polytechnique d&#039;Antsiranana</title>
	<link rel="icon" href="images/logo.png" sizes="32x32">
	<!-- inject:css -->
  	<link rel="stylesheet" href="vendors/fomantic-ui/semantic.min.css">
  	<link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
  	<!-- endinject -->
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
    </script>
</head>
<body>
    <?php if (isset($_SESSION['error_admin'])): ?>
            <script type="text/javascript">
                
                alert('<?php echo $_SESSION['error_admin'];
                  unset($_SESSION['error_admin']);   ?>');
                
            </script>
    <?php endif; ?>
    <div class="ui container centered grid">
        <div class="five wide computer sixteen wide tablet sixteen wide phone column" style="margin-top: 10%;">
            <form action="traitement3.php" method="POST" accept-charset="UTF-8">
                <div class="ui segment">
                    <img class="ui centered medium image" src="../images/logo/logoESP.png" style="width: 100px;" alt=""><br>
                    <legend><h2>Connexion SECPAL</h2></legend><br>
                    <div class="ui form">
                        <div class="field">
                            <label>IDENTIFIANT</label>
                            <input name="username" placeholder="VOTRE IDENTIFIANT" type="text" required>
                        </div>
                        <div class="field">
                            <label>MOT DE PASSE</label>
                            <input name="password" placeholder="VOTRE MOT DE PASSE" type="password" required>
                        </div>
                    </div>  
                    <br>
                    <!-- <button type="submit" style="width: 100%;" class="ui blue button">
                        <i class="sign in alternate icon"></i>
                        LOGIN
                    </button> -->
                    <button type="submit" style="width: 100%;" class="ui blue button" name="login">
                        <i class="sign in alternate icon"></i>
                      CONNEXION
                    </button>
                    <br><br>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- inject:js -->
<script src="vendors/jquery/jquery.min.js"></script>
<script src="vendors/fomantic-ui/semantic.min.js"></script>
<script src="js/main.js"></script>
<!-- endinject -->
</html>