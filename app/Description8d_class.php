<?php 

class Description8d_class {

    private $_var_id_description8d; 
    
    private $_var_datecreation;
    private $_var_responsable;

    private $_var_produit;
    private $_var_refkoa;
    private $_var_refclient;

    private $_var_description;
    private $_var_niv_incident;
    private $_var_num_incident_koa;
    private $_var_num_incident_client;
    private $_var_site_client;
    private $_var_quantite_nok;

    private $_var_evenement;
    private $_var_pourquoi;
    private $_var_quand;
    private $_var_qui;
    private $_var_ou;
    private $_var_comment;
    private $_var_combien;

    private $_var_difference;
    private $_var_standard;
    private $_var_quandproduite;
    private $_var_quiproduite;
    private $_var_autreprocess;
    private $_var_arretdefaut;
    private $_var_pbsimilaire;
    
    private $_var_id_pdca;
    

    
    public static $_labelsDescription8d = array(
        "champ_datecreation" => "Création, le", 
        "champ_responsable" => "Responsable QA",

        "champ_produit" => "PRODUIT",
        "champ_refkoa" => "REF KOA",
        "champ_refclient" => "REF CLIENT",

        "champ_description" => "DESCRIPTION",
        "champ_niv_incident "=> "NIVEAU INCIDENT",
        "champ_num_incident_koa" => "N°INCIDENT KOA",
        "champ_num_incident_client" => "N°INCIDENT CLIENT",
        "champ_site_client "=> "SITE CLIENT",
        "champ_quantite_nok" => "QUANTITE NOK",

        "champ_evenement" => "Que s'est il passé ?",
        "champ_pourquoi" => "Pourquoi est-ce un problème ?",
        "champ_quand" => "Quand a-t-il été détecté ?",
        "champ_qui" => "Qui l'a détecté ?",
        "champ_ou" => "Ou a-t-il été détecté ?",
        "champ_comment" => "Comment a-t-il été détecté ?",
        "champ_combien" => "Combien de pièces mauvaises ?",

        "champ_difference" => "Quelle est la différence entre les pièces bonnes et mauvaises ?",
        "champ_standard" => "La pièce a-t-elle été produite sur le process standard ?",
        "champ_quandproduite" => "Quand a-t-elle été produite chez Kongsberg ?",
        "champ_quiproduite" => "Qui l'a produite ?",
        "champ_autreprocess" => "Dans quelle autre application ou process ce produit est il utilisé ?",
        "champ_arretdefaut" => "Est-ce que l'on arrête le défaut quand on réinjecte le produit dans le process normal ?",
        "champ_pbsimilaire" => "Un problème similaire est il déjà apparu auparavant chez le client ou en interne ?"
    );	

    public static $_attributsDescription = array(
        "_var_datecreation",
        "_var_responsable",

        "_var_produit",
        "_var_refkoa",
        "_var_refclient",

        "_var_description",
        "_var_niv_incident",
        "_var_num_incident_koa",
        "_var_num_incident_client",
        "_var_site_client",
        "_var_quantite_nok",

        "_var_evenement",
        "_var_pourquoi",
        "_var_quand",
        "_var_qui",
        "_var_ou",
        "_var_comment",
        "_var_combien",

        "_var_difference",
        "_var_standard",
        "_var_quandproduite",
        "_var_quiproduite",
        "_var_autreprocess",
        "_var_arretdefaut",
        "_var_pbsimilaire"
    );	


    public function __construct($data = null) {

        /* var_dump($data);  */ 
            if($data){
                $this->hydrate($data); 
            }
    }		
    
    public function hydrate(array $data) {
    
        foreach ($data as $key => $value)
        {
            $method = "setVar_".substr($key, 6);   // $_POST["champ_datecreation"] => $method = setVar_datecreation
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        if(!empty($data["id_description8d"])) {
            $this->setVar_id_description8d($data["id_description8d"]);
        }
    }




    
    
    

    
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   GETTERS =====================================================================================================//  
    
    public function getVar_id_description8d() 						{ 	return $this->_var_id_description8d;	   				}
    
    public function getVar_datecreation()							{ 	return $this->_var_datecreation; 						}
    public function getVar_responsable()							{ 	return $this->_var_responsable; 						}
    
    public function getVar_produit() 								{ 	return $this->_var_produit; 							}
    public function getVar_refkoa() 								{ 	return $this->_var_refkoa; 								}
    public function getVar_refclient() 								{ 	return $this->_var_refclient; 							}
    
    public function getVar_description() 							{ 	return $this->_var_description; 						}
    public function getVar_niv_incident() 							{ 	return $this->_var_niv_incident; 						}
    public function getVar_num_incident_koa() 						{ 	return $this->_var_num_incident_koa; 					}
    public function getVar_num_incident_client() 					{ 	return $this->_var_num_incident_client; 				}
    public function getVar_site_client() 							{ 	return $this->_var_site_client; 						}
    public function getVar_quantite_nok() 							{ 	return $this->_var_quantite_nok; 						}
    
    public function getVar_evenement()								{ 	return $this->_var_evenement; 							}
    public function getVar_pourquoi() 								{ 	return $this->_var_pourquoi; 							}
    public function getVar_quand() 									{ 	return $this->_var_quand; 								}
    public function getVar_qui() 									{ 	return $this->_var_qui; 								}
    public function getVar_ou() 									{ 	return $this->_var_ou; 									} 
    public function getVar_comment() 								{ 	return $this->_var_comment; 							}
    public function getVar_combien() 								{ 	return $this->_var_combien; 							}
    
    public function getVar_difference() 							{ 	return $this->_var_difference;							}
    public function getVar_standard() 								{ 	return $this->_var_standard; 							}
    public function getVar_quandproduite() 							{ 	return $this->_var_quandproduite; 						}
    public function getVar_quiproduite() 							{ 	return $this->_var_quiproduite; 						} 
    public function getVar_autreprocess() 							{ 	return $this->_var_autreprocess; 						}
    public function getVar_arretdefaut() 							{ 	return $this->_var_arretdefaut; 						}		
    public function getVar_pbsimilaire() 							{ 	return $this->_var_pbsimilaire;							}
    
    public function getVar_id_pdca() 								{ 	return $this->_var_id_pdca;								}

    public function getter($value)									{ 	return $this->$value;									}
    
    
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   SETTERS =====================================================================================================//
    
    public function setVar_id_description8d($value) 				{ 	$this->_var_id_description8d = (int) $value;			}
    
    public function setVar_datecreation($value) 					{	$this->_var_datecreation = $value;						}
    public function setVar_responsable($value) 						{	$this->_var_responsable = $value;						}
    
    public function setVar_produit($value) 							{	$this->_var_produit = $value;							}
    public function setVar_refkoa($value) 							{	$this->_var_refkoa = $value;							}
    public function setVar_refclient($value)						{	$this->_var_refclient = $value;							}
    
    public function setVar_description($value) 						{	$this->_var_description = $value;						}
    public function setVar_niv_incident($value)						{	$this->_var_niv_incident = (int) $value;				}
    public function setVar_num_incident_koa($value) 				{	$this->_var_num_incident_koa = (int) $value;			}
    public function setVar_num_incident_client($value) 				{	$this->_var_num_incident_client = (int) $value;			}
    public function setVar_site_client($value) 						{	$this->_var_site_client = $value;						}
    public function setVar_quantite_nok($value) 					{	$this->_var_quantite_nok = (int) $value;				}
    
    public function setVar_evenement($value)						{	$this->_var_evenement = $value;							}
    public function setVar_pourquoi($value) 						{	$this->_var_pourquoi = $value;							}
    public function setVar_quand($value) 							{	$this->_var_quand = $value;								}
    public function setVar_qui($value) 								{	$this->_var_qui = $value;								}
    public function setVar_ou($value) 								{	$this->_var_ou = $value;								} 
    public function setVar_comment($value) 							{	$this->_var_comment = $value;							}
    public function setVar_combien($value) 							{	$this->_var_combien = $value;                   		}
    
    public function setVar_difference($value) 						{	$this->_var_difference = $value;						}
    public function setVar_standard($value) 						{	$this->_var_standard = $value;							}
    public function setVar_quandproduite($value) 					{	$this->_var_quandproduite = $value;						}
    public function setVar_quiproduite($value) 						{	$this->_var_quiproduite = $value;						} 
    public function setVar_autreprocess($value) 					{	$this->_var_autreprocess = $value;						}
    public function setVar_arretdefaut($value) 						{	$this->_var_arretdefaut = $value;                  	  	}
    public function setVar_pbsimilaire($value) 						{	$this->_var_pbsimilaire = $value;                  	  	}
    
    public function setVar_id_pdca($value) 							{ 	$this->_var_id_pdca = (int) $value;						}






	
}








