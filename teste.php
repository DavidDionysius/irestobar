<?php
$phrase = "Je suis un informaticien";
$tableau = explode(" ", $phrase);

for($i = 0; $i < count($tableau); $i++){
    echo $tableau[$i] . "<br/>";
}

$chaine = implode("_", $tableau);
echo $chaine;