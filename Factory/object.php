<?php
namespace Employees;

require_once "EmployeeFactory.php";

use Employees\EmployeeFactory;

class CheckFactory {
    public static function checkSalary() {
        $developer = EmployeeFactory::getSalary('developer');
        $manager = EmployeeFactory::getSalary('manager');

        return [
            'Manager' => $manager->getSalary(),
            'Developer' => $developer->getSalary()
        ];
    }
}

print_r(CheckFactory::checkSalary());