$(document).ready(function() {











	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 17  ========   MODAL : FENETRE LORS D'UN AJOUT PDCA ================================================//	
	
/* 	compteur_click_addpdca1 = 0;
	compteur_click_addpdca2 = 0; */
    $("#myjs-button-addpdca").click(function(e){
        e.preventDefault();

		$inputTitre = $('input[name="inputTitre"]');
		$inputRefProduit = $('input[name="inputProduit"]');
		

		var txt1 = "<p><strong>Veuillez renseigner ce champ</strong></p>";
		boolValid = true;
		
		if($inputTitre.val() == '') {
			$inputTitre.closest('.form-group').addClass('has-danger');
			$inputTitre.after(txt1);
			boolValid = false;
		}
		else {
			$inputTitre.closest('.form-group').removeClass('has-danger');
			$inputTitre.next().remove("p");
		}
		//////////////////////
		if($inputRefProduit.val() == '') {
			$inputRefProduit.closest('.form-group').addClass('has-danger');
			$inputRefProduit.after(txt1);
			boolValid = false;		
		}
		else {
			$inputRefProduit.closest('.form-group').removeClass('has-danger');
			$inputRefProduit.next().remove("p");

        }
        
        if($('input[name="check_email"]').is(':not(:checked)')){
            $(".modal-body").append("<p class='ajout' style='color: red'>Attention : vous avez décoché l'envoi d'un email à tous les Team Leader !</p>");
        } else {
            $(".modal-body p.ajout").remove();
        }

		if(boolValid) {
			$('#myjs-modal-addpdca').modal('toggle');
        }
        
 

	});
		
    $("#myjs-button-addpdca-envoyer").submit();

/*         $("#myjs-button-addpdca-envoyer").submit(function() {
        $(this).submit();
    }); */

    $("#myjs-button-addpdca-envoyer").click(function() {
            $(this).hide();

            $(this).prev().after("Le PDCA à été envoyé, veuillez patienter...");
    });



	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 15  ========   AJAX ENVOI de MESSAGE TAB MESSAGE  ==================================================//



    $('#envoi_message').click(function(e){
        e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
    
        var pseudo = encodeURIComponent( $('#champ_login').val() ); // on sécurise les données
        var idpdca = encodeURIComponent( $('#champ_idpdca').val() ); // on sécurise les données
        var message = encodeURIComponent( $('#post_message').val() );
    
        if(pseudo != "" && message != ""){ // on vérifie que les variables ne sont pas vides
            $.ajax({
                url : "../../description/message/", // on donne l'URL du fichier de traitement
                type : "POST", // la requête est de type POST
                data : "post_message=" + message + "&submit_message="+idpdca, // et on envoie nos données
            });
    
            $('#append_message').prepend("<div class='row'><div class='col-md-2'><div><img class='img-responsive user-photo' src='https://ssl.gstatic.com/accounts/ui/avatar_2x.png' width='90' height='90'></div></div><div class='col-md-8'><div class='card mb-3'><div class='card-header'>Ecrit par <strong> " + pseudo + "</strong><span class='text-muted'> <i>(" + pseudo + ")</i> - à l'instant</span></div><div class='card-body'><p>" + message + "</p></div></div></div></div><br>");

        }
    });
    

	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 15  ========   AJAX INCREMENTER COMPTEUR PDCA ======================================================//
    
    

 	var compteurUpdate = new Object();
	
	var compteurIncrement = 0;
	var compteurMinimum = 0;

	
 	$(".mycss-compteur-incrementer").on('click', function() {
        event.preventDefault();
		
		$affichage = $(this).next(".mycss-compteur-afficher");
		
		var idpdca = $(this).parent().attr('id'); 		//	 idpdca = 116
		var intIdpdca = parseInt(idpdca);
		
		var valueTextCompteurUpdate = $affichage.text();
		
		if(!valueTextCompteurUpdate) {
			valueIntCompteurUpdate = 0;
		}
		else {
			var valueIntCompteurUpdate = parseInt(valueTextCompteurUpdate);
		}
	
		var increment = 0;	//0
		
		increment++; //1
		
		if(compteurUpdate[intIdpdca] == undefined) {
			compteurUpdate[intIdpdca] = valueIntCompteurUpdate;
		}
		
	 	compteurUpdate[intIdpdca] = compteurUpdate[intIdpdca] + increment;
		
			
		console.log(compteurUpdate[intIdpdca]);
			
		console.log(compteurUpdate);

		if(window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
		}	// code for IE7+, Firefox, Chrome, Opera, Safari
		else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}		// code for IE6, IE5
	
		xmlhttp.onreadystatechange = function() {
			
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
				// document.getElementById("result"+idpdca).innerHTML=xmlhttp.responseText; 
				// $(".afficher").text(xmlhttp.responseText); 
				console.log(xmlhttp.responseText);
                $affichage.text((xmlhttp.responseText).substring(0, 2));
                //$affichage.html(compteurUpdate[intIdpdca]);
			}
		}
		xmlhttp.open("GET", "home/compteur/?idpdca="+intIdpdca+"&valuecompteur="+compteurUpdate[intIdpdca], true);  // SESSION pdca84 = 12 clic     [pdca] => 2  
 		xmlhttp.send();

         
		
	});	 
		 
	$(".mycss-compteur-decrementer").on('click', function() {
        event.preventDefault();
		
		$affichage = $(this).prev(".mycss-compteur-afficher");
		
		var idpdca = $(this).parent().attr('id'); 		//	 idpdca = 116
		var intIdpdca = parseInt(idpdca);
		
		var valueTextCompteurUpdate = $affichage.text();
		
		if(!valueTextCompteurUpdate) {
			valueIntCompteurUpdate = 0;
		}
		else {
			var valueIntCompteurUpdate = parseInt(valueTextCompteurUpdate);
		}
	
		var increment = 0;	//0
		
		increment--; //-1
		
		if(compteurUpdate[intIdpdca] == undefined) {
			compteurUpdate[intIdpdca] = valueIntCompteurUpdate;
		}
		
	 	compteurUpdate[intIdpdca] = compteurUpdate[intIdpdca] + increment;
		
			
		console.log(compteurUpdate[intIdpdca]);
			
		console.log(compteurUpdate);

		if(window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
		}	// code for IE7+, Firefox, Chrome, Opera, Safari
		else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}		// code for IE6, IE5
	
		xmlhttp.onreadystatechange = function() {
			
			if(xmlhttp.readyState==4 && xmlhttp.status==200) {
				// document.getElementById("result"+idpdca).innerHTML=xmlhttp.responseText; 
				// $(".afficher").text(xmlhttp.responseText); 
				//console.log(xmlhttp.responseText);
                $affichage.text((xmlhttp.responseText).substring(0, 2));
			}
		}
		xmlhttp.open("GET", "home/compteur/?idpdca="+intIdpdca+"&valuecompteur="+compteurUpdate[intIdpdca], true);  // SESSION pdca84 = 12 clic     [pdca] => 2  
 		xmlhttp.send();

        
		
	});	 
		 

	
	

	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 12  ========   FILE UPLOAD FICHIER : Ajoute on click bouton champ upload ===========================//	
	
	var compteur_bouton_upload = 1;	
    $("button[name='add_upload_fichiers']").click(function() {
		
		compteur_bouton_upload++;
		if(compteur_bouton_upload < 5) {
			
			var nouveau_champ_upload = $("<br><input id='input_upload_fichiers_"+compteur_bouton_upload+"' name='upload_fichiers_"+compteur_bouton_upload+"' type='file'>");
			/* compteur_bouton_upload_2 = compteur_bouton_upload - 1; */
			$("#input_upload_fichiers_"+(compteur_bouton_upload - 1)).after(nouveau_champ_upload);
		}
		else {
			if(compteur_bouton_upload == 5) {
				$(this).hide();
				compteur_bouton_upload = 5;
			}
		}
    });			


	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 18  ========   AJAX : Suppression d'une ligne PDCA dans Home, oklm   ================================//	


