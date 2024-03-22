<head>
    <style>
        td {
            text-align: center;
        }
    </style>
</head>


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

# Retrieving grades from a subject while specifying the index:
echo "Programming Language I 1st Grade: " . $s3->getGrade("Programming Language I", 0) . "<br>";
echo "Programming Language I 2nd Grade: " . $s3->getGrade("Programming Language I", 1) . "<br>";

# Retrieving grades from a subject while NOT specifying the index:
echo "Instrumental English I Grades:<br>" . $s3->getGrade("Instrumental English I") . "<br>";

echo "<table style='border: none;'>";  # Perhaps unnecessary...
echo "<tr><th colspan='3'>" . $s3->getName() . "'s Grades</th></tr>";  
echo "<tr><th>Subject</th><th>Mean</th><th>Approved</th></tr>";
echo "<tr><td>Programming Language I </td><td>" . $s3->calculateMean("Programming Language I") . "</td><td>" . ($s3->checkApproval("Programming Language I") ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>Instrumental English I </td><td>" . $s3->calculateMean("Instrumental English I") . "</td><td>" . ($s3->checkApproval("Instrumental English I") ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>Computational Logic</td><td>" . $s3->calculateMean("Computational Logic") . "</td><td>" . ($s3->checkApproval("Computational Logic") ? "✔️" : "❌") . "</td></tr>";
echo "</table>";

echo "<br><br><br><hr><br><br><br>";

$dude = new Employee("Bobson Almeida", 6900, "Penguinologist");

echo "<table style='border: none;'>";
echo "<tr><th colspan='3'>" . $dude->getName() . "</th></tr>";
echo "<tr><th>Base Salary</th><th>Net Salary</th><th>Role</th></tr>"; 
echo "<tr><td>" . $dude->getSalary() . "</td><td>" . $dude->calculateNetSalary() . "</td><td>" . $dude->getRole() . "</td></tr>";
echo "</table>";


echo "<br><br><br><hr><br><br><br>";

$p1 = new Product("Iron Dagger", 20, 4);
$p2 = new Product("Iron Sword", 50, 2);
$p3 = new Product("Bronze Sword", 35, 0);

echo "<table style='border: none;'>"; 
echo "<tr><th>Name</th><th>Price</th><th>Quantity</th><th>Availability</th></tr>";
echo "<tr><td>" . $p1->getName() . "</td><td>" . $p1->getPrice() . "</td><td>" . $p1->getQuantity() ."</td><td>" . ($p1->verifyAvailability() ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>" . $p2->getName() . "</td><td>" . $p2->getPrice() . "</td><td>" . $p2->getQuantity() ."</td><td>" . ($p2->verifyAvailability() ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>" . $p3->getName() . "</td><td>" . $p3->getPrice() . "</td><td>" . $p3->getQuantity() ."</td><td>" . ($p3->verifyAvailability() ? "✔️" : "❌") . "</td></tr>";
echo "</table>";

echo "<br><br><br><hr><br><br><br>";

echo "<br><br><br><hr><br><br><br>";

echo "<br><br><br><hr><br><br><br>";

echo "<br><br><br><hr><br><br><br>";

?>