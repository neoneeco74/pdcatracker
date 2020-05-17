<?php

class Dispatcher {
	
	var $request;
    private $listeController;
    
	function __construct() {
		
		$this->request = new Request();
		Router::parse($this->request->url, $this->request);
        //print_r($this->request->action);
        session_start();
		if($this->request->url == '/'){
            if(!empty($_SESSION['auth'])){
                header('Location: '.BASE_URL.'home/');
            }
            else{
                header('Location: '.BASE_URL.'connexion/');
            }
            die();
        }
        $this->listeController = ['account', 'add', 'connexion', 'contact', 'deconnexion', 'description', 'home', 'inscription' ];
        //var_dump($listeController);
        //var_dump($this->request->controller);

        //if (in_array($this->request->controller, $listeController)) {
            
            $controller = $this->loadController();
            //$controller->view();
            
            
            
            if(!in_array($this->request->action, array_diff(get_class_methods($controller), get_class_methods('Controller')))){
                $this->error('Le controller '.$this->request->controller.' n\'a pas de méthode '.$this->request->action);
            }
            
            
            // fonction qui appel une autre fonction
            // >> PagesController->pecho(params) ou view(params)
            // C'est ici que ce sa se passe : envoi au controller de demander la page page/view/index.php en fonction du action et params
            call_user_func_array(array($controller, $this->request->action),$this->request->params);
            
            //Appel la fonction render du controller principal pour afficher la vue definie
            $controller->render($this->request->action);
            
        //}



		
	}
	
	public function error($message){
		$controller = new Controller($this->request);
		$controller->e404($message);
	}
	
	public function loadController(){
		if (in_array($this->request->controller, $this->listeController)) {
            $name = ucfirst($this->request->controller).'Controller';
            $file = ROOT.DS.'controller'.DS.$name.'.php';	//file= root/controller/pagescontroller.php
            require $file;
            //$controller = new $name($this->request); // new PagesController

            $controller = new $name($this->request);  
        
            $controller->Session = new Session();
            
            return $controller;
        }
        else {
            $this->error("Ce controller n'existe pas");
        }		
	}
}