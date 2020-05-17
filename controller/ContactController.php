<?php

class ContactController extends Controller{
    public function index(){
	
        // Pas connecté pour acceder à cette page
        $auth = false;
        $this->Session->checkAuth($auth);        

        if(!empty($_POST['champ_login']) AND !empty($_POST['champ_email']) AND !empty($_POST['champ_message'])){

            if(!empty($_POST['champ_telephone'])){
                $telephone = $_POST['champ_telephone'];    
            }
            if(!empty($_POST['champ_sujet'])){
                $objet = $_POST['champ_sujet'];
            }


            $auteur = $_POST['champ_login'];
            $auteur_email = $_POST['champ_email'];
            $destinataire = 'Nicolas Olagnon';
            $destinataire_email = 'nicolas.olagnon@gmail.com';
            
            $message_html = $_POST['champ_message'];


            // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
            $headers  = 'From: '.$auteur.' <'.$auteur_email.'>' . "\r\n";
            $headers .= 'Reply-to: '.$auteur.' <'.$auteur_email.'>' . "\r\n";
            $headers .= 'To: '.$destinataire.' <'.$destinataire_email.'>' . "\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";			 

            $message_html.=	"\r\n";
            $message_html.=	"\r\n".$telephone."\r\n";
        
            $message= "\r\n".$message_html."\r\n";			 
            
            
            //=====Envoi de l'e-mail.
            if(mail($destinataire_email, $objet, $message, $headers)){
                $messageMailEnvoye = "Le message a bien été envoyé";
                $this->Session->setFlash('messageMailEnvoye', $messageMailEnvoye, 'info');
            } 
            else {
                $messageMailEnvoye = "Erreur : Le message n'a pas été envoyé";
                $this->Session->setFlash('messageMailEnvoye', $messageMailEnvoye, 'danger');
            }

        }



    } 
 

}