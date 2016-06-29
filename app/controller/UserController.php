<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 28.06.16
 * Time: 12:58
 */

namespace App\Controller;

use App\Core\Controller;
use App\Model\UserModel;

class UserController extends Controller
{
    public function ActionIndex()
    {
        $userModel = new UserModel;
        $this->_view->generate('base.php', 'template/users.php' ,$userModel->getAllUsers());
    }
}