<?php

namespace SignUpForm\repos;

class ValidateRep
{
    function validateFirstName($firstName)
    {
        return (bool)preg_match("/^[a-zA-Z]{3,20}$/", $firstName);
    }

    function validateLastName($lastName)
    {
        return (bool)preg_match("/^[a-zA-Z\-]{3,30}$/", $lastName);
    }

    function validatePhoneNumber($number)
    {
        return preg_match("/^[0-9]{9}$/", $number);
    }

    function validateEmail($email)
    {
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function validatePassword($password)
    {
        return (bool)preg_match("/^(?=.*[0-9])(?=.*[A-Z]).{8,}$/", $password);
    }

}