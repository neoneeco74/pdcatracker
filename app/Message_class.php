<?php 

class Message_class {
		
    private $_idMessage;
    private $_message;
    private $_dateAjout;	
    private $_idPdca;
    private $_idUser;
    

    public function __construct($datas = null) {

        if($datas) {
/*  	    var_dump($donnees);  */
            $this->hydrate($datas); 
        }            
    }	
    
    public function hydrate($datas) {
            
        if(!empty($datas['id_message'])) {
            $this->setIdMessage($datas['id_Message']);	
        }
        
        $this->setMessage($datas['message']);	
        
        if(!empty($datas['date_ajout'])) {
            $this->setDateAjout($datas['date_ajout']);	
        }
        
        $this->setIdPdca($datas['id_pdca']);				
        $this->setIdUser($datas['id_user']);			
    
    }
    
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   GETTERS =====================================================================================================//
    
    public function getIdMessage()								    { 	return $this->_idMessage;						}
    public function getMessage()									{ 	return $this->_message; 							}
    public function getDateAjout() 									{ 	return $this->_dateAjout; 							}
    public function getIdPdca() 									{ 	return $this->_idPdca; 								}
    public function getIdUser()										{ 	return $this->_idUser; 								}

    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========================================================================================================================//
    //=========   SETTERS =====================================================================================================// 
    
    public function setIdMessage($value)						    { 	$this->_idMessage = $value;						}
    public function setMessage($value)								{ 	$this->_message = $value; 							}
    public function setDateAjout($value) 							{ 	$this->_dateAjout = $value;							}
    public function setIdPdca($value) 								{ 	$this->_idPdca = $value; 							}
    public function setIdUser($value)								{ 	$this->_idUser = $value; 							}
    
}