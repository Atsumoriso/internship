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
        $this->_view->generate('base.php', 'template/users.php', UserModel::getAllUsers());
    }

    public function AddUser()
    {
        $this->_view->generate('base.php', 'template/add-user.php', UserModel::AddUser());
    }
}