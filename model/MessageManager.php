<?php 
	
class MessageManager extends Model{
		

    public function enregistrerNewMessage(Message_class $objetMessage) {
    
        $requete = $this->_db->prepare('
        INSERT INTO messages (
            message, 
            date_ajout, 
            id_pdca, 
            id_user) 
        VALUES (
            :message, 
            NOW(), 
            :id_pdca, 
            :id_user) ');
            
        $requete->execute(array(
            'message' => $objetMessage->getMessage(), 
            'id_pdca' => $objetMessage->getIdPdca(), 
            'id_user' => $objetMessage->getIdUser(),
        ));
        
        return 1;
    
    }
    
    
    
    public function getListeMessagesFromIdPdca($id_pdca) {
    
        $listeCommentaires = [];
        
        $requete = $this->_db->prepare('SELECT 
            m.id_message, 
            m.message,
            m.date_ajout,
            m.id_pdca,
            m.id_user,
            u.prenom,
            u.nom,
            u.login			
            FROM messages m
            INNER JOIN users u
            ON m.id_user = u.id_user
            WHERE m.id_pdca = :id_pdca
            ORDER BY m.date_ajout DESC');
            
        $requete->execute(array(
            'id_pdca' => $id_pdca,
        ));
        
        /* $donnees = $requete->fetchAll(PDO::FETCH_ASSOC); */
        
        /* debug("ICI LE DEBUG DE COMMENTAIRE", $donnees);  */
        
            /* RESULTAT DEBUG : 
            
                Array
                (
                    [0] => Array
                        (
                            [id_commentaire] => 1
                            [message] => 						zefzefzefzef
                            [date_ajout] => 2016-07-26 12:00:53
                            [id_pdca] => 1
                            [id_user] => 1
                        )

                    [1] => Array
                        (
                            [id_commentaire] => 24
                            [message] => nouveau pour pdca id 1
                            [date_ajout] => 2016-07-27 11:46:16
                            [id_pdca] => 1
                            [id_user] => 1
                        )

                    [2] => Array
                        (
                            [id_commentaire] => 45
                            [message] => nouveau2 pour pdca id 1
                            [date_ajout] => 2016-07-27 11:46:28
                            [id_pdca] => 1
                            [id_user] => 1
                        )

                    [3] => Array
                        (
                            [id_commentaire] => 66
                            [message] => nouveau2 pour pdca id 1
                            [date_ajout] => 2016-07-27 11:46:46
                            [id_pdca] => 1
                            [id_user] => 1
                        )

                ) */
        
/* 			while ($donnees = $requete->fetch(PDO::FETCH_ASSOC))  
        {
            $listeCommentaires[] = new Commentaire($donnees);
        } */

        $donnees = $requete->fetchAll(PDO::FETCH_CLASS, 'Message_class');

        //var_dump($donnees);
        $requete->closeCursor(); 
        
        /* return $listeCommentaires; */ 			// return un array : array[0] => { [id_pdca] => x / [date_envoi] => x / [date_pdca] =>  / [titre] => x }	
        return $donnees;		
    }		

}
	