<?php
namespace Abstractfactory\Factories;

require_once "Developerfactory.php";
require_once "ManagerFactory.php";

use Abstractfactory\Factories\Developerfactory;
use Abstractfactory\Factories\Managerfactory;

class EmployeeFactory {
    public function getDevSalaries() {
        $developer = new Developerfactory();
        $devData = $developer->createEmployee();
        return $devData->getSalary();
    }
}


$employee = new EmployeeFactory();
echo $employee->getDevSalaries();

