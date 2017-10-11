<?php

$item_number="ID012";
$numlicencias= intval(substr($item_number,2,2));
$numanios= intval(substr($item_number,4,1));

switch ($numanios) {
    case 1:
        $product= "iAAnalyzerONEyear.exe";
        break;
    case 2:
	$product= "iAAnalyzerTWOyears.exe";
        break;
    case 2:
	$product= "iAAnalyzerTHREEyears.exe";
        break;
    default:
	$product= "iAAnalyzerTRIAL.exe";
}


echo $product;
