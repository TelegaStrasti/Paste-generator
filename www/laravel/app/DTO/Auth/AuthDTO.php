<?php

namespace App\DTO\Auth;

class AuthDTO
{
    public function __construct
    (
        readonly protected string $name,
        readonly protected string $password,
    )
    {}

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
