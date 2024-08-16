<?php

namespace App\Domain\User\Entities;

use App\Domain\User\ValueObjects\Email;
use App\Domain\User\ValueObjects\Password;
use App\Domain\User\ValueObjects\Username;

readonly class User
{
    public function __construct(
        private Email    $email,
        private Password $password,
        private Username $username
    )
    {}

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getUsername(): Username
    {
        return $this->username;
    }
}
