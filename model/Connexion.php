<?php
class Connexion extends Model{
	

    public function getUtilisateur($login){
        $requete = $this->_db->prepare('SELECT * FROM users WHERE login = :login');
        $requete->execute(array('login' => $login));
        $reponse = $requete->fetch(PDO::FETCH_ASSOC);
        $requete->closeCursor(); 
        //var_dump($reponse);
        return $reponse;
    }



}