<?php


namespace BClient\Entity;


class Offer
{
    public $id = 0;
    public $price = 0;
    public $name = 0;

    public function __construct(int $id = 0, int $price = 0, string $name = '')
    {
        $this->id = $id;
        $this->price = $price;
        $this->name = $name;
    }
}