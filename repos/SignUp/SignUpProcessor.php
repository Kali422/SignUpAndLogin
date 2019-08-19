<?php


namespace SignUpForm\repos\SignUp;


use SignUpForm\config\Database;

class SignUpProcessor
{

    /**
     * @var SignUpUser
     */
    private $user;
    /**
     * @var Database
     */
    private $database;

    function __construct(SignUpUser $user, Database $database)
    {

        $this->user = $user;
        $this->database = $database;
    }

    function registerUser()
    {
        $dbHandle = $this->database->getHandle();
        $passwordHashed = password_hash($this->user->getPassword(), PASSWORD_DEFAULT);
        $firstName = $this->user->getFirstName();
        $lastName = $this->user->getLastName();
        $email = $this->user->getEmail();
        $phone = $this->user->getPhoneNumber();
        $query = <<<"SQL"
insert into users (firstName, lastName, email, phoneNumber, password) VALUES ("$firstName", "$lastName", "$email", "$phone","$passwordHashed")
SQL;

        return $dbHandle->query($query);

    }

    function checkIfUserExists(): bool
    {
        $dbHandle = $this->database->getHandle();
        $query = <<<"SQL"
select count(*) from users where email="{$this->user->getEmail()}";
SQL;

        $result = $dbHandle->querySingle($query);
        if ($result > 0) {
            return true;
        } else return false;

    }

}