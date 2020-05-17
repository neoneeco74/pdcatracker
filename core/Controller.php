<?php

class Controller{
		
		public $request;
		public $vars 		= [];
		public $layout 		= 'default';
		public $rendered 	= false;
		
		public function __construct($request = null){
			if($request){
				$this->request = $request;
			}
		}

        public function checkRender($boolRender){
            return 0;
        }

		public function render($view){		//permet de rendre une vue, issue de request->action. Dans le PagesControlelr, $this->render('index') index c la view
			
			if($this->rendered){ return false; }
			
			extract($this->vars);
			if(strpos($view, '/')===0){		// 		Si / en position 0 dans view (utile pour /error404) : $this->render('/errors/404');
				$view = ROOT.DS.'view'.$view.'.php'; //		view/error/404
			}else{
				$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
			}
            if(file_exists($view)){
                ob_start();
                require($view);
                $content_for_layout = ob_get_clean();
            
			require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
			//die($view);
            }
			$this->rendered = true; // flag permettant de n'avoir qu'un render
		}
		
		public function set($key, $value=null){
			if(is_array($key)){
				$this->vars += $key;
				//var_dump('vardump 01:', $this->vars);
			}
			else{
				$this->vars[$key]=$value;
				//var_dump('vardump 02:', $this->vars);
			}
		}
		
		function loadModel($name){
			$file = ROOT.DS.'model'.DS.$name.'.php';
			require_once($file);
			if(!isset($this->$name)){
				$this->$name = new $name(); //new Post
				//var_dump($this->$name);
				//echo $name . ' Chargé !';
			}
			else {
				//echo $name .' pas chargé !';
			}
		}
		function loadClass($name_class){
			$file = ROOT.DS.'app'.DS.$name_class.'.php';
			require_once($file);
			if(!isset($this->$name_class)){
				$this->$name_class = new $name_class(); //new connexion
				//var_dump($this->$name_class);
				//echo $name_class . ' Chargé !';
			}
			else {
				//echo $name_class .' pas chargé !';
			}
		}

		function e404($message){
			header("HTTP/1.0 404 Not Found");
			$this->set('message', $message);
			$this->render('/errors/404');	
			die();
		}
	
		/** permet d'appeler un controller depuis une vue
		 * 
		 */
		function request($controller, $action, $params = null){
			$controller .= 'Controller';
			require_once ROOT.DS.'controller'.DS.$controller.'.php';
			$c = new $controller();
			return $c->$action($params);

		}
	
	
}