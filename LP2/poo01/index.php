<head>
	<style>
		body {
    		/* background: linear-gradient(to right, #ffb3ba, #ffdfba, #ffffba, #baffc9, #bae1ff); */
			background: #ffdfba;
		}

		table.brrr td {
			width: 5em;
		}
		div.brrr {
			margin-bottom: 1.69em;
		}

		table tr td {
			text-align: center;
		}
		table tr td:nth-child(1) {
			background-color: #FF6347;  /*Tomato*/
		}
		table tr td:nth-child(2) {
			background-color: #FFD700;  /*Gold*/
		}
		table tr td:nth-child(3) {
			background-color: #98FB98;  /*Pale Green*/
		}
		/* table tr td:nth-child(4) {
			background-color: #87CEFA;  /*Light Sky Blue
		} */
		/* table tr td:nth-child(4) {
			background-color: #9370DB;  /*Medium Purple
		} */
		table tr td:last-child {
    		background-color: #9370DB;  /* Medium Purple */
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

// $t1 = new Triangle(3, 6, 9);
// $t2 = new Triangle(9, 4, 6);
// $t3 = new Triangle(4, 8, 16);
$t1 = new Triangle(3, 6, 9);
$t2 = new Triangle(6, 6, 9);
$t3 = new Triangle(9, 6, 9);

echo "<table style='border: none;'>";
echo "<tr><th colspan='4'>Triangles</th></tr>";
echo "<tr><th>Side 1</th><th>Side 2</th><th>Side 3</th><th>Is Valid</th></tr>";
# TODO: Implement Triangle Image Generation with Python and add it as a 4th column.
echo "<tr><td>" . $t1->getSide1() . "</td><td>" . $t1->getSide2() . "</td><td>" . $t1->getSide3() ."</td><td>" . ($t1->validate() ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>" . $t2->getSide1() . "</td><td>" . $t2->getSide2() . "</td><td>" . $t2->getSide3() ."</td><td>" . ($t2->validate() ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>" . $t3->getSide1() . "</td><td>" . $t3->getSide2() . "</td><td>" . $t3->getSide3() ."</td><td>" . ($t3->validate() ? "✔️" : "❌") . "</td></tr>";
echo "</table>";

echo "<br><br><br><hr><br><br><br>";

$c1 = new Car("Ford", "K");
$c1->viewVelocity();
$c1->accelerate(40);
$c1->viewVelocity();
$c1->decelerate(5.5);
$c1->viewVelocity();
$c1->accelerate(34.5);
$c1->viewVelocity();


echo "<br><br><br><hr><br><br><br>";

echo "<br><br><br><hr><br><br><br>";

?>