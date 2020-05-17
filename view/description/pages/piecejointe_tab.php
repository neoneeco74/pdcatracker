<div class="py-2" style="" >
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well mycss-well-data">
					<div class="page-header">
						<h3>Pièces jointes</h3>
						<br><br>
                        <?php 
                            //var_dump($_SESSION);
                            if(!empty($_SESSION['flash']['messagePj'])) {
                                $this->Session->flash('messagePj'); 
                            }
                        ?>
					</div>
					<?php if($listeAdressesFichiers):
						foreach($listeAdressesFichiers as $uneAdresseFichier):
						    $strAdresse = str_replace('\\', '/', $uneAdresseFichier['adresse']);
						    $adresseComplete = BASE_URL .'uploaded_files/'.$strAdresse;
						    $adresseDelete = BASE_URL .'webroot/icons/trash.svg';
						    
						?>		
                        <div class="card border-secondary mb-3">
                            <div class="card-header"><?php echo $adresseComplete; ?></div>
                            <div class="card-body">
                                <img src="<?php echo $adresseComplete; ?>" width="846" height="634" />
                                <div><a href="../deletepj/<?php echo $uneAdresseFichier['id_fichier']; ?>" id="1" class="btn btn-sm btn-danger" title="Supprimer l'image">
                                    <img src="<?php echo $adresseDelete; ?>" alt="" width="20" height="20" title="Supprimer l'image">
                                    </a>
                                </div>
                            </div>
                        </div>
					<?php endforeach;
						endif;
						?>
					<form method="POST" action="" enctype="multipart/form-data">
						<div class="form-group row" >
							<div class="col-md-8 offset-md-1">
								<hr class="my-4">
							</div>
							<label for="input_upload_fichiers_1" class="col-md-3 offset-md-1 col-form-label">Joindre un fichier <span class="small">(Taille max: 5 Mo)</span></label>
							<div class="col-md-3">
								<input type="hidden" name="MAX_FILE_SIZE" value="5000000" >   				<!-- 5 Mo max        !-->
								<input tabindex="12" name='upload_fichiers_1' id="input_upload_fichiers_1" type="file" size="50" >
							</div>
							<div class="col-md-3 offset-md-1">
								<button type="button" name="add_upload_fichiers">Ajouter un autre fichier</button>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-8 offset-md-1">
								<hr class="my-4">
								<button class="btn btn-md btn-block btn-primary mycss-btn-myprimary float-right" type="submit">Enregistrer les fichiers</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>