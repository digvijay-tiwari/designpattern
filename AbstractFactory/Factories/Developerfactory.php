<?php
namespace Abstractfactory\Factories;

require_once "../Interfaces/EmployeeFactoryInterface.php";
require_once "../Developer.php";

use Abstractfactory\Interfaces\EmployeeFactory;
use Abstractfactory\Developer;

class Developerfactory implements EmployeeFactory {
    public function createEmployee()
    {
        return new Developer();
    }
}
