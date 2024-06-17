#!/usr/bin/php
<?php 
// Mattéo KERVADEC et Marius CHARTIER--LE GOFF 1C2

//------------ Programme Pricipale --------------

function main($files) {
    /// Parcours les fichiers
    $fileResources = array();
    foreach ($files as $numFile => $file) {
        $blocks = explode("\n\n",file_get_contents($file));
        $arrayDefine = array();
        $arrayFunction = array();
        $arrayStructure = array();
        /// Parcour les différents blocs
        foreach ($blocks as $numBlock => $block) 
        {
            // si le bloc contient une constante symbolique
            if (presence($block,"/#define/"))
            {
                $arrayDefine += readDefine($block);
            }
            // si le bloc contient une déclaration de fonction
            elseif (presence($block,"/\b[a-zA-Z_][a-zA-Z0-9_]*\s*\([^;{}]*\)\s*;/") && presence($block,"/\*\*/")) 
            {
                $arrayFunction += readFunction($block);
            }
            // si le bloc contient une structure
            elseif (presence($block,"/typedef struct/")) 
            {
                $arrayStructure += readStructure($block);
            }
        }
        $fileResources += [
            "define_fichier" . $numFile+1 => $arrayDefine,
            "fonction_fichier" . $numFile+1 => $arrayFunction,
            "structure_fichier" . $numFile+1 => $arrayStructure,
        ];
    }
    return $fileResources;
}

//------------ Fonction de Recherche de Chaine de caractère --------------

function presence($line,$string) 
{
    /// Recherche dans une ligne une chaine de caractère
    /// renvoie un booléen
    if (preg_match($string, $line) OR empty($line))
        $isPresent = true;
    else 
        $isPresent = false;
    return $isPresent;
}

//------------ Fonction de Parcours d'extrait de Bloc --------------

function readDefine($block){
    // $define = [$entête => "comment"];
    $define = array();
    preg_match_all("/#define\s+(\w+)\s+([^\/\n]+)\s+\/\*\*[\s@]*\\\\?brief\s(.*?)\*\//",$block, $matches, PREG_SET_ORDER);
    foreach ($matches as $line) {
        $define += [rtrim($line[1] . " " . $line[2]) => $line[3]];
    }
    return $define;
}

function readFunction($block){
    // $fonction = [$enTete => ["brief" => "...","nomParam1" => "...", "nomParam2" => "...", ..., "return" => "..."]];
    $function = array();
    $functionComment = array();

    // les indicateur de brief
    if (presence($block,"/.brief/")) {
        preg_match_all("/.brief\s+(.*)\n/",$block, $brief, PREG_SET_ORDER);
        $functionComment += ["brief" => $brief[0][1]];
    }

    // les indicateurs de param
    preg_match_all("/.param\s+(\b[a-zA-Z0-9_]*\s+[a-zA-Z0-9_]*)\s+(.*)\n/", $block, $param, PREG_SET_ORDER);
    foreach ($param as $comment)
        $functionComment += [rtrim($comment[1]) => $comment[2]];

    // les indicateurs du return
    if (presence($block,"/.return/")) {
        preg_match_all("/.return\s+(.*)\n/",$block, $return, PREG_SET_ORDER);
        $functionComment += ["return" => $return[0][1]];
    }
    // L'entête de la fonction
    preg_match_all("/[a-zA-Z0-9_*]*\s+[a-zA-Z0-9_*]*\s*\([^);]*\);/",$block, $enTete, PREG_SET_ORDER);
    $function = [$enTete[0][0] => $functionComment];
    return $function;
}

function readStructure($block){
    // $structure = [$nomStruct => ["brief" => briefStruct, $enteteVar1 => "comment Brief", $enteteVar2 => "comment Brief",...]]
    $structure = array();
    $component = array();
    preg_match_all("/}\s*(\w+);\s*\/\*\*\s+(.*)\*\//",$block, $briefStruct, PREG_SET_ORDER);
    $component += ["BriefStruct" => $briefStruct[0][2]];
    preg_match_all("|\s*([a-zA-Z0-9_]*\s[a-zA-Z0-9_]*);\s* /\*\*(.*)\*/\n|U",$block, $matches, PREG_SET_ORDER);
    foreach ($matches as $line) {
        $component += [rtrim($line[1]) => $line[2]];
    }
    $structure = [$briefStruct[0][1] => $component];
    return $structure;
}

//entre dans un tableau le nom de tout les fichiers qui finnisent pas .c
$files = glob("*.c");

//recherche dans tout les fichiers c la documentation
$arrayDocumentation = main($files);

print_r($arrayDocumentation);
?>
