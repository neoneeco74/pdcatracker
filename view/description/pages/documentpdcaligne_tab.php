<div class="well mycss-well-data ">

	<div class="table-responsive">
	
		<table width="100%" class="tableau_documentpdcaligne">

			<thead>	
			
				<tr>
					
					<th valign="middle" align="left">
						
							<img src="../../webroot/img/logo_document_2.png" alt="Mon Logo" width="176" height="49"/>
						
					</th>
					<th colspan="17">PDCA Ligne PHP</td>					
					
				</tr>
				<tr>
					<th>N° QRQC</th>
					<th colspan="4">Quel est le problème? Quel est le Standard en écart? (Qu'est ce qui a changé?)</th>
					<!--<th></th>
					<th></th>
					<th></th>!--> 
					<th>Comment je protège mon client interne/externe?<br>Comment je redémarre ?</th>
					<th colspan="2">Déterminer la cause origine (5 pourquoi?)</th>
					
					<th>J'arrive à reproduire le défaut?</th>
					<th>Actions pour supprimer définitivement la cause racine?<br>Si défaut traité en 8D (Site ou autres services), indiquer le numéro du 8D</th>
					<th>Croix Amélioration</th>
					<th></th>
					<th>Validation conditions redémarrage<br>(date + signature superviseur)</th>
					<th colspan="4">Actions efficaces?<br>Indiquer OK/KO ou nombre de défauts si KO ouvrir PDCA Bis</th>
					<th>Validation efficacité<br>(OK + date + signature superviseur)</th>
				</tr>
			</thead>
			
			<tbody>

				<tr>
					<th class="mycss-th-px">Q; K; S</th>
					<th class="mycss-th-05">Date :</th>
					<th class="mycss-th-15"><strong><?php if(is_object($unPdca)) echo $unPdca->getDatePdca(); ?></strong></th>
					<th>Ligne :</th>
					<th class="mycss-th-15"><strong><?php if(is_object($unPdca)) echo $unPdca->getListeUnites(); ?></strong></th>
					<th></th>
					<th colspan="2"></th>

					<th>(oui/non)</th>
					<th>Pensez à émettre vos PA, mettez une croix !</th>
					<th></th>
					<th>jour J</th>
					<th></th>
					<th class="mycss-th-05">J+1</th>
					<th class="mycss-th-05">J+2</th>
					<th class="mycss-th-05">J+3</th>
					<th class="mycss-th-05">J+4</th>
					<th class="mycss-th-05">J+5</th>
				</tr>
				
				<tr>
				
					<td rowspan="3">K KOSU</td>
					<td>Qui:</td>
					<td colspan="3"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_qui(); ?></strong></td>
					<td rowspan="9"></td>
					<td>1) Pourquoi ?</td>
					<td class="mycss-th-15"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_pourquoi(); ?></strong></td>
					<td rowspan="9"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_reproductible(); ?></strong></td>
					<td rowspan="9"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_action_racine(); ?></strong></td>
					<td rowspan="9"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_amelioration(); ?></strong></td>
					<td>Date:</td>
					
					<td rowspan="8"></td>
					<td rowspan="8"></td>
					<td rowspan="8"></td>
					<td rowspan="8"></td>
					<td rowspan="8"></td>
					<td rowspan="8"></td>
				</tr>
				
				
				<tr>
					<td>Quoi:</td>
					<td colspan="3"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_quoi(); ?></strong></td>
					<td>2) Pourquoi ?</td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_pourquoi(); ?></strong></td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_date_redemarrage(); ?></strong></td>

				</tr>
				
				
				<tr>
					<td>Comment:</td>
					<td colspan="3"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_comment(); ?></strong></td>
					<td>3) Pourquoi ?</td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_pourquoi(); ?></strong></td>
					<td>Heure:</td>
				</tr>
				
				
				<tr>
					<td rowspan="3">Qualité</td>
					<td>Ou:</td>
					<td colspan="3"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_ou(); ?></strong></td>
					<td>4) Pourquoi ?</td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_pourquoi(); ?></strong></td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_date_redemarrage(); ?></strong></td>
				</tr>
			
				<tr>
					
					<td>Quand:</td>
					<td colspan="3"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_quand(); ?></strong></td>
					<td>5) Pourquoi ?</td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_pourquoi(); ?></strong></td>
					<td>Durée arrêt:</td>						

				</tr>
				
				<tr>
					
					<td>Pourquoi:</td>
					<td colspan="3"><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_pourquoi(); ?></strong></td>					
					<td colspan="2" rowspan="4"></td>
					
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_duree_arret(); ?></strong></td>
				</tr>
			
			
				<tr>
					<td rowspan="3">S Sécurité (écrire en rouge)</td>
					<td>Standart1:</td>
					<td colspan="3"><strong></strong></td>
					<td>Pilote:</td>
				</tr>
				
				<tr>
					
					<td>Standart2:</td>
					<td colspan="3"><strong></strong></td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_pilote(); ?></strong></td>

				</tr>
				
				<tr>
					
					<td>Réf du produit fabriqué :</td>
					<td><strong><?php if(is_object($unPdca)) echo $unPdca->getRefProduit(); ?></strong></td>
					<td>Nombre de défauts :</td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_nb_defauts(); ?></strong></td>
					<td>Visa Superviseur appelé:</td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_visa_superviseur(); ?></strong></td>
					<td>Visa Resp production appelé:</td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_visa_resp_prod(); ?></strong></td>
					<td>Visa Directeur Usine appelé:</td>
					<td><strong><?php if(is_object($unArrayDescription)) echo $unArrayDescription->getVar_visa_directeur(); ?></strong></td>
					<td></td>
				</tr>
			
			</tbody>
			
		</table>
		
	</div>		

</div>