<?php

class Affichage extends Model {

    public function getPDOAffichage(){

        return $this->_db;

    }

    public function getBoutonStatut($id_statut) {
			
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
                return "<div class='btn btn-block btn-primary mycss-button-statut'>Nouveau</div>";
                
            case 2:
                return "<div class='btn btn-block btn-warning mycss-button-statut'>En cours</div>";
                
            case 3:
                return "<div class='btn btn-block btn-success mycss-button-statut'>Resolu</div>";
                
            case 4:
                return "<div class='btn btn-block btn-warning mycss-button-statut'>Re-ouvert</div>";
                
            case 5:
                return "<div class='btn btn-block btn-secondary mycss-button-statut'>Cloturé</div>";
                
            case 6:
                return "<div class='btn btn-block btn-danger mycss-button-statut'>En 8D</div>";
                		
        }		
        
    }
    public function getBoutonStatutMail($id_statut) {
			
      
        switch($id_statut) {
                      
            case 1:
                return "<div style='border: 1px solid transparent;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius:0.25rem;
            
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
            
                
                width: 80%;
                vertical-align: middle;
                text-align: center;
                margin: auto;
                padding-top: 3px '>Nouveau</div>";
                
            case 2:
                return "<div style='border: 1px solid transparent;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius:0.25rem;
            
                color: #212529;
                background-color: #ffc107;
                border-color: #ffc107;
            
                
                width: 80%;
                vertical-align: middle;
                text-align: center;
                margin: auto;
                padding-top: 3px '>En cours</div>";
                
            case 3:
                return "<div style='border: 1px solid transparent;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius:0.25rem;
            
                color: #fff;
                background-color: #28a745;
                border-color: #28a745;
            
                
                width: 80%;
                vertical-align: middle;
                text-align: center;
                margin: auto;
                padding-top: 3px '>Resolu</div>";
                
            case 4:
                return "<div style='border: 1px solid transparent;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius:0.25rem;
            
                color: #212529;
                background-color: #ffc107;
                border-color: #ffc107;
            
                
                width: 80%;
                vertical-align: middle;
                text-align: center;
                margin: auto;
                padding-top: 3px '>Re-ouvert</div>";
                
            case 5:
                return "<div style='border: 1px solid transparent;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius:0.25rem;
            
                color: #fff;
                background-color: #6c757d;
                border-color: #6c757d;
            
                
                width: 80%;
                vertical-align: middle;
                text-align: center;
                margin: auto;
                padding-top: 3px '>Cloturé</div>";
                
            case 6:
                return "<div style='border: 1px solid transparent;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius:0.25rem;
            
                color: #fff;
                background-color: #dc3545;
                border-color: #dc3545;
            
                
                width: 80%;
                vertical-align: middle;
                text-align: center;
                margin: auto;
                padding-top: 3px '>En 8D</div>";
                		
        }		
        
    }
    public function getLogin($id_user) {
        $requete = $this->_db->prepare('
            SELECT
            login
            FROM users 
            WHERE id_user = ?');
        $requete->execute(array($id_user));	
        $reponse = $requete->fetchColumn();
        /* var_dump($reponse); */
        return $reponse;
        
    }
    

    public function getLoginAndEmail($id_user) {
        $requete = $this->_db->prepare('
            SELECT
            login,
            email
            FROM users 
            WHERE id_user = ?');
        $requete->execute(array($id_user));	
        $reponse = $requete->fetch(PDO::FETCH_ASSOC);
        //var_dump($reponse);
        return $reponse;
        
    }

    public function getNomUnite($id_unite) {
        
         $requete = $this->_db->prepare('
            SELECT
            nom
            FROM unites_production
            WHERE id_unite = ?');
        $requete->execute(array($id_unite));	
        $reponse = $requete->fetchColumn();
        /* var_dump($reponse); */
        return $reponse;			
        
        
    }	
    
    public function getNomServiceUser($id_user){
        $requete = $this->_db->prepare('
        SELECT
		s.nom
		FROM services s
		INNER JOIN users u
		ON u.id_service = s.id_service
		WHERE u.id_user = ?');

        $requete->execute(array($id_user));	
        $reponse = $requete->fetchColumn();
        /* var_dump($reponse); */
        return $reponse;


    }
    public function getNomGroupeUser($id_user){
        $requete = $this->_db->prepare('
        SELECT
		g.nom
		FROM groupes_users g
		INNER JOIN users u
		ON u.id_groupe = g.id_groupe
		WHERE u.id_user = ?');

        $requete->execute(array($id_user));	
        $reponse = $requete->fetchColumn();
        /* var_dump($reponse); */
        return $reponse;


    }
}