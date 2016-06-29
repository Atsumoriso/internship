<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 29.06.16
 * Time: 10:25
 */

namespace App\Controller;

use App\Core\Controller;

class HomeController extends Controller
{
    public function ActionIndex()
    {
        $this->_view->generate('base.php', 'template/index.php');
    }
}