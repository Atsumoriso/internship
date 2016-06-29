<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 28.06.16
 * Time: 13:25
 */

namespace App\Core;


class View
{
    public function generate($template, $page, $data = null)
    {
        //$page .= "//";
        require "./app/view/" . $template;
    }
}