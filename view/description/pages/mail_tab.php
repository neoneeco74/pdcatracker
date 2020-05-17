<div class="py-2" style="" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well mycss-well-data">
                         
                    
                
                <ul class=" nav nav-tabs nav-justified" id="myTab" role="tablist">
	<li class="nav-item active">
		<a class="nav-link active" id="mainmail-tab" data-toggle="tab" href="#mainmail" role="tab" aria-controls="mainmail" aria-selected="true">Selection des destinataires </a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="viewmail-tab" data-toggle="tab" href="#viewmail" role="tab" aria-controls="viewmail" aria-selected="false">Voir le mail</a>
	</li>
</ul>




<div class="tab-content" id="myTabContent">




    <!--=============================================================================================================//
    //===============================================================================================================//
    //=========   SOUS ONGLET 1 : MAIN DESCRIPTION =================================================================!-->

	<div class="tab-pane fade show active" id="mainmail" role="tabpanel" aria-labelledby="mainmail-tab">


                        <div class="page-header">
                            <hr class="my-4">
                            <h3>Envoi E-mail</h3>
                            
                        </div>

                        <?php 
                            //var_dump($_SESSION);
                            if(!empty($_SESSION['flash']['messageMailEnvoye'])) {
                                $this->Session->flash('messageMailEnvoye'); 
                            }
                        ?>
                        <div class="mycss-separator-30"></div>
	
						<div class="list-group">


							<div class="list-group-item "><b>PDCA assigné à :</b> 

								<form class="form-horizontal" method="POST" action="">

									<div class="form-group row">
										
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
									
									<div class="form-group row">
										<div class="col-md-8 col-md-offset-3">
											<button type="submit" id="my-js-button-change_assignation" name="submit_add_destinataires" class="btn btn block btn-primary">Enregistrer les destinataires</button>
										</div>
									</div>									
								
								</form>


							</div>


							<div class="list-group-item "><b>Actuellement assigné à :</b> </div>
                                <table class="table table-striped mycss-email-tableau">
                                    <thead>
                                        <tr>
                                            
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>E-mail</th>
                                            <th>Envoyer E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($listeLogins){
                                                foreach($listeLogins as $key => $value) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $listeIdUsers[$key] ?></td>
                                                    <td><?php echo $value['login'] ?></td>
                                                    <td><?php echo $value['email'] ?></td>
                                                    <td>
                                                    <a href="<?php echo BASE_URL.'description/mail/'. $unPdca->getIdPdca() . '/'. $listeIdUsers[$key]; ?>" class="btn btn-sm btn-danger pull-right " title="Envoyer un mail">
                                                            <img src="<?php echo BASE_URL ?>webroot/icons/envelope.svg" alt="" width="20" height="20" title="Envoyer un mail">
                                                        </a>
                                                        
                                                    </td>
                                                </tr>		
                                        <?php						
                                                }
                                            }
                        ?>
                                    </tbody>
                                </table>
                                
                                <form class="form-horizontal mycss-form-boutons-actions" action="" method="POST">
                                            
                                            <input tabindex="1" type="hidden" class="form-control" name="champ_idpdca" id="champ_idpdca" value="<?php echo $unPdca->getIdPdca() ?>" />

                                            <div class="col-md-8 offset-md-2" >                      
                                                <hr class="my-4">
                                                <button type="submit" name="submit_mail_tous" class="btn btn-block btn-danger">Envoyer un mail à tous</button>					
                                            </div>
                                    
                                </form>
                            


 

















						</div>
    				
    </div> <!-- Fin tab pan -->
    



    <!--=============================================================================================================//
    //===============================================================================================================//
    //=========   SOUS ONGLET 2 : MAIN DESCRIPTION 8D =================================================================!-->

    <div class="tab-pane fade" id="viewmail" role="tabpanel" aria-labelledby="viewmail-tab">

        <?php //include(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_mail.php'); 
        ob_start();
        include(ROOT.DS.'view'.DS.'description'.DS.'pages'.DS.'include_mail.php');
        $message_html = ob_get_contents();
        ob_end_clean(); 
        echo $message_html;                                
        ?>


	</div> <!-- Fin tab pan -->






</div> <!-- fin <div class="tab-content" id="myTabContent"> -->






















                </div>
            </div>
        </div>
    </div>
</div>