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
						var MontantPlage=objetJSON3.coment[i].MonntantPlage;
						var TypePlage=objetJSON3.coment[i].TypePlage;
						var Libmonnaie=objetJSON3.coment[i].Libmonnaie;
						var IdFrais=objetJSON3.coment[i].IdFrais;
						//alert(CodeMonnaie+" : "+TypePlage);
						affiche_Commission(IdPlage,MontantPlage,TypePlage,Libmonnaie,IdFrais);
					}
				}else{
					ErrPlage();
					}
}

function affiche_Commission(IdPlage,MontantPlage,TypePlage,Libmonnaie,IdFrais) {
				//alert(Libmonnaie);
				
				if(TypePlage=="F"){
					//MontCommiss
						$('#MontCommiss').html(MontantPlage);
						$('#MontCommis').val(MontantPlage);
						$('#PourcCommiss').html("Forfaitaire");
						$('#Sdevise').html(Libmonnaie);
						$('#Monnaiecomm').val(Libmonnaie);
						$('#idfrais').val(IdFrais);
						$('#IdPlage').val(IdPlage);
					}
				if(TypePlage=="P"){
						var MComm = 0;
						var Com;
						var Montant = 0;
						Montant=$('#montant').val();
						Com = MontantPlage;
						
						MComm=(Montant*Com)/100;
						$('#comm').val(MComm);
						$('#Monnaiecomm').val(Libmonnaie);
						$('#MontCommiss').html(MComm);
						$('#PourcCommiss').html(Com);
						$('#Sdevise').html(Libmonnaie);
						$('#IdPlage').val(IdPlage);
					}
				$('#Enregistrer').attr("disabled", false);	
				//alert(Commission);
				
}

///////////////////////
function Demande_Plage() {
	$.ajax({
		   
		   type: 'POST',
		   url: 'codes/serveur/Affiche_Commission.php',
		   data: "Montant="+$('#montant').val()+"&devise="+$('#devise').val(),
		   dataType: 'text',
		   success: traitement_Json,
		   error: function() {alert('Erreur serveur');}
		   
		   });
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
		$('#textcoment').val('');
		$('#textcoment').css({"color":"#666666","font-weight":"10px","font-style":"italic"});
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
	$('#montant').bind('change', null, testChoix);
	$('#montant').bind('change', null, testChoix);
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
	//alert("Bonjourrrrrrrrrr");
	
	if(($('#montant').val()!="")&&($('#montant').val()!=0)){
		//alert("Par ici");
			//alert('Mode '+Mode);
			//$('#Enregistrer').attr("disabled", true);
			Demande_Plage();
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