/*     $(".myjs-actions01").click(function(event){
        event.preventDefault();
    });

 *//*     function confirmation() {

        if(confirm("Voulez vous vraiment supprimer ce commentaire ?")){
            window.location='index.php?x=del_comment&id='+id
        }
        else{
                alert("Le commentaire n'a pas été supprimé.")
        }
      }   */

	$("a[title='Supprimer le PDCA']").on('click', function() {
        event.preventDefault();
		//var $value = $(this).val();
		var $idpdca = $(this).attr("id");
		
		//console.log($value);
        console.log($idpdca);

        if(confirm("Voulez vous vraiment supprimer ce PDCA ?")){
            $.ajax({
                url : "description/delete/", 
                data : { "idpdca_delete": $idpdca }, 					/* 'value=' + $select + '$pdca=' + $pdca, */
                dataType : 'html',
                /* contentType: "application/x-www-form-urlencoded; charset=UTF-8", */		
                type : 'POST',															
    
    /*  			success: function(html) {
                    if(html) {
                        $("#statut").parent("div").after(html);               
                    }
                } */
    
            });
            $(this).parent().parent().hide();
        }
        else{
                
        }
		

	});


	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 18  ========   AJAX : EVENEMENT ON CHANGE STATUT dans DESCRIPTION   ================================//	


	$("#statut").on('change', function() {
				
		var $valueStatut = $(this).val();
		var $idpdca = $(this).parent().attr("id");
		
		console.log($valueStatut);
		console.log($idpdca);
		
		$.ajax({
			url : "../../description/index/", 
			data : { "idpdca": $idpdca, "value_statut": $valueStatut, }, 					/* 'value=' + $select + '$pdca=' + $pdca, */
			dataType : 'html',
			/* contentType: "application/x-www-form-urlencoded; charset=UTF-8", */		
			type : 'POST',															

/*  			success: function(html) {
				if(html) {
					$("#statut").parent("div").after(html);               
				}
			} */

        });
        
	});


	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 11  ========   SELECT : PLUGIN BOOTSTRAP MULTISELECT ===============================================//	
	
	
	$('.mycss-multi-assignation').multiselect({
		enableClickableOptGroups: false,					// GROUPE CLIQUABLE
		enableCollapsibleOptGroups: true,				 // PERMET DE REFERMER LE GROUPE */  */
		
		buttonClass: 'form-control',
		buttonWidth: '100%',
		maxHeight: 500,
		
		includeSelectAllOption: true,
		nonSelectedText: 'Selectionner les destinataires',		
		nSelectedText: ' destinaires sélectionnés',
		
		allSelectedText: 'Touts les destinataires sélectionnées !',
		numberDisplayed: 5,
		selectAllText: 'Selectionner tout',
		
/* 			checkboxName: function(option) {
			var $optgroup = $(option).closest('optgroup');
			if ($optgroup.id == 'example-post-checkboxName-1') {
				return 'group1[]';
			}
			else {
				return 'group2[]';
			}
		} */
	});
	
	//===========   FONCTION ========   SELECT : PLUGIN BOOTSTRAP MULTISELECT =============================!-->	
	
	$('.mycss-multi-production').multiselect({
		enableClickableOptGroups: false,					// GROUPE CLIQUABLE
		enableCollapsibleOptGroups: true,				 // PERMET DE REFERMER LE GROUPE */  */
		
		buttonClass: 'form-control',
		buttonWidth: '100%',
		maxHeight: 500,
		
		includeSelectAllOption: true,
		nonSelectedText: 'Selectionner unité concernée',		
		nSelectedText: ' destinaires sélectionnés',
		
		allSelectedText: 'Toutes les unités sélectionnées !',
		numberDisplayed: 5,
		selectAllText: 'Selectionner tout',
		
/* 			checkboxName: function(option) {
			var $optgroup = $(option).closest('optgroup');
			if ($optgroup.id == 'example-post-checkboxName-1') {
				return 'group1[]';
			}
			else {
				return 'group2[]';
			}
		} */
	});
	

	//===========   FONCTION ========   SELECT : PLUGIN BOOTSTRAP MULTISELECT =============================!-->	

	$('.mycss-multi-destinataires').multiselect({
		enableClickableOptGroups: false,					// GROUPE CLIQUABLE
/* 			enableCollapsibleOptGroups: true,				 // PERMET DE REFERMER LE GROUPE */ 
		
		buttonClass: 'form-control',
		buttonWidth: '100%',
		maxHeight: 500,
		
		includeSelectAllOption: true,
		nonSelectedText: 'Selectionner les destinataires...',		
		nSelectedText: ' destinaires sélectionnés',
		
		allSelectedText: 'Tous les destinataires sélectionnés !',
		numberDisplayed: 5,
		selectAllText: 'Selectionner tout',
		
/* 			checkboxName: function(option) {
			var $optgroup = $(option).closest('optgroup');
			if ($optgroup.id == 'example-post-checkboxName-1') {
				return 'group1[]';
			}
			else {
				return 'group2[]';
			}
		} */
	});




    

	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 04  ========   NAVBAR FIXE AU SCROLL ===============================================================//

 	$(document).ready(function(){

		var offset = $(".navbar").offset().top;
		var scrollTop = $(document).scrollTop();
			
			if(scrollTop >= offset){
				$("nav").addClass("fixed-top");
				$(".container-global").addClass("container-scroll-nav");
			}
			
 		$(document).scroll(function(){
		
			var scrollTop = $(document).scrollTop();
			
			if(scrollTop >= offset){
				$("nav").addClass("fixed-top");
				$(".container-global").addClass("container-scroll-nav");
			}
			else {
				$("nav").removeClass("fixed-top");
				$(".container-global").removeClass("container-scroll-nav");
				}
 		}); 
	});

 





	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 14  ========   SLIDE DOWN LE FORMULAIRE DESCRIPTION ================================================//

