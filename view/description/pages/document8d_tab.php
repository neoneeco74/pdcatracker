<div class="well mycss-well-data ">

	<div class="table-responsive">
	
		<table width="100%" class="tableau_documentpdcaligne">

			<tdead>							

				<tr>
					
					<th valign="middle" align="left">
						
							<img src="../../webroot/img/logo_document_2.png" alt="Mon Logo" width="176" height="49"/>
						
					</th>
					<th colspan="3">Document 8D</td>
					
					
				</tr>
				<tr>
					<th rowspan="2" class="mycss-th-25">INFO INCIDENT CLIENT</th>
					<th rowspan="2" class="mycss-th-25">PSA</th>
					<th class="mycss-th-25">Creation, le</th>
					<th class="mycss-th-25">responsable</th>					
				</tr>
				<tr>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_datecreation(); ?></strong></th>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_responsable(); ?></strong></th>				
				</tr>				
				
				<tr>
					<th rowspan="2">PRODUIT</th>
					<th rowspan="2"><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_produit(); ?></strong></th>
					<th>REF KOA</th>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_refkoa(); ?></strong></th>

				</tr>
				<tr>
					<th>REF CLIENT</th>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_refclient(); ?></strong></th>

				</tr>				
				
				
				<tr>
					<th rowspan="5">DESCRIPTION</th>
					<th rowspan="5"><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_description(); ?></strong></th>
					<th>NIVEAU INCIDENT</th>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_niv_incident(); ?></strong></th>
				</tr>
				<tr>
					<th>N°INCIDENT KOA</th>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_num_incident_koa(); ?></strong></th>
				</tr>					
				<tr>
					<th>N°INCIDENT CLIENT</th>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_num_incident_client(); ?></strong></th>
				</tr>
				<tr>
					<th>SITE CLIENT</th>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_site_client(); ?></strong></th>
				</tr>
				<tr>
					<th>QUANTITE NOK</th>
					<th><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_quantite_nok(); ?></strong></th>
				</tr>

				<tr>
					<th colspan="4"></th>
				</tr>

				<tr>
					<th colspan="2">VUE CLIENT</th>
					<th colspan="2">VUE KONGSBERG</th>

				</tr>				
			</tdead>
			
			<tbody>

				
				
				<tr>
					<td>Que s'est il passé ?</td>
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_evenement(); ?></strong></td>
					<td>Quelle est la différence entre les pièces bonnes et mauvaises ?</td>					
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_difference(); ?></strong></td>
				</tr>
				
				<tr>
					<td>Pourquoi est-ce un problème ?</td>
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_pourquoi(); ?></strong></td>
					<td>La pièce a-t-elle été produite sur le process standard ?</td>					
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_standard(); ?></strong></td>
				</tr>
				<tr>
					<td>Quand a-t-il été détecté ?</td>
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_quand(); ?></strong></td>
					<td>Quand a-t-elle été produite chez Kongsberg ?</td>		
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_quandproduite(); ?></strong></td>
				</tr>
				
				<tr>
					<td>Qui l'a détecté ?</td>
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_qui(); ?></strong></td>
					<td>Qui l'a produite ?</td>					
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_quiproduite(); ?></strong></td>
				</tr>			
				<tr>
					<td>Ou a-t-il été détecté ?</td>
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_ou(); ?></strong></td>
					<td>Dans quelle autre application ou process ce produit est il utilisé ?</td>					
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_autreprocess(); ?></strong></td>
				</tr>
				
				<tr>
					<td>Comment a-t-il été détecté ?</td>
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_comment(); ?></strong></td>
					<td>Est-ce que l'on arrête le défaut quand on réinjecte le produit dans le process normal ?</td>					
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_arretdefaut(); ?></strong></td>
				</tr>
				<tr>
					<td>Combien de pièces mauvaises ?</td>
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_combien(); ?></strong></td>
					<td>Un problème similaire est il déjà apparu auparavant chez le client ou en interne ?</td>					
					<td><strong><?php if(is_object($unArrayDescription8d)) echo $unArrayDescription8d->getVar_pbsimilaire(); ?></strong></td>
				</tr>				
				
				
				<tr>
					<td colspan="2">
						
						<form class="form-horizontal" name="report_form" method="POST" action="" enctype="multipart/form-data">
						
							<div class="form-group row" >
								<label for="upload_fichiers_correct" class="col-md-3 col-form-label">Joindre un fichier Etat OK <span class="small">(Taille max: 5 Mo)</span></label>
							
								<div class="col-md-4">
									<input type="hidden" name="MAX_FILE_SIZE" value="5000000" >   				<!--  1 Mo max        !-->
									<input tabindex="12" name="upload_fichiers_correct" id="upload_fichiers_correct" type="file" size="50" >
									
								</div>
							
								<div class="form-group">
									<div class="col-md-8 offset-md-3">
										<button type="submit" id="" name="submit_add_fichier_correct" class="btn btn block btn-primary">Enregistrer</button>
									</div>
								</div>	
					
							</div>

                        </form>
                        
                        
						
