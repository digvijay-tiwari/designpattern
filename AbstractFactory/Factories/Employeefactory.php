<?php
namespace Abstractfactory\Factories;

require_once "Developerfactory.php";
require_once "ManagerFactory.php";

use Abstractfactory\Factories\Developerfactory;
use Abstractfactory\Factories\Managerfactory;

class EmployeeFactory {
    public function getDevDetails() {
        $developer = new Developerfactory();
        $devData = $developer->createEmployee();
        //return $devData->getSalary();
        return [
            'dev' => [
                'Message' => $devData->getName(),
                'Salary' => $devData->getSalary()
            ]
        ];
    }
    public function getmanagersDetails() {
        $manager = new Managerfactory();
        $mgrData = $manager->createEmployee();
        //return $devData->getSalary();
        return [
            'mgr' => [
                'Message' => $mgrData->getName(),
                'Salary' => $mgrData->getSalary()
            ]
        ];
    }
}


$employee = new EmployeeFactory();
print_r($employee->getDevDetails());
print_r($employee->getmanagersDetails());