/*     $(".mycss-div-info-edit-pdca").click(function() {
        $(".mycss-div-commentaires-show").slideToggle("slow");
    }); */
	
    $("#button_add_description").click(function(){
		$(this).hide();
        $(".mycss-div-form-add-description").slideDown();
    });	
	
    $("#button_add_description8d").click(function(){
		$(this).hide();
        $(".mycss-div-form-add-description8d").slideDown();
    });		





	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========   FONCTION 07  ========   NAVIGATION PAR ONGLET ===============================================================//
      
    // Détecte le hash dans l'url, l'utilise pour sélectionner le lien correspondant, déclenche le clique
 	//$("a[href='" + window.location.hash + "']").trigger('click');       // Contient le nom de l'éventuelle ancre de l'url.
                                                                        // Si l'url vaut index.html#top, hash vaut #top
	
	//console.log(window.location.hash); 
    $('#myjs-tab-principal a').click(function(e) {
        e.preventDefault();
        //$(this).tab('show');
      });
      
    // store the currently selected tab in the hash value
    $("ul.myjs-navtab > li > a").on("shown.bs.tab", function(e) {
        e.preventDefault();
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
    });
    
    // on load of the page: switch to the currently selected tab
        var hash = window.location.hash;
        $('#myjs-tab-principal a[href="' + hash + '"]').tab('show');



    
    $('#myjs-tab-principal a[href="' + hash + '"]').css("background-color", "#7485AA");
    $('.mycss-navtab-a-active').css("background-color", "#7485AA");
    
    
   	$('.myjs-navtab li a').click(function(e) {								// Sur le clic d'un onglet (balise lien a),
       e.preventDefault();
		$('.myjs-navtab li a').css("background-color", "#2D4474");			// on place le fond bleu sur tous les liens de la navbar            //#2D4474
		$('.myjs-navtab li.active').removeClass('active');					// BIEN COLLER LE li.active PAS DESPACE !!!! on remove la clave active
		$('.myjs-navtab li').removeClass('mycss-navtab-active'); 
		
		// var $this = $(this); 
		
		if (!$(this).parent().hasClass('mycss-navtab-active')) {  //si my-js-navtab li n'a pas la classe mycss-navtab active
			$(this).parent().addClass('mycss-navtab-active');
			$(this).parent().addClass('active');  
			$(this).css("background-color", "#7485AA"); //#7485AA
		}  
		
	});	  

  
	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	// FONCTION 02 : TABLEAU DATABASE : ClIQUABLE DOUBLE CLIC  =================================================================//

    $('.mycss-cellule-cliquable').click(function() {
		
        var href = $(this).attr("href");
        if(href) {
            window.location = href;
        }
		//$(this).addClass("mycss-ligne-cliquer");
    });




	//=========================================================================================================================//	
	//=========================================================================================================================//
	//=========================================================================================================================//
	//=========================================================================================================================//
	// FONCTION 01 : MENU ACTIF + BLANC ==================================================================//

	$(function() {	
		var $chemin = $(location).attr('pathname').split( '/' );
        var $page = $chemin[1];	
        										// 	A CHANGER EN FONCTION DE URL LOCALE
/*         if($(location).attr('pathname') == 'home/account')
            $page = 'account';
        } */
        //console.log($(location).attr('pathname'));
        //console.log($page);
        $("ul.navbar-nav > li > a[href*='"+$page+"']").parent("li").addClass('active'); 
	});










});
