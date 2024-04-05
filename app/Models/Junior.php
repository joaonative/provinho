<?php

namespace App\Models;

use App\Models\Employee;

class Junior extends Employee
{
    protected $workedHours;

        public function  __construct($name, $salary, $regNumber, $workedHours) 
        {
            parent::__construct($name, $salary, $regNumber);
            $this->workedHours = $workedHours;
        }

        public function incrSalary()
        {
            if ($this->workedHours >= 80) {
                $this->setSalary($this->getSalary() * 1.10);   
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
