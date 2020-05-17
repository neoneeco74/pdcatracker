<main role="main" class="container">
	<div class="starter-template">
		<div class="row">
			<div class="col-md-10">
				<div class="well mycss-well-data">

					<form class="form-horizontal" action="" method="POST">

			
					<fieldset>
				
                    <?php 
                            //var_dump($_POST);
                            //var_dump($_SESSION);
                            if(!empty($_SESSION['flash']['messageMailEnvoye'])) {
                                $this->Session->flash('messageMailEnvoye'); 
                            }
                        ?>

							<div class="col-md-10 offset-md-1" >
								<h3>Contacter un administrateur</h3>
								<hr class="my-4">
							</div>
						
            <?php if(!empty($_SESSION['auth'])): ?>        
						<div class="form-group row">
							<label for="champ_user" class="col-md-2 offset-md-2 col-form-label">Utilisateur* : </label>
							
							<div class="col-md-7">
								<input tabindex="1" type="text" class="form-control" name="champ_login" id="champ_login" value=<?php echo $_SESSION['auth']['login']; ?> disabled="disabled" />
								<input tabindex="1" type="hidden" class="form-control" name="champ_login" id="champ_login" value=<?php echo $_SESSION['auth']['login']; ?> />

							</div>
							
						</div>
						
						<div class="form-group row">						
							<label for="champ_email" class="col-md-2 offset-md-2 col-form-label" >Email* : </label>
							
							<div class="col-md-7">
								<input type="text" name="champ_email" id="champ_email" value="<?php echo $_SESSION['auth']['email']; ?>" class="form-control" disabled="disabled"/>
								<input type="hidden" name="champ_email" id="champ_email" value="<?php echo $_SESSION['auth']['email']; ?>" class="form-control" />
								
							</div>
						</div>
            <?php elseif(empty($_SESSION['auth'])) : ?>
        					<div class="form-group row">
                                <label for="champ_user" class="col-md-2 offset-md-2 col-form-label">Utilisateur* : </label>
                                
                                <div class="col-md-7">
                                    <input tabindex="1" type="text" class="form-control" name="champ_login" id="champ_login" required autofocus />
    
                                </div>
                                
                            </div>
                            <div class="form-group row">						
							    <label for="champ_email" class="col-md-2 offset-md-2 col-form-label" >Email* : </label>
							
                                <div class="col-md-7">
                                    <input type="text" name="champ_email" id="champ_email" value="" class="form-control" required />
                                    
                                </div>
                            </div>       
            <?php endif; ?>    
			
						<div class="form-group row">						
							<label for="champ_telephone" class="col-md-2 offset-md-2 col-form-label" >Telephone : </label>
							
							<div class="col-md-7">
								<input type="text" name="champ_telephone" id="champ_telephone" placeholder="Numero" class="form-control" />
							</div>
						</div>
						
						
						<div class="form-group row">						
							<label for="champ_sujet" class="col-md-2 offset-md-2 col-form-label" >Sujet : </label>
							
							<div class="col-md-7">
								<input type="text" name="champ_sujet" id="champ_sujet" placeholder="Sujet" class="form-control" />
							</div>
						</div>
						
						
						<div class='form-group row'>
							<label for="champ_message" class="col-md-2 offset-md-2 col-form-label" >Message : </label>
							<div class="col-md-7">
								<textarea class="form-control" name="champ_message" id="champ_message" rows="10" cols="500" maxlength="5000" placeholder="Votre message (taille max : 5000 caracteres)" required></textarea>
							</div>
						</div>
				
							<!--===============================  FOOTER BOUTONS ACTIONS ===============================!-->
							<div class="col-md-9 offset-md-2" >
								<hr class="my-4">
								<button type="submit" name="submit" class="btn btn-block btn-primary mycss-btn-myprimary">Envoyer le message</button>
							</div>
                        </fieldset>
				    </form>
                 </div>    
            </div>
        </div>
    </div>
</main>