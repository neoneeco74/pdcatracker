<?php

class InscriptionController extends Controller{
	
	public function index(){
 		$this->loadModel('Inscription');
		$this->loadClass('Inscription_class');
		
        // Pas connecté pour acceder à cette page
        $auth = false;
        $this->Session->checkAuth($auth);

        if(isset($_POST['submit']) 
        AND !empty($_POST['prenom']) 
        AND !empty($_POST['nom']) 
        AND !empty($_POST['email']) 
        AND !empty($_POST['mdp1'])
        AND !empty($_POST['mdp2']) 
        AND !empty($_POST['service'])) 
        {

            $arrayReponse1 = $this->Inscription_class->verification($_POST);      // Return 1 si OK //       

            if($arrayReponse1 == 1) {

                $login = strtolower($_POST['prenom'].'.'.$_POST['nom']);

                $datasDoublon = ['login' => $login, 'email' => $_POST['email']];

                $arrayReponse2 = $this->Inscription->verificationDoublon($datasDoublon);


                if($arrayReponse2 == 1) {
                    //$arrayReponse3 = $arrayReponse1 + $arrayReponse2;
                    //var_dump($arrayReponse3);
                    $this->Inscription_class->hydrater($login, $_POST);
                    //var_dump($this->Inscription_class);

                    if($this->Inscription->newEnregistrement($this->Inscription_class) == 1){
                        
                        if($this->Inscription->chargerSession($login) == 1){
                            
                            $messageInscriptionOk = 'Votre inscription a bien été pris en compte.';
                            $this->Session->setFlash('messageInscriptionOk', $messageInscriptionOk, 'success');
                            //header('Refresh: 6; '.BASE_URL.'/home/');

                            header('location:'.BASE_URL.'home/' );
                        }
                        else {
                            
                            $messageInscription = 'Erreur: Probleme session';
                            $this->Session->setFlash('messageInscription', $messageInscription, 'danger');
                        }

                    }
                    else {
                        
                        $messageInscription = 'Erreur : Erreur: Probleme d\'enregistrement';
                        $this->Session->setFlash('messageInscription', $messageInscription, 'danger');
                    }
                }
                else {
                    $messageInscription = 'Erreur : Probleme doublon :<br>'.implode('<br>', $arrayReponse2);
                    $this->Session->setFlash('messageInscription', $messageInscription, 'danger');
                   
                    unset($arrayReponse2);
                }
    


            }
            else {

                

                $messageInscription = 'Erreur : Probleme verification :<br>'.implode('<br>', $arrayReponse1);
                $this->Session->setFlash('messageInscription', $messageInscription, 'danger');
                unset($arrayReponse1);
                //header('Location: '.$_SERVER['HTTP_REFERER']);
                
            }



        }
    }

}