<div class="py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mycss-well-data">
                        

   
                    <div class="col-md-6">
				    <div class="col-md-10 offset-md-1">
                        <div class="page-header">
                            <h3>Description PDCA Ligne</h3>
                           
                        </div>
                    </div>
                </div>
<?php
		if(!$unArrayDescription) {
?>							
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="mycss-separator-30"></div>

                <?php	
                    //var_dump('vardump $this->Session', $_SESSION); 
                    if(isset($_POST['submit_add_description'])) {
                        $this->Session->flash('messageEnregistrer'); 
                    }
                    elseif(isset($_POST['submit_delete_description'])) {
                        $this->Session->flash('messageSupprimer'); 
                    }
                    elseif(isset($_POST['submit_modif_description'])) {
                        $this->Session->flash('messageModifier');
                    }
                    else {
                        $this->Session->flash('message1'); 
                        
                    }
                ?>	

                    <!-- ON CLICK JQUERY !-->
                    <button type="button" id="button_add_description" class="btn btn-block btn-primary mycss-btn-myprimary" title="Ajouter la description">Ajouter une description</button>
                    <div class="mycss-separator-30"></div>
                </div>
            </div>
            <!-- DESCRITPTION VIDE, LE CLIC BOUTON PRECEDENT PERMET DE RENSEIGNER LE BLOC DE DESCRIPTION SUIVANT : -->
            <div class="row mycss-div-form-add-description">
                <div class="col-md-12">
                    <div class="mycss-separator-30"></div>
                    <form class="form-horizontal" name="form_add_description" method="POST" action="">
                        <?php											
                            require_once(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_description_form.php');
                            ?>									
                        <div class="mycss-separator-30"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-9 offset-md-3">
                                    <button type="reset" class="btn btn-secondary">Annuler</button>
                                    <button type="submit" name="submit_add_description" class="btn btn-primary mycss-btn-myprimary">Enregistrer la description</button>
                                </div>
                            </div>
                        </div>
                        <div class="mycss-separator-30"></div>
                    </form>
                </div>
            </div>
<?php							
        }
        // SI UNE DESCRIPTION EXISTE 
        else {												
?>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="mycss-separator-30"></div>

                    <?php	
                        if(isset($_POST['submit_add_description'])) {
                            $this->Session->flash('messageEnregistrer'); 
                        }
                        elseif(isset($_POST['submit_delete_description'])){
                            $this->Session->flash('messageSupprimer'); 
                        }
                        elseif(isset($_POST['submit_modif_description'])) {
                            $this->Session->flash('messageModifier');
                        }
                        else {
                            $this->Session->flash('message2'); 
                            //var_dump('vardump $this->Session', $_SESSION); 
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
                            require_once(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_description_form_php.php');
                        ?>

                        <div class="mycss-separator-30"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9 offset-md-3">
                                    <button type="reset" class="btn btn-secondary">Valeurs d'origine</button>
                                    <button type="submit" name="submit_delete_description" class="btn btn-secondary" title="Supprimer la description">Supprimer la description</button>
                                    <button type="submit" name="submit_modif_description" class="btn btn-primary mycss-btn-myprimary">Modifier la description</button>
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