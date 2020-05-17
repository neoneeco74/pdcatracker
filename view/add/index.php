<?php
	$this->loadModel('Affichage');
	$affichage = new Affichage();
?>

<main role="main" class="container">
	      
    <div class="row">
        <div class="col-md-12">
            <div class="well mycss-well-data">
            
            <?php //var_dump('vardump de POST ici : ', $_POST, $_FILES); ?>
			<form method="POST" action="" enctype="multipart/form-data">
				<fieldset>

                    <div class="col-md-10 offset-md-1" >
                        <h3>Ajouter un nouveau PDCA</h3>
                        <hr class="my-4">
                    </div>
                    
                    <?php 
                            //var_dump($_SESSION);
                            if(!empty($_SESSION['flash']['messageErreurAddPdca'])) {
                                $this->Session->flash('messageErreurAddPdca'); 
                            }
                        ?>
                
                    <!--==========================  DONNEEES D'EN TETE  =======================!-->	
                                                
                    <div class="form-group row">
                        <label for="id_user" class="col-md-2 offset-md-1 col-form-label">Auteur * :</label>
                        <div class="col-md-8">
                            <input tabindex="1"  type="text" class="form-control" name="inputIdUser" id="inputIdUser" value=<?php echo $_SESSION['auth']['login']; ?> disabled="disabled" />
                            <input type="hidden" type="text" class="form-control" name="inputIdUser" id="inputIdUser" value=<?php echo $_SESSION['auth']['id_user']; ?>  />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputDatePdca" class="col-md-2 offset-md-1 col-form-label">Date et heure du probleme :</label>
                        <div class="col-md-8">
                            <input type="datetime-local" class="form-control" name="inputDatePdca" id="inputDatePdca"  >
                        </div>
                    </div>	
                    
                    <div class="form-group row">
                        <label for="inputTitre" class="col-md-2 offset-md-1 col-form-label">Titre * :</label>
                        <div class="col-md-8">
                            <input tabindex="1" type="text" class="form-control" name="inputTitre" id="inputTitre" required="required">
                        </div>
                    </div>
                        
                    <div class="form-group row">
                        <label for="inputProduit" class="col-md-2 offset-md-1 col-form-label">Ref Produit * :</label>
                        
                        <div class="col-md-8">
                            <input tabindex="1" type="text" class="form-control" name="inputProduit" id="inputProduit" required="required">
                        </div>
                        
                    </div>
                    
                
                    <div class="form-group row">
						
                        <label for="liste_unites[]"  class="col-md-2 offset-md-1 col-form-label" >Ligne / Machine concernée </label>								
                        <!--<label class="col-sm-2 control-label">Multiselect</label>!-->
                        
                        <div class="col-md-8">
                        
                            <select id="" name="liste_unites[]" multiple="multiple" class="form-control mycss-multi-production" >


<?php 
                                
                                $requeteListeCategories = $affichage->getPDOAffichage()->query('SELECT * FROM categories_production');
                                
                                while($reponseUneCategorie = $requeteListeCategories->fetch()) {
?>
                                    <optgroup label="<?php echo strtoupper($reponseUneCategorie['nom']); ?>" id="example-post-checkboxName-1">
<?php
                                        $requeteListeUnites = $affichage->getPDOAffichage()->prepare('												
                                            SELECT u.id_unite, u.nom, u.type  
                                            FROM unites_production u
                                            WHERE u.id_categorie = :reponseUneCategorie												
                                        ');			
                                        $requeteListeUnites->execute(array('reponseUneCategorie' => $reponseUneCategorie['id_categorie']));
                                        
                                        while($reponseUneUnite = $requeteListeUnites->fetch()) {
?>								
                                            <option value="<?php echo $reponseUneUnite['id_unite']; ?>"><?php echo 'TYPE : ['.strtoupper($reponseUneUnite['type']).'] '.ucfirst($reponseUneUnite['nom']); ?></option>
<?php
                                        }
?>													
                                    </optgroup>
<?php
                                }
?>

                            </select>
                        </div>
                    </div>


		                  
                    <div class="form-group row" >
                        <label for="input_upload_fichiers_1" class="col-md-2 offset-md-1 col-form-label">Joindre un fichier :<span class="small">(Taille max: 10 Mo)</span></label>
                        
                        <div class="col-md-4">
                            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" >   				<!-- 5 Mo max        !-->
                            <input tabindex="12" name='upload_fichiers_1' id="input_upload_fichiers_1" type="file" size="50" >
                        </div>
                        
                        <div class="col-md-4">
                            <button type="button" name="add_upload_fichiers">Ajouter un autre fichier</button>
                        </div>								
                    </div>
                    
                
                    <div class="form-group row has-danger">
                        <label for="liste_destinataires[]"  class="col-md-2 offset-md-1 col-form-label" >Destinataires : </label>								

                        <div class="col-md-8">
                            <input tabindex="1" type="text" class="form-control" name="inputDestinataires" value="TOUS LES TEAM LEADERS" disabled="disabled" />

                        </div>						
                    </div>
                    

                    <div class="form-group has-danger">						
                        <div class="checkbox col-md-8 offset-md-3 is-invalid">
                            <label >
                                <input type="checkbox" checked="checked" name="check_email" id="check_email" > Un email sera envoyé à tous les Team Leader
                            </label>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="inputStatut" class="col-md-2 offset-md-1 col-form-label" >Statut :</label>
                        
                        <div class="col-md-8">
                            <select name="inputStatut" id="inputStatut" class="form-control" disabled="disabled">
                                <option value="1">Nouveau</option>

                            </select>
                            <input type="hidden" name="inputStatut" value="1" />
                        </div>
                        
                    </div>

                    

                    <!--===============================  FOOTER BOUTONS ACTIONS ===============================!-->
                        
                    <div class="col-md-10 offset-md-1" >                      
                        <hr class="my-4">
                        <button id="myjs-button-addpdca" class="btn btn-block btn-primary mycss-btn-myprimary">Valider</button>					
                    </div>

                    <!--===============================  FOOTER MODAL ===============================!-->
                    
                    <div class="modal fade" id="myjs-modal-addpdca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        
                        <br><br><br><br><br><br><br><br>
                        
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmer envoi nouveau PDCA</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Etes-vous sur de vouloir envoyer ce PDCA ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                    <button type="submit" id="myjs-button-addpdca-envoyer" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </div>





				</fieldset>
			</form>
		</div>
	</div>
</div>
</main>



