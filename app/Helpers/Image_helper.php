<?php

use function PHPSTORM_META\type;

function src($fileName, $type= 'full'){;
    $path = './uploads/images/manipulated/';

    if(!$type != 'full'){
        $path .= $type .'/';
    }
    return $path . $fileName;


}
//uploads/images/full/$filename.jpeg