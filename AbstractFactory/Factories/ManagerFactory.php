<?php
namespace Abstractfactory\Factories;

require_once "../Interfaces/EmployeeFactoryInterface.php";
require_once "../Manager.php";

use Abstractfactory\Interfaces\EmployeeFactory;
use Employees\Manager;

class Managerfactory implements EmployeeFactory {
    public function createEmployee()
    {
        return new Manager();
    }
}
