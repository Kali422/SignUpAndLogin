<?php


namespace SignUpForm\repos\Edit;

use SignUpForm\config\Database;

class EditProcessor
{
    private $editUserObject;
    /**
     * @var Database
     */
    private $handle;

    function __construct(EditUserData $editUserObject, Database $database)
    {
        $this->editUserObject = $editUserObject;
        $this->handle = $database;
    }

    function processEdit(): bool
    {
        $firstName = $this->editUserObject->getFirstName();
        $lastName = $this->editUserObject->getLastName();
        $phoneNumber = $this->editUserObject->getPhoneNumber();
        $id = $this->editUserObject->getId();

        $query = <<<"SQL"
update users 
set firstName="{$firstName}", lastName="{$lastName}", phoneNumber="{$phoneNumber}"
where id=$id
SQL;
        $dbHandle = $this->handle->getHandle();

        if ($dbHandle->query($query)) {
            return true;
        } else return false;
    }
}