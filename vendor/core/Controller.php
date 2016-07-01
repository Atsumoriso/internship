<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 28.06.16
 * Time: 13:19
 */

namespace Vendor\Core;

use Vendor\Core\View;

abstract class Controller
{
    protected $_view;

    public function __construct()
    {
        $this->_view = new View();
    }

    public abstract function ActionIndex();
}