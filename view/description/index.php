<?php
	$this->loadModel('Affichage');
	$affichage = new Affichage();
?>
<div class="py-5 mycss-py-5">
	<div class="container">
        <?php
            if($unPdca){
                echo '<h1>Description du PDCA n°'. $unPdca->getIdPdca() .'</h1>';
            }
            else {
                echo '<h1>Description</h1>';
            }
         
                            //var_dump($_SESSION);
                            if(!empty($_SESSION['flash']['messageSuccessAddPdca'])) {
                                $this->Session->flash('messageSuccessAddPdca'); 
                            }
        ?>
        <hr class="my-4">
	</div>
</div>
<?php 
//var_dump('vardump de POST ici : ', $_POST);
if(empty($unPdca)){
?>
    <div class="py-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well mycss-well-data">

                        <div class="jumbotron" >


                            <div class="col-md-6">
                                <p>Rechercher par titre</p>
                                <div class="form-group" id="">
                                    <form style="" name="" action="" method="POST">
                                        <div class="input-group">						
                                            <input type="search" class="form-control input-md" name="input_search_titre">	
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Rechercher</button>
                                            </div>						
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <p>Rechercher par Id Pdca </p>
                                <div class="form-group" id="">
                                    <form style="" name="" action="" method="POST">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="" name="input_search_idpdca" aria-label="PDCA ID" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Rechercher</button>
                                            </div>						
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
<?php 
}
else {
?>
    <div class="well mycss-well-data mycss-well-data2">
        <table class="table table-striped table-bordered mycss-datatable2">
            <thead>
                <tr class="mycss-datatable-thead-tr">
                    <th class="" width="3%" 	tabindex="1" >#</th>
                    <th class="" width="3%" 	tabindex="2" >id </th>
                    <th class="" width="10%" 	tabindex="3" >Date</th>
                    <th class="" width="15%" 	tabindex="4" >Auteur </th>
                    <th class="" width="15%" 	tabindex="5" >Titre </th>
                    <th class="" width="15%" 	tabindex="6" >Ref. Produit </th>
                    <th class="" width="11%"	tabindex="7" >Statut</th>
                    <th class="" width="auto" 	tabindex="8" >Actions</th>
                    
                </tr>
            </thead>
            <tbody>
<?php
                if (empty($unPdca)) {
                //flashCss("danger", "Liste vide : aucun PDCA d'enregistré.");
                }
                else {
                $numeroLigne = 0;
                
                    $numeroLigne++; 
?>										
                    <tr class="mycss-ligne-cliquable" id="numero_ligne_<?php echo $numeroLigne; ?>">
                        <td><?php echo $numeroLigne; ?></td>
                        <td><?php echo $unPdca->getIdPdca(); ?></td>
                        <td><?php echo $unPdca->getDateEnvoi(); ?></td>
                        <td><?php echo $affichage->getLogin($unPdca->getIdUser()); ?></td>
                        <td><?php echo $unPdca->getTitre(); ?></td>
                        <td><?php echo $unPdca->getRefProduit(); ?></td>
                        <td><?php echo $affichage->getBoutonStatut($unPdca->getStatut()); ?></td>
                        <td>
                            <a href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>" class="btn btn-sm btn-primary" title="Afficher le PDCA">
                            <img src="<?php echo BASE_URL ?>webroot/icons/eye.svg" alt="" width="20" height="20" title="Afficher le PDCA">
                            </a>
                    <?php if($_SESSION['auth']['id_groupe'] == '1' OR $_SESSION['auth']['id_groupe'] == '2'): ?>
                            <a href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca().'#mail'; ?>" class="btn btn-sm btn-info" title="Envoyer un mail">
                            <img src="<?php echo BASE_URL ?>webroot/icons/envelope.svg" alt="" width="20" height="20" title="Envoyer un mail">
                            </a>
                            <a href="<?php echo BASE_URL.'description/cloturer/'. $unPdca->getIdPdca(); ?>" class="btn btn-sm btn-secondary" title="Cloturer">
                            <img src="<?php echo BASE_URL ?>webroot/icons/check-box.svg" alt="" width="20" height="20" title="Cloturer">
                            </a>

                            <a href="<?php echo BASE_URL.'description/delete/'. $unPdca->getIdPdca(); ?>" onclick="return confirm('Etes vous sûr de vouloir supprimer ce PDCA ?');" class="btn btn-sm btn-danger" title="Supprimer ce PDCA">
                            <img src="<?php echo BASE_URL ?>webroot/icons/trash.svg" alt="" width="20" height="20" title="Supprimer le PDCA">
                            </a>
                    <?php endif; ?>
                        </td>
                        
                    </tr>
<?php										
                }
?>	
            </tbody>
        </table>
    </div>




    
    <div class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">


                    <ul class="nav nav-justified myjs-navtab mycss-navtab" id="myjs-tab-principal" role="tablist">

                        <li class="nav-item active">
                            <a href="#maindescription" class="nav-link mycss-navtab-a-active active" id="maindescription-tab" data-toggle="tab"  role="tab" aria-controls="maindescription" aria-selected="true">Description générale</a>
                        </li>
                <?php if($_SESSION['auth']['id_groupe'] == '1' OR $_SESSION['auth']['id_groupe'] == '2' OR $_SESSION['auth']['id_service'] == '1'): ?>
                        <li class="nav-item">
                            <a href="#mail" class="nav-link" id="mail-tab" data-toggle="tab"  role="tab" aria-controls="mail" aria-selected="false">E-mail</a>
                        </li>
                <?php endif; ?>
                        <li class="nav-item">
                            <a href="#piecejointe" class="nav-link" id="piecejointe-tab" data-toggle="tab"  role="tab" aria-controls="piecejointe" aria-selected="false">Pièces jointes</a>
                        </li>
                        <li class="nav-item">
                            <a href="#message" class="nav-link" id="message-tab" data-toggle="tab"  role="tab" aria-controls="message" aria-selected="false">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a href="#descriptionform" class="nav-link" id="descriptionform-tab" data-toggle="tab"  role="tab" aria-controls="descriptionform" aria-selected="false">Description Form</a>
                        </li>
                        <li class="nav-item">
                            <a href="#description8dform" class="nav-link" id="description8dform-tab" data-toggle="tab"  role="tab" aria-controls="description8dform" aria-selected="false">Description 8D Form</a>
                        </li>

                        <li class="nav-item">
                            <a href="#documentpdcaligne" class="nav-link" id="documentpdcaligne-tab" data-toggle="tab"  role="tab" aria-controls="documentpdcaligne" aria-selected="false">Document PDCA Ligne</a>
                        </li>
                        <li class="nav-item">
                            <a href="#document8d" class="nav-link" id="document8d-tab" data-toggle="tab"  role="tab" aria-controls="document8d" aria-selected="false">Document 8D</a>
                        </li>

                    </ul>



                    
                </div>
            </div>
        </div>
    </div>

     <div class="tab-content" id="myTabContent">

        <!--=============================================================================================================//
        //===============================================================================================================//
        //=========   ONGLET 1 : DESCRIPTION GENERALE =========================================================================!-->	
        <div class="tab-pane fade show active" id="maindescription" role="tabpanel">
            
            <?php include('pages'.DS.'maindescription_tab.php'); ?>
            

        </div>
      <!--=============================================================================================================//
        //===============================================================================================================//
        //=========   ONGLET 2 : MAIL =========================================================================!-->	
        <?php if($_SESSION['auth']['id_groupe'] == '1' OR $_SESSION['auth']['id_groupe'] == '2' OR $_SESSION['auth']['id_service'] == '1'): ?>				
        <div class="tab-pane fade" id="mail" role="tabpanel">
            
            <?php include('pages'.DS.'mail_tab.php'); ?>

        </div>
        <?php endif; ?>
        <!--=============================================================================================================//
        //===============================================================================================================//
        //=========   ONGLET 3 : PIECES JOINTES   =========================================================================!-->					
        <div class="tab-pane fade" id="piecejointe" role="tabpanel">
        
            <?php include('pages'.DS.'piecejointe_tab.php'); ?>

        </div>
        <!--=============================================================================================================//
        //===============================================================================================================//
        //=========   ONGLET 4 MESSAGE ============================================================================!-->					
        <div class="tab-pane fade" id="message" role="tabpanel">

            <?php include('pages'.DS.'message_tab.php'); ?>

        </div>  
        <!--=============================================================================================================//
        //===============================================================================================================//
        //=========   ONGLET 5 : DESCRIPTION FORM =========================================================================!-->					
        <div class="tab-pane fade" id="descriptionform" role="tabpanel">
            
            <?php include('pages'.DS.'descriptionform_tab.php'); ?>

        </div>
        <!--=============================================================================================================//
        //===============================================================================================================//
        //=========   ONGLET 6 : DESCRIPTION 8D FORM =========================================================================!-->					
        <div class="tab-pane fade" id="description8dform" role="tabpanel">
            
            <?php include('pages'.DS.'description8dform_tab.php'); ?>

        </div>
    
        <!--=============================================================================================================//
        //===============================================================================================================//
        //=========   ONGLET 7 DOCUMENT PDCA LIGNE =========================================================================!-->					
        <div class="tab-pane fade" id="documentpdcaligne" role="tabpanel">
        
            <?php include('pages'.DS.'documentpdcaligne_tab.php'); ?>
                
        </div>
        <!--=============================================================================================================//
        //===============================================================================================================//
        //=========   ONGLET 8 : DOCUMENT 8D =========================================================================!-->					
        <div class="tab-pane fade" id="document8d" role="tabpanel">
            
            <?php include('pages'.DS.'document8d_tab.php'); ?>

        </div>
        

    </div>

                 


<?php 
    }
?>