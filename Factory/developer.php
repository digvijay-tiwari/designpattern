<?php
namespace Employees;
require_once "employee.php";

use EmployeeInterface\Employee;

class Developer implements Employee{
    public function getSalary()
    {
        return 'Salary of developer is 30000';
    }
}
