<?php 

class Inscription_class {
    
    private $_prenom;
    private $_nom;		
    private $_login;		
    private $_password;
    private $_email;
    private $_idGroupe;		
    private $_idService;
    
    
    public function verification($datas) {
        
        $erreur = array();
        
        // 1) TEST SI LONGUEUR prenom OK
        if(!(strlen($datas['prenom']) >= 2 AND strlen($datas['prenom']) <= 30 ) ) { 					
            $erreur['prenom'] = '- Le prenom d\'utilisateur doit contenir entre 2 et 30 caractères.';
        }
        if(!(strlen($datas['nom']) >= 2 AND strlen($datas['nom']) <= 30 ) ) { 					
            $erreur['nom'] = '- Le nom d\'utilisateur doit contenir entre 2 et 30 caractères.';
        }
        $datas['prenom'] = ucfirst($datas['prenom']);
        $datas['nom'] = ucfirst($datas['nom']);

        // 2) TEST SI YA PAS DE CARACTERES SPECIAUX, OK
        $login = $datas['prenom'].'.'.$datas['nom'];
        //debug("ICI USER :", $login );
        if(!(preg_match('#^[a-zA-Z0-9._-]+$#', $login) ) ) {
            $erreur['utilisateur'] = '- Le nom ou le prénom d\'utilisateur ne doit pas contenir de caractères spéciaux.';
        }
                
 
        
        // 4) TEST SI FORMAT EMAIL VALIDE
        if(!(filter_var($datas['email'], FILTER_VALIDATE_EMAIL))) {
            $erreur['email'] = '- Syntaxe de l\'adresse email incorrect.';
        }	
        

        
        // 6) TEST SI MDP INTERDITS ET DIFFERENTS
        $mdpInterdits = array("0000", "admin", "root", "", "123", "123456789");
        
        if(in_array($datas['mdp1'], $mdpInterdits)) {
            $erreur['password'] = '-  Veuillez indiquer un autre mot de passe.';		
        }	
        if($datas['mdp1'] != $datas['mdp2']) {
            $erreur['password'] = '- Les mots de passe sont différents.';		
        }
        
        // 7) TEST SI LONGUEUR MDP OK	
        if(!(strlen($datas['mdp1']) >= 6 AND strlen($datas['mdp1']) <= 20 )) {	
            $erreur['password'] = '- Le mot de passe doit contenir entre 6 et 20 caractères.';
        }
        
        //var_dump('var_dump de erreur', $erreur);
        
        if(empty($erreur)) {
            $this->_prenom = $datas['prenom']; 
            $this->_nom = $datas['nom'];
            //$this->_login = $login;			
            $this->_password = $datas['mdp1'];
            //$this->_email = $data['email'];
            $this->_idGroupe = 3;
            $this->_idService = $datas['service']; 
            return 1;
        }				 
/*             $reponse1 = [
                    'prenom'    => $data['prenom'],
                    'nom'       => $data['nom'],
                    'password'  => $data['mdp1']]; */
    
        else {
            return $erreur;
        }
    }
    
    public function hydrater($login, $datas) {
        $this->_login = $login;			
        $this->_email = $datas['email'];
    }
    
    
    public function getPrenom() 									{ 	return $this->_prenom; 							}
    public function getNom()	    								{ 	return $this->_nom; 							}
    public function getLogin()  									{ 	return $this->_login; 							}
    
    public function getPassword() 									{ 	return $this->_password; 						}
    public function getEmail() 										{ 	return $this->_email; 							}
    public function getIdGroupe() 									{ 	return $this->_idGroupe; 							}
    public function getIdService() 									{ 	return $this->_idService; 							}


 












}

