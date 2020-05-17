<?php 

class Description_class {

    private $_var_id_description; 
    
    private $_var_qui; 
    private $_var_quoi;
    private $_var_quand; 
    private $_var_ou;
    private $_var_comment;
    private $_var_pourquoi;
    private $_var_nb_defauts; 	// 	INITIALISATION NECESSAIRE POUR LA BDD SINON ERREUR : il faut transtyper en int dans le setter uniquement !
    private $_var_protege;
    private $_var_cause;
    private $_var_reproductible;
    private $_var_action_racine;
    private $_var_amelioration;
    private $_var_date_redemarrage;
    private $_var_duree_arret;
    private $_var_pilote;
    private $_var_visa_superviseur;
    private $_var_visa_resp_prod;
    private $_var_visa_directeur;
    
    private $_var_id_pdca;
    
    
    
    public static $_labelsDescription = array(
        "champ_qui" => "Qui", 
        "champ_quoi" => "Quoi", 
        "champ_quand" => "Quand", 
        "champ_ou" => "Ou", 
        "champ_comment" => "Comment", 
        "champ_pourquoi" => "Pourquoi", 
        "champ_nb_defauts" => "Nombre de defauts", 
        "champ_protege" => "Comment je protege mon client ?", 
        "champ_cause" => "Determiner la cause origine ?", 
        "champ_reproductible" => "J'arrive à reproduire le defaut ?", 
        "champ_action_racine" => "Action pour supprimer la cause racine", 
        "champ_amelioration" => "Amélioration", 
        "champ_date_redemarrage" => "Date redemarrage", 
        "champ_duree_arret" => "Duree arret", 
        "champ_pilote" => "Pilote", 
        "champ_visa_superviseur" => "Visa superviseur", 
        "champ_visa_resp_prod" => "Visa responsable production", 
        "champ_visa_directeur" => "Visa directeur"
    );	

    public static $_attributsDescription = array(
        '_var_qui', 
        '_var_quoi',
        '_var_quand', 
        '_var_ou',
        '_var_comment',
        '_var_pourquoi',
        '_var_nb_defauts',
        '_var_protege',
        '_var_cause',
        '_var_reproductible',
        '_var_action_racine',
        '_var_amelioration',
        '_var_date_redemarrage',
        '_var_duree_arret',
        '_var_pilote',
        '_var_visa_superviseur',
        '_var_visa_resp_prod',
        '_var_visa_directeur',
    );	


/* 		getVar_qui(), getVar_quoi(), getVar_quand(), getVar_ou(), getVar_comment(), etVar_pourquoi(), getVar_nb_defaut(), getVar_protege(), getVar_cause(), getVar_reproductible(), getVar_action_racine(), getVar_amelioration(), getVar_date_redemarrage(), etVar_duree_arret(), getVar_pilote(), getVar_visa_superviseur(), getVar_visa_resp_prod(), getVar_visa_directeur(), 	 */

    
/*	
`champ_qui` varchar(255) DEFAULT NULL,
`champ_quoi` varchar(255) DEFAULT NULL,
`champ_quand` varchar(255) DEFAULT NULL,
`champ_ou` varchar(255) DEFAULT NULL,
`champ_comment_attr` varchar(255) DEFAULT NULL,
`champ_pourquoi` varchar(255) DEFAULT NULL,
`champ_nb_defauts` int(11) DEFAULT NULL,
`champ_protege` text,
`champ_cause` text,
`champ_reproductible` tinyint(1) DEFAULT NULL,
`champ_action_racine` text,
`champ_amelioration` tinyint(1) DEFAULT NULL,
`champ_date_redemarrage` datetime DEFAULT NULL,
`champ_duree_arret` varchar(255) DEFAULT NULL,
`champ_pilote` varchar(255) DEFAULT NULL,
`champ_visa_superviseur` tinyint(1) DEFAULT NULL,
`champ_visa_resp_prod` tinyint(1) DEFAULT NULL,
`champ_visa_directeur` tinyint(1) DEFAULT NULL,	

*/
    public function __construct($data = null) {

    /* var_dump($data);  */ 
        if($data){
            $this->hydrate($data); 
        }
    }	
    
