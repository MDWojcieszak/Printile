<?php

class Order {
    private $id;
    private $userID;
    private $date;
    private $status;
    private $parametersID;
    private $price;

    public function __construct(int $id, int $userID, string $date, string $status, int $parametersID, float $price)
    {
        $this->id = $id;
        $this->userID = $userID;
        $this->date = $date;
        $this->status = $status;
        $this->parametersID = $parametersID;
        $this->price = $price;
    }
    public function getID():int
    {
        return $this->id;
    }
    public function getUserID():int
    {
        return $this->userID;
    }
    public function getDate():string
    {
        return $this->date;
    }
    public function getStatus():string
    {
        return $this->status;
    }
    public function getParametersID():int
    {
        return $this->parametersID;
    }
    public function getPrice():float
    {
        return $this->price;
    }
}