<?php
class PdcaManager extends Model{
	
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //========= CRUD CREATE ===========================================================================================//

    public function enregistrerNouveauPdca(Pdca_class $pdca) {
			
        $requete = $this->_db->prepare('
            INSERT INTO pdcas (
                date_envoi,
                date_pdca,
                
                titre,
                ref_produit,
                statut,
                liste_unites,
                liste_destinataires,
                
                id_user,
                id_description,
                id_produit,
                id_document)
            VALUES (
                NOW(),
                :date_pdca,

                :titre,
                :ref_produit,
                :statut,
                :liste_unites,
                :liste_destinataires,
                
                :id_user,
                :id_description,
                :id_produit,
                :id_document)
        ');
        
        $requete->execute(array(
            'date_pdca' => $pdca->getDatePdca(),

            'titre' => $pdca->getTitre(),
            'ref_produit' => $pdca->getRefProduit(),
            'statut' => $pdca->getStatut(),
            'liste_unites' => $pdca->getListeUnites(), 
            'liste_destinataires' => $pdca->getListeDestinataires(),
            

            'id_user' => $pdca->getIdUser(),
            'id_description' => $pdca->getIdDescription(),
            'id_produit' => $pdca->getIdProduit(),
            'id_document' => $pdca->getIdDocument(),
            ));

        $requete->closeCursor(); 
        $this->hydraterEnTetePdca($pdca);	
        //var_dump("VARDUMP dans pdca manager NEW PDCA de : ===> pdca APRES SAV EN BDD :", $pdca);
        
        return true;  			
    }	

    public function hydraterEnTetePdca(Pdca_class $pdca) {
			
        $pdca->setIdPdca($this->_db->lastInsertId());

        $requete = $this->_db->prepare('SELECT date_envoi FROM pdcas WHERE id_pdca = ?');
        $requete->execute(array($pdca->getIdPdca())); // on passe l'id precedemment trouvé ligne du dessus
        $donnees = $requete->fetchColumn();
        $pdca->setDateEnvoi($donnees);
        $requete->closeCursor();   
    }


    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //========= CRUD READ SELECTION ===========================================================================================//

    // GET LISTE DE PDCA, EN HOME PAGE // MAIN FONCTION
    public function getListePdcaLimit($offset = 0, $parPage = null) {
                
        $pdcas = [];
        $offset = (int) $offset;
        $parPage = (int) $parPage;
        
        $requete = $this->_db->prepare('SELECT * FROM pdcas ORDER BY id_pdca DESC LIMIT :offset, :parPage');
        
        $requete->bindParam(':offset', $offset, PDO::PARAM_INT);
        $requete->bindParam(':parPage', $parPage, PDO::PARAM_INT);
        $requete->execute();

        $file = ROOT.DS.'app'.DS.'Pdca_class.php';
        require_once($file);
        
        while ($donnees = $requete->fetch(PDO::FETCH_ASSOC)){  
            $pdcas[] = new Pdca_class($donnees);
        }
        //var_dump($pdcas);
        $requete->closeCursor(); 
        
        return $pdcas;    // return un array : array[0] => { [id_pdca] => x / [date_envoi] => x / [date_pdca] =>  / [titre] => x }	

    }

    // GET UN PDCA EN FONCTION DE ID PASSE EN PARAMETRE , PAGE DESCRIPTION//
    public function getUnPdca($id) {
        
        $id = (int) $id;
        $requete = $this->_db->query('SELECT * FROM pdcas WHERE id_pdca = '.$id);
        if($donnees = $requete->fetch(PDO::FETCH_ASSOC)) { 		// RENVOI boolean false SI VIDE
            
            $file = ROOT.DS.'app'.DS.'Pdca_class.php';
            require_once($file);

            return new Pdca_class($donnees);
        }	
        else {
            return false;
        }
        $requete->closeCursor(); 
    }  

    // GET COUNT LE NOMBRE DE PDCA //
    public function countPdca() {
        return $this->_db->query('SELECT COUNT(*) FROM pdcas')->fetchColumn();
        $requete->closeCursor(); 
    }	


    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //========= COMPTEUR PDCA ===================================================================================================//
    
    // GET LE COMPTEUR DU PDCA //
    public function getCompteurUpdate($id) {
        $id = (int) $id;
        return $this->_db->query('SELECT compteur_update FROM pdcas WHERE id_pdca = '.$id)->fetchColumn();
        $requete->closeCursor(); 
    }    
    
    // UPDATE LE COMPTEUR DU PDCA //
    public function updateCompteurUpdate($idpdca, $value) {
        
        $requete = $this->_db->prepare('UPDATE pdcas SET compteur_update = :new_value WHERE id_pdca = :idpdca');
        
        $requete->execute(array(
            'idpdca' => $idpdca,
            'new_value' => $value
            ));	
        
        $requete->closeCursor(); 

    }	






    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //========= CRUD UPDATE ===================================================================================================//

    // APPEL AJAX // UPDATE STATUT EN FONCTION DE ID //
    public function updateStatut($idpdca, $value) {
        
        $requete = $this->_db->prepare('UPDATE pdcas SET statut = :value WHERE id_pdca = :idpdca');
        
        $requete->execute(array(
            'idpdca' => $idpdca,
            'value' => $value
            ));		

        $requete->closeCursor(); 

    }	
    

    // UPDATE STATUT EN CLOTURER // BOUTON ACTION DIRECT //
    public function updateStatutCloturer($id_pdca) {
        
        $requete = $this->_db->prepare('UPDATE pdcas SET statut = :new_statut WHERE id_pdca = :id_pdca');
        
        $requete->execute(array(
            'new_statut' => 5,
            'id_pdca' => $id_pdca,
            ));		

        $requete->closeCursor(); 

    }






    public function updateListeDestinataires($idpdca, $arrayDestinataires) {
			
        $requete = $this->_db->prepare('UPDATE pdcas SET liste_destinataires = :liste WHERE id_pdca = :idpdca');
        
        $requete->execute(array(
            'idpdca' => $idpdca,
            'liste' => serialize($arrayDestinataires),
            ));		

        $requete->closeCursor(); 

    }		
    
    public function getListeDestinataires($idpdca) {
        
        $requete = $this->_db->prepare('SELECT liste_destinataires FROM pdcas WHERE id_pdca = :idpdca');
        
        $requete->execute(array(
            'idpdca' => $idpdca,
        ));
        //var_dump($requete);
        $donnees = unserialize($requete->fetchColumn());
        
        $requete->closeCursor(); 
        
        //var_dump($donnees);
        return $donnees;
        

    }
    

    public function getListeUnites($idpdca) {
			
        $requete = $this->_db->prepare('SELECT liste_unites FROM pdcas WHERE id_pdca = :idpdca');
        
        $requete->execute(array(
            'idpdca' => $idpdca,
        ));

        $donnees = unserialize($requete->fetchColumn());
        
        $requete->closeCursor(); 
              
        return $donnees;
        
    }

    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //========= CRUD DELETE ===================================================================================================//


    // SUPPRIMER UN PDCA EN FONCTION DU PDCA PASSE EN PARAMETRE AVEC METHODE ID //
/* 		public function deletePdca(Pdca $pdca) {
        
        $this->_bdd->exec('DELETE FROM pdcas WHERE id_pdca = '.$pdca->getId());
    }
    
    
    // SUPPRIMER UN PDCA EN FONCTION DU ID //
    public function deletePdcaFromId($id) {
        
        $this->_bdd->exec('DELETE FROM pdcas WHERE id_pdca = '.$id);

    } */

    public function deletePdcaFromId($info) {
        
        if(is_a($info, 'Pdca_class')){
            $id = $info->getIdPdca();
        }
        else {
            $id = (int) $info;
        } 
        //var_dump($info);
        $requete = $this->_db->prepare('DELETE FROM pdcas WHERE id_pdca = :id');
        $requete->execute(array(
            'id' => $id));

        return true;
    }










    




    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   FONCTIONS MAIL  ==============================================================================================//	
    
    public function recupererTeamLeadersId() {
        
        $requete = $this->_db->query('
            SELECT
            u.id_user

            FROM users u
            INNER JOIN services s
            ON u.id_service = s.id_service
            WHERE s.slug = "teamleader"');
        /* $requete->execute(array($destinataire_id));	 */	
        $reponse = $requete->fetchAll(PDO::FETCH_COLUMN);
        
    //var_dump("ICI var_dump DANS pdcaManager recupererTeamLeadersId() DE reponse :", $reponse);	 // RENVOI UN ARRAY AVEC l' UTILSIATEUR  */	
    
        /*C:\wamp64\www\lab\24_projet_pdcatracker_new\model\PdcaManager.php:292:          
            0 => string '1' (length=1)
            1 => string '6' (length=1)*/

        return $reponse;
    }

    public function recupererInfosDestinataire($id_destinataire) {
        
        $requete = $this->_db->prepare('SELECT login, email FROM users WHERE id_user = ?');
        $requete->execute(array($id_destinataire));		
        $reponse = $requete->fetch(PDO::FETCH_ASSOC);
        
        //var_dump("ICI var_dump DANS pdcaManager recupererInfoDestinataire() DE reponse :", $reponse);	 // RENVOI UN ARRAY AVEC LE MAIL et UTILSIATEUR  */	
        
        return $reponse;
    }



    // ENVOI EMAIL LORS AJOUT AUX TEAM LEADER - NE FONCTIONNE PAS
            
    public function envoyerMail($auteur, $auteur_email, $destinataire, $destinataire_email, Pdca_class $pdca) {

        var_dump("ICI var_dump DANS pdcaManager envoyerMail() DE auteur :", $auteur);					// auteur = nicolas.olagnon
        var_dump("ICI var_dump DANS pdcaManager envoyerMail() DE auteur_email :", $auteur_email);	//auteur_email=nicolas.olagnon@ka-group.com
        var_dump("ICI var_dump DANS pdcaManager envoyerMail() DE destinataire :", $destinataire);		// $destinataire = nicolas.olagnon
        var_dump("ICI var_dump DANS pdcaManager envoyerMail() DE destinataire_email :", $destinataire_email);	// $destinataire = nicolas.olagnon@ka-group.com		

        
        
        $objet = 'PDCA Tracker: nouveau #'.$pdca->getIdPdca().' -(TEST)';
        
        // ======= Création de la boundary = frontiere ==============
        $boundary = "-----=".md5(rand());

        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers  = 'From: '.$auteur.' <'.$auteur_email.'>' . "\r\n";
        $headers .= 'Reply-to: '.$auteur.' <'.$auteur_email.'>' . "\r\n";
        $headers .= 'To: '.$destinataire.' <'.$destinataire_email.'>' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: multipart/mixed;'."\r\n"." boundary=\"$boundary\""."\r\n";			 

        

        // Message
        $message_txt = 'Texte affiché par des clients mail ne supportant pas le type MIME.'."\r\n\r\n";

        ob_start();
        include(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_mail.php');  
        $message_html = ob_get_contents();
        ob_end_clean(); 
        
        $message_html.=	"\r\n";
    
        
        //=====Ajout du message au format texte.
        $message = "\r\n".'--'.$boundary."\r\n"; 
        $message.= 'Content-Type: text/plain; charset=utf-8'."\r\n";
        $message.= 'Content-Transfer-Encoding: 8bit'."\r\n";
        $message.= "\r\n".$message_txt."\r\n";

        
        //=====Ajout du message au format HTML
        $message = "\r\n".'--'.$boundary."\r\n";
        $message.= 'Content-Type: text/html; charset=utf-8'."\r\n";
        $message.= 'Content-Transfer-Encoding: 8bit'."\r\n";
        $message.= "\r\n".$message_html."\r\n";			 
        
  
        //==========
        $message.= "\r\n"."--".$boundary."--"."\r\n";
        $message.= "\r\n"."--".$boundary."--"."\r\n";  
        
        
        //=====Envoi de l'e-mail.
        if(mail($destinataire_email, $objet, $message, $headers)) {
            echo "Votre message a bien été envoyé<br>";
            //flash('success', 'Cet email a bien été envoyé<br>');
        }
        else {
            echo "ERREUR : Votre message n'a pas pu être envoyé<br>";
            //flash('danger', 'ERREUR : Votre message n\'a pas pu être envoyé<br>');

        } 

    } 

    public function voirMail(Pdca_class $pdca) {

        ob_start();
            include(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_mail.php'); 
            $message_html = ob_get_contents();
        ob_end_clean();	
        
        /* var_dump("ICI var_dump DANS pdcaManager voirMail() DE message_html :", $message_html); */
        
        return $message_html;
    }






    public function envoyerSimpleMail($auteur, $auteur_email, $destinataire, $destinataire_email){
        
        $to = $destinataire_email;
        $subject = "HTML email";
        
        $message = "
            <html>
                <head>
                <title>HTML email</title>
                </head>
                <body>
                    <p>This email contains HTML Tags!</p>
                    <table>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                        </tr>
                    </table>
                </body>
            </html>
        ";
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <'.$auteur_email.'>' . "\r\n";

        
        $return = mail($to,$subject,$message,$headers);

        return $return;

    }



    public function envoyerMailBis($auteur, $auteur_email, $destinataire, $destinataire_email, Pdca_class $unPdca) {
        
        $file = ROOT.DS.'model'.DS.'Affichage.php';
        require_once($file);
	    $affichage = new Affichage();
        $listeNomsUnites = $_SESSION['listeNomsUnites'];
	
        $objet = 'PDCA Tracker: nouveau #'.$unPdca->getIdPdca();
        
        // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
        $headers  = 'From: '.$auteur.' <'.$auteur_email.'>' . "\r\n";
        $headers .= 'Reply-to: '.$auteur.' <'.$auteur_email.'>' . "\r\n";
        $headers .= 'To: '.$destinataire.' <'.$destinataire_email.'>' . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";			 

        ob_start();
        include(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_mail.php');  
        $message_html = ob_get_contents();
        ob_end_clean(); 
        
        $message_html.=	"\r\n";
    
        
        $message= "\r\n".$message_html."\r\n";			 
        
        
        //=====Envoi de l'e-mail.
        return mail($destinataire_email, $objet, $message, $headers); 

    } 
 









































}