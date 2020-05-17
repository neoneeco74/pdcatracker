<div class="row">

	<div class="col-md-6 ">
	
		<input type="hidden" name="champ_id_description" value="<?php echo $unArrayDescription->getVar_id_description(); ?>" />
		<input type="hidden" name="champ_id_pdca" value="<?php echo $unPdca->getIdPdca() ?>" />
		
		<div class='form-group row'>
			<label for="champ_qui" class="col-md-2 offset-md-1 col-form-label">Qui : </label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_qui" id="champ_qui" rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_qui(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_quoi" class="col-md-2 offset-md-1 col-form-label">Quoi : </label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_quoi" id="champ_quoi"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_quoi(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_quand" class="col-md-2 offset-md-1 col-form-label">Quand : </label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_quand" id="champ_quand"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_quand(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_ou" class="col-md-2 offset-md-1 col-form-label">Ou : </label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_ou" id="champ_ou"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_ou(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_comment" class="col-md-2 offset-md-1 col-form-label">Comment : </label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_comment" id="champ_comment"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_comment(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_pourquoi" class="col-md-2 offset-md-1 col-form-label">Pourquoi :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_pourquoi" id="champ_pourquoi"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_pourquoi(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_nb_defauts" class="col-md-2 offset-md-1 col-form-label">Nombre de défauts :</label>
			<div class="col-md-8">
				<input type="number" class="form-control" name="champ_nb_defauts" id="champ_nb_defauts" value="<?php echo $unArrayDescription->getVar_nb_defauts(); ?>">
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_protege" class="col-md-2 offset-md-1 col-form-label">Comment je protège mon client ? :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_protege" id="champ_protege"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_protege(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_cause" class="col-md-2 offset-md-1 col-form-label">Déterminer la cause origine :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_cause" id="champ_cause"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_cause(); ?></textarea>
			</div>
		</div>
		
	</div>


	
	
	<div class="col-md-6 ">
	
		<div class='form-group row'>
			<label for="champ_reproductible" class="col-md-2 col-form-label">J'arrive à reproduire le defaut ? :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_reproductible" id="champ_reproductible"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_reproductible(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_action_racine" class="col-md-2 col-form-label">Action pour supprimer la cause racine :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_action_racine" id="champ_action_racine"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_action_racine(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_amelioration" class="col-md-2 col-form-label">Amélioration :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_amelioration" id="champ_amelioration"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_amelioration(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_date_redemarrage" class="col-md-2 col-form-label">Date redémarrage :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_date_redemarrage" id="champ_date_redemarrage"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_date_redemarrage(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_duree_arret" class="col-md-2 col-form-label">Durée arret :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_duree_arret" id="champ_duree_arret"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_duree_arret(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_pilote" class="col-md-2 col-form-label">Pilote :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_pilote" id="champ_pilote"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_pilote(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_visa_superviseur" class="col-md-2 col-form-label">Visa superviseur :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_visa_superviseur" id="champ_visa_superviseurrows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_visa_superviseur(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_visa_resp_prod" class="col-md-2 col-form-label">Visa responsable production :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_visa_resp_prod" id="champ_visa_resp_prod"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_visa_resp_prod(); ?></textarea>
			</div>
		</div>
		<div class='form-group row'>
			<label for="champ_visa_directeur" class="col-md-2 col-form-label">Visa directeur :</label>
			<div class="col-md-8">
				<textarea class="form-control" name="champ_visa_directeur" id="champ_visa_directeur"rows="3" cols="50" maxlength="255"><?php echo $unArrayDescription->getVar_visa_directeur(); ?></textarea>
			</div>
		</div>
		
	</div>
	
</div>