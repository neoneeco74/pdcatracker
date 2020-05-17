<div class="py-2" style="" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well mycss-well-data">

                    <div class="page-header">
                            <h3>Liste des messages</h3>
                            <br><br>
                        </div>



<?php 
 

?> 

	<div class="row">

<?php
                           //var_dump($_SESSION);
                            //var_dump($_POST);
                            if(!empty($_SESSION['flash']['messageMessage'])) {
                                $this->Session->flash('messageMessage'); 
                            }
                      
                        ?>

    
        <form class="form-horizontal mycss-form-boutons-actions" action="" method="POST">
            
            <div class="form-group">
            
                <div class="col-md-8 offset-md-1">
                    <textarea class="form-control" name="post_message" id="post_message" placeholder="Ecrivez un message" rows="7" cols="250" maxlength="2000"></textarea>
                </div>
                
            </div>
            <input tabindex="1" type="hidden" class="form-control" name="champ_login" id="champ_login" value=<?php echo $_SESSION['auth']['login']; ?> />
            <input tabindex="1" type="hidden" class="form-control" name="champ_idpdca" id="champ_idpdca" value="<?php echo $unPdca->getIdPdca() ?>" />
     
            <div class="form-group ">
                <div class="col-md-8 offset-md-1">
                    <hr class="my-4">
                    <button class="btn btn-md btn-block btn-primary mycss-btn-myprimary float-right" type="submit" id="envoi_message" name="submit_message" value="<?php echo $unPdca->getIdPdca(); ?>">Envoyer le message</button>
                    
                </div>					
            </div>
            
        </form>

			
        <hr class="my-4">
		
	
	</div>




	<div class="row">
		<div class="col-md-10 offset-md-1" id="append_message">	
        <hr class="my-4">
<?php
            if(empty($listeMessages)) { 
                if(!empty($_SESSION['flash']['messageMessageVide'])) {
                    $this->Session->flash('messageMessageVide'); 
                }
            }

			else {

                $numeroCommentaire = 0;
                //var_dump($listeMessages);
				foreach ($listeMessages as $unMessage) {
					
					$numeroCommentaire++;
					/* $auteur = "totooo";	 */		/* Affichage::getAuteur($unCommentaire->getIdUser()); */
?>	
					<div class="row">
                        <div class="col-md-2">
                            
                            <div style="margin-right: 50px;">
                                <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" width="90" height="90">
                            </div>
                        </div>
                    
                    
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-header">
                                    Ecrit par <strong><?php echo ucfirst($unMessage->prenom." ".ucfirst($unMessage->nom)); ?></strong>
                                    <span class="text-muted"> <i>(<?php echo $unMessage->login; ?>)</i> - le <?php echo $unMessage->date_ajout; ?></span>
                                </div>
                                <div class="card-body">
                                    <p><?php echo nl2br($unMessage->message); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
      
                    

						
<?php
				}
			}
            unset($_POST);
?>
		</div>
	</div>


    
</div>
</div>
</div>
</div>
</div>
