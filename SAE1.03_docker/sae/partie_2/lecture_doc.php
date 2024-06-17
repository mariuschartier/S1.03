<?php 
// Ouvrir le fichier en mode lecture seule
$ressource = fopen('monFichier.c', 'r');
$commentaire = false;
$char = "";
$resumé = false;

function FunctionName() {
    $tri_encours = false;
    
}


// Lire le fichier ligne par ligne
while (!feof($ressource)) {
   $ligne = fgets($ressource);
    if ($ligne == "/**") {
        $commentaire = true;
    }
    elseif ($ligne == "*/") {
        $commentaire = false;
    }
    if($commentaire){
        echo $ligne . "<br>";
        if ($char == "\breif"){
            $resumé = true;
        }
    }

   
}

// Fermer le fichier
fclose($ressource);
?>

