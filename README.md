## Designpattern

## Singleton Pattern

The Singleton Pattern is a creational design pattern that ensures a class has only one instance and provides a global point of access to that instance. It is useful when you want to control access to a shared resource or ensure that only one instance of a class exists throughout the application's lifecycle.
In this repository I have included Eager as well as Lazy Singleton with the example of Reflection api to break the singleton
**Required things:**
*
* 1. The class should not be available for creating objects so a private constructor is required
* 2. Instantiation should be done only with the help of a method or function that too a static
* 3. The created object should be private so that it should be prevented from modification from outside.   

e.g., 
```php
<?php
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
?>
```

## Factory Design Pattern

The Factory Design Pattern is a creational design pattern that provides an interface for creating objects in a superclass but allows subclasses to alter the type of objects that will be created. This pattern is useful when the type of object to be created is determined at runtime.

Here's an example of how you can implement the Factory Design Pattern in PHP:
```php
<?php
// Abstract product class
abstract class Vehicle {
    abstract public function drive();
}

// Concrete product classes
class Car extends Vehicle {
    public function drive() {
        return "Driving a car";
    }
}

class Motorcycle extends Vehicle {
    public function drive() {
        return "Riding a motorcycle";
    }
}

// Factory class
class VehicleFactory {
    public static function createVehicle($type) {
        switch ($type) {
            case 'car':
                return new Car();
            case 'motorcycle':
                return new Motorcycle();
            default:
                throw new InvalidArgumentException("Invalid vehicle type.");
        }
    }
}

// Usage
try {
    $car = VehicleFactory::createVehicle('car');
    echo $car->drive() . "\n";

    $motorcycle = VehicleFactory::createVehicle('motorcycle');
    echo $motorcycle->drive() . "\n";

    // Attempting to create an invalid vehicle type
    $invalid = VehicleFactory::createVehicle('bus');
} catch (InvalidArgumentException $e) {
    echo "Exception: " . $e->getMessage() . "\n";
}
?>
```

**In this example:**

Vehicle is an abstract class defining the interface for the products (Car and Motorcycle).
Car and Motorcycle are concrete implementations of the Vehicle interface.
VehicleFactory is a factory class responsible for creating instances of Car and Motorcycle based on the provided type.
The createVehicle() method in the factory class takes a type parameter and returns an instance of the corresponding vehicle type.
Usage demonstrates how to create instances of different vehicle types using the factory.
The Factory Design Pattern allows you to encapsulate object creation logic, making your code more flexible and easier to maintain. It also promotes loose coupling between client code and the classes being instantiated.



## Abstract Factory Design Pattern

The Abstract Factory pattern is a creational design pattern that provides an interface for creating families of related or dependent objects without specifying their concrete classes. It promotes loose coupling between the client code and the concrete classes that are instantiated.

**Benefits**:

Flexibility: Enables you to switch between different product families easily by changing the concrete factory used.
Decoupling: Client code doesn't depend on concrete product classes, promoting maintainability and extensibility.
Consistency: Ensures that all products created by a concrete factory are compatible and work together seamlessly.
Structure:

Abstract Factory: Defines an interface for creating each product type.
Concrete Factory: Implements the Abstract Factory and creates specific product objects.
Product: Represents the individual product types.
```php
<?php
// Abstract Factory
interface ShapeFactory {
  public function createShape(string $type): Shape;
}

// Concrete Factory: ConsoleShapeFactory
class ConsoleShapeFactory implements ShapeFactory {
  public function createShape(string $type): Shape {
    switch ($type) {
      case 'circle':
        return new ConsoleCircle();
      case 'square':
        return new ConsoleSquare();
      default:
        throw new InvalidArgumentException("Unsupported shape type: $type");
    }
  }
}

// Concrete Factory: SVGShapeFactory
class SVGShapeFactory implements ShapeFactory {
  public function createShape(string $type): Shape {
    switch ($type) {
      case 'circle':
        return new SVGCircle();
      case 'square':
        return new SVGSquare();
      default:
        throw new InvalidArgumentException("Unsupported shape type: $type");
    }
  }
}

// Product: Shape (abstract)
interface Shape {
  public function draw(): void;
}

// Concrete Products: ConsoleCircle, ConsoleSquare, SVGCircle, SVGSquare
class ConsoleCircle implements Shape {
  public function draw(): void {
    echo "Drawing circle on console\n";
  }
}

class ConsoleSquare implements Shape {
  public function draw(): void {
    echo "Drawing square on console\n";
  }
}

class SVGCircle implements Shape {
  public function draw(): void {
    echo "<circle ...></circle>\n"; // Generate SVG code for circle
  }
}

class SVGSquare implements Shape {
  public function draw(): void {
    echo "<rect ...></rect>\n"; // Generate SVG code for square
  }
}

// Usage

function createAndDrawShape(ShapeFactory $factory, string $type): void {
  $shape = $factory->createShape($type);
  $shape->draw();
}

// Example usage with ConsoleShapeFactory
$consoleFactory = new ConsoleShapeFactory();
createAndDrawShape($consoleFactory, 'circle');
createAndDrawShape($consoleFactory, 'square');

// Example usage with SVGShapeFactory
$svgFactory = new SVGShapeFactory();
createAndDrawShape($svgFactory, 'circle');
createAndDrawShape($svgFactory, 'square');
?>
```
**Explanation**:

