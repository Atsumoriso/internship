<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 28.06.16
 * Time: 13:25
 */

namespace Vendor\Core;

class View
{
    public function generate($template, $page, $data = null)
    {
        require "./app/cms/src/view/" . $template;
    }
}