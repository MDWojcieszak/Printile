<?php


class Product {
    private $image;
    private $name;
    private $description;
    private $price;
    private $opinion;
    private $id;

    public function __construct(int $id, string $image, string $name, string $description, float $price, float $opinion)
    {
        $this->id = $id;
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->opinion = $opinion;
    }
    public function getId(): int 
    {
        return $this->id;
    }

    public function getImage(): string 
    {
        return $this->image;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getOpinion(): float
    {
        return $this->opinion;
    }
}