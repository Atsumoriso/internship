<?php
spl_autoload_register(function($className) {
    $sitePath = $_SERVER['DOCUMENT_ROOT'];
    $fileName = explode("\\", $className);

    for($i=0; $i<count($fileName)-1; $i++)
    {
        $fileName[$i] = lcfirst($fileName[$i]);
    }

    $fileName = implode('/', $fileName);
    $file = $sitePath . '/' . $fileName . '.php';

    if (!file_exists($file))
    {
        return FALSE;
    }

    require $file;
});