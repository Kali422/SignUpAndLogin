<?php


namespace SignUpForm\repos;


class CsrfFormRepository
{
    function create(): string
    {
        $token = md5(rand());
        $_SESSION['token'] = $token;
        return $token;
    }

    function valid($token): bool
    {
        $tokenInSession = $_SESSION['token'];
        return $token === $tokenInSession;
    }

}