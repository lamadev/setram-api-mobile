// JavaScript Document
function affiche_Commission(reponse) {

				Commission = reponse;
				//alert(reponse);
				var MComm = 0;
				var Com;
				var Montant = 0;
				Montant=$('#montant').val();
				Com = Commission;
				
				MComm=(Montant*Com)/100;
				$('#comm').val(MComm);
				$('#MontCommiss').html(MComm);
				$('#PourcCommiss').html(Com);
				$('#Sdevise').html($('#devise').val());
				//alert(Commission);
				
}

function AjoutLigneComment (IDComent,Commentaire,DateComent,ImageProfil,NomPers,PrenomPers){
	
	if (ImageProfil!=''){

						img= 'UniFichiers/Public/Miniature/'+ImageProfil;
						
					 } 
				else{
						img = 'UniFichiers/Site/Img/pardefaut.jpg';
				}
	
	Chaine='<li class="list-group-item"><div class="row"><div class="col-xs-2 col-md-1"><img src="'+img+'" alt="" class="img-rounded img-responsive" /></div><div class="col-xs-10 col-md-11"><div><strong>'+NomPers+' '+PrenomPers+'</strong> :'+Commentaire+'<div class="mic-info">Pulié le '+DateComent+' </div></div></div> </div></li>'
	$(Chaine).insertAfter($('#PubCom'));
	
	}

function nouvelleLigne(tab,IDComent,Commentaire,DateComent,ImageProfil,NomPers,PrenomPers) {
	var nouveauTR=document.createElement('tr');
	nouveauTR.setAttribute('id',IDComent);
	nouveauTR.setAttribute('valign',"top");
	nouveauTR.setAttribute('align',"left");
	//-----------------------------------------
	if (ImageProfil!=''){
					 //var img='<img src="UniFichiers/Public/Miniature/'+ImageProfil+'" alt="" width="40" height="40" />';
					 var img = document.createElement("img");
						img.src = 'UniFichiers/Public/Miniature/'+ImageProfil;
						img.alt = "";
						img.width="40";
						img.height="40"
						 
					 //var imgi='<img src="UniFichiers/Public/Miniature/'+ImageProfil+'" alt="" width="40" height="40" />';
					 } 
				else{
					 var img = document.createElement("img");
						img.src = 'UniFichiers/Site/Img/pardefaut.jpg';
						img.alt = "";
						img.width="40";
						img.height="40"
				}
	var nouveauTD1=document.createElement('td');
	nouveauTD1.setAttribute('width',"50");
	nouveauTD1.appendChild(img);
	var nouveauTD2=document.createElement('td');
	
	var span = document.createElement('span');
	span.innerHTML = '<strong>'+PrenomPers+' '+NomPers+'</strong> :'+ Commentaire+'<br />'+DateComent;
	//span.css({"text-align":"left"});
	//document.body.appendChild(span);
	
	
	//var x.innerHTML='<strong>'+PrenomPers+' '+NomPers+'</strong> :'+ Commentaire+'<br />'+DateComent;
	//var nouveauTXT2=document.createTextNode('<strong>'+PrenomPers+' '+NomPers+'</strong> :'+ Commentaire+'<br />'+DateComent);
	
	//nouveauTD2.html();
	//nouveauTD2.onclick=function() { modeModif(nouveauTR,nouveauTD2,text2);}
	nouveauTD2.appendChild(span);
	//------------------------------------------
	nouveauTR.appendChild(nouveauTD1);
	nouveauTR.appendChild(nouveauTD2);
	//------------------------------------------
	tab.appendChild(nouveauTR);
}

function supprimerContenu(element) {
	if (element != null) {
		while(element.firstChild)
		element.removeChild(element.firstChild);
	}
}
////
///////////////////////
function Demande_Pourcentage() {
	$.ajax({
		   
		   type: 'POST',
		   url: 'codes/serveur/Affiche_Commission.php',
		   data: "IdAgence="+ $('#agenceDst').val(),
		   dataType: 'text',
		   success: affiche_Commission,
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

function verifierNom(event)
{
	var cible ="nomVerification.php?";
	cible +="nom="+ event.target.value;
		$.ajax({
			type: 'GET',
			url: cible,
			dataType:'text',
			success: afficherReponse,
			error: function() {alert('Erreur serveur');}
		}); 
}

function afficherReponse(reponse) {
	if(reponse!=0) {
		$('#message').html("Joueur identifié").css({"visibility":"visible","color":"green"});
		$('#button').attr("disabled",false);
	}else{
		$('#message').html("Joueur inconnu").css({"visibility":"visible","color":"red"});
		$('#button').attr("disabled",true);
	}
}

$(document).ready(function() {

	$('#Devise').bind('change', null, CalculChange);
	
	
	
});


function CalculChange(event) {
	//alert($('#agenceDst').val());
	
	if(($('#Montant').val()!="")&&($('#Montant').val()!="0")){
		
		var Taux= 0;
		var Montant = 0;
		var MChanger=0.0;
		Montant=$('#Montant').val();
		
		var Sens=$('#Devise').val();
		
		//alert($('#LTaux').val());
		
		if(Sens==1){
			Taux=$('#LTaux').val();
			MChange=Montant*Taux;
		}else if(Sens==2){
			Taux=$('#CTaux').val();
			MChange=Montant/Taux;
		}else if(Sens==3){
			Taux=$('#LTaux').val();
			MChange=Montant/Taux;
		}else if(Sens==4){
			Taux=$('#KzTaux').val();
			MChange=Montant*Taux;
		}
		
		$('#AffChange').html(MChange);
		
		
	}else{
		$('#MontCommiss').html("0");
		}
}
