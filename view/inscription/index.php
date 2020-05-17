<?php
	$this->loadModel('Affichage');
	$affichage = new Affichage();
?>
<main role="main" class="container">
	<div class="starter-template">
		<div class="row">
			<div class="col-md-10">
				<div class="well mycss-well-data">
					<form class="form-horizontal" action="" method="POST">
						<fieldset>

                    <?php 
                            //var_dump($_SESSION);
                            if(!empty($_SESSION['flash']['messageInscription'])) {
                                $this->Session->flash('messageInscription'); 
                            }
                        ?>
                        
                        <div class="col-md-10 offset-md-1" >
                        <h3>Inscription</h3>
                        <hr class="my-4">
                        </div>
                    

                            <br>
							<div class="form-group row">
								<label class="col-md-2 offset-md-2 col-form-label" for="prenom">Prenom* : </label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="prenom" id="prenom" required autofocus />
								</div>
							</div>
						
							<div class="form-group row">
								<label class="col-md-2 offset-md-2 col-form-label" for="nom">Nom* : </label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="nom" id="nom" required />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-md-2 offset-md-2 col-form-label" for="email">Email Kongsberg* : </label>
								<div class="col-md-7">
									<input type="text" class="form-control" name="email" id="email" required />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-md-2 offset-md-2 col-form-label" for="password1">Mot de passe* : </label>
								<div class="col-md-7">
									<input type="password" class="form-control" name="mdp1" id="password1" required />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-md-2 offset-md-2 col-form-label" for="passwordconfirm">Mot de passe (confirmation)* : </label>
								<div class="col-md-7">
									<input type="password" class="form-control" name="mdp2" id="passwordconfirm" required />
								</div>
							</div>

                            <div class="form-group row">
                                <label for="service"  class="col-md-2 offset-md-2 col-form-label" >Service utilisateur:</label>
                                
                                <div class="col-md-7">
                                    <select name="service" id="service" class="form-control" required>
    <?php
                                        
                                        
                                        $requeteListeServices = $affichage->getPDOAffichage()->query('SELECT id_service, nom FROM services');
    ?>										
                                        <option value="">Selectionner un service</option>
    <?php										
                                        while($reponseUnService = $requeteListeServices->fetch()) {
    ?>								
                                            <option value="<?php echo $reponseUnService['id_service']; ?>"><?php echo $reponseUnService['nom']; ?></option>
    <?php
                                        }
    ?>	
                                    </select>
							    </div>
						    </div>

							<!--===============================  FOOTER BOUTONS ACTIONS ===============================!-->
							<div class="col-md-10 offset-md-1" >
								<hr class="my-4">
								<button type="submit" name="submit" class="btn btn-block btn-primary mycss-btn-myprimary">S'inscrire</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>