<?php
namespace Employees;

require_once "developer.php";
require_once "manager.php";

use EmployeeInterface\Employee;
use Employees\Manager;
use Employees\Developer;


/***
 * This is s factory which has both the type of employee classes and those classes are implementing Employee interface
 * This is the core concept of a factory pattern that if one super class(factory) neeo have e than one subclasses then we should have factory patter
 * 
 */

class EmployeeFactory {
    public static function getSalary($empType): Employee {
        switch($empType) {
            case 'manager':
                return new Manager();
                break;
        case 'developer':
            return new Developer();
            break;
        default:
            return 'there is nothing';
            break;
        }
    }
}







