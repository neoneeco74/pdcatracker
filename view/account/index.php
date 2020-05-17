<div class="py-5 mycss-py-5">
	<div class="container">
		
			<h1>Mon compte</h1>
			<hr class="my-4">
		
    </div>
    
</div>

<div class="py-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well mycss-well-data">
                    
                    <?php 
                            //var_dump($_SESSION);
                            //var_dump($_POST);
                            if(!empty($_SESSION['flash']['messageErreurChangeEmail'])) {
                                $this->Session->flash('messageErreurChangeEmail'); 
                            }
                            if(!empty($_SESSION['flash']['messageSuccessChangeEmail'])) {
                                $this->Session->flash('messageSuccessChangeEmail'); 
                            }
                            if(!empty($_SESSION['flash']['messageSuccessChangePassword'])) {
                                $this->Session->flash('messageSuccessChangePassword'); 
                            }
                            if(!empty($_SESSION['flash']['messageErreurChangePassword'])) {
                                $this->Session->flash('messageErreurChangePassword'); 
                            }
                        ?>

					<form class="form-horizontal" action="" method="POST">
						<fieldset>

							<div class="form-group row">
								<label class="col-md-2 offset-md-1 col-form-label" for="email">Email Kongsberg</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="email" id="email" required />
								</div>
                            </div>
                            
                            <div class="col-md-8 offset-md-3" >
								<hr class="my-4">
                                <button type="submit" name="submit_change_email" class="btn btn-block btn-primary mycss-btn-myprimary">Changer l'adresse email</button>
                                <hr class="my-4">
                            </div>
                            
                        </fieldset>
                    </form>
                    
                    <form class="form-horizontal" action="" method="POST">
						<fieldset>

							<div class="form-group row">
								<label class="col-md-2 offset-md-1 col-form-label" for="password1">Nouveau mot de passe</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="mdp1" id="password1" required />
								</div>
							</div>
							
							<div class="form-group row">
								<label class="col-md-2 offset-md-1 col-form-label" for="passwordconfirm">Mot de passe (confirmation)</label>
								<div class="col-md-8">
									<input type="password" class="form-control" name="mdp2" id="passwordconfirm" required />
								</div>
							</div>
							<!--===============================  FOOTER BOUTONS ACTIONS ===============================!-->
							<div class="col-md-8 offset-md-3" >
								<hr class="my-4">
								<button type="submit" name="submit_change_mdp" class="btn btn-block btn-primary mycss-btn-myprimary">Changer le mot de passe</button>
                            </div>
                            
						</fieldset>
					</form>





                    </div>	
                </div>
            </div>
        </div>
    </div>