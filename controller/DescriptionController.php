<?php

class DescriptionController extends Controller{
    
    public function index($idpdca = null){
		
		$this->loadModel('PdcaManager');
		$this->loadModel('Affichage');

        $auth = true;
        $this->Session->checkAuth($auth);


		$unPdca = $this->PdcaManager->getUnPdca($idpdca);

        if($unPdca) {

            $this->loadModel('DescriptionManager');
            $this->loadClass('Description_class');
            $this->loadClass('Description8d_class');







            //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT DEESCRIPTION FORM   ========================================================//

            // CAS : CRUD CREATE AJOUT DESCRIPTION 
            if(isset($_POST['submit_add_description'])) {

                //var_dump($_POST);

                $newDescription = new Description_class($_POST);

                if($this->DescriptionManager->enregistrerNewDescription($newDescription)) {
                    //echo "SUCCESS";
                    $messageEnregistrer = 'La description a bien été enregistrée';
                    $this->Session->setFlash('messageEnregistrer', $messageEnregistrer, 'success');
                }
                else {
                    //echo "FAIL";
                    $messageEnregistrer = "Erreur : La description n'a pas été enregistrée.";
                    $this->Session->setFlash('messageEnregistrer', $messageEnregistrer, 'danger');
                }  
            }
    
            // CAS : CRUD READ 
            $unObjetArrayDescription = $this->DescriptionManager->getDescription($unPdca);


            //CAS : CRUD UPDATE MODIFICATION DESCRIPTION 	
            if(isset($_POST['submit_modif_description'])) {
                
                unset($unObjetArrayDescription);
                $unObjetArrayDescription = new Description_class($_POST);

                if($this->DescriptionManager->updateDescription($unObjetArrayDescription)) {
                    //echo "SUCCESS";
                    $messageModifier = "La description a bien été modifiée.";
                    $this->Session->setFlash('messageModifier', $messageModifier, 'success');		
                }
                else {
                    //echo "FAIL";
                    $messageModifier = "La description n'a pas été modifiée.";
                    $this->Session->setFlash('messageModifier', $messageModifier, 'danger');
                }  
                
                //unset($_POST);
                
            }

            // CAS : CRUD DELETE SUPPRESSION DESCRIPTION 
            if(isset($unObjetArrayDescription) AND is_object($unObjetArrayDescription) AND isset($_POST['submit_delete_description'])) {
                
                $this->DescriptionManager->deleteDescription($unObjetArrayDescription);
                
                //unset($_POST);
                $unObjetArrayDescription = false;
                //header('Refresh: 0');
   
                $messageSupprimer = "La description a bien été supprimé.";
                $this->Session->setFlash('messageSupprimer', $messageSupprimer, 'danger');
                
            }








            //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT DEESCRIPTION 8D FORM========================================================//
    
            //////////// CAS : AJOUT DESCRIPTION 8D /////////////////////////
            if(isset($_POST['submit_add_description8d'])) {

                $unObjetArrayDescription8d = new Description8d_class($_POST);

                if($this->DescriptionManager->enregistrerNewDescription8d($unObjetArrayDescription8d)) {
                    //echo "SUCCESS";
                    $messageEnregistrer8d = 'La description 8D a bien été enregistrée';
                    $this->Session->setFlash('messageEnregistrer8d', $messageEnregistrer8d, 'success');
                }
                else {
                    //echo "FAIL";
                    $messageEnregistrer8d = "Erreur : La description 8D n'a pas été enregistrée.";
                    $this->Session->setFlash('messageEnregistrer8d', $messageEnregistrer8d, 'danger');
                }  
            }

            //////////// CAS : READ /////////////////////////	
            $unObjetArrayDescription8d = $this->DescriptionManager->getDescription8d($unPdca);
            
            //////////// CAS : MODIFICATION DESCRIPTION 8D /////////////////////////	
            if(isset($_POST['submit_modif_description8d'])) {
       
                unset($unObjetArrayDescription8d);
                
                $unObjetArrayDescription8d = new Description8d_class($_POST);

                if($this->DescriptionManager->updateDescription8d($unObjetArrayDescription8d)) {
                    //echo "SUCCESS";
                    $messageModifier8d = "La description 8D a bien été modifiée.";
                    $this->Session->setFlash('messageModifier8d', $messageModifier8d, 'success');		
                }
                else {
                    //echo "FAIL";
                    $messageModifier8d = "La description 8D n'a pas été modifiée.";
                    $this->Session->setFlash('messageModifier8d', $messageModifier8d, 'danger');
                }  
                
                //unset($_POST);
                
            }

            //////////// CAS : SUPPRESSION DESCRIPTION 8D /////////////////////////
            if(isset($unObjetArrayDescription8d) AND is_object($unObjetArrayDescription8d) AND isset($_POST['submit_delete_description8d'])) {
                
                $this->DescriptionManager->deleteDescription8d($unObjetArrayDescription8d);
                
                //unset($_POST);
                $unObjetArrayDescription8d = false;
                
                $messageSupprimer8d = "La description 8D a bien été supprimé.";
                $this->Session->setFlash('messageSupprimer8d', $messageSupprimer8d, 'danger');
                
            }






            //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT MESSAGE             ========================================================//

			// SI DESCRIPTION == FALSE
 			if(!$unObjetArrayDescription) {
                $message1 = 'Pas de description PDCA Ligne enregistrée pour ce PDCA.';
                $this->Session->setFlash('message1', $message1, 'danger');
			}
			elseif(is_object($unObjetArrayDescription)) {
				$message2 = 'Une description PDCA Ligne est présente pour ce PDCA.';		
                $this->Session->setFlash('message2', $message2, 'info');
            }
            
            //var_dump($unObjetArrayDescription8d);
  			if(!$unObjetArrayDescription8d) {
                $message3 = 'Pas de description 8D enregistrée pour ce PDCA.';
                $this->Session->setFlash('message3', $message3, 'danger');
			}
			elseif(is_object($unObjetArrayDescription8d)) {
                $message4 = 'Une description 8D est présente pour ce PDCA.';
                $this->Session->setFlash('message4', $message4, 'info');	
			}   
        
            $d['unArrayDescription'] = $unObjetArrayDescription;
            $d['unArrayDescription8d'] = $unObjetArrayDescription8d;










            //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT DESTINATAIRES       ========================================================//

            if(isset($_POST['submit_add_destinataires'])) {

                if(!empty($_POST['liste_destinataires'])){
                $this->PdcaManager->updateListeDestinataires($unPdca->getIdPdca(), $_POST['liste_destinataires']);
                }
                else {
                    $arrayVide = [];
                    $this->PdcaManager->updateListeDestinataires($unPdca->getIdPdca(), $arrayVide);
                }
            }

            $listeLogins = array();
            $listeIdUsers = $this->PdcaManager->getListeDestinataires($unPdca->getIdPdca());
            //var_dump($listeIdUsers);
            if($listeIdUsers){
                foreach($listeIdUsers as $id_user) {
                    $listeLogins[] = $this->Affichage->getLoginAndEmail($id_user);
                }
            }    
            //var_dump($listeLogins);
            $d['listeIdUsers'] = $listeIdUsers;

            $d['listeLogins'] = $listeLogins;
            







            //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT LISTE UNITES CONCERNES  ====================================================//

            $listeNomsUnites = array();
            $listeIdUnites = $this->PdcaManager->getListeUnites($unPdca->getIdPdca());
            if($listeIdUnites){
                foreach($listeIdUnites as $id_unite) {
                    $listeNomsUnites[] = $this->Affichage->getNomUnite($id_unite);
                }
            }    

            $d['listeNomsUnites'] = $listeNomsUnites;
            $_SESSION['listeNomsUnites'] = $listeNomsUnites;








           //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT DES FICHIERS EMIS ==============================///

            if(!empty($_FILES)) {
                //var_dump($_FILES);
                $listeNomsFichiers = array();

                if(array_key_exists("upload_fichiers_correct", $_FILES)) {
                    $label = "upload_fichiers_correct";
                }
                elseif(array_key_exists("upload_fichiers_incorrect", $_FILES)) {
                    $label = "upload_fichiers_incorrect";
                }
                else{
                    $label = 'piecejointe';
                }	
                
                foreach($_FILES as $dataUnFichier) {
                
                    if($dataUnFichier['error'] == 4) {} // ne rien faire
                    else {

                        $verif = $this->DescriptionManager->verifierFichier($dataUnFichier, $unPdca, $label);
                            /* debug("VARDUMP dans post_ajout_pdca SET NOM FICHIER de : ===> verif :", $verif); */

                        if($verif[0] == "1") {
                            $listeNomsFichiers[] = $verif[1];
                            $this->DescriptionManager->enregistrerFichierEnBdd($verif[1], $unPdca->getIdPdca(), $label);
                            
                        }
                        else {
                            echo "<div class='alert alert-danger'>".implode('<br>', $verif)."</div>";			
                        }
                    }
                }
                
                $unPdca->setListeNomsFichiers($listeNomsFichiers);  		// ON HYDRATE l'objet courant avec le tableau de nom
                //var_dump("VARDUMP dans post_ajout_pdca SET NOM FICHIER de : ===> pdca :", $pdca);  
                
  
              
                unset($_FILES);
            }
            
           //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT RECUPERATION DES PIECES JOINTES ET DOCUMENT 8D ==============================//            
            
            $listeAdressesFichiers = $this->DescriptionManager->recupererFichiers($unPdca->getIdPdca(), 'piecejointe');
			$listeAdressesFichiers8dCorrect = $this->DescriptionManager->recupererFichiers($unPdca->getIdPdca(), 'correct');
            $listeAdressesFichiers8dIncorrect = $this->DescriptionManager->recupererFichiers($unPdca->getIdPdca(), 'incorrect'); 
            
/*			var_dump("VARDUMP 50 dans description de : ===> listeNomsFichiers:", $listeAdressesFichiers);
			var_dump("VARDUMP 50 dans description de : ===> listeNomsFichiers:", $listeAdressesFichiers8Correct);
			var_dump("VARDUMP 50 dans description de : ===> listeNomsFichiers:", $listeAdressesFichiers8dIncorrect); */
			
			if(!$listeAdressesFichiers) {
                $messagePj = "Ce PDCA ne contient pas de pièces jointe.";
                $this->Session->setFlash('messagePj', $messagePj, 'danger');
			}

            $d['listeAdressesFichiers'] = $listeAdressesFichiers;
            $d['listeAdressesFichiers8dCorrect'] = $listeAdressesFichiers8dCorrect;
            $d['listeAdressesFichiers8dIncorrect'] = $listeAdressesFichiers8dIncorrect;



	















            //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT MESSAGE 	 ================================================================//
            

            $this->loadModel('MessageManager');
            $this->loadClass('Message_class');

            //$varMessageSav = htmlentities(addslashes(nl2br($varMessage))); 


            $listeMessages = $this->MessageManager->getListeMessagesFromIdPdca($unPdca->getIdPdca());
            /* var_dump("var dump liste commentaires", $listeCommentaires); */

            if(empty($listeMessages)){
                $messageMessageVide = 'Pas de message enregistré';
                $this->Session->setFlash('messageMessageVide', $messageMessageVide, 'danger');

            }


            $d['listeMessages'] = $listeMessages;






        


            //===================================================================================================//
            //===================================================================================================//
            //=========   TRAITEMENT MAIL A TOUS    =============================================================//


            if(isset($_POST['submit_mail_tous']) AND !empty($_POST['champ_idpdca'])){

                $varIdPdcaMailTous = $_POST['champ_idpdca'];
                if(!empty($listeIdUsers)){
                    //var_dump($listeIdUsers);
                    foreach($listeIdUsers as $id_user) {
                        //echo $id_user;
                        $this->mail($varIdPdcaMailTous, $id_user);
                    }
                }    



            }
















        } // ///////////// FIN If PDCA
    
        

        if(isset($_POST['input_search_titre']) OR isset($_POST['input_search_idpdca'])) {
                
            if(isset($_POST['input_search_titre'])) {
                $unPdca = $this->PdcaManager->getUnPdcaFromTitre($_POST['input_search_titre']);
            }
            if(isset($_POST['input_search_idpdca'])) {
                $unPdca = $this->PdcaManager->getUnPdca($_POST['input_search_idpdca']);

            }
            if(is_object($unPdca)){
                header('Location:index/'. $unPdca->getIdPdca());
            }
            else{
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
            die();
        }



        // TRAITEMENT AJAX
        if(!empty($_POST['idpdca']) AND !empty($_POST['value_statut'])) {
            $this->PdcaManager->updateStatut($_POST['idpdca'], $_POST['value_statut']);
            //echo "SUCCESS";
        }
 

        
        $d['unPdca'] = $unPdca;

        $this->set($d);

        
    }















    public function delete($idpdca = null){
        $this->loadModel('PdcaManager');

        // Si l'action provient de l'ajax, en page home
        if(!empty($_POST['idpdca_delete'])){
            $this->PdcaManager->deletePdcaFromId($_POST['idpdca_delete']);
            //echo "SUCCESS";
        }
        elseif(!empty($idpdca)){
            $this->PdcaManager->deletePdcaFromId($idpdca);
            header('Location:../../home');
            die();
        }
        //echo 'Le contenu a bien été supprimé';
        
        die();
    }



    public function deletepj($id_fichier){
        $this->loadModel('DescriptionManager');

        if(!empty($id_fichier)){
            $this->DescriptionManager->deleteFichierFromId($id_fichier);
            //echo "SUCCESS";
        }
        header('Location: '.$_SERVER['HTTP_REFERER']);
        die();
    }


    public function cloturer($idpdca = null){
		$this->loadModel('PdcaManager');
        $this->PdcaManager->updateStatutCloturer($idpdca);
        //echo 'Le statut a été passé en cloturer';

        if(stripos('home', $_SERVER['PATH_INFO'])){
            header('Location:../../home');
        }
        else{
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        die();

    }

    public function mail($idpdca, $id_destinataire){

        $this->loadModel('PdcaManager');
        $infosDestinataire = $this->PdcaManager->recupererInfosDestinataire($id_destinataire);
        $unPdcaMail = $this->PdcaManager->getUnPdca($idpdca); 

        $destinataire = $infosDestinataire['login'];
        $destinataire_email = $infosDestinataire['email'];
       
        $auteur = $_SESSION['auth']['login'];
        $auteur_email = $_SESSION['auth']['email'];
       
       
        if($this->PdcaManager->envoyerMailBis($auteur, $auteur_email, $destinataire, $destinataire_email, $unPdcaMail)){
            $messageMailEnvoye = "Le mail a bien été envoyé";
            $this->Session->setFlash('messageMailEnvoye', $messageMailEnvoye, 'info');
        } 
        else {
            $messageMailEnvoye = "Erreur : Le mail n'a pas été envoyé";
            $this->Session->setFlash('messageMailEnvoye', $messageMailEnvoye, 'danger');
        }

        // Si l'envoi du mail est personnalisé, pas à tous
         if(!isset($_POST['submit_mail_tous'])){
            header('Location: '.$_SERVER['HTTP_REFERER'].'#mail');
            die();
        }
    }




    public function message(){

        $this->loadModel('MessageManager');
        $this->loadClass('Message_class');

        //$varMessageSav = htmlentities(addslashes(nl2br($varMessage))); 

        if(!empty($_POST['post_message']) AND isset($_POST['submit_message'])) {
            
            $varMessage = $_POST['post_message'];
            $varMessageSav = htmlentities(addslashes($varMessage));
            //var_dump($varMessage, $varMessageSav);
            $donneesNewMessage = array(
                "message" => $varMessageSav,
                "id_pdca" => $_POST['submit_message'],
                "id_user" => $_SESSION["auth"]["id_user"]
            );
            
            $objetMessage = new Message_class($donneesNewMessage);
            //var_dump($objetMessage);
            if($this->MessageManager->enregistrerNewMessage($objetMessage )) {
                $messageMesssage = 'Le message a bien été enregistré.';
                $this->Session->setFlash('messageMesssage', $messageMesssage, 'info');	
            }
            else {
                $messageMesssage = 'Le message n\'a pas été enregistré.';
                $this->Session->setFlash('messageMesssage', $messageMesssage, 'danger');
            }
            
            unset($_POST);

        }
        else{
            $this->e404('Cette page n\'existe pas');
            die();
        }    
         $listeMessages = $this->MessageManager->getListeMessagesFromIdPdca($unPdca->getIdPdca());
        // var_dump("var dump liste commentaires", $listeCommentaires); 

        if(empty($listeMessages)){
            $messageMessageVide = 'Pas de message enregistré';
            $this->Session->setFlash('messageMessageVide', $messageMessageVide, 'danger');

        }


        $d['listeMessages'] = $listeMessages;
 
    }

        
    


}