<?php

class Affichage_class {



    public static function getBoutonStatut($id_statut) {
			
        /* <option value="1">Nouveau</option>			info
        <option value="2">En cours</option>				warning
        <option value="3">Résolu</option>				success
        <option value="4">Re-ouvert</option> 			primary
        <option value="5">Cloturé</option>				default							
        <option value="6">Passer en 8D</option>	 		danger  */
        
        /* if($id_statut == 1)  {
            
            return "<div class='btn btn-info'>Nouveau</div>";
            
              
        } */
        
        switch($id_statut) {
            
            case 1:
                echo "<div class='btn btn-block btn-info mycss-button'>Nouveau</div>";
                break;
            case 2:
                echo "<div class='btn btn-block btn-warning mycss-button'>En cours</div>";
                break;
            case 3:
                echo "<div class='btn btn-block btn-success mycss-button'>Resolu</div>";
                break;
            case 4:
                echo "<div class='btn btn-block btn-primary mycss-button'>Re-ouvert</div>";
                break;
            case 5:
                echo "<div class='btn btn-block btn-secondary mycss-button'>Cloturé</div>";
                break;
            case 6:
                echo "<div class='btn btn-block btn-danger mycss-button'>En 8D</div>";
                break;		
        }		
        
    }

    public static function getNomUtilisateur($id_user) {
        self::setBdd();
         $requete = self::$_bdd->prepare('
            SELECT
            utilisateur
            FROM membres 
            WHERE id_user = ?');
        $requete->execute(array($id_user));	
        $reponse = $requete->fetchColumn();
        /* var_dump($reponse); */
        return $reponse;
        
    }



}