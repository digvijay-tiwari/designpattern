# designpattern

**Singleton Pattern**

The Singleton Pattern is a creational design pattern that ensures a class has only one instance and provides a global point of access to that instance. It is useful when you want to control access to a shared resource or ensure that only one instance of a class exists throughout the application's lifecycle.
e.g., 

class Singleton {
    // Private static variable to hold the instance of the class
    private static $instance;

    // Private constructor to prevent instantiation from outside
    private function __construct() {
        // Prevents instantiation from outside
    }

    // Public static method to get the instance of the class
    public static function getInstance(): Singleton {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Example method of the singleton class
    public function showMessage() {
        echo "Hello from Singleton!";
    }
}

$singletonInstance1 = Singleton::getInstance();
$singletonInstance1->showMessage(); 

