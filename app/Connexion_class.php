<?php

class Connexion_class {
	
	private $_login; 
	private $_password;
    
    

	public function verifierConnexion($arrayUser, $mdp) {
			
        $erreur = array();
        
        $mdpCrypte = sha1($mdp);
        if(isset($arrayUser) AND ($mdpCrypte == $arrayUser['password'])) { //on detecte la ligne si elle existe, et si le mdp est bon
            $this->_login = $arrayUser['login'];
            $this->_password = $arrayUser['password'];
			return true;
		}
		else {
            return false;
		}
    }
    
    public function chargerSession($arrayUser) {
        $_SESSION['auth'] = $arrayUser;
        return true;
    }








}