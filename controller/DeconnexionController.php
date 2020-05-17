<?php

class DeconnexionController extends Controller{
    public function index(){
        // Il faut être connecté pour acceder à cette page
        $auth = true;
        $this->Session->checkAuth($auth);
        
        session_unset();
        session_destroy();
        setcookie('auth', '', time() - 3600, '/', 'lab', false, true);
        header('Location:'. BASE_URL.'connexion/');
        die();
        
    }
}