<?php if($listeAdressesFichiers8dCorrect):
    foreach($listeAdressesFichiers8dCorrect as $uneAdresseFichier8dCorrect):
        $strAdresseFichier8dCorrect = str_replace('\\', '/', $uneAdresseFichier8dCorrect['adresse']);
        $adresseCompleteFichier8dCorrect = '../../uploaded_files/'.$strAdresseFichier8dCorrect;
        $adresseDelete = BASE_URL .'webroot/icons/trash.svg';
?>		
            <img src="<?php echo $adresseCompleteFichier8dCorrect; ?>" class="mycss-border-img8d-correct" width="500" height="400" />
            <div><a href="../deletepj/<?php echo $uneAdresseFichier8dCorrect['id_fichier']; ?>" id="1" class="btn btn-sm btn-danger" title="Supprimer l'image">
                                    <img src="<?php echo $adresseDelete; ?>" alt="" width="20" height="20" title="Supprimer l'image">
                                    </a>
                                </div>

<?php endforeach;
endif;

?>



					</td>
					

					<td colspan="2">
						
						<form class="form-horizontal" name="report_form" method="POST" action="" enctype="multipart/form-data">
						
							<div class="form-group row" >
								<label for="upload_fichiers_incorrect" class="col-md-3 col-form-label">Joindre un fichier Etat NOK <span class="small">(Taille max: 10 Mo)</span></label>
							
								<div class="col-md-4">
									<input type="hidden" name="MAX_FILE_SIZE" value="5000000" >   				<!--  1 Mo max        !-->
									<input tabindex="12" name="upload_fichiers_incorrect" id="upload_fichiers_incorrect" type="file" size="50" >
									
								</div>
							
								<div class="form-group">
									<div class="col-md-8 offset-md-3">
										<button type="submit" id="" name="submit_add_fichier_incorrect" class="btn btn block btn-primary">Enregistrer</button>
									</div>
								</div>	
					
							</div>

						</form>
						
<?php if($listeAdressesFichiers8dIncorrect):
    foreach($listeAdressesFichiers8dIncorrect as $uneAdresseFichier8dIncorrect):
        $strAdresseFichier8dIncorrect = str_replace('\\', '/', $uneAdresseFichier8dIncorrect['adresse']);
        $adresseCompleteFichier8dIncorrect = '../../uploaded_files/'.$strAdresseFichier8dIncorrect;
        $adresseDelete = BASE_URL .'webroot/icons/trash.svg';
?>		
            <img src="<?php echo $adresseCompleteFichier8dIncorrect; ?>" class="mycss-border-img8d-incorrect" width="500" height="400" />
            <div><a href="../deletepj/<?php echo $uneAdresseFichier8dIncorrect['id_fichier']; ?>" id="1" class="btn btn-sm btn-danger" title="Supprimer l'image">
                                    <img src="<?php echo $adresseDelete; ?>" alt="" width="20" height="20" title="Supprimer l'image">
                                    </a>
                                </div>

<?php endforeach;
endif;

?>				
					</td>
					
				</tr>				
							
			</tbody>
			
		</table>
		
	</div>		

</div>