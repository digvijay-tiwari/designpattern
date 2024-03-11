<?php
namespace Abstractfactory;

require_once "Interfaces/EmployeeInterface.php";

use Abstractfactory\Interfaces\Employee;

class Developer implements Employee {
    public function getSalary()
    {
     return "Dev salary is 50000";   
    }
    public function getName()
    {
        return "I am devloper";
    }
}
