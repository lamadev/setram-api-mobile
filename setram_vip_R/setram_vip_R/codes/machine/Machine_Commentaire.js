// JavaScript Document
function traitement_Json(reponse){

				listeJSON = reponse;
				
				ErrPlage();
				if (listeJSON!=0){
					//document.getElementById("button").disabled= false;
					//alert(reponse);
					objetJSONS=JSON.parse(listeJSON);
					for(i=0;i<objetJSONS.coment.length;i++){
						var IdPlage=objetJSONS.coment[i].IdPlage;
						var MontantPlage=objetJSONS.coment[i].MontantPlage;
						var TypePlage=objetJSONS.coment[i].TypePlage;
						var Libmonnaie=objetJSONS.coment[i].CodeMonnaie;
						
						affiche_Commission(IdPlage,MontantPlage,TypePlage,Libmonnaie);
						//alert(MontantPlage);
					}
					
				}else{
					ErrPlage();
					}
}
function traitement_Json_Benef(reponses){
			
				listeJSON = reponses;
				
				//ErrBenefic();
				if (listeJSON!=0){
					//document.getElementById("button").disabled= false;
					//alert(reponses);
					objetJSONS=JSON.parse(listeJSON);
					for(i=0;i<objetJSONS.coment.length;i++){
						var IDCOMPTE=objetJSONS.coment[i].IdCompte;
						var NUMCOMPTE=objetJSONS.coment[i].NumCompte;
						var NOM=objetJSONS.coment[i].Nom;
						var POSTNOM=objetJSONS.coment[i].Postnom;
						var PRENOM=objetJSONS.coment[i].Prenom;
						var SOLD_BENEF=objetJSONS.coment[i].Solde;
						//alert(NUMCOMPTE);
						affiche_Benefic(IDCOMPTE,NUMCOMPTE,NOM,POSTNOM,PRENOM,SOLD_BENEF);
					}
					
				}else{
					//ErrBenefic();
					}
}

function affiche_Benefic(IDCOMPTE,NUMCOMPTE,NOM,POSTNOM,PRENOM,SOLD_BENEF) {
				
				solde = $('#solde').val();
				var SOMMES = $('#SOMMES').val();
				Total = (+SOMMES + Montant_E *1);

				if(solde < Total){

					$('#BtnEnvoye').attr("disabled", true);
					$("#MsgErr").html("* Votre solde est insuffisant");
				}else{
					$('#IdCompteB').val(IDCOMPTE);
					$("#MsgErr").html("Beneficiaire :" +" "+ PRENOM +" "+ NOM +" "+ POSTNOM);
					$('#BtnEnvoye').attr("disabled", false);
				}
				
					
				//alert(Commission);
				
}

function affiche_Commission(IdPlage,MontantPlage,TypePlage,Libmonnaie) {
				
				if(TypePlage=="F"){
					//alert(MontantPlage);
						$('#MontCommiss').html(MontantPlage);
						$('#MontCommis').val(MontantPlage);
						$('#PourcCommiss').html("Forfaitaire");
						$('#Sdevise').html(Libmonnaie);
						$('#Monnaiecomm').val(Libmonnaie);
						$('#IdPlage').val(IdPlage);
						var Mont=$('#montant').val();
						Montant_E=(+MontantPlage + Mont*1);
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

						Montant_E=(+Montant + MComm*1);
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
function VerifierCompte_benef() {
	if ($("#compteben").val()=="") {
		$("#MsgErr").html("* Saisissez Compte Beneficiare");
	}else{
		$.ajax({
		   
		   type: 'POST',
		   url: 'codes/serveur/Affiche_InfosBenefic.php',
		   data: "CompteBenef="+ $('#compteben').val(),
		   dataType: 'text',
		   success: traitement_Json_Benef,
		   error: function() {alert('Erreur serveur');}
		   
		});

	}
	
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
	Test_EtatCompte();

	document.getElementById("BtnEnvoye").disabled = true;

	
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

function ErrBenefic(){
	$("#MsgErr").html("* Compte Beneficiare inconnu");
	
	}

function Test_EtatCompte(){
	
	var EtatCompte = $('#etatcompte').val();
	if (EtatCompte=='1') {
		document.getElementById("debloquer").disabled = true;
	}else if(EtatCompte=='0'){
		document.getElementById("bloquer").disabled = true;
	}
}