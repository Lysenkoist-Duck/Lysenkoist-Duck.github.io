<head>
	<style>
		body {
    		/* background: linear-gradient(to right, #ffb3ba, #ffdfba, #ffffba, #baffc9, #bae1ff); */
			background: #EFEFCF;  # ♣
			text-align: center;
		}

		table {
			margin-left: auto;
			margin-right: auto;
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

		table.bücher-chart tr td:nth-child(1) {
			background-color: #FF6969;  /*Pastel Red*/
		}
		table.bücher-chart tr td:nth-child(2) {
			background-color: #FCE096;  /*Pastel Yellow*/
		}
		table.bücher-chart tr td:nth-child(3) {
			background-color: #98FB98;  /*Pale Green*/
		}
		table.bücher-chart tr td:nth-child(4) {
			background-color: #87CEFA;  /*Light Sky Blue*/
		}
		table.bücher-chart tr td:nth-child(5) {
			background-color: #9370DB;  /*Medium Purple*/
		}

		table.medical-chart td {
			width: 25em;
		}		
	</style>
</head>


<?php
require("arquivo.php");

$pie = new Circle(round(22 / 7, 2));  # aka the real π day!
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


# εψηο
echo "<h3>Studentenzeit!</h3>";

$s1 = new Student("Sammy", "Systems Development");
$s2 = new Student("Angiii", "Physics");  # Fussy
$s3 = new Student("Bob", "Systems Development");

# Explanation for this in the arquivo.php file, tho I also like the aesthetics of it.
Student::setGrade($s3, "Algorithms", 6);
Student::setGrade($s3, "Instrumental English I", 8);
Student::setGrade($s3, "Algorithms", 9);
Student::setGrade($s3, "Instrumental English I", 10);
Student::setGrade($s3, "Computational Logic", 1);  # Before Geistreich
Student::setGrade($s3, "Computational Logic", 7);  # After Geistreich

echo "{$s3->getName()} studies the following subjects: <br>";
echo $s3->viewSubjects(false) . "<br>";

# Retrieving grades from a subject while specifying the index:
echo "Algorithms 1st Grade: " . $s3->getGrade("Algorithms", 0) . "<br>";
echo "Algorithms 2nd Grade: " . $s3->getGrade("Algorithms", 1) . "<br>";

# Retrieving grades from a subject while NOT specifying the index:
echo "Instrumental English I Grades:<br>" . $s3->getGrade("Instrumental English I") . "<br>";

echo "<table style='border: none;'>";  # Perhaps border: none is unnecessary...
echo "<tr><th colspan='3'>" . $s3->getName() . "'s Grades</th></tr>";  
echo "<tr><th>Subject</th><th>Mean</th><th>Approved</th></tr>";
echo "<tr><td>Algorithms </td><td>" . $s3->calculateMean("Algorithms") . "</td><td>" . ($s3->checkApproval("Algorithms") ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>Instrumental English I </td><td>" . $s3->calculateMean("Instrumental English I") . "</td><td>" . ($s3->checkApproval("Instrumental English I") ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>Computational Logic</td><td>" . $s3->calculateMean("Computational Logic") . "</td><td>" . ($s3->checkApproval("Computational Logic") ? "✔️" : "❌") . "</td></tr>";
echo "</table>";

Student::setGrade($s1, "Algorithms", 9.5);
Student::setGrade($s1, "Instrumental English I", 10);
Student::setGrade($s1, "Algorithms", 8.1);
Student::setGrade($s1, "Instrumental English I", 10);
Student::setGrade($s1, "Computational Logic", 9.8);
Student::setGrade($s1, "Computational Logic", 9.6);

echo "<br><br>";

echo "{$s1->getName()} studies the following subjects: <br>";
echo $s1->viewSubjects(false) . "<br>";

echo "<table>";  # Yes, I've decided border: none is unnecessary...
echo "<tr><th colspan='3'>" . $s1->getName() . "'s Grades</th></tr>";  
echo "<tr><th>Subject</th><th>Mean</th><th>Approved</th></tr>";
echo "<tr><td>Algorithms </td><td>" . $s1->calculateMean("Algorithms") . "</td><td>" . ($s1->checkApproval("Algorithms") ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>Instrumental English I </td><td>" . $s1->calculateMean("Instrumental English I") . "</td><td>" . ($s1->checkApproval("Instrumental English I") ? "✔️" : "❌") . "</td></tr>";
echo "<tr><td>Computational Logic</td><td>" . $s1->calculateMean("Computational Logic") . "</td><td>" . ($s1->checkApproval("Computational Logic") ? "✔️" : "❌") . "</td></tr>";
echo "</table>";


echo "<br><br><br><hr><br><br><br>";


$dude = new Employee("Bobson Almeida", 6900, "Penguinologist");

echo "<table>";
echo "<tr><th colspan='3'>" . $dude->getName() . "</th></tr>";
echo "<tr><th>Base Salary</th><th>Net Salary</th><th>Role</th></tr>"; 
echo "<tr><td>" . $dude->getSalary() . "</td><td>" . $dude->calculateNetSalary() . "</td><td>" . $dude->getRole() . "</td></tr>";
echo "</table>";


echo "<br><br><br><hr><br><br><br>";


$p1 = new Product("Iron Dagger", 20, 4);
$p2 = new Product("Iron Sword", 50, 2);
$p3 = new Product("Bronze Sword", 35, 0);

echo "<table>";
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

echo "<h3 style='font-size: 3em;'>△Δ▲</h3>";

echo "<table'>";
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


$patient1 = new Patient("Samkelisiwe Cool Beans", 23);
$patient1->logConsultation("Drª Andréia Sias Rodrigues");
$patient1->setSymptoms(0, "Headache<br>Nausea");
$patient1->setDiagnosis(0, "Food Poisoning");
$patient1->setPrescription(0, "Rest & Stay Hydrated");
$patient1->setObservations(0, "PLEASE, <b>DO NOT EAT PURPLE SHRIMPS</b> EVER AGAIN!!!");

$patient1->displayConsultation();
echo "<br>";

$patient2 = new Patient("Emily Herber", 19);
$patient2->logConsultation("Dr Christoph Lauterbach", "06-09-23");
$patient2->setSymptoms(0, "Schläfrigkeit<br>Kopfschmerzen");
$patient2->setDiagnosis(0, "Schilddrüsenunterfunktion");  # Hypothyroidism
$patient2->setPrescription(0, "L-Thyroxin");

$patient2->displayAllConsultations();

$patient3 = new Patient("Ана София Романовна", 23);
$patient3->logConsultation("Др Дмитри Алексеевич", "09-01-24");  # Не "Алексёйвиц"
$patient3->setSymptoms(0, "Боль в Животе");
$patient3->setDiagnosis(0, "Запор");
$patient3->setPrescription(0, "Воду & Травяной Чай");  # Пить Воду & Пить Травяной Чай (не "всёрабно") все равно

$patient3->displayAllConsultations();

$patient1->logConsultation("Dr Fernando Augusto Treptow Brod");
$patient1->setSymptoms(1, "Severe Pain<br>Bone Bits Sticking Out");
$patient1->setDiagnosis(1, "Broken Tibia");
$patient1->setPrescription(1, "Paracetamol");
$patient1->setObservations(1, "PLEASE, <b>DO NOT SKATEBOARD ON A ROOFTOP</b> EVER AGAIN!!!");

$patient1->displayConsultation(1);


echo "<br><br><br><hr><br><br><br>";


$b1 = new Buch("Das Parfum", "Patrick Süskind", 263);
$b2 = new Buch("Aschenputtel", "Brüder Grimm", 49);
$b3 = new Buch("Der Froschkönig", "Brüder Grimm", 42);
$b4 = new Buch("Tintenherz", "Cornelia Funke", 576);
$b5 = new Buch("Rubinrot", "Kerstin Gier", 336);
$b6 = new Buch("Erebos", "Ursula Poznanski", 444);
$b7 = new Buch("Schneeweißchen und Rosenroth", "Brüder Grimm", 36);
$b8 = new Buch("Die 13½ Leben des Käpt'n Blaubär", "Walter Moers", 702);
$b9 = new Buch("Die Mitte der Welt", "Andreas Steinhofel", 458);
$b10 = new Buch("Die Bremer Stadtmusikanten", "Brüder Grimm", 24);
$b11 = new Buch("Rumo & Die Wunder im Dunkeln", "Walter Moers", 688);

Buch::alleBücherAnzeigen();

echo "<br>";

$b3->ausleihen();
$b4->ausleihen();
$b6->ausleihen();
$b8->ausleihen();
$b11->ausleihen();

Buch::alleBücherAnzeigen();

echo "<br>";

$b3->zurückgeben();
$b5->ausleihen();
$b6->zurückgeben();
$b7->ausleihen();
$b10->ausleihen();
$b11->zurückgeben();

Buch::alleBücherAnzeigen();

echo "<br><br><br><hr><br><br><br>";

?>