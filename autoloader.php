<?php
spl_autoload_register(function($classname) {
    $sitePath = $_SERVER['DOCUMENT_ROOT'];
    $filename = explode("\\", $classname);

    for($i=0; $i<count($filename)-1; $i++)
    {
        $filename[$i] = lcfirst($filename[$i]);
    }

    $filename = implode('/', $filename);
    $file = $sitePath . '/' . $filename . '.php';

    if (!file_exists($file))
    {
        return FALSE;
    }

    require_once $file;
});