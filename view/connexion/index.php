<main role="main" class="container">
	
	<div class="row">
		<div class="col-md-10">
			<div class="well mycss-well-data">

                    <div class="jumbotron" >
                        
                   


					<form method="POST" action="" id="ancre">
						<fieldset>
                        <?php 
                            //var_dump($_SESSION);
                            //var_dump($_POST);
                            if(!empty($_SESSION['flash']['messageConnexion'])) {
                                $this->Session->flash('messageConnexion'); 
                            }
                        ?>
                            <div class="col-md-10 offset-md-1" >
                                <h3><a href="<?php echo BASE_URL ?>inscription/" >S'inscrire</a> ou se connecter</h3>
                                <hr class="my-4">
                            </div>						

							<div class="form-group row">
								<label class="col-md-2 offset-md-2 col-form-label" for="inputLogin" >Login : </label>

								<div class="col-md-7">
									<input class="form-control" type="text" name="inputLogin" id="inputLogin"  placeholder="prenom.nom" required autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-2 offset-md-2 col-form-label" for="inputPassword" >Mot de passe : </label>
								
								<div class="col-md-7">
									<input class="form-control" type="password" placeholder="******" name="inputPassword" id="inputPassword" required>
								</div>
							</div>
							<div class="form-group row">
							    <label class="form-check-label col-md-6 offset-md-4 col-form-label" style="margin-left: 36%;">
                                    <input class="form-check-input" type="checkbox" value="" checked="" name="remember"> Rester connecté
                                </label>
							</div>

                            




							<div class="col-md-10 offset-md-1" >
								<hr class="my-4">
								<button type="submit" class="btn btn-block btn-primary mycss-btn-myprimary">Se connecter</button>
							</div>
							
						</fieldset>
                    </form>
                    
            </div>
        </div>
    </div>
</main>






