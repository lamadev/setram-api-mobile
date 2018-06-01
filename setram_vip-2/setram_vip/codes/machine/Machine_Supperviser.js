// JavaScript Document
function traitement_Json_Agence(reponse){
				listeJSON = reponse;
				//alert(listeJSON);
				$("#TablAgences > tbody").empty();
				if (listeJSON!=0){
					//alert(listeJSON);
					objetJSON3=JSON.parse(listeJSON);
					//rich=objetJSON3.membre.length;
					for(i=0;i<objetJSON3.groupeAll.length;i++){
						var IdGroupe=objetJSON3.groupeAll[i].IdGroupe;
						var NomGroupe=objetJSON3.groupeAll[i].NomGroupe;
						
						//alert(IdGroupe+" : "+NomGroupe);
						RemplirCombo(IdGroupe, NomGroupe);
					}
					agenceS=objetJSON3.groupeSupp.length;
					//alert(agenceS);
					if(agenceS>0){
							for(i=0;i<objetJSON3.groupeSupp.length;i++){
								var IdGroupe=objetJSON3.groupeSupp[i].IdGroupe;
								var NomGroupe=objetJSON3.groupeSupp[i].NomGroupe;
								//var etatagence=objetJSON3.agenceSupp[i].EtatAgc;
								nouvelleLigne(IdGroupe,NomGroupe);
							}
					}
				}else{
					//ErrPlage();
					alert("Erreur");
					}
}
function nouvelleLigne(IdGroupe,NomGroupe) {
	//alert(nomagence);
	/*if(etatagence==0){
			etatagence="Désactivé";
	}else if(etatagence==1){
			etatagence="Actif";
	}else if(etatagence==2){
			etatagence="Veroullé";
	}else{
			etatagence="Non reconnu";
		}*/
	$("#TablAgences > tbody:last").append("<tr><td>"+IdGroupe+"</td><td>"+NomGroupe+"</td></tr>");
	
}

function RemplirCombo(IdGroupe, NomGroupe){
	$("#ComboDomaine").append('<option value="'+ IdGroupe +'">'+ NomGroupe +'</option>');
	}



function Rep_Supperviser(reponse){
		//alert(reponse);
		Liste_Groupe_Supervise($("#IdAgent").val());
	}

function Superviser(Idagent,IdGroupe) {
	
	$.ajax({
		   
		   type: 'GET',
		   url: 'codes/serveur/serveur_Superviser.php',
		   data: "Idagent="+ Idagent+"&IdGroupe="+ IdGroupe,
		   dataType: 'text',
		   success: Rep_Supperviser,
		   error: function() {alert('Erreur serveur');}
		   
		   });
}

function Liste_Groupe_Supervise(Idagent) {
	
	$.ajax({
		   
		   type: 'GET',
		   url: 'codes/serveur/serveur_Agence_Superv.php',
		   data: "Idagent="+ Idagent,
		   dataType: 'text',
		   success: traitement_Json_Agence,
		   error: function() {alert('Erreur serveur ID');}
		   
		   });
}

$(document).ready(function() {
	//alert('AbbaCodes/Serveur/serveur_Forum_Creer_Sujet.php');
	$('#Ajouter').click(function () {PrepareAjout();});
	
	Liste_Groupe_Supervise($("#IdAgent").val());
	
});

function PrepareAjout(){
	//alert('AbbaCodes/Serveur/serveur_Forum_Creer_Sujet.php');
	Idagent=$("#IdAgent").val();
	IdGroupe=$("#ComboDomaine").val();
	
	Superviser(Idagent,IdGroupe);
	}