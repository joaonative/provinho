<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\IEmployee;

abstract class Employee extends Model implements IEmployee //implementar a interface
{
    protected $name;
    protected $salary;
    protected $regNumber;

    public function __construct($name, $salary, $regNumber) {
        $this->name = $name;
        $this->salary = $salary;
        $this->regNumber = $regNumber;
    }

    public function calcTaxes(): float {
        $taxes = 0.11;
        $inss =  0.08;
        $syndicate = 0.05;

        return ($this->salary * ($taxes + $inss + $syndicate));
    }

    public function getName() {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function getRegNumber()
    {
        return $this->regNumber;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function setRegNumber($regNumber)
    {
        $this->regNumber = $regNumber;
    }
}
