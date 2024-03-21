<?php
require("arquivo.php");

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
$s2 = new Student("Angiii", "Physics");  # Fussy
$s3 = new Student("Bob", "Systems Development");

# Explanation for this in the arquivo.php file, tho I also like the aesthetics of it.
Student::setGrade($s3, "Programming Language I", 6);
Student::setGrade($s3, "Instrumental English I", 8);
Student::setGrade($s3, "Programming Language I", 9);
Student::setGrade($s3, "Instrumental English I", 10);
Student::setGrade($s3, "Computational Logic", 1);  # Before Geistreich
Student::setGrade($s3, "Computational Logic", 7);  # After Geistreich

$name = $s3->getName();
echo "$name has the following subjects: <br>";
echo $s3->viewSubjects(false) . "<br>";

echo "Programming Language I 1st Grade: " . $s3->getGrade("Programming Language I", 0) . "<br>";
echo "Programming Language I 2nd Grade: " . $s3->getGrade("Programming Language I", 1) . "<br>";
echo "Instrumental English I Grades:<br>" . $s3->getGrade("Instrumental English I") . "<br>";

echo "Means:<br>";
echo "Programming Language I Mean: " . $s3->calculateMean("Programming Language I") . "<br>";
echo "Instrumental English I Mean: " . $s3->calculateMean("Instrumental English I") . "<br>";
echo "Computational Logic Mean: " . $s3->calculateMean("Computational Logic") . "<br>";
?>