// JavaScript Document
function traitement_Json(reponse){

				listeJSON = reponse;
				//alert(reponse);
				ErrPlage();
				if (listeJSON!=0){
					//document.getElementById("button").disabled= false;
					
					objetJSON3=JSON.parse(listeJSON);
					for(i=0;i<objetJSON3.coment.length;i++){
						var IdPlage=objetJSON3.coment[i].IdPlage;
						var Pourcentage=objetJSON3.coment[i].Pourcentage;
						var TypePlage=objetJSON3.coment[i].TypePlage;
						var CodedeviseCommiss=objetJSON3.coment[i].CodedeviseCommiss;
						//alert(Pourcentage+" : "+TypePlage);
						affiche_Commission(IdPlage,Pourcentage,TypePlage,CodedeviseCommiss);
					}
				}else{
					ErrPlage();
					}
}

function affiche_Commission(IdPlage,Pourcentage,TypePlage,CodedeviseCommiss) {
				
				
				if(TypePlage=="F"){
						$('#comm').val(Pourcentage);
						$('#MontCommiss').html(Pourcentage);
						$('#PourcCommiss').html("Forfaitaire");
						$('#Sdevise').html(CodedeviseCommiss);
						$('#Monnaiecomm').val(CodedeviseCommiss);
					}
				if(TypePlage=="P"){
						var MComm = 0;
						var Com;
						var Montant = 0;
						Montant=$('#montant').val();
						Com = Pourcentage;
						
						MComm=(Montant*Com)/100;
						$('#comm').val(MComm);
						$('#Monnaiecomm').val($('#devise').val());
						$('#MontCommiss').html(MComm);
						$('#PourcCommiss').html(Com);
						$('#Sdevise').html($('#devise').val());
					}
				$('#Enregistrer').attr("disabled", false);	
				//alert(Commission);
				
}

///////////////////////
function Demande_Pourcentage() {
	$.ajax({
		   
		   type: 'POST',
		   url: 'codes/serveur/Affiche_Commission.php',
		   data: "IdAgence="+ $('#agence').val()+"&Montant="+$('#montant').val()+"&devise="+$('#devise').val()+"&Type="+$('#ModeComm').val(),
		   dataType: 'text',
		   success: traitement_Json,
		   error: function() {alert('Erreur serveur');}
		   
		   });
}

function Demande_Pourcentage_Dest() {
	$.ajax({
		   
		   type: 'POST',
		   url: 'codes/serveur/Affiche_Commission.php',
		   data: "IdAgence="+ $('#agence').val()+"&Montant="+$('#montant').val()+"&devise="+$('#devise').val()+"&IdGroupeProv="+$('#IdGroupe').val()+"&IdAgenceDest="+$('#agenceDst').val()+"&Type="+$('#ModeComm').val(),
		   dataType: 'text',
		   success: traitement_Json,
		   error: function() {alert('Erreur serveur');}
		   
		   });
}

function actualiserPage(reponse) {
	//var nouveauResultat = reponse.split(":");
	var nouveauResultat = reponse;
	if (reponse==1){
		//$('#textcoment').val('');
		//$('#textcoment').css({"color":"#666666","font-weight":"10px","font-style":"italic"});
		 affiche_Commission();
		}
	else{
		alert('Erreur');
		}

	
}




$(document).ready(function() {
	//$('#button').click(function () {jouer();});
	///gestion du bouton
	//$('#button').ajaxStart(function(request, settings) { $(this).attr("disabled",true) });
	///gestion de l’animation
	$('#loading').ajaxStart(function(request, settings) { $(this).css("visibility", "visible") });
	$('#loading').ajaxStop(function(request, settings){ $(this).css("visibility", "hidden") });
	$('#textcoment').bind('keypress', null, testEntree);
	//$('#agenceDst').bind('change', null, testChoix);
	$('#montant').bind('blur', null,testChoix);
	//$('#montant').bind('keypress', null,testChoix);
	$('#devise').bind('change', null, testChoix);
	$('#agenceDst').bind('change', null, testChoix);
	//Affiche_Commentaires();
	//onBlur=""
	//$('#textcoment').bind(function () {testEntree(event);});
	
	/*$('#textcoment').keyup(function(e) {    
	   if(e.keyCode == 13) { // KeyCode de la touche entrée
			  alert("Hey ! Tu as appuyé sur la touche entrée !!"); 
	 }
	}); */
	
	
});

function testEntree(event) {
	$('#textcoment').css({"color":"#000","font-weight":"11px","font-style":"normal"});
	event = window.event||event;
	var codeTouche= event.keyCode;
	if(codeTouche==13) // Test si touche Entrée
	{
		Ajout_Commentaire();
		//alert($('#textcoment').val());
	}
}

function testChoix(event) {
	//alert($('#agenceDst').val());
	var Mode;
	if(($('#montant').val()!="")&&($('#montant').val()!=0)&&($('#agenceDst').val()!=0)&&($('#agenceDst').val()!="")){
		//alert("Par ici");
		Mode=$('#ModeComm').val();
		if(Mode=='pv'){
			//alert('Mode '+Mode);
			$('#Enregistrer').attr("disabled", true);
			Demande_Pourcentage();
		}else if(Mode=='dt'){
			$('#Enregistrer').attr("disabled", true);
			Demande_Pourcentage_Dest()
		}
	}else{
		$('#MontCommiss').html("0");
		}
}
function ChangeDev(event) {
	//alert($('#agenceDst').val());

		
		//testChoix;
		$('#Sdevise').html($('#devise').val());
}
function ErrPlage(){
	$('#comm').val(0);
	$('#MontCommiss').html(0);
	$('#PourcCommiss').html("Invalide");
	
	}