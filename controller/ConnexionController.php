<?php

class ConnexionController extends Controller{
	

	public function index(){
		$this->loadModel('Connexion');
		$this->loadClass('Connexion_class');
		$reponse = false;

        // Pas connecté pour acceder à cette page
        $auth = false;
        $this->Session->checkAuth($auth);


        //var_dump($_COOKIE);

        if(isset($_COOKIE['auth']) && !isset($_SESSION['auth'])){
            $auth = $_COOKIE['auth'];
            $auth = explode('-----', $auth);

            $arrayUser1 = $this->Connexion->getUtilisateur($auth[0]);

            //$user = $db->row('SELECT * FROM users WHERE id=:id', array('id' => $auth[0]));
           
            $key = sha1($arrayUser1['id_user'] . $arrayUser1['password'] . $_SERVER['REMOTE_ADDR']);
            
            if($key == $auth[1]){
                $this->Connexion_class->chargerSession($arrayUser1);
                setcookie('auth', $arrayUser1['login'] . '-----' . $key, time() + 3600 * 24 * 3, '/', 'lab', false, true);
                header('location:'.BASE_URL.'home/' );
            }
            else {
                setcookie('auth', '', time() - 3600, '/', 'lab', false, true);
            }
        }
  /*       if(!isset($_COOKIE['auth']) && !isset($_SESSION['Auth'])){
            //var_dump($_SERVER['REQUEST_URI']);
             if($_SERVER['REQUEST_URI'] != '/00_projets_grafikart/02_test_connexion_persistante/login.php'){
                header('Location:login.php');
            } 
        } */
        



		if(!empty($_POST['inputLogin']) AND !empty($_POST['inputPassword'])) {

			$arrayUser = $this->Connexion->getUtilisateur($_POST['inputLogin']);

			// S'il y a une ligne de trouvé 
			if($arrayUser == true) {
                $reponse = $this->Connexion_class->verifierConnexion($arrayUser, $_POST['inputPassword']);
                
                if($reponse == true) {
				
                    if($this->Connexion_class->chargerSession($arrayUser)) {
                        /*  var_dump("arrayUSer ICI:", $arrayUser);
                        var_dump('$_SESSIOn ici : ',$_SESSION);
                        var_dump('post ici :', $_POST); */ 
                        
                        if(isset($_POST['remember'])){
                            setcookie('auth', $arrayUser['login'] . '-----' . sha1($arrayUser['id_user'] . $arrayUser['password'] . $_SERVER['REMOTE_ADDR']), time() + 3600 * 24 * 3, '/', 'lab', false, true);	
                        //	setcookie('auth', valeur cryptée, time() + 3600 * 24 * 3, 'le chemin', 'nom de domaine', secure?, editable en js ?);	
                        }
                        //var_dump($_COOKIE);
                        header('location:'.BASE_URL.'home/' );
                    }
                    else {
                        $messageConnexion = 'Erreur : Une erreur session est survenue.';
                        $this->Session->setFlash('messageConnexion', $messageConnexion, 'danger');
                    }
                }
                else{
                    $messageConnexion = 'Erreur : Identifiants incorrects.';
                    $this->Session->setFlash('messageConnexion', $messageConnexion, 'danger');
                    
                }
			}
			else{
                $messageConnexion = 'Erreur : Identifiants incorrects.';
                $this->Session->setFlash('messageConnexion', $messageConnexion, 'danger');
				
			}
			 

		}


	}



}