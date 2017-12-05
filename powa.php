<?php
/**
 * Created by PhpStorm.
 * User: Arturo Arellano Rojo
 * Date: 04/12/17
 * Time: 13:32
 */

$initalTime=microtime(true);

$message=$argv[1];
$difficulty=$argv[2];
$isOk=false;
$nonce=0;
$concat="";
$stringDifficulty="";


if (!is_numeric($difficulty) || $difficulty<0){
    echo "The difficulty most be integer greater than 0\n";
    exit();
}
for ($d=0; $d<$difficulty;$d++){
    $stringDifficulty.="0";
}


while ($isOk===false){

    $theHash=hash('sha256',hash('sha256',$message.$nonce, true));


    if (substr($theHash,0,$difficulty)===$stringDifficulty){
        $isOk=true;
    }else{
        $nonce++;
    }
}

$finalTime=microtime(true);

echo "PoW hash: " . $theHash . "\n";
echo "nonce " . $nonce. "\n";
echo "time spent: " . ($finalTime - $initalTime) . "ms\n";


