<?php
namespace Employees;

require_once "employee.php";
use EmployeeInterface\Employee;

class Manager implements Employee {
    public function getSalary()
    {
        return 'Salary of the manager is 60000';
    }
}