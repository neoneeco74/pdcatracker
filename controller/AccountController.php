<?php

class AccountController extends Controller{

	public function index(){
        // Il faut être connecté pour acceder à cette page
        $auth = true;
        $this->Session->checkAuth($auth);
        
        $this->loadModel('Account');
		$this->loadModel('Inscription');

        if(isset($_POST['submit_change_email']) AND !empty($_POST['email'])) {
            
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
               
                $verif = $this->Inscription->verificationDoublon($_POST);

                if($verif == 1) {                
                    
                    if($this->Account->updateUserEmail($_SESSION['auth']['id_user'], $_POST['email'])){
                        
                        $this->Account->chargerSession($_SESSION['auth']['login']);
                        $messageSuccessChangeEmail = 'L\'adresse email a bien été changé.';
                        $this->Session->setFlash('messageSuccessChangeEmail', $messageSuccessChangeEmail, 'info');
                    }
                    else {
                        $messageErreurChangeEmail = 'Erreur : L\'adresse email n\'a pas été modifiée';
                        $this->Session->setFlash('messageErreurChangeEmail', $messageErreurChangeEmail, 'danger');
                    }
                }
                else{
                    $messageErreurChangeEmail = 'Erreur : L\'adresse email est déja prise';
                    $this->Session->setFlash('messageErreurChangeEmail', $messageErreurChangeEmail, 'danger');
                } 
            }	
            else{
                $messageErreurFilterEmail = 'Erreur : Syntaxe de l\'adresse email incorrect.';
                $this->Session->setFlash('messageErreurChangeEmail', $messageErreurFilterEmail, 'danger');
            }
        }

        if(isset($_POST['submit_change_mdp']) AND !empty($_POST['mdp1']) AND !empty($_POST['mdp2'])) {
            
            $verif = $this->Account->verifierNewPassword($_POST['mdp1'], $_POST['mdp2']);

            if($verif == 1) {
                
                if($this->Account->changerPassword($_SESSION['auth']['login'], $_POST['mdp1'])) {
                    
                    $this->Account->chargerSession($_SESSION['auth']['login']);
                    $messageSuccessChangePassword = 'Le mot de passe a bien été changé.';
                    $this->Session->setFlash('messageSuccessChangePassword', $messageSuccessChangePassword, 'info');
                    
                }
                else{
                    $messageErreurChangePassword = 'Erreur : Le mot de passe n\'a pas été enregistré';
                    $this->Session->setFlash('messageErreurChangePassword', $messageErreurChangePassword, 'danger');
                } 
            }	
            else{
                $messageErreurChangePassword = 'Erreur : Le mot de passe ne respecte pas les criteres de validité.<br>'. implode('<br>', $verif);
                $this->Session->setFlash('messageErreurChangePassword', $messageErreurChangePassword, 'danger');

                unset($verif);
            
            }
        }
    }

    public function getUserService(){
        $this->loadModel('Affichage');
        return $this->Affichage->getNomServiceUser($_SESSION['auth']['id_user']);

    }
    public function getUserGroupe(){
        $this->loadModel('Affichage');
        return $this->Affichage->getNomGroupeUser($_SESSION['auth']['id_user']);

    }
}