<?php
class Account extends Model{
	

    public function updateUserEmail($id_user, $email) {
        
        
        $requete = $this->_db->prepare('UPDATE users SET email = :email WHERE id_user = :id_user');
        
        $requete->execute(array(
            'id_user' => $id_user,
            'email' => $email,
            ));		

        $requete->closeCursor(); 
        return 1;
    }		

    public function verifierNewPassword($mdp1, $mdp2) {
			
        $erreur = array();
        
        $mdpInterdits = array("0000", "admin", "root", "azerty", "123", "123456789");
        
        if(in_array($mdp1, $mdpInterdits)) {
            $erreur['password'] = 'Erreur : Veuillez indiquer un autre mot de passe.';		

        }
        
        if($mdp1 != $mdp2) {
            $erreur['password'] = 'Erreur : Les mots de passe sont différents.';		

        }		
        // 7) TEST SI LONGUEUR MDP OK	
        if(!(strlen($mdp1) >= 6 AND strlen($mdp1) <= 20 )) {	
            $erreur['password2'] = 'Erreur : Le mot de passe doit contenir entre 6 et 20 caractères.';

        }
        
        if(!empty($erreur)) {				
            return $erreur;
        }
        else {
            return 1;
        }
    }
    
    
    
    public function changerPassword($login, $newMdp) {
        
        
        $newMdp = sha1($newMdp);
        $requete = $this->_db->prepare('UPDATE users SET password = :new_password WHERE login = :login');
        $requete->execute(array(
            'login' => $login,
            'new_password' => $newMdp,

        ));

        return 1;       
    }

    public function chargerSession($login) {
        $requete = $this->_db->prepare('SELECT * FROM users WHERE login = :login');
        $requete-> execute(array('login' => $login));
        $reponse = $requete->fetch(PDO::FETCH_ASSOC);
        $requete-> closeCursor(); 
        
        $_SESSION['auth'] = $reponse;
        return 1;
    }
    
}