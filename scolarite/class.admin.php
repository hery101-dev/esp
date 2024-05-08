<?php 

class Admin{
	 static function log() {
		if (isset($_SESSION['log']) && isset($_SESSION['log']['pseudo']) && isset($_SESSION['log']['mdp'])) {
			return true;
		}else{
			return false;
		}
	}
}
?>