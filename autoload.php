<?php

function chargerClasse($classe)
{
/*    $t = explode( '\\', $classe );
    $classeName = array_pop( $t );
    $pathName = array_pop( $t );


    require $pathName . '\\' . $classeName . '.php';*/

    $backslash = '\\';
    $file = str_replace($backslash, DIRECTORY_SEPARATOR, $classe).'.php';

    require $file;
}


spl_autoload_register('chargerClasse');
