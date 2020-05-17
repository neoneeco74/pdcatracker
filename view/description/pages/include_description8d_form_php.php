<div class="row">

	<div class="col-md-6 ">
	
		<input type="hidden" name="champ_id_description8d" value="<?php echo $unArrayDescription8d->getVar_id_description8d(); ?>" />
		<input type="hidden" name="champ_id_pdca" value="<?php echo $unPdca->getIdPdca() ?>" />	
		
		<div class='form-group row'>
			<label for="champ_datecreation" class="col-md-3 col-form-label">Creation le :</label>
			<div class="col-md-8">
				<textarea tabindex="1" class="form-control" name="champ_datecreation" id="champ_datecreation" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_datecreation(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_responsable" class="col-md-3 col-form-label">Responsable QA :</label>
			<div class="col-md-8">
				<textarea tabindex="2" class="form-control" name="champ_responsable" id="champ_responsable" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_responsable(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_produit" class="col-md-3 col-form-label">Produit :</label>
			<div class="col-md-8">
				<textarea tabindex="3" class="form-control" name="champ_produit" id="champ_produit" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_produit(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_refkoa" class="col-md-3 col-form-label">Ref KOA :</label>
			<div class="col-md-8">
				<textarea tabindex="4" class="form-control" name="champ_refkoa" id="champ_refkoa" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_refkoa(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_refclient" class="col-md-3 col-form-label">Ref Client :</label>
			<div class="col-md-8">
				<textarea tabindex="5" class="form-control" name="champ_refclient" id="champ_refclient" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_refclient(); ?></textarea>
			</div>
		</div>
	</div>


	
	
	<div class="col-md-6 ">		
		<div class='form-group row'>
			<label for="champ_description" class="col-md-3 col-form-label">Description :</label>
			<div class="col-md-8">
				<textarea tabindex="6" class="form-control" name="champ_description" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_description(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_niv_incident" class="col-md-3 col-form-label">Niveau incident :</label>
			<div class="col-md-8">
				<textarea tabindex="7" class="form-control" name="champ_niv_incident" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_niv_incident(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_num_incident_koa" class="col-md-3 col-form-label">Numero incident KOA :</label>
			<div class="col-md-8">
				<textarea tabindex="8" class="form-control" name="champ_num_incident_koa" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_num_incident_koa(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_num_incident_client" class="col-md-3 col-form-label">Numero incident client :</label>
			<div class="col-md-8">
				<textarea tabindex="9" class="form-control" name="champ_num_incident_client" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_num_incident_client(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_site_client" class="col-md-3 col-form-label">Site client :</label>
			<div class="col-md-8">
				<textarea tabindex="10" class="form-control" name="champ_site_client" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_site_client(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_quantite_nok" class="col-md-3 col-form-label">Quantite NOK :</label>
			<div class="col-md-8">
				<textarea tabindex="11" class="form-control" name="champ_quantite_nok" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_quantite_nok(); ?></textarea>
			</div>
		</div>
	</div>

</div>	


	
	
<div class="row">	
	
	<div class="col-md-6 ">
		<div class='form-group row'>
			<label for="champ_evenement" class="col-md-3 col-form-label">Que s'est il passé ? :</label>
			<div class="col-md-8">
				<textarea tabindex="12" class="form-control" name="champ_evenement" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_evenement(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_pourquoi" class="col-md-3 col-form-label">Pourquoi est-ce un problème ? :</label>
			<div class="col-md-8">
				<textarea tabindex="13" class="form-control" name="champ_pourquoi" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_pourquoi(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_quand" class="col-md-3 col-form-label">Quand a-t-il été détecté ? :</label>
			<div class="col-md-8">
				<textarea tabindex="14" class="form-control" name="champ_quand" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_quand(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_qui" class="col-md-3 col-form-label">Qui l'a détecté ? :</label>
			<div class="col-md-8">
				<textarea tabindex="15" class="form-control" name="champ_qui" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_qui(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_ou" class="col-md-3 col-form-label">Ou a-t-il été détecté ? :</label>
			<div class="col-md-8">
				<textarea tabindex="16" class="form-control" name="champ_ou" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_ou(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_comment" class="col-md-3 col-form-label">Comment a-t-il été détecté ?  :</label>
			<div class="col-md-8">
				<textarea tabindex="17" class="form-control" name="champ_comment" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_comment(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_combien" class="col-md-3 col-form-label">Combien de pièces mauvaises ? :</label>
			<div class="col-md-8">
				<textarea tabindex="18" class="form-control" name="champ_combien" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_combien(); ?></textarea>
			</div>
		</div>
	</div>
	


	<div class="col-md-6 ">
		<div class='form-group row'>
			<label for="champ_difference" class="col-md-3 col-form-label">Quelle est la différence entre les pièces bonnes et mauvaises ? :</label>
			<div class="col-md-8">
				<textarea tabindex="19" class="form-control" name="champ_difference" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_difference(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_standard" class="col-md-3 col-form-label">La pièce a-t-elle été produite sur le process standard ? :</label>
			<div class="col-md-8">
				<textarea tabindex="20" class="form-control" name="champ_standard" id="champ_standard" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_standard(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_quandproduite" class="col-md-3 col-form-label">Quand a-t-elle été produite chez Kongsberg ? :</label>
			<div class="col-md-8">
				<textarea tabindex="21" class="form-control" name="champ_quandproduite" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_quandproduite(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_quiproduite" class="col-md-3 col-form-label">Qui l'a produite ? :</label>
			<div class="col-md-8">
				<textarea tabindex="22" class="form-control" name="champ_quiproduite" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_quiproduite(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_autreprocess" class="col-md-3 col-form-label">Dans quelle autre application ou process ce produit est il utilisé ? :</label>
			<div class="col-md-8">
				<textarea tabindex="23" class="form-control" name="champ_autreprocess" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_autreprocess(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_arretdefaut" class="col-md-3 col-form-label">Est-ce que l'on arrête le défaut quand on réinjecte le produit dans le process normal ?  :</label>
			<div class="col-md-8">
				<textarea tabindex="24" class="form-control" name="champ_arretdefaut" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_arretdefaut(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_pbsimilaire" class="col-md-3 col-form-label">Un problème similaire est il déjà apparu auparavant chez le client ou en interne ? :</label>
			<div class="col-md-8">
				<textarea tabindex="25" class="form-control" name="champ_pbsimilaire" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription8d->getVar_pbsimilaire(); ?></textarea>
			</div>
		</div>
	</div>
	
</div>