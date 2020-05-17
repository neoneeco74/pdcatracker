<?php

class AddController extends Controller{

	public function index(){
		$this->loadModel('PdcaManager');
		$this->loadModel('DescriptionManager');
        
        //$this->loadClass('Addpdca_class');
        $this->loadClass('Pdca_class');
        $this->loadModel('Affichage');
        
        // Il faut être connecté pour acceder à cette page
        $auth = true;
        $this->Session->checkAuth($auth);
       

        if(!empty($_POST['inputIdUser']) AND !empty($_POST['inputTitre']) AND !empty($_POST['inputProduit'])) {
            
            //$this->Addpdca_class->verifierInput($_POST['inputTitre'], $_POST['inputProduit']);
            $_POST['inputTitre'] = htmlentities(addslashes($_POST['inputTitre']));
            $_POST['inputProduit'] = htmlentities(addslashes($_POST['inputProduit']));

            //var_dump($_POST);
            $unPdca = new Pdca_class($_POST);

            if($this->PdcaManager->enregistrerNouveauPdca($unPdca)){



                







                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
                //~~~~~~~~~~~~~~~~~~~~  TRAITEMENT DES FICHIERS EN PIECE JOINTE  ~~~~~~~~
                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
                /* 			var_dump("VARDUMP dans post_ajout_pdca SET NOM FICHIER de : ===> verif :", $_FILES); */
                if(!empty($_FILES)) {
                    
                    $listeNomsFichiers = array();
                    $label = 'piecejointe';
                    foreach($_FILES as $dataUnFichier) {
                    
                        if($dataUnFichier['error'] == 4) {} // ne rien faire
                        else {
                            $verif = $this->DescriptionManager->verifierFichier($dataUnFichier, $unPdca, $label);
                            /* debug("VARDUMP dans post_ajout_pdca SET NOM FICHIER de : ===> verif :", $verif); */
                            
                            if($verif[0] == "1") {
                                //echo 'SUCCESS';
                                $listeNomsFichiers[] = $verif[1];		// $resultat = array("1", $nouveauNomFichierUnique); ICI, on remplit à chaque boucle le tableau avec un nouveau nom de fichier.
                                /* var_dump("VARDUMP dans post_ajout_pdca SET NOM FICHIER de : ===> listeNomsFichiers :", $listeNomsFichiers); */
                                $this->DescriptionManager->enregistrerFichierEnBdd($verif[1], $unPdca->getIdPdca(), $label);	//ICI, on enregistre en BDD le nom fichier de la boucle
                                
                            }
                            else {
                                echo "<div class='alert alert-danger'>".implode('<br>', $verif)."</div>";			
                            }
                        }
                    }
                    
                    $unPdca->setListeNomsFichiers($listeNomsFichiers);  		// ON HYDRATE l'objet courant avec le tableau de nom
                    //var_dump("VARDUMP dans post_ajout_pdca SET NOM FICHIER de : ===> pdca :", $unPdca);  
                    
                    /*$pdca->setListeNomsFichiers($listeNomsFichiers);
                    $pdcaManager->enregistrerFichier($pdca->getListeNomsFichiers(), $pdca->getIdPdca()); */
                   
                    
                }


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

                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
                //~~~~~~~~~~~~~~~~~~~~  TRAITEMENT DES EMAILS   ~~~~~~~~~~~~~~~~~~~~~~~~~
                //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 	
                
                // Envoi aux Team Leaders
                $listeIdTeamLeader = $this->PdcaManager->recupererTeamLeadersId();
                
                //var_dump("ICI var_dump listttte :", $listeTeamLeaderId);	 // RENVOI UN ARRAY AVEC LE MAIL et UTILSIATEUR  */			
                
                
                // ON REQUETE L'EMAIL EN FONCTION DE L'ID DU DESTINATAIRE SEELCTIONNE
                 foreach($listeIdTeamLeader as $key => $id_destinataire) { 	// ex: 0 => string '1' = nicolas.olagnon
                
     				//echo $key." => ".$destinataire_id."<br>"; 
                    
                    $infosDestinataire = $this->PdcaManager->recupererInfosDestinataire($id_destinataire);
                    
     				//var_dump("ICI var_dump infosDestinataire  :", $infosDestinataire );	  //// RENVOI UN ARRAY AVEC LE MAIL et UTILSIATEUR  			

                    $destinataire = $infosDestinataire['login'];
                    $destinataire_email = $infosDestinataire['email'];
                    
                    $auteur = $_SESSION['auth']['login'];
                    $auteur_email = $_SESSION['auth']['email'];
                    
     				//$content = $this->PdcaManager->voirMail($unPdca);
                    //echo $content; 
                    //var_dump($_POST);
                    if(isset($_POST['check_email'])){
                        //echo "ICI EMAIL ENVOI";
                        $this->PdcaManager->envoyerMailBis($auteur, $auteur_email, $destinataire, $destinataire_email, $unPdca); 
                    }
                }
 



















            	
                $messageSuccessAddPdca = 'Le PDCA a bien été enregistré.';
                $this->Session->setFlash('messageSuccessAddPdca', $messageSuccessAddPdca, 'info');
               
            
                header('Location:../description/index/'.$unPdca->getIdPdca());
                die();


            }
            else {
			//header("Refresh: 0;../addpdca.php");
                $messageErreurAddPdca = 'Erreur : enregistrerNewPdca : Le PDCA n\'a pas été enregistré.';
                $this->Session->setFlash('messageErreurAddPdca', $messageErreurAddPdca, 'danger');
                header('Location: '.$_SERVER['HTTP_REFERER']);
                die();
            }
			

            
        }
        
    }

}