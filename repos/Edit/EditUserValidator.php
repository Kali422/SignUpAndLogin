<?php

namespace SignUpForm\repos\Edit;

use SignUpForm\repos\CsrfFormRepository;
use SignUpForm\repos\ValidateRep;

class EditUserValidator
{
    private $errors = [];
    private $csrfFormRepository;
    private $validateRep;

    function __construct(CsrfFormRepository $csrfFormRepository, ValidateRep $validateRep)
    {
        $this->csrfFormRepository=$csrfFormRepository;
        $this->validateRep=$validateRep;
    }

    function validate(array $data): void
    {
        if (false == $this->validateRep->validateFirstName($data['firstNameEdit'])) {
            $this->errors['firstName'] = 'Wrong first name';
        }

        if (false == $this->validateRep->validateLastName($data['lastNameEdit'])) {
            $this->errors['lastName'] = 'Wrong last name';
        }

        if (false == $this->validateRep->validatePhoneNumber($data['phoneNumberEdit'])) {
            $this->errors['phoneNumber'] = 'Wrong phone number';
        }

        if (false == $this->csrfFormRepository->valid($data['token']))
        {
            $this->errors['token'] = "Invalid token";
        }
    }

    function isValid(): bool
    {

        return count($this->errors) === 0;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }


}