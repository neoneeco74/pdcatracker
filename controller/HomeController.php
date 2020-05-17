<?php

class HomeController extends Controller{
	
	public function index(){
		
        $this->loadModel('PdcaManager');

        $auth = true;
        $this->Session->checkAuth($auth);
        
        // SYSTEME DE PAGINATION
        $nbPdca = $this->PdcaManager->countPdca();

        $parPage = 10;
        //$currentPage = 1;

        if(isset($_POST['nbAfficheElements']) OR isset($_SESSION['nbAfficheElements'])) {
    
            if(isset($_POST['nbAfficheElements'])) {
                $_SESSION['nbAfficheElements'] = $_POST['nbAfficheElements'];
            } 
            
            if($_SESSION['nbAfficheElements'] == "Tout") {			// ON MET OFFSET A ZERO ET NBPAGE DETRUIT
                $offset = 0;
                if($nbPdca != 0) {
                    $parPage = $nbPdca;
                }
                else {
                    $parPage = 1;
                }
            }
            else {
                $parPage = $_SESSION['nbAfficheElements'];
            }
        }

        $nbPage = ceil($nbPdca/$parPage);

        if(isset($_GET['page']) AND $_GET['page']>0 AND $_GET['page']<=$nbPage) {
            $currentPage = $_GET['page'];
        }
        else {
            $currentPage = 1;		
        }

        $offset = ($currentPage-1)*$parPage;


        // Affichage de l'element X à X, sur un total de X elements
        // <br>Affichage de l'élements  echo $offset+1;  à  echo $paginationVue;  sur un total de  echo $nbPdca; 

        if(isset($_SESSION['nbAfficheElements']) AND $_SESSION['nbAfficheElements'] >= $nbPdca) {
            $paginationVue = $nbPdca;
        }
        elseif($offset+$parPage>=$nbPdca) {
            $paginationVue = $nbPdca;
        }
        else {
            $paginationVue = $offset+$parPage;
        }
        $d['nbPdca'] = $nbPdca;
        $d['nbPage'] = $nbPage;
        $d['currentPage'] = $currentPage;
        $d['paginationVue'] = $paginationVue;
        $d['offset'] = $offset;

        $d['listePdcas'] = $this->PdcaManager->getListePdcaLimit($offset, $parPage);
        //var_dump($d['listePdcas']);
        $this->set($d);
        



	
	}

    public function compteur(){
        $this->loadModel('PdcaManager');
        // AJAX COMPTEUR UPDATE
	    if(!empty($_GET['idpdca']) AND !empty($_GET['valuecompteur'])) {
		
            $this->PdcaManager->updateCompteurUpdate($_GET['idpdca'], $_GET['valuecompteur']);
		
		    echo $this->PdcaManager->getCompteurUpdate($_GET['idpdca']);
	    }

    }



}






	


	