The ShapeFactory interface defines createShape for creating different Shape objects.
ConsoleShapeFactory and SVGShapeFactory implement the ShapeFactory interface and create ConsoleCircle, ConsoleSquare, SVGCircle, and SVGSquare objects, respectively.
The Shape interface defines the draw method for drawing shapes.
Concrete shape classes (ConsoleCircle, ConsoleSquare, SVGCircle, SVGSquare) implement the drawing logic specific to their drawing type (console or SVG).
The createAndDrawShape function takes a ShapeFactory instance and allows creation and drawing of shapes based on the chosen type and factory.
By using the Abstract Factory pattern, you can easily switch between drawing shapes on the console or generating SVG code without modifying the client code that uses the createAndDrawShape function. This promotes loose coupling and simplifies switching between product families.


## The Builder Pattern in PHP

The Builder pattern is a creational design pattern that allows you to construct complex objects step-by-step. It separates the object creation process from its representation, offering several benefits:

* **Improved Readability:** The builder pattern breaks down object creation into smaller, more manageable steps, making the code easier to understand.
* **Increased Flexibility:** You can build objects with different configurations by chaining method calls on the builder object.
* **Optional Parameters:** Not all properties of an object might be required during construction. The builder pattern allows for setting only the necessary properties.
* **Immutable Objects:** Builders can promote immutability by creating new objects with modifications rather than modifying the existing object.

**Components of the Builder Pattern:**

* **Builder Interface:** This interface defines the methods for constructing parts of the object.
* **Concrete Builder:** This class implements the `Builder` interface and provides specific steps for building the object. There can be multiple concrete builders for creating different variations of the object.
* **Director (Optional):** This class (optional) uses the builder interface to specify the steps for constructing an object. It can manage the order in which the builder methods are called.
* **Product:** This is the final object that is being constructed.

**Easy Example in PHP:**

Let's build a `BlogPost` object using the builder pattern:

```php
<?php

interface BlogPostBuilder {
  public function setTitle(string $title): self;
  public function setContent(string $content): self;
  public function setAuthor(string $author): self;
  public function setTags(array $tags): self;
  public function build(): BlogPost;
}

class BlogPost {
  private $title;
  private $content;
  private $author;
  private $tags;

  public function __construct(string $title, string $content, string $author, array $tags) {
    $this->title = $title;
    $this->content = $content;
    $this->author = $author;
    $this->tags = $tags;
  }

  public function getTitle(): string {
    return $this->title;
  }

  public function getContent(): string {
    return $this->content;
  }

  public function getAuthor(): string {
    return $this->author;
  }

  public function getTags(): array {
    return $this->tags;
  }
}

class BlogPostBuilderImpl implements BlogPostBuilder {
  private $title;
  private $content;
  private $author;
  private $tags = [];

  public function setTitle(string $title): self {
    $this->title = $title;
    return $this; // Method chaining
  }

  public function setContent(string $content): self {
    $this->content = $content;
    return $this;
  }

  public function setAuthor(string $author): self {
    $this->author = $author;
    return $this;
  }

  public function setTags(array $tags): self {
    $this->tags = $tags;
    return $this;
  }

  public function build(): BlogPost {
    return new BlogPost($this->title, $this->content, $this->author, $this->tags);
  }
}

// Usage
$postBuilder = new BlogPostBuilderImpl();
$post = $postBuilder->setTitle("My First Blog Post")
                   ->setContent("This is some awesome content...")
                   ->setAuthor("John Doe")
                   ->setTags(["PHP", "Design Patterns"])
                   ->build();

echo "Blog Post Title: " . $post->getTitle() . "\n";
// ... and so on for other properties
```

**Explanation:**

* The `BlogPostBuilder` interface defines methods for setting various properties of a blog post.
* The `BlogPostBuilderImpl` class implements the interface and provides concrete implementations for setting properties.
* We use method chaining to set different properties fluently.
* The `build` method creates the final `BlogPost` object with the specified properties.

This is a basic example, but it demonstrates how the builder pattern can improve code readability and flexibility when constructing complex objects in PHP. 










