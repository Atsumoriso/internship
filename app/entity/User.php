<?php
/**
 * Created by PhpStorm.
 * User: dor
 * Date: 27.06.16
 * Time: 17:13
 */

namespace App\Entity\User;

class User
{
    private $idUser;

    private $firstName;

    private $lastName;

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
}