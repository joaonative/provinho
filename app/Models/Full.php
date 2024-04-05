<?php

namespace App\Models;

use App\Models\Employee;

class Full extends Employee {
    protected $workedHours;

    public function  __construct($name, $salary, $regNumber, $workedHours) 
    {
        parent::__construct($name, $salary, $regNumber);
        $this->workedHours = $workedHours;
    }

    public function incrSalary()
    {
        if ($this->workedHours >= 100) {
            $this->setSalary($this->getSalary() * 1.15);
        }
    }

    public function getWorkedHours()
    {
        return $this->workedHours;
    }

    public function setWorkedHours($workedHours)
    {
        $this->workedHours = $workedHours;
    }
    
}