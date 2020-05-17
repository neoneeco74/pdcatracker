<div class="py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mycss-well-data">
                    
                <div class="col-md-6">
				    <div class="col-md-10 offset-md-1">
                        <div class="page-header">
                            <h3>Description PDCA 8D</h3>
                           
                        </div>
                    </div>
                </div>
<?php						
        // SI PAS DE DESCRIPTION 8D (FALSE)
        if(!$unArrayDescription8d) {
?>							
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="mycss-separator-30"></div>

                    <?php
                    //var_dump('vardump $this->Session', $_SESSION);	
                        if(isset($_POST['submit_add_description8d'])) {
                            $this->Session->flash('messageEnregistrer8d'); 
                        }
                        elseif(isset($_POST['submit_delete_description8d'])){
                            $this->Session->flash('messageSupprimer8d'); 
                        }
                        elseif(isset($_POST['submit_modif_description8d'])) {
                            $this->Session->flash('messageModifier8d');
                        }
                        else {
                            $this->Session->flash('message3'); 
                             
                        }
                    ?>	

                    
                    <!-- ON CLICK JQUERY !-->
                    
                    <button type="button" id="button_add_description8d" class="btn btn-block btn-primary mycss-btn-myprimary" title="Ajouter la description">Ajouter une description 8D</button>
                    
                    <div class="mycss-separator-30"></div>
                </div>
            </div>
                    
            <!-- DESCRITPTION VIDE, LE CLIC BOUTON PRECEDENT PERMET DE RENSEIGNER LA DESCRIPTION : -->
            <div class="row mycss-div-form-add-description8d">
                <div class="col-md-12">
                    <div class="mycss-separator-30"></div>

                    <form class="form-horizontal" name="form_add_description" method="POST" action="">
                        <?php											
                        require_once(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_description8d_form.php');
                        ?>	

                        <div class="mycss-separator-30"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-9 offset-md-3">
                                    <button type="reset" class="btn btn-secondary">Annuler</button>
                                    <button type="submit" name="submit_add_description8d" class="btn btn-primary mycss-btn-myprimary">Enregistrer la description</button>
                                </div>
                            </div>
                        </div>
                        <div class="mycss-separator-30"></div>
                        
                    </form>		
                </div>
            </div>
<?php							
        }
        // SI UNE DESCRIPTION 8D EXISTE 
        else {												
?>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="mycss-separator-30"></div>

                    <?php
                    //var_dump('vardump $this->Session', $_SESSION);	
                        if(isset($_POST['submit_add_description8d'])) {
                            $this->Session->flash('messageEnregistrer8d'); 
                        }
                        elseif(isset($_POST['submit_delete_description8d'])){
                            $this->Session->flash('messageSupprimer8d'); 
                        }
                        elseif(isset($_POST['submit_modif_description8d'])) {
                            $this->Session->flash('messageModifier8d');
                        }
                        else {
                            $this->Session->flash('message4'); 
                             
                        }
                    ?>	


                    <div class="mycss-separator-30"></div>	
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="mycss-separator-30"></div>

                    <form class="form-horizontal" name="form_add_description" method="POST" action="">

                        <?php											
                        require_once(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_description8d_form_php.php');
                        ?>

                        <div class="mycss-separator-30"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9 offset-md-3">
                                    <button type="reset" class="btn btn-secondary">Valeurs d'origine</button>
                                    <button type="submit" name="submit_delete_description8d" class="btn btn-secondary" title="Supprimer la description">Supprimer la description 8D</button>
                                    <button type="submit" name="submit_modif_description8d" class="btn btn-primary mycss-btn-myprimary">Modifier la description 8D</button>
                                </div>
                            </div>
                        </div>											
                        <div class="mycss-separator-30"></div>
                        

                    </form>							
                </div>
            </div>
<?php							
        } 
?>							


</div>
                </div>
            </div>
        </div>
    </div>