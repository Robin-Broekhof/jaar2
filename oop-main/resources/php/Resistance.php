<?php
class Resistance{
    public $energyType;
    public $mutiplier;

    public function __construct($energyType, $mutiplier)
    {
        $this->energyType = $energyType;
        $this->mutiplier = $mutiplier;
    }
}