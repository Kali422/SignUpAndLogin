<?php


namespace SignUpForm\repos\SignUp;


use SignUpForm\repos\ValidateRep;

class SignUpValidator
{
    private $errors = [];
    /**
     * @var ValidateRep
     */
    private $validateRep;

    function __construct(ValidateRep $validateRep)
    {

        $this->validateRep = $validateRep;
    }


    function validate(array $data): void
    {

        if (false == $this->validateRep->validateFirstName($data['firstNameText'])) {
            $this->errors['firstName'] = "Wrong first name";
        }
        if (false == $this->validateRep->validateLastName($data['lastNameText'])) {
            $this->errors['lastName'] = "Wrong last name";
        }
        if (false == $this->validateRep->validateEmail($data['emailText'])) {
            $this->errors['email'] = "Wrong email";

        }
        if (false == $this->validateRep->validatePhoneNumber($data['phoneNumberText'])) {
            $this->errors['phoneNumber'] = "Wrong phone number";

        }
        if (false == $this->validateRep->validatePassword($data['passwordText'])) {
            $this->errors['password'] = "Wrong password";
        }

        if ($data['passwordText'] != $data['passwordConfirmText']) {
            $this->errors['passwordConfirm'] = "Passwords are different";
        }
    }

    function getErrors(): array
    {
        return $this->errors;
    }

    function isValid(): bool
    {
        return count($this->errors) === 0;
    }
}