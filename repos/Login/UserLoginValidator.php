<?php


namespace SignUpForm\repos\Login;


use SignUpForm\config\Database;
use SignUpForm\repos\ValidateRep;

class UserLoginValidator
{

    private $errors = [];
    /**
     * @var ValidateRep
     */
    private $validateRep;
    /**
     * @var Database
     */
    private $database;

    function __construct(ValidateRep $validateRep, Database $database)
    {

        $this->validateRep = $validateRep;
        $this->database = $database;
    }

    function validate(array $data)
    {
        if (false == ($this->validateRep->validateEmail($data['emailText']) && $this->validateRep->validatePassword($data['passwordText']))) {
            array_push($this->errors, "Wrong email or password");
            return;
        }
        if ($id = $this->checkUser($data)) {
            return $id;
        } else {
            array_push($this->errors, "Wrong email or password");
            return;
        }

    }

    function getErrors(): array
    {
        return $this->errors;
    }

    function isValid(): bool
    {
        return count($this->errors) == 0;
    }

    private function checkUser(array $data)
    {
        $dbHandle = $this->database->getHandle();
        $query = <<< SQL
select * from users where email="{$data['emailText']}"
SQL;

        $result = $dbHandle->query($query);
        $row = $result->fetchArray();

        if (password_verify($data['passwordText'], $row['password']))
            return $row['id'];
        else return false;


    }
}
