<?php
class Inscription extends Model{
	

    public function verificationDoublon($datas){
        
        $erreur = [];

        // 3) TEST SI INSCRIPTION UTILISATEUR EN DOUBLE EN bdd
        if(!empty($datas['login'])){
            $requete = $this->_db->prepare('SELECT id_user FROM users WHERE login = ?');
            $requete->execute(array($datas['login']));		
            $unUser = $requete->fetch();
            $requete->closeCursor(); 
                
            if($unUser) {
                $erreur['login'] = '- Ce nom d\'utilisateur est déja pris';
            }	
        }

        // 5) TEST SI INSCRIPTION EMAIL EN DOUBLE EN BDD
        if(!empty($datas['email'])){
            $requete = $this->_db->prepare('SELECT id_user FROM users WHERE email = ?');
            $requete->execute(array($datas['email']));
            $email = $requete->fetch();
            $requete->closeCursor(); 
            
            if($email) {
                $erreur['email'] = '- Adresse email déja utilisée.';
            }
        }

        if(empty($erreur)) {
            return 1;
            //$reponse2 = [ 'login' => $datas['login'], 'email' => $datas['email']];
        }
        else {
            return $erreur;
        }

    }


    public function newEnregistrement(Inscription_class $uneInscription) {
        
       
        $password = sha1($uneInscription->getPassword());
        $requete = $this->_db->prepare('INSERT INTO users(prenom, nom, login, password, email, id_groupe, id_service, date_ajout) VALUES (:prenom, :nom, :login, :password, :email, :id_groupe, :id_service, NOW())');
/* 			$requete->execute(array(
            'prenom' => $this->_prenom,
            'nom' => $this->_nom,				
            'utilisateur'=> $this->_utilisateur,
            'password' => $this->_password,
            'email' => $this->_email,
            'id_group' => $this->_idGroup,

            )); */
        $requete->bindValue(':prenom', $uneInscription->getPrenom(), PDO::PARAM_STR);
        $requete->bindValue(':nom', $uneInscription->getNom(), PDO::PARAM_STR);
        $requete->bindValue(':login', $uneInscription->getLogin(), PDO::PARAM_STR);
        $requete->bindValue(':password', $password, PDO::PARAM_STR);
        $requete->bindValue(':email', $uneInscription->getEmail(), PDO::PARAM_STR);
        $requete->bindValue(':id_groupe', $uneInscription->getIdGroupe(), PDO::PARAM_INT);
        $requete->bindValue(':id_service', $uneInscription->getIdService());		
        $requete->execute();

        $requete->closeCursor(); 																
        
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







