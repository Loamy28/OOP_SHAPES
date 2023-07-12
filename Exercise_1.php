<?php
abstract class Shape {
    protected $name;
    abstract public function description();
}

interface IShape {
    public function getArea();
    public function getPerimeter();
}

class Square extends Shape implements IShape {
    protected $length;

    public function __construct($length) {
        $this->length = $length;
    }

    public function description() {
        return "Square has four equal sides.";
    }

    public function getArea() {
        return $this->length * $this->length;
    }

    public function getPerimeter() {
        return 4 * $this->length;
    }
}

class Rectangle extends Shape implements IShape {
    protected $length;
    protected $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function description() {
        return "Rectangle has two pairs of equal sides.";
    }

    public function getArea() {
        return $this->length * $this->width;
    }

    public function getPerimeter() {
        return 2 * ($this->length + $this->width);
    }
}

class Triangle extends Shape implements IShape {
    protected $side1;
    protected $side2;
    protected $side3;

    public function __construct($side1, $side2, $side3) {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
    }

    public function description() {
        return "Triangle has three sides.";
    }

    public function getArea() {
        // Using Heron's formula to calculate the area of a triangle
        $s = ($this->side1 + $this->side2 + $this->side3) / 2;
        return sqrt($s * ($s - $this->side1) * ($s - $this->side2) * ($s - $this->side3));
    }

    public function getPerimeter() {
        return $this->side1 + $this->side2 + $this->side3;
    }
}

class Circle extends Shape implements IShape {
    protected $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function description() {
        return "Circle has no sides, only a curve.";
    }

    public function getArea() {
        return pi() * pow($this->radius, 2);
    }

    public function getPerimeter() {
        return 2 * pi() * $this->radius;
    }
}

class InvalidShape extends Shape implements IShape {
    public function description() {
        return "Invalid shape.";
    }

    public function getArea() {
        return "Invalid: Cannot calculate the area of an invalid shape.";
    }

    public function getPerimeter() {
        return "Invalid: Cannot calculate the perimeter of an invalid shape.";
    }
}

$shape1 = new Square(4);
echo $shape1->description() . "<br>"; // Output: "Square has four equal sides."
echo $shape1->getArea() . "<br>"; // Output: 16
echo $shape1->getPerimeter() . "<br>"; // Output: 16

$shape2 = new Rectangle(4, 6);
echo $shape2->description() . "<br>"; // Output: "Rectangle has two pairs of equal sides."
echo $shape2->getArea() . "<br>"; // Output: 24
echo $shape2->getPerimeter() . "<br>"; // Output: 20

$shape3 = new Triangle(4, 6, 7);
echo $shape3->description() . "<br>"; // Output: "Triangle has three sides."
echo $shape3->getArea() . "<br>"; // Output: 11.976
echo $shape3->getPerimeter() . "<br>"; // Output: 17

$shape4 = new Circle(5);
echo $shape4->description() . "<br>"; // Output: "Circle has no sides, only a curve."
echo $shape4->getArea() . "<br>"; // Output: 78.539816339745
echo $shape4->getPerimeter() . "<br>"; // Output: 31.415926535898

$invalidShape = new InvalidShape();
echo $invalidShape->description() . "<br>"; // Output: "Invalid shape."
echo $invalidShape->getArea() . "<br>"; // Output: "Invalid: Cannot calculate the area of an invalid shape."
echo $invalidShape->getPerimeter() . "<br>"; // Output: "Invalid: Cannot calculate the perimeter of an invalid shape."


?>