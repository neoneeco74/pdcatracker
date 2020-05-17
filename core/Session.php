<?php 
class Session {
	
	public function __construct(){
		if(!isset($_SESSION)){
			session_start(); 
		}
	}
    public function setFlash($categorie, $message, $type = 'success'){
        $_SESSION['flash'][$categorie] = array(
            'message' => $message,
            'type' => $type
        ); 
        //var_dump($_SESSION['flash']);
    }

    public function flash($categorie){
        if(isset($_SESSION['flash'][$categorie])){
            //debug($_SESSION);
            $html = '<div class="alert alert-'.$_SESSION['flash'][$categorie]['type'].'"><p>'.$_SESSION['flash'][$categorie]['message'].'</p></div>'; 
            $_SESSION['flash'][$categorie] = array(); 
            //var_dump($html);
            echo $html; 
        }
    }
/* 	public function setFlash($message, $type = 'success'){
		$_SESSION['flash'] = array(
			'message' => $message,
			'type'	=> $type
		); 
	}

	public function flash(){
		if(isset($_SESSION['flash']['message'])){
			//debug($_SESSION);
			$html = '<div class="alert alert-'.$_SESSION['flash']['type'].'"><p>'.$_SESSION['flash']['message'].'</p></div>'; 
			$_SESSION['flash'] = array(); 
			return $html; 
		}
    } */
    
    public function checkAuth($auth) {
        if(empty($_SESSION['auth']) AND $auth == true){
            header('location:'.BASE_URL.'connexion/' );
            die();
        }


    }

}