    public function hydrate(array $data) {
    
        foreach ($data as $key => $value) {
            $method = "setVar_".substr($key, 6);   // $_POST['champ_visa_directeur'] => $method = setVar_visa_directeur
            
            if(method_exists($this, $method)) {
                $this->$method($value);
            }
        }

        //Si $data provient de la BDD, il faut hydrater l'instance manuellement avec  : 
        if(!empty($data["id_description"])) {
            $this->setVar_id_description($data["id_description"]);
        }
        if(!empty($data["id_pdca"])) {
            $this->setVar_id_pdca($data["id_pdca"]);
        }
    }

    
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   GETTERS =====================================================================================================//  
    
    public function getVar_id_description() 						{ 	return $this->_var_id_description;	     				}
    
    public function getVar_qui() 									{ 	return $this->_var_qui; 								}
    public function getVar_quoi() 									{ 	return $this->_var_quoi; 								}
    public function getVar_quand() 									{ 	return $this->_var_quand; 								}
    public function getVar_ou() 									{ 	return $this->_var_ou; 									}
    public function getVar_comment() 								{ 	return $this->_var_comment; 							}
    public function getVar_pourquoi() 								{ 	return $this->_var_pourquoi; 							}
    public function getVar_nb_defauts() 							{ 	return $this->_var_nb_defauts; 							}
    public function getVar_protege() 								{ 	return $this->_var_protege; 							}
    public function getVar_cause() 									{ 	return $this->_var_cause; 								}
    public function getVar_reproductible() 							{ 	return $this->_var_reproductible; 						}
    public function getVar_action_racine() 							{ 	return $this->_var_action_racine; 						}
    public function getVar_amelioration()							{ 	return $this->_var_amelioration; 						}
    public function getVar_date_redemarrage() 						{ 	return $this->_var_date_redemarrage; 					}
    public function getVar_duree_arret() 							{ 	return $this->_var_duree_arret; 						}
    public function getVar_pilote() 								{ 	return $this->_var_pilote; 								}
    public function getVar_visa_superviseur() 						{ 	return $this->_var_visa_superviseur; 					} 
    public function getVar_visa_resp_prod() 						{ 	return $this->_var_visa_resp_prod; 						}
    public function getVar_visa_directeur() 						{ 	return $this->_var_visa_directeur; 						}
    
    public function getVar_id_pdca() 								{ 	return $this->_var_id_pdca;								}

    public function getter($value)									{ 	return $this->$value;									}
    
    
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   SETTERS =====================================================================================================//
    
    public function setVar_id_description($value) 					{ 	$this->_var_id_description = (int) $value;				}
    
    public function setVar_qui($value) 								{	$this->_var_qui = $value;								}
    public function setVar_quoi($value) 							{	$this->_var_quoi = $value;								}
    public function setVar_quand($value) 							{	$this->_var_quand = $value;								}
    public function setVar_ou($value) 								{	$this->_var_ou = $value;								}
    public function setVar_comment($value)							{	$this->_var_comment = $value;							}
    public function setVar_pourquoi($value) 						{	$this->_var_pourquoi = $value;							}
    public function setVar_nb_defauts($value)						{	$this->_var_nb_defauts = (int) $value;					}
    public function setVar_protege($value) 							{	$this->_var_protege = $value;							}
    public function setVar_cause($value) 							{	$this->_var_cause = $value;								}
    public function setVar_reproductible($value) 					{	$this->_var_reproductible = $value;						}
    public function setVar_action_racine($value) 					{	$this->_var_action_racine = $value;						}
    public function setVar_amelioration($value)						{	$this->_var_amelioration = $value;						}
    public function setVar_date_redemarrage($value) 				{	$this->_var_date_redemarrage = $value;					}
    public function setVar_duree_arret($value) 						{	$this->_var_duree_arret = $value;						}
    public function setVar_pilote($value) 							{	$this->_var_pilote = $value;							}
    public function setVar_visa_superviseur($value) 				{	$this->_var_visa_superviseur = $value;					} 
    public function setVar_visa_resp_prod($value) 					{	$this->_var_visa_resp_prod = $value;					}
    public function setVar_visa_directeur($value) 					{	$this->_var_visa_directeur = $value;                    }
    
    public function setVar_id_pdca($value) 							{ 	$this->_var_id_pdca = (int) $value;						}






	
}








