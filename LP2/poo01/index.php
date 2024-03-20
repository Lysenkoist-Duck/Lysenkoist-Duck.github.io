<?php
require("arquivo.php");

echo "test";

$pie = new Circle(22 / 7);
echo "<h3>Pie</h3>";
echo "Radius: " . $pie->getRadius() . "<br>";
echo "Area: " . $pie->calculateArea() . "<br>";
echo "Perimeter: " . $pie->calculatePerimeter() . "<br>";

echo "<br><br><br><hr><br><br><br>";

$cake = new Rectangle(6, 9);
echo "<h3>Cake</h3>";
echo "Width: " . $cake->getWidth() . "<br>";
echo "Height: " . $cake->getHeight() . "<br>";
echo "Area: " . $cake->calculateArea() . "<br>";
echo "Perimeter: " . $cake->calculatePerimeter() . "<br>";

echo "<br><br><br><hr><br><br><br>";

$s1 = new Student("Sammy", "Systems Development");
$s2 = new Student("Angiii", "Physics");
$s3 = new Student("Bob", "Systems Development");

$s3->setGrade("Chemistry");
$s3->setGrade
?>