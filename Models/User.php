<?php

class User {
    private $email;
    private $password;
    private $name;
    private $surname;
    private $id;
    private $role;
    

    public function __construct(
        int $id,
        string $email,
        string $password,
        string $name,
        string $surname,
        int $role = 3
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getRole(): int
    {
        return $this->role;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
}