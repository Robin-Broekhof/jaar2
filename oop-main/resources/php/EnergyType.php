<?php

const FIRE = "fire";
const ELECTRIC = "electric";
const WATER = "water";
const FIGHTING = "fighting";


class EnergyType{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }
}