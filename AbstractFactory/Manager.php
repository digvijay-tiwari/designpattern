<?php
namespace Abstractfactory;

require_once "Interfaces/EmployeeInterface.php";

use Abstractfactory\Interfaces\Employee;

class Manager implements Employee {
    public function getSalary()
    {
        return "manager Salary is 100000";
    }
    public function getName()
    {
        return "I am Manager";
    }
}