<?php


namespace SignUpForm\repos;


class ErrorView
{
    static function printErrors(array $errors): void
    {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}