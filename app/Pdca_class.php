<?php  

class Pdca_class {
	
    private $_idPdca;
    private $_dateEnvoi;
    private $_datePdca;

    private $_titre;
    private $_refProduit;			
    private $_statut;		
    private $_listeUnites;				
    private $_listeDestinataires;
    private $_listeNomsFichiers;
    private $_compteurUpdate = 0;

    // CLE ETRANGERES
    private $_idUser;
    private $_idDescription;
    private $_idProduit;
    private $_idDocument;


    public function __construct($data = null) {

        // Si les données proviennet de l'instanciation d'un POST, on convertit les données dans le bon format pour l'hydratation.
        if(!empty($data['inputIdUser'])){
            $data['id_user'] = $data['inputIdUser'];
        }
        if(!empty($data['inputDatePdca'])){
            $data['date_pdca'] = $data['inputDatePdca'];
        }
        if(!empty($data['inputTitre'])){
            $data['titre'] = $data['inputTitre'];
        }
        if(!empty($data['inputProduit'])){
            $data['ref_produit'] = $data['inputProduit'];
        }
        if(!empty($data['inputStatut'])){
            $data['statut'] = $data['inputStatut'];
        }

        $this->hydrate($data); 

    }

    public function hydrate($data) {	

        if(!empty($data['id_pdca'])) {					
           $this->setIdPdca($data['id_pdca']);								
        } 
        if(!empty($data['date_envoi'])) {
            $this->setDateEnvoi($data['date_envoi']);	
        }
        if(!empty($data['date_pdca'])) {
            $this->setDatePdca($data['date_pdca']);
        }


        if(!empty($data['titre'])) {
            $this->setTitre($data['titre']);
        }
        if(!empty($data['ref_produit'])) {
            $this->setRefProduit($data['ref_produit']);
        }
        if(!empty($data['statut'])) {
            $this->setStatut($data['statut']);
        }
        if(!empty($data['liste_unites'])) {			
            $this->setListeUnites($data['liste_unites']);
        }
        if(!empty($data['liste_destinataires'])) {
            $this->setListeDestinataires($data['liste_destinataires']);
        }		
        if(!empty($data['compteur_update'])) {
            $this->setCompteurUpdate($data['compteur_update']);
        }	
        
        if(!empty($data['id_user'])) {
            $this->setIdUser($data['id_user']);	
        }
        if(!empty($data['id_description'])) {
            $this->setIdDescription($data['id_description']);	
        }
        if(!empty($data['id_produit'])) {
            $this->setProduit($data['id_produit']);	
        }	
        if(!empty($data['id_document'])) {
            $this->setIdDocument($data['id_document']);	
        }			
  
    }
    public function getNomStatut() {

        $varStatut = $this->getStatut();
        
        switch($varStatut) {
            case 1:
                return "Nouveau";			
            case 2:
                return "En cours";					
            case 3:
                return "Resolu";					
            case 4:
                return "Re-ouvert";					
            case 5:
                return "Cloturé";					
            case 6:
                return "En 8D";		
        }		
        
        
    }	

    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   GETTERS =====================================================================================================//
    
    public function getIdPdca() 									{ 	return $this->_idPdca; 								}
    public function getDateEnvoi()									{ 	return $this->_dateEnvoi; 							}
    public function getDatePdca()									{ 	return $this->_datePdca; 							}
    
    public function getTitre() 										{ 	return $this->_titre; 								}
    public function getRefProduit() 								{ 	return $this->_refProduit; 							}
    public function getStatut()										{ 	return $this->_statut; 								}		
    public function getListeUnites()								{ 	return $this->_listeUnites; 						}		
    public function getListeDestinataires()							{ 	return $this->_listeDestinataires; 					}
    public function getCompteurUpdate()								{ 	return $this->_compteurUpdate; 						}		
    
    public function getIdUser()										{ 	return $this->_idUser; 								}		
    public function getIdDescription()								{ 	return $this->_idDescription; 						}		
    public function getIdProduit()								    { 	return $this->_idProduit; 						    }		
    public function getIdDocument()									{ 	return $this->_idDocument; 							}	
    
    
    // hors instance, hors bdd , mais peut être utilisé quand meme:
    public function getListeNomsFichiers()							{ 	return $this->_listeNomsFichiers; 					}	


    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   SETTERS =====================================================================================================//

    public function setIdPdca($value)								{	$this->_idPdca = $value;							}		
    public function setDateEnvoi($value) 							{	$this->_dateEnvoi = $value;							}
    public function setDatePdca($value) 							{	$this->_datePdca = $value;							}     
    
    public function setTitre($value) 								{	$this->_titre = $value;								}		
    public function setRefProduit($value)							{	$this->_refProduit = $value;						}	
    public function setStatut($value) 								{	$this->_statut = $value;							}
    public function setListeUnites($value)							{ 	$this->_listeUnites = serialize($value); 			}	
    public function setListeDestinataires($value)					{ 	$this->_listeDestinataires = serialize($value);	    }
	public function setCompteurUpdate($value)						{	$this->_compteurUpdate = $value;					}
    
    public function setIdUser($value)								{	$this->_idUser = $value;							}	      
    public function setIdDescription($value)						{	$this->_idDescription = $value; 					}		
    public function setIdProduit($value)						    {	$this->_idProduit = $value; 	    				}		
    public function setIdDocument($value)							{	$this->_idDocument = $value;						}


    // hors instance, hors bdd , mais peut être utilisé quand meme:
    public function setListeNomsFichiers($value)					{	$this->_listeNomsFichiers = $value;					}
}