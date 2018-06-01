<?php
function fx_upload($champ,$dossier){
          //ici nous avon definie la liste des extensions autorise
         $extension=array(".jpg",".png",".jpeg",".bmp",".JPG",".pdf");
		 //nous avons mis dans notre variable tmp_file les reference du fichier qui es dans le dossier temporaire
		 echo $champ;
		 $tmp_file=$_FILES[$champ]['tmp_name'];
		 //recuperation du nom du fichier
		 $file_name=$_FILES[$champ]['name'];
		 
		 //verifions les extensions 
		 $extensionv=strtolower(substr($file_name,strpos($file_name,".")));
		 $nom_fic=fx_generateur_Nom();
		 //$nom_fic="papa";
		 $nom_fic.=$extensionv;
		 //teste de extension s il se trouve par les extension initialiser dans array
		 if(!(in_array($extensionv,$extension))){
		 die("l'extension ne correcte");
		 }
		 else if(!move_uploaded_file( $tmp_file,$dossier.$nom_fic)){
		 return false;
		 
		 }
		 return $nom_fic;

}

function fx_generateur_Nom(){
	 $caracteres = array( "g","h","i","j","k","o",0, 1,"e", "f", 2,"m","n","z","Z","p","q","A","B","r","s",3, 4,"a", "b", "c", "d", 5, 6,"E","G",7, 8,"l",9);
	 $caracteres_aleatoires = array_rand($caracteres, 8);
	 $Nom_Fichier = "";
	 
	 foreach($caracteres_aleatoires as $i)
	 {
		  $Nom_Fichier .= $caracteres[$i];
	 }
	 $Nom_Fichier .= date("YmdHis");
	return $Nom_Fichier;
}

?>
