<?php

class Device{
    private $type;
    private $brand;
    private $modelNumber;
    private $description;
    private $issue;
    private $category;
    private $repairStatus;
    private $technician;
    private $deviceID;
    private $cost;

    function __construct($type,$brand,$modelNumber,$description,$issue,$category,$repairStatus,$technician,$deviceID,$cost)
    {
        $this->type = $type;
        $this->brand = $brand;
        $this->modelNumber = $modelNumber;
        $this->description = $description;
        $this->issue = $issue;
        $this->category = $category;
        $this->repairStatus = $repairStatus;
        $this->technician = $technician;
        $this->deviceID = $deviceID;
        $this->cost = $cost;
    }
}

?>