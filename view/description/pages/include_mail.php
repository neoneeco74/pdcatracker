<!DOCTYPE html>

<html lang="fr">

	<head>
		<meta http-equiv="content-type" content="text/html"; charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
<body>
	<div style="margin:0px; padding:0px; font-family: helvetica, verdana, arial, geneva, tahoma, sans-serif, serif; font-size: 12px;"> 
	    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#F5F5F5" >

		<tbody> 
		
			<tr class="premiere-ligne">
				<td height="10"></td>
				<td height="10"></td>
				<td height="10"></td>
			</tr>
			
			
			
			<tr class="deuxieme-ligne-contenu">
			
				<td width="10"></td>
				
				<td>
				
					<table width="100%" cellpadding="0" cellspacing="0" border="0">
						<tbody> 
						
						
							<!-- ======== BLOC LOGO =======-->	
							<tr class="separateur-logo">
								<td height="5" bgcolor="#2d4474"></td>
							</tr>
						
							<tr class="logo" >
								<td bgcolor="#2d4474">
								
									<table cellpadding="0" cellspacing="0" border="0" bgcolor="#2d4474">
										<tbody>
										
											<tr>
												<td  width="20"></td>
												
												<td valign="middle" align="left">
													<div class="logo">
														<a style="color:#ffffff; font-size:12px;" href="https://pdcatracker.webou.net/">
															<img style="text-decoration: none; display: block; font-size:20px;" src="https://i.goopics.net/R7WDO.png" alt="Kongsberg PDCA Tracker" width="475" height="80"/>
														</a>
													</div>
												</td>
												
												<td width="20"></td>
											</tr>
											
										</tbody>
									</table>
									
								</td>
							</tr>

							<tr class="separateur-logo">
								<td height="5" bgcolor="#2d4474"></td>
							</tr>	
							<!-- ========================= -->	

							
							
							<tr class="separateur">
								<td height="10"></td>
							</tr>
							
							
							<!-- ======== BLOC CONTENU =======-->	
							<tr class="contenu">
								<td>
								
									<table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-family: verdana">
										<tbody>  
										

											
											<tr>
												<td width="20" bgcolor="#D1D3D6"></td>
												
												<td height="40" bgcolor="#D1D3D6">
													<p style="font-size: 22px;"><strong>Nouveau PDCA signalé:</strong> PDCA id#<?php echo $unPdca->getIdPdca(); ?></p>
												</td>
												
												<td width="20" bgcolor="#D1D3D6"></td>
												
											</tr>
											
											<tr class="separateur-contenu">
												<td height="15"></td>
												<td height="15"></td>
												<td height="15"></td>
											</tr>
											
											<tr>
												<td width="20"></td>
												
												<td>													
													<p><strong>Details du ticket :</strong></p>
													
													<ul>
														<li>ID Pdca : <?php echo $unPdca->getIdPdca(); ?></li>
														<li>Titre : <?php echo $unPdca->getTitre(); ?></li>
													</ul>

													<table width="100%" cellpadding="8" cellspacing="0" border="1" bordercolor="#BCBDC0" valign="middle" style="font-family: verdana">
														<thead>
															<tr bgcolor="#D1D3D6">
																
																<th width="10">Id </th>
																<th width="25">Date signalement </th>
																<th width="25">Date PDCA </th>
																<th>Auteur </th>
																<th>Titre </th>
																<th>Ref. produit </th>
																<th>Ligne </th>
																<th>Statut</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																
																<td><?php echo $unPdca->getIdPdca(); ?></td>
																<td><?php echo $unPdca->getDateEnvoi(); ?></td>
																<td><?php echo $unPdca->getDatePdca(); ?></td>
																<td><?php echo $affichage->getLogin($unPdca->getIdUser()); ?></td>
																<td><?php echo $unPdca->getTitre(); ?></td>
																<td><?php echo $unPdca->getRefproduit(); ?></td>
																<td>
                                                                    <?php
                                                                        if($listeNomsUnites){
                                                                            foreach($listeNomsUnites as $key => $value) {
                                                                                echo $value."<br />";
                                                                                
                                                                            }
                                                                        }
                                                                    ?>
																</td>
                                                                
                                                                <td><?php echo $affichage->getBoutonStatutMail($unPdca->getStatut()); ?></td>
																
															</tr>
														</tbody>
													</table>													
													
													
												</td>
												
												<td width="20"></td>													
											</tr>
											
											<tr class="separateur-contenu">
												<td height="30"></td>
												<td height="30"></td>
												<td height="30"></td>
											</tr>
											
											<tr>
												<td width="20"></td>
												
												<td>													
													<table cellpadding="0" cellspacing="0" border="0" valign="middle" style="font-family: verdana">
														<tbody>
														
															<tr align="center" >
																<td width="200" height="40" bgcolor="#4B608E"0 style="border: 1px solid black;">
																	<a href="https://pdcatracker.webou.net/" style="color:white; text-decoration: none;" ><span style="color:#ffffff; font-size:12px;">Ouvrir PDCA Tracker</span></a>
																	</a>
																</td>
																
																<td width="120"></td>
																
                                                                <td width="200" height="40" bgcolor="#4B608E" style="border: 1px solid black;">
																	<a href="https://pdcatracker.webou.net/description/index/<?php echo $unPdca->getIdPdca(); ?>" style="color:white; text-decoration: none;" ><span style="color:#ffffff; font-size:12px;">Voir le PDCA</span></a>
																	</a>
																</td>
																
															</tr>
														</tbody>
													</table>													
													
													
												</td>
												
												<td width="20"></td>													
											</tr>											

										</tbody>
									</table>
									
								</td>	
							</tr>
							<!-- ========================= -->	
							
							
							
							
							<tr class="separateur">
								<td height="40"></td>
							</tr>
							

							<!-- ======== BLOC LIEN PDCA =======-->	
	
							<!-- ========================= -->	

						</tbody>
					</table>
					
				</td>
				
				<td width="10"></td>
			</tr>
				

			<tr class="derniere-ligne">
				<td height="10"></td>
				<td height="10"></td>
				<td height="10"></td>
			</tr>
				
		</tbody>
	    </table>			
    </div>			
</body>
</html>