<?php

namespace App\Model\Permission;

/**
 * Permission model of access control list
 *
 * @author Petr Poupě
 */
class Permission extends \Nette\Security\Permission
{

    public function __construct()
    {
        // definujeme role
        $this->setRoles();
        // seznam zdrojů, ke kterým mohou uživatelé přistupovat
        $this->setResources();
        // pravidla, určující, kdo co může s čím dělat - defaultně vše zakázáno
        $this->setPrivileges();
    }

    private function setRoles()
    {
        $this->addRole('guest');
        $this->addRole('user', 'guest');
        $this->addRole('admin', 'user');
        $this->addRole('superadmin', 'admin');
    }

    private function setResources()
    {
        $this->addResource('front');
        $this->addResource('admin');        
        $this->addResource('users');
        $this->addResource('service');
    }

    private function setPrivileges()
    {
        /**
         * VIEW - view own data
         * VIEW-ALL - view all data
         * ADD - can add data
         * EDIT - can edit own data
         * EDIT-ALL - can edit all data
         * DELETE - can delete own data
         * DELETE-ALL - can delete all data
         */

        $this->deny('guest');

        $this->allow('guest', 'front');
        
        $this->allow('admin', 'admin', 'view');
        $this->allow('admin', 'users');

        $this->allow('superadmin'); // všechna práva a zdroje pro administrátora
    }

}
