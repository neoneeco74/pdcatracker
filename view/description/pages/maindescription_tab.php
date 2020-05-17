<div class="py-2" style="" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well mycss-well-data">
                         
						 
                        <div class="page-header">
                            <h3>Description générale</h3>
                            <h5>Titre : <?php echo $unPdca->getTitre(); ?></h5>
                        </div>
                    
             
                        <div class="mycss-separator-30"></div>
	
						<div class="list-group">
							<div class="list-group-item "> </div>
							<div class="list-group-item active"><b>Description du PDCA</b> </div>
							<div class="list-group-item "><b>Id du PDCA : </b>  <?php echo $unPdca->getIdPdca(); ?></div>
							<div class="list-group-item "><b>Date d'envoi du PDCA :</b>   <?php echo $unPdca->getDateEnvoi(); ?></div>
							<div class="list-group-item "><b>Date du PDCA : </b>  <?php echo $unPdca->getDatePdca(); ?></div>
							<div class="list-group-item "><b>Auteur :</b>  <?php echo $affichage->getLogin($unPdca->getIdUser()); ?></div>
							<div class="list-group-item "><b>Titre :</b>   <?php echo $unPdca->getTitre(); ?></div>
							<div class="list-group-item "><b>Reference produit :</b>  <?php echo $unPdca->getRefProduit(); ?></div>
							<div class="list-group-item "><b>Liste unités concernés :</b>  
								<?php
									if($listeNomsUnites){
										foreach($listeNomsUnites as $key => $value) {
											echo "<div class='list-group-item'>$value</div>";
											
										}
									}
								?>
							</div>

							<div class="list-group-item "><b>Statut :</b>  
								
						
									<form class="form-horizontal" method="POST" action="">

										<div class="form-group row">
										
										
											<div class="col-md-8" id="<?php echo $unPdca->getIdPdca(); ?>">
												<select name="statut" id="statut" class="form-control">
													<option value="<?php echo $unPdca->getStatut(); ?>" selected="selected"><?php echo $unPdca->getNomStatut(); ?></option>
													<option value="1">Nouveau</option>
													<option value="2">En cours</option>
													<option value="3">Résolu</option>
													<option value="4">Re-ouvert</option>
													<option value="5">Cloturé</option>										
													<option value="6">Passer en 8D</option>	
												</select>
											</div>
										</div>

										<div class="form-group">
												<div class="col-md-8 col-md-offset-3">
													<button type="submit" id="" name="submit_change_statut" class="btn btn block btn-primary">Changer le statut</button>
												</div>
										</div>	
									</form>
                            
							</div>

							<div class="list-group-item "><b>PDCA assigné à :</b> 

								<form class="form-horizontal" method="POST" action="">

									<div class="form-group">
										
										<div class="col-md-8">
										
											<select id="destinataires" name="liste_destinataires[]" multiple="multiple" class="form-control mycss-multi-assignation" >

					<?php 
												$requeteServices = $affichage->getPDOAffichage()->query('SELECT * FROM services');
												
												while($reponseUnService = $requeteServices->fetch()) {
					?>
													<optgroup label="<?php echo strtoupper($reponseUnService['nom']); ?>" id="example-post-checkboxName-1">
					<?php
														$requeteListeUtilisateurs = $affichage->getPDOAffichage()->prepare('
															SELECT u.id_user id_user, u.prenom prenom_user, u.nom nom_user, u.email email_user
															FROM users u
															INNER JOIN services s
															ON u.id_service = s.id_service
															WHERE s.id_service = :reponseUnService												
															');			
														$requeteListeUtilisateurs->execute(array('reponseUnService' => $reponseUnService['id_service']));
														
														while($reponseUnUtilisateur = $requeteListeUtilisateurs->fetch()) {
					?>								
															<option value="<?php echo $reponseUnUtilisateur['id_user']; ?>"><?php echo ucfirst($reponseUnUtilisateur['prenom_user'])." ".ucfirst($reponseUnUtilisateur['nom_user'])."  (".$reponseUnUtilisateur['email_user'] .")"; ?></option>
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
									
									<div class="form-group">
										<div class="col-md-8 col-md-offset-3">
											<button type="submit" id="my-js-button-change_assignation" name="submit_add_destinataires" class="btn btn block btn-primary">Enregistrer les destinataires</button>
										</div>
									</div>									
								
								</form>


							</div>


							<div class="list-group-item "><b>Actuellement assigné à :</b> 
							
								<div class="list-group">	
					<?php             
									if($listeLogins){
										foreach($listeLogins as $key => $value) {
											echo "<div class='list-group-item'>".$value['login']."</div>";
											
										}
									}
					?>
								</div>
							</div>

						</div>

					</div>
				</div>
				
			</div>
		</div>
	</div>