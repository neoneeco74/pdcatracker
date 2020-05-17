<?php

class Router {
	
	// permet de parser une url	
	// return tableau contenant les parametres
	
	static function parse($url, $request){
		//var_dump($url, $request);
        // /description/index/52
        
/* 		$url = trim($url, '/');
        $params = explode('/', $url); */
        

        //NOUVEAU CODE :
        $url = trim($url, '/');
        if(!empty(stripos($url, '?'))){
            $url = explode('?',$url,-1);
            //echo 'SUCCESS<br><br>';
            $url = trim($url[0], '/');
        }
        $params = explode('/', $url);



		//print_r($params);
		
		/*
		$r = array(
			'controller'	=> $params[0],
			'action'		=> isset($params[1]) ? $params[1]:'index'
		);
		
		$r['params'] = array_slice($params, 2);
		*/
		
		$request->controller = $params[0];
		$request->action = isset($params[1]) ? $params[1] : 'index';
		$request->params = array_slice($params, 2);
			
		return true;	
	}	
}