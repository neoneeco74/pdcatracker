<?php
class DescriptionManager extends Model{
	
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //========= CRUD CREATE ===========================================================================================//


    public function enregistrerNewDescription(Description_class $description) {
			
        $requete = $this->_db->prepare('
            INSERT INTO descriptions_pdcas (
                champ_qui,
                champ_quoi,
                champ_quand,
                champ_ou,					
                champ_comment,
                champ_pourquoi,
                champ_nb_defauts,
                champ_protege,
                champ_cause,
                champ_reproductible,
                champ_action_racine,
                champ_amelioration,
                champ_date_redemarrage,
                champ_duree_arret,
                champ_pilote,

                champ_visa_superviseur,
                champ_visa_resp_prod,
                champ_visa_directeur,
                id_pdca) 
            VALUES (
                :champ_qui,
                :champ_quoi,
                :champ_quand,
                :champ_ou,					
                :champ_comment,
                :champ_pourquoi,
                :champ_nb_defauts,
                :champ_protege,
                :champ_cause,
                :champ_reproductible,
                :champ_action_racine,
                :champ_amelioration,
                :champ_date_redemarrage,
                :champ_duree_arret,
                :champ_pilote,

                :champ_visa_superviseur,
                :champ_visa_resp_prod,
                :champ_visa_directeur,
                :id_pdca)
            ');	
        
/* 			$requete->execute(array(
            "champ_qui" => $description->getVar_qui(),
            "champ_quoi" => $description->getVar_quoi(),
            "champ_quand" => $description->getVar_quand(),
            "champ_ou" => $description->getVar_ou(),
            "champ_comment" => $description->getVar_comment(),
            "champ_pourquoi" => $description->getVar_pourquoi(),
            "champ_nb_defauts" => $description->getVar_nb_defaut(),
            "champ_protege " => $description->getVar_protege(),
            "champ_cause " => $description->getVar_cause(),
            "champ_reproductible" => $description->getVar_reproductible(),
            "champ_action_racine " => $description->getVar_action_racine(),
            "champ_amelioration" => $description->getVar_amelioration(),
            "champ_date_redemarrage" => $description->getVar_date_redemarrage(),
            "champ_duree_arret" => $description->getVar_duree_arret(),
            "champ_pilote" => $description->getVar_pilote(),
            "champ_visa_superviseur" => $description->getVar_visa_superviseur(),
            "champ_visa_resp_prod" => $description->getVar_visa_resp_prod(),
            "champ_visa_directeur" => $description->getVar_visa_directeur(),
            "champ_id_pdca" => $description->getVar_id_pdca(),
            ));	 */			


    
        $requete->bindValue(':champ_qui', $description->getVar_qui(), PDO::PARAM_STR); 
        $requete->bindValue(':champ_quoi', $description->getVar_quoi(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quand', $description->getVar_quand(), PDO::PARAM_STR);
        $requete->bindValue(':champ_ou', $description->getVar_ou(), PDO::PARAM_STR);
        $requete->bindValue(':champ_comment', $description->getVar_comment(), PDO::PARAM_STR);
        $requete->bindValue(':champ_pourquoi', $description->getVar_pourquoi(), PDO::PARAM_STR);
        $requete->bindValue(':champ_nb_defauts', $description->getVar_nb_defauts(), PDO::PARAM_INT);
        $requete->bindValue(':champ_protege', $description->getVar_protege(), PDO::PARAM_STR);
        $requete->bindValue(':champ_cause', $description->getVar_cause(), PDO::PARAM_STR);
        $requete->bindValue(':champ_reproductible', $description->getVar_reproductible(), PDO::PARAM_STR);
        $requete->bindValue(':champ_action_racine', $description->getVar_action_racine(), PDO::PARAM_STR);
        $requete->bindValue(':champ_amelioration', $description->getVar_amelioration(), PDO::PARAM_STR);
        $requete->bindValue(':champ_date_redemarrage', $description->getVar_date_redemarrage(), PDO::PARAM_STR);
        $requete->bindValue(':champ_duree_arret', $description->getVar_duree_arret(), PDO::PARAM_STR);
        $requete->bindValue(':champ_pilote', $description->getVar_pilote(), PDO::PARAM_STR);

        $requete->bindValue(':champ_visa_superviseur', $description->getVar_visa_superviseur(), PDO::PARAM_STR);
        $requete->bindValue(':champ_visa_resp_prod', $description->getVar_visa_resp_prod(), PDO::PARAM_STR);
        $requete->bindValue(':champ_visa_directeur', $description->getVar_visa_directeur(), PDO::PARAM_STR);
        $requete->bindValue(':id_pdca', $description->getVar_id_pdca(), PDO::PARAM_INT); 
     
        $requete->execute();

        $description->setVar_id_description($this->_db->lastInsertId());
        
        $requete->closeCursor();

        return 1;  			
    }


    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //========= CRUD READ ===========================================================================================//
	

    // GET UNE DESCRIPTION PDCA EN PRENANT LE PDCA DONNE EN PARAMETRE //
    public function getDescription($unPdca) {
        
        $id = $unPdca->getIdPdca();

        $requete = $this->_db->query('SELECT * FROM descriptions_pdcas WHERE id_pdca = '.$id);
        
        if($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {		// RENVOI boolean false SI VIDE
             
            $file = ROOT.DS.'app'.DS.'Description_class.php';
            require_once($file);

            return new Description_class($donnees);
            
        }	
        else {
            return false;
        }
        
    }
    
    
    

    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   MODIFICATION =====================================================================================================//
    

    // UPDATE UN PDCA //
    public function updateDescription(Description_class $description)	{
                
        $requete = $this->_db->prepare('
            UPDATE descriptions_pdcas
            SET 
                champ_qui = :champ_qui,
                champ_quoi = :champ_quoi,
                champ_quand = :champ_quand,
                champ_ou = :champ_ou,					
                champ_comment = :champ_comment,
                champ_pourquoi = :champ_pourquoi,
                champ_nb_defauts = :champ_nb_defauts,
                champ_protege = :champ_protege,
                champ_cause = :champ_cause,
                champ_reproductible = :champ_reproductible,
                champ_action_racine = :champ_action_racine,
                champ_amelioration = :champ_amelioration,
                champ_date_redemarrage = :champ_date_redemarrage,
                champ_duree_arret = :champ_duree_arret,
                champ_pilote = :champ_pilote,
                champ_visa_superviseur = :champ_visa_superviseur,
                champ_visa_resp_prod = :champ_visa_resp_prod,
                champ_visa_directeur = :champ_visa_directeur
            WHERE
                id_description = :id_description
            ');	
        
/* 			$requete->execute(array(
            "champ_qui" => $description->getVar_qui(),
            "champ_quoi" => $description->getVar_quoi(),
            "champ_quand" => $description->getVar_quand(),
            "champ_ou" => $description->getVar_ou(),
            "champ_comment" => $description->getVar_comment(),
            "champ_pourquoi" => $description->getVar_pourquoi(),
            "champ_nb_defauts" => $description->getVar_nb_defaut(),
            "champ_protege " => $description->getVar_protege(),
            "champ_cause " => $description->getVar_cause(),
            "champ_reproductible" => $description->getVar_reproductible(),
            "champ_action_racine " => $description->getVar_action_racine(),
            "champ_amelioration" => $description->getVar_amelioration(),
            "champ_date_redemarrage" => $description->getVar_date_redemarrage(),
            "champ_duree_arret" => $description->getVar_duree_arret(),
            "champ_pilote" => $description->getVar_pilote(),
            "champ_visa_superviseur" => $description->getVar_visa_superviseur(),
            "champ_visa_resp_prod" => $description->getVar_visa_resp_prod(),
            "champ_visa_directeur" => $description->getVar_visa_directeur(),
            "champ_id_pdca" => $description->getVar_id_pdca(),
            ));	 */			


    
        $requete->bindValue(':champ_qui', $description->getVar_qui(), PDO::PARAM_STR); 
        $requete->bindValue(':champ_quoi', $description->getVar_quoi(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quand', $description->getVar_quand(), PDO::PARAM_STR);
        $requete->bindValue(':champ_ou', $description->getVar_ou(), PDO::PARAM_STR);
        $requete->bindValue(':champ_comment', $description->getVar_comment(), PDO::PARAM_STR);
        $requete->bindValue(':champ_pourquoi', $description->getVar_pourquoi(), PDO::PARAM_STR);
        $requete->bindValue(':champ_nb_defauts', $description->getVar_nb_defauts(), PDO::PARAM_INT);
        $requete->bindValue(':champ_protege', $description->getVar_protege(), PDO::PARAM_STR);
        $requete->bindValue(':champ_cause', $description->getVar_cause(), PDO::PARAM_STR);
        $requete->bindValue(':champ_reproductible', $description->getVar_reproductible(), PDO::PARAM_STR);
        $requete->bindValue(':champ_action_racine', $description->getVar_action_racine(), PDO::PARAM_STR);
        $requete->bindValue(':champ_amelioration', $description->getVar_amelioration(), PDO::PARAM_STR);
        $requete->bindValue(':champ_date_redemarrage', $description->getVar_date_redemarrage(), PDO::PARAM_STR);
        $requete->bindValue(':champ_duree_arret', $description->getVar_duree_arret(), PDO::PARAM_STR);
        $requete->bindValue(':champ_pilote', $description->getVar_pilote(), PDO::PARAM_STR);
        $requete->bindValue(':champ_visa_superviseur', $description->getVar_visa_superviseur(), PDO::PARAM_STR);
        $requete->bindValue(':champ_visa_resp_prod', $description->getVar_visa_resp_prod(), PDO::PARAM_STR);
        $requete->bindValue(':champ_visa_directeur', $description->getVar_visa_directeur(), PDO::PARAM_STR);
        /* $requete->bindValue(':champ_id_pdca', $description->getVar_id_pdca(), PDO::PARAM_INT);  */
        $requete->bindValue(':id_description', $description->getVar_id_description(), PDO::PARAM_INT);
    
        $requete->execute();

        $requete->closeCursor();

        return 1;  			
    }	




    
    
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   SUPPRESSION =====================================================================================================//
    
    
    // SUPPRIMER UNE DESCRIPTION EN FONCTION DU PDCA PASSE EN PARAMETRE AVEC METHODE ID //
    public function deleteDescription(Description_class $description) {
        
        $this->_db->exec('DELETE FROM descriptions_pdcas WHERE id_description = '.$description->getVar_id_description());
    }



























































	
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   ENREGISTREMENT ==============================================================================================//
    
    
    public function enregistrerNewDescription8d(Description8d_class $description8d) {
        
        $requete = $this->_db->prepare('
            INSERT INTO descriptions_8d (
                champ_datecreation,
                champ_responsable,

                champ_produit,
                champ_refkoa,
                champ_refclient,

                champ_description,
                champ_niv_incident,
                champ_num_incident_koa,
                champ_num_incident_client,
                champ_site_client,
                champ_quantite_nok,

                champ_evenement,
                champ_pourquoi,
                champ_quand,
                champ_qui,
                champ_ou,
                champ_comment,
                champ_combien,

                champ_difference,
                champ_standard,
                champ_quandproduite,
                champ_quiproduite,
                champ_autreprocess,
                champ_arretdefaut,
                champ_pbsimilaire,
                champ_id_pdca)
                
            VALUES (
                NOW(),
                :champ_responsable,

                :champ_produit,
                :champ_refkoa,
                :champ_refclient,

                :champ_description,
                :champ_niv_incident,
                :champ_num_incident_koa,
                :champ_num_incident_client,
                :champ_site_client,
                :champ_quantite_nok,

                :champ_evenement,
                :champ_pourquoi,
                :champ_quand,
                :champ_qui,
                :champ_ou,
                :champ_comment,
                :champ_combien,

                :champ_difference,
                :champ_standard,
                :champ_quandproduite,
                :champ_quiproduite,
                :champ_autreprocess,
                :champ_arretdefaut,
                :champ_pbsimilaire,
                :champ_id_pdca)
            ');	
        
        /* $requete->bindValue(':champ_datecreation', $description8d->getVar_datecreation(), PDO::PARAM_STR); */ 
        $requete->bindValue(':champ_responsable', $description8d->getVar_responsable(), PDO::PARAM_STR);
        
        $requete->bindValue(':champ_produit', $description8d->getVar_produit(), PDO::PARAM_STR);
        $requete->bindValue(':champ_refkoa', $description8d->getVar_refkoa(), PDO::PARAM_STR);
        $requete->bindValue(':champ_refclient', $description8d->getVar_refclient(), PDO::PARAM_STR);
        
        $requete->bindValue(':champ_description', $description8d->getVar_description(), PDO::PARAM_STR);
        $requete->bindValue(':champ_niv_incident', $description8d->getVar_niv_incident(), PDO::PARAM_INT);
        $requete->bindValue(':champ_num_incident_koa', $description8d->getVar_num_incident_koa(), PDO::PARAM_INT);
        $requete->bindValue(':champ_num_incident_client', $description8d->getVar_num_incident_client(), PDO::PARAM_INT);
        $requete->bindValue(':champ_site_client', $description8d->getVar_site_client(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quantite_nok', $description8d->getVar_quantite_nok(), PDO::PARAM_INT);
        
        $requete->bindValue(':champ_evenement', $description8d->getVar_evenement(), PDO::PARAM_STR);
        $requete->bindValue(':champ_pourquoi', $description8d->getVar_pourquoi(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quand', $description8d->getVar_quand(), PDO::PARAM_STR);
        $requete->bindValue(':champ_qui', $description8d->getVar_qui(), PDO::PARAM_STR);
        $requete->bindValue(':champ_ou', $description8d->getVar_ou(), PDO::PARAM_STR);
        $requete->bindValue(':champ_comment', $description8d->getVar_comment(), PDO::PARAM_STR);
        $requete->bindValue(':champ_combien', $description8d->getVar_combien(), PDO::PARAM_STR);
        
        $requete->bindValue(':champ_difference', $description8d->getVar_difference(), PDO::PARAM_STR);
        $requete->bindValue(':champ_standard', $description8d->getVar_standard(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quandproduite', $description8d->getVar_quandproduite(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quiproduite', $description8d->getVar_quiproduite(), PDO::PARAM_STR);
        $requete->bindValue(':champ_autreprocess', $description8d->getVar_autreprocess(), PDO::PARAM_STR);
        $requete->bindValue(':champ_arretdefaut', $description8d->getVar_arretdefaut(), PDO::PARAM_STR);
        $requete->bindValue(':champ_pbsimilaire', $description8d->getVar_pbsimilaire(), PDO::PARAM_STR);

        $requete->bindValue(':champ_id_pdca', $description8d->getVar_id_pdca(), PDO::PARAM_INT); 
    
        $requete->execute();

        $description8d->setVar_id_description8d($this->_db->lastInsertId());
        //var_dump("DEBUG 413 ICI class description8d manager --> de description8d : ", $description8d); 
        $requete->closeCursor();

        return 1;  			
    }			

    /*======================== SELECTION   =========================*/	

    // GET UNE DESCRIPTION PDCA EN PRENANT LE PDCA DONNE EN PARAMETRE //
    public function getDescription8d($unPdca) {
        
        $id = $unPdca->getIdPdca();

        $requete = $this->_db->query('SELECT * FROM descriptions_8d WHERE champ_id_pdca = '.$id);
        
        if($donnees = $requete->fetch(PDO::FETCH_ASSOC)) {		// RENVOI boolean false SI VIDE
            /* var_dump("VARDUMP 0 dans class description_manager de : ===> donnees :", $donnees); */
            return new Description8d_class($donnees);
        }	
        else {
            return false;
        }
        
    }
    
    
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   MODIFICATION =====================================================================================================//
    

    // UPDATE UNE DESCRIPTION 8D //
    public function updateDescription8d(Description8d_class $description8d)	{
                
        $requete = $this->_db->prepare('
            UPDATE descriptions_8d SET 
                champ_responsable = :champ_responsable,
                champ_produit = :champ_produit,
                champ_refkoa = :champ_refkoa,
                champ_refclient = :champ_refclient,
                champ_description = :champ_description,
                champ_niv_incident = :champ_niv_incident,
                champ_num_incident_koa = :champ_num_incident_koa,
                champ_num_incident_client = :champ_num_incident_client,
                champ_site_client = :champ_site_client,
                champ_quantite_nok = :champ_quantite_nok,
                champ_evenement = :champ_evenement,
                champ_pourquoi = :champ_pourquoi,
                champ_quand = :champ_quand,
                champ_qui = :champ_qui,
                champ_ou = :champ_ou,
                champ_comment = :champ_comment,
                champ_combien = :champ_combien,
                champ_difference = :champ_difference,
                champ_standard = :champ_standard,
                champ_quandproduite = :champ_quandproduite,
                champ_quiproduite = :champ_quiproduite,
                champ_autreprocess = :champ_autreprocess,
                champ_arretdefaut = :champ_arretdefaut,
                champ_pbsimilaire = :champ_pbsimilaire
                
            WHERE
                id_description8d = :id_description8d
            ');	
        
        /* $requete->bindValue(':champ_datecreation', $description8d->getVar_datecreation(), PDO::PARAM_STR); */ 
        $requete->bindValue(':champ_responsable', $description8d->getVar_responsable(), PDO::PARAM_STR);
        
        $requete->bindValue(':champ_produit', $description8d->getVar_produit(), PDO::PARAM_STR);
        $requete->bindValue(':champ_refkoa', $description8d->getVar_refkoa(), PDO::PARAM_STR);
        $requete->bindValue(':champ_refclient', $description8d->getVar_refclient(), PDO::PARAM_STR);
        
        $requete->bindValue(':champ_description', $description8d->getVar_description(), PDO::PARAM_STR);
        $requete->bindValue(':champ_niv_incident', $description8d->getVar_niv_incident(), PDO::PARAM_INT);
        $requete->bindValue(':champ_num_incident_koa', $description8d->getVar_num_incident_koa(), PDO::PARAM_INT);
        $requete->bindValue(':champ_num_incident_client', $description8d->getVar_num_incident_client(), PDO::PARAM_INT);
        $requete->bindValue(':champ_site_client', $description8d->getVar_site_client(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quantite_nok', $description8d->getVar_quantite_nok(), PDO::PARAM_INT);
        
        $requete->bindValue(':champ_evenement', $description8d->getVar_evenement(), PDO::PARAM_STR);
        $requete->bindValue(':champ_pourquoi', $description8d->getVar_pourquoi(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quand', $description8d->getVar_quand(), PDO::PARAM_STR);
        $requete->bindValue(':champ_qui', $description8d->getVar_qui(), PDO::PARAM_STR);
        $requete->bindValue(':champ_ou', $description8d->getVar_ou(), PDO::PARAM_STR);
        $requete->bindValue(':champ_comment', $description8d->getVar_comment(), PDO::PARAM_STR);
        $requete->bindValue(':champ_combien', $description8d->getVar_combien(), PDO::PARAM_STR);
        
        $requete->bindValue(':champ_difference', $description8d->getVar_difference(), PDO::PARAM_STR);
        $requete->bindValue(':champ_standard', $description8d->getVar_standard(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quandproduite', $description8d->getVar_quandproduite(), PDO::PARAM_STR);
        $requete->bindValue(':champ_quiproduite', $description8d->getVar_quiproduite(), PDO::PARAM_STR);
        $requete->bindValue(':champ_autreprocess', $description8d->getVar_autreprocess(), PDO::PARAM_STR);
        $requete->bindValue(':champ_arretdefaut', $description8d->getVar_arretdefaut(), PDO::PARAM_STR);
        $requete->bindValue(':champ_pbsimilaire', $description8d->getVar_pbsimilaire(), PDO::PARAM_STR);
        
        /* $requete->bindValue(':champ_id_pdca', $description8d->getVar_id_pdca(), PDO::PARAM_INT);  */
        $requete->bindValue(':id_description8d', $description8d->getVar_id_description8d(), PDO::PARAM_INT);
        
        $requete->execute();

        $requete->closeCursor();

        return 1;  			
    }	




		
		
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   SUPPRESSION =====================================================================================================//
    
    
    // SUPPRIMER UNE DESCRIPTION 8D EN FONCTION DE LA DESCRIPTION 8D PASSE EN PARAMETRE AVEC METHODE ID //
    public function deleteDescription8d(Description8d_class $description8d) {
        
        $this->_db->exec('DELETE FROM descriptions_8d WHERE id_description8d = '.$description8d->getVar_id_description8d());
    }


















    

    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   FICHIERS =====================================================================================================//

    
    public function enregistrerFichierEnBdd($nomFichier, $id_pdca, $label) {
            
        $adresse = "pdca_".$id_pdca."\\".$nomFichier;
        //$type = 'piecejointe';
        
        if($label == "upload_fichiers_correct") {
        
            $adresse = "pdca_".$id_pdca."\\document_8d\\".$nomFichier;
            $champ_type = 'correct';
        }
        elseif($label == "upload_fichiers_incorrect") {
            $adresse = "pdca_".$id_pdca."\\document_8d\\".$nomFichier;
            $champ_type = 'incorrect';
        }
        elseif($label == 'piecejointe'){
            $champ_type = 'piecejointe';
        }
        
        
        $requete = $this->_db->prepare('
            INSERT INTO fichiers (adresse, nom, champ_type, id_pdca) 
            VALUES (:adresse, :nom, :champ_type, :id_pdca) ');
        
        $requete->execute(array(
            'adresse' => $adresse, 
            'nom' => $nomFichier,
            'champ_type' => $champ_type,
            'id_pdca' => $id_pdca, 
            
        ));
        
        $requete->closeCursor();			
    }



    public function recupererFichiers($id_pdca, $champ_type) {
        $requete = $this->_db->prepare('SELECT id_fichier, adresse FROM fichiers WHERE champ_type = :champ_type AND id_pdca = :id_pdca ');
        $requete->execute(array(
            'champ_type' => $champ_type,
            'id_pdca' => $id_pdca, 
        ));
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        //var_dump("VARDUMP 25 dans pdca_manager de : ===> donnees:", $donnees); 
        
        return $donnees;
                    
    }		
    
    public function deleteFichierFromId($id_fichier) {
        
        $requete = $this->_db->prepare('DELETE FROM fichiers WHERE id_fichier = :id');
        $requete->execute(array(
            'id' => $id_fichier));

        return true;
    }
    
    
/*     public function recupererFichierst8dCorrec($id_pdca) {
        
        //$requete = $this->_db->prepare('SELECT adresse FROM fichiers WHERE adresse LIKE "%document_8d\correct%" AND id_pdca = :id_pdca');
        $requete = $this->_db->prepare('SELECT adresse FROM fichiers WHERE type AND id_pdca = :id_pdca');
        
        $requete->execute(array(
            'id_pdca' => $id_pdca, 
        ));
        
        $donnees = $requete->fetchAll(PDO::FETCH_COLUMN);
 			var_dump("VARDUMP 75 dans pdca_manager de : ===> donnees:", $donnees);  
        
        return $donnees;
                    
    }
    public function recupererFichiers8dIncorrect($id_pdca) {
        
        $requete = $this->_db->prepare('SELECT adresse FROM fichiers WHERE adresse LIKE "%document_8d\incorrect%" AND id_pdca = :id_pdca');
        
        $requete->execute(array(
            'id_pdca' => $id_pdca, 
        ));
        
        $donnees = $requete->fetchAll(PDO::FETCH_COLUMN);
 			//var_dump("VARDUMP 585 dans pdca_manager de : ===> donnees:", $donnees);
        
        return $donnees;
                    
    }		 */



    public function remplacerCar($string)
    {
        $match = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'è', 'é', 'ê', 'ë', 'ç', 'ì', 'í', 'î', 'ï', 'ù', 'ú', 'û', 'ü', 'ÿ', 'ñ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'È', 'É', 'Ê', 'Ë', 'Ç', 'Ì', 'Í', 'Î', 'Ï', 'Ù', 'Ú', 'Û', 'Ü', 'Ÿ', 'Ñ');
        $contain = array('a', 'a', 'a', 'a', 'a', 'a', 'o', 'o', 'o', 'o', 'o', 'o', 'e', 'e', 'e', 'e', 'c', 'i', 'i', 'i', 'i', 'u', 'u', 'u', 'u', 'y', 'n', 'A', 'A', 'A', 'A', 'A', 'A', 'O', 'O', 'O', 'O', 'O', 'O', 'E', 'E', 'E', 'E', 'C', 'I', 'I', 'I', 'I', 'U', 'U', 'U', 'U', 'Y', 'N');
                
        return str_replace($match, $contain, $string);
    }

    public function nettoyerCar($string)
    {
        $search = array('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@([^.a-z0-9]+)@i');
        $replace = array('e','a','i','u','o','c','_','');	 		
        return preg_replace($search, $replace, $string);
    }










    public function verifierFichier(array $data, Pdca_class $pdca, $label) {
        
        // 1) Test si fichier present et PAS d'erreur
        if ($data['error'] == 0) {
            
            $nomFichier = basename($data['name']);
            //var_dump($nomFichier);  //'www.dmzwarez.info_Natures_ 0002.jpg'
            $dossierRacine = 'uploaded_files';
            $tailleFichier = filesize($data['tmp_name']);
            $tailleMax = 5000000; /* 1 Mo use. en octets. 1 Mo = 1000 ko = 1 000 000  octet*/
            
            
            
            // 2) TEST si fichier PAS trop gros	
            if($tailleFichier <= $tailleMax) {
                
                
                
                // 3) TEST si extension OK
                //Trouve la dernière occurrence d'un caractère dans une chaîne				
                $extension_upload = strrchr($nomFichier, '.'); 
                $extensions_autorisees = array('.jpg', '.jpeg', '.gif', '.png', '.bmp');
                
                if (in_array($extension_upload, $extensions_autorisees)) {
                    
                    
                    
                    // 4) FORMATAGE AUTO si besoin
                    $nouveauNomFichier = $this->remplacerCar($nomFichier);
                    $nouveauNomFichier = $this->nettoyerCar($nouveauNomFichier);
                    //var_dump($nouveauNomFichier);   //'www.dmzwarez.infoNatures0002.jpg'
/* 					$nomFichier = strtr($nomFichier, "ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ","AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy");
                    $nomFichier = preg_replace('/([^.a-z0-9]+)/i', 'X', $nomFichier);		/* REMPLACE DANS LA CHAINE TOUT CE QUI NEST PAS VALABLE PAR UN tiret -    */ 

                    
                    
                    // 5) RAJOUT CLE UNIQUE
                    $now = date("Y-m-d-His");
                    if($label == "upload_fichiers_correct") {
                        $nouveauNomFichierUnique = 'correct_'.$now.'_'.$nouveauNomFichier;  /* '.'.$extension_upload TESTER OK PAS BESOIN */
                    }
                    else if($label == "upload_fichiers_incorrect") {
                        $nouveauNomFichierUnique = 'incorrect_'.$now.'_'.$nouveauNomFichier;
                    }
                    else {
                        $nouveauNomFichierUnique = $now.'_'.$nouveauNomFichier;  /* '.'.$extension_upload */
                    }
                    
                    // 6) COUPURE SI TROP LONG
/* 						2016-07-25-142442_img2eeeechainneeooeeaa hahahao */
                    $limite = 40;
                    if(strlen($nouveauNomFichierUnique) >= $limite ) {
                        $nouveauNomFichierUnique = substr($nouveauNomFichierUnique, 0, $limite);
                        $nouveauNomFichierUnique .= "__".$extension_upload;
                    }
                

                    // 7) CREATION DU DOSSIER DE DESTINATION
                    if($label == "upload_fichiers_correct" OR $label == "upload_fichiers_incorrect") {
                        $dossier_destination = ROOT.'/'.$dossierRacine.'/pdca_'.$pdca->getIdPdca().'/document_8d/';
                    }
                    else {
                        $dossier_destination = ROOT.'/'.$dossierRacine.'/pdca_'.$pdca->getIdPdca().'/';
                        //$dossier_destination = BASE_URL.$dossierRacine.'pdca_'.$pdca->getIdPdca().DS;
                        //var_dump('vardump ICI :', $dossier_destination);

                    }
                    //var_dump("ici vardump de pdca maanger file : ", __DIR__ , __FILE__);
                    if(!file_exists($dossier_destination)) { 
                    /* 	echo "Le dossier de destinatation n'existe pas<br>";  */
                        // On créé le dossier 
                        if(mkdir($dossier_destination, 0777, true)) { 
                         	//echo "Le dossier de destinatation a été créé<br>";  
                        } 
                        else { 
                 			//echo "Le dossier de destinatation n'a pas été créé<br>";  
                        } 
                    } 
                    else { 
                    
                        // 8) GESTION DOUBLON
                        /* 2016-08_img.jpg */
                        /* if(file_exists(__DIR__ .'\..\upload_files\\'. $nouveauNomFichierUnique)) { */
                        if(file_exists($dossier_destination.$nouveauNomFichierUnique)) {
                            $compteur_file_exist = 1;
                            $nouveauNomFichierUnique .= '_copy('.$compteur_file_exist.')'.$extension_upload; /*2016-08_img.jpg_copy(1).jpg */
                            
                            /* while(file_exists(__DIR__ .'\..\upload_files\\'. $nouveauNomFichierUnique)) { */
                            while(file_exists($dossier_destination.$nouveauNomFichierUnique)) {	
                                $match = '_copy('.$compteur_file_exist.')';
                                $compteur_file_exist++;
                                $contain = '_copy('.$compteur_file_exist.')';
                                $nouveauNomFichierUnique = str_replace($match, $contain, $nouveauNomFichierUnique);
                            }
                            
                        }			
                    }
                    
                    // 8) ENREGISTREMENT
                    if(move_uploaded_file($data['tmp_name'], $dossier_destination.$nouveauNomFichierUnique)) {
                        
                        $resultat = array("1", $nouveauNomFichierUnique);
                        /* $this->enregistrerFichier($nouveauNomFichierUnique); */
                        return $resultat;
                        
                    }
                    else {
                        $erreur = 'Erreur : Erreur move_uploaded.';
                        //var_dump($data);
                        return $erreur;
                    } 
                }
                else {
                    $erreur = 'Erreur : Extension non autorisée.';
                    //var_dump($data);
                    return $erreur;
                }
            }
            else {
                $erreur = 'Erreur : Fichier trop volumineux.';
                //var_dump($data);
                return $erreur;
            }
        }
        else {
            $erreur[] = 'Erreur : Erreur lors de l\'upload.';
            if ($data['error']) {     
                switch ($data['error']){     
                    case 1: 	// UPLOAD_ERR_INI_SIZE     
                        $erreur[] = "Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
                        return $erreur;
                        break;     
                    case 2: 	// UPLOAD_ERR_FORM_SIZE     
                        $erreur[] =  "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
                        return $erreur;
                        break;     
                    case 3: 	// UPLOAD_ERR_PARTIAL     
                        $erreur[] =  "L'envoi du fichier a été interrompu pendant le transfert !";     
                        return $erreur;
                        break;     
                    case 4: 	// UPLOAD_ERR_NO_FILE     
                        $erreur[] =  "Le fichier que vous avez envoyé a une taille nulle !"; 
                        return $erreur;
                        break; 
                    case 6: 	// UPLOAD_ERR_NO_TMP_DIR    
                        $erreur[] =  "Un dossier temporaire est manquant."; 
                        return $erreur;
                        break; 
                    case 7: 	// UPLOAD_ERR_CANT_WRITE    
                        $erreur[] =  "Échec de l'écriture du fichier sur le disque."; 
                        return $erreur;
                        break; 
                    case 8: 	// UPLOAD_ERR_EXTENSION    
                        $erreur[] =  "Une extension PHP a arrêté l'envoi de fichier. PHP ne propose aucun moyen de déterminer quelle extension est en cause. L'examen du phpinfo() peut aider"; 
                        return $erreur;
                        break; 
                }
            }
        }
    }








	
}