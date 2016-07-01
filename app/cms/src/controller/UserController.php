<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 28.06.16
 * Time: 12:58
 */

namespace App\Cms\Src\Controller;

use Vendor\Core\Controller;
use App\Cms\Src\Model\UserModel;

class UserController extends Controller
{
    public function ActionIndex()
    {
        $UserModel = new UserModel;
        $this->_view->generate('base.php', 'template/users.php', $UserModel->getAllUsers());
    }

    public function getUser()
    {
        $UserModel = new UserModel;
        $id = $_GET['id'];
        $this->_view->generate('base.php', 'template/user.php', $UserModel->getUser($id));
    }

    public function delUser()
    {
        $UserModel = new UserModel;
        $this->_view->generate('base.php', 'template/deleteUser.php', $UserModel->delUser());
    }
}