<?php
    $this->loadModel('Affichage');
    $affichage = new Affichage();
?>
<div class="py-5 mycss-py-5">


	<div class="container">
		

            <?php 
            //var_dump($_SESSION);
            if(!empty($_SESSION['flash']['messageInscriptionOk'])) {
                $this->Session->flash('messageInscriptionOk'); 
            }
            ?>
			<h1>Liste des PDCA</h1>
            <hr class="my-4">
			<a href="<?php echo BASE_URL.'add/'; ?>" class="btn btn-success">Ajouter un nouveau PDCA</a>
		
	</div>
</div>

<div class="py-1">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group" id="">
					<p>Afficher </p>
                    
					<form style="" name="" action="" method="POST">
						<select name="nbAfficheElements" class="form-control input-sm" onchange="this.form.submit()">
							<?php if(isset($_SESSION['nbAfficheElements'])) echo
								"<option value=" . $_SESSION['nbAfficheElements'] . " selected=\"selected\" >" . $_SESSION['nbAfficheElements'] . "</option>";
								?>
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
							<option value="Tout">Tout</option>
						</select>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<p>Rechercher </p>
				<div class="input-group">						
					<input type="search" class="form-control input-md">							
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="well mycss-well-data">
			<table class="table table-striped table-bordered mycss-datatable">
				<thead>
					<tr class="mycss-datatable-thead-tr">
						<th class="" width="3%" 	tabindex="1" >#</th>
						<th class="" width="3%" 	tabindex="2" >id </th>
						<th class="" width="10%" 	tabindex="3" >Date</th>
						<th class="" width="15%" 	tabindex="4" >Auteur </th>
						<th class="" width="15%" 	tabindex="5" >Titre </th>
						<th class="" width="15%" 	tabindex="6" >Ref. Produit </th>
						<th class="" width="11%"	tabindex="7" >Statut</th>
						<th class="" width="auto" 	tabindex="8" >Actions</th>
						<th class="" width="10%" 	tabindex="9" >Incrementer </th>
					</tr>
				</thead>
				<tbody>
                    <?php
                    //var_dump($listePdcas);
						if (empty($listePdcas)) {
						  //flashCss("danger", "Liste vide : aucun PDCA d'enregistré.");
						}
						else {
						  $numeroLigne = 0;
						  foreach($listePdcas as $unPdca):
						    $numeroLigne++; 
						?>										
					<tr class="mycss-ligne-cliquable" id="numero_ligne_<?php echo $numeroLigne; ?>">
						<td class="mycss-cellule-cliquable" href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>"><?php echo $numeroLigne; ?></td>
						<td class="mycss-cellule-cliquable" href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>"><b><?php echo $unPdca->getIdPdca(); ?></b></td>
						<td class="mycss-cellule-cliquable" href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>"><?php echo $unPdca->getDateEnvoi(); ?></td>
						<td class="mycss-cellule-cliquable" href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>"><?php echo $affichage->getLogin($unPdca->getIdUser()); ?></td>
						<td class="mycss-cellule-cliquable" href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>"><?php echo $unPdca->getTitre(); ?></td>
						<td class="mycss-cellule-cliquable" href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>"><?php echo $unPdca->getRefProduit(); ?></td>
						<td class="mycss-cellule-cliquable" href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>"><?php echo $affichage->getBoutonStatut($unPdca->getStatut()); ?></td>
						<td id="myjs-actions01">
							<a href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca(); ?>" class="btn btn-sm btn-primary" title="Afficher le PDCA">
							<img src="<?php echo BASE_URL ?>webroot/icons/eye.svg" alt="" width="20" height="20" title="Afficher le PDCA">
							</a>
                    <?php if($_SESSION['auth']['id_groupe'] == '1' OR $_SESSION['auth']['id_groupe'] == '2'): ?>
                   
							<a href="<?php echo BASE_URL.'description/index/'. $unPdca->getIdPdca().'#mail'; ?>" class="btn btn-sm btn-info" title="Envoyer un mail">
							<img src="<?php echo BASE_URL ?>webroot/icons/envelope.svg" alt="" width="20" height="20" title="Envoyer un mail">
							</a>
							<a href="<?php echo BASE_URL.'description/cloturer/'. $unPdca->getIdPdca(); ?>" class="btn btn-sm btn-secondary" title="Cloturer">
							<img src="<?php echo BASE_URL ?>webroot/icons/check-box.svg" alt="" width="20" height="20" title="Cloturer">
							</a>

							<a href="<?php echo BASE_URL.'description/delete/'. $unPdca->getIdPdca(); ?>" id="<?php echo $unPdca->getIdPdca(); ?>" class="btn btn-sm btn-danger" title="Supprimer le PDCA">
							<img src="<?php echo BASE_URL ?>webroot/icons/trash.svg" alt="" width="20" height="20" title="Supprimer le PDCA">
							</a>
                    <?php endif; ?>
						</td>
                        
                        
                        <td>
                            <div id="<?php echo $unPdca->getIdPdca(); ?>" >
                                <div class="btn btn-sm btn-danger mycss-compteur-btn mycss-compteur-incrementer" id='text'>
                                    +1
                                </div>
                            
                                <div class="btn btn-sm btn-secondary mycss-compteur-btn mycss-compteur-afficher" id='text'><?php echo $unPdca->getCompteurUpdate(); ?>
                                </div>

							    <div id="<?php echo $unPdca->getIdPdca(); ?>" class="btn btn-sm btn-danger mycss-compteur-btn mycss-compteur-decrementer">
							        -1
                                </div>
                            </div>
                        </td>
					</tr>
					<?php										
						endforeach; //foreach ($listePdcas as $unPdca) {
						       }
						?>	
				</tbody>
			</table>
		</div>
    </div>
    


    		<!--========  PAGINATION ==========!-->	
    
	<div class="row" style="min-height: 20px;
    padding: 30px;
    margin-bottom: 0px;
    background-color: #f5f5f5;"
    
    >
		
	
        <div class="col-md-6">
            <div class="dataTables_info" id="DataTables_Table_0_info" aria-live="polite">
                <br>Affichage de l'élement <?php echo $offset+1; ?> à <?php echo $paginationVue; ?> sur un total de <?php echo $nbPdca; ?> éléments</div>
        </div>
        
        <div class="col-md-6">
            <div aria-label="Page navigation example">
            
                <ul class="pagination float-right">
<?php				
                    if($currentPage == 1) {
                        echo "<li class='page-item disabled'><a class='page-link' href='#'>Page precedente</a></li>";
                    }
                    else {
                        $previous = $currentPage-1;
                        echo "<li class='page-item'><a class='page-link' href='?page=" . $previous . "'>Page precedente</a></li>";
                    }
                    
                    for($i=1; $i<=$nbPage; $i++) {
                        
                        if($i==$currentPage) {
                            echo "<li class='page-item active'><a class='page-link' href=''>$i</a></li>";
                        }	
                        else {
                            echo "<li class='page-item'><a class='page-link' href='?page=".$i."'>$i</a></li>";
                        }
                
                    }
                    
                    if($currentPage == $nbPage) {
                        echo "<li class='page-item disabled'><a class='page-link' href='#'>Page suivante</a></li>";
                    }
                    else {
                        $next = $currentPage+1;
                        echo "<li class='page-item'><a class='page-link' href='?page=" . $next . "'>Page suivante</a></li>";
                    }           
?>		
                </ul>
            </div>
        </div>
        
    </div> 
            
    				<!-- /END PAGINATION -->
</div>