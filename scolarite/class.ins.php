<?php 
	
	class Loginsc{
		static function login(){
			if (isset($_SESSION['Auth']) && isset($_SESSION['Auth']['nom']) && isset($_SESSION['Auth']['prenom']) && isset($_SESSION['Auth']['code'])) {
				return true;
			}else{
				return false;
			}
		}
	}
?>