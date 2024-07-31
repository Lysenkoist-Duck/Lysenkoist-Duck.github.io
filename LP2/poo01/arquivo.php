<?php
class Circle {
	private $radius;

	public function __construct($radius) {
		$this->setRadius($radius);
	}

	public function getRadius() {
		return $this->radius;
	}

	public function setRadius($radius) {
		$this->radius = $radius;
	}

	public function calculateArea() {
		return round(pi() * ($this->getRadius() ** 2), 2);
	}

	public function calculatePerimeter() {
		return round(2 * pi() * $this->getRadius(), 2);
	}
}


class Rectangle {
	private $width;
	private $height;

	public function __construct($width, $height) {
		$this->setWidth($width);
		$this->setHeight($height);
	}

	public function getWidth() {
		return $this->width;
	}

	public function setWidth($width) {
		$this->width = $width;
	}

	public function getHeight() {
		return $this->height;
	}

	public function setHeight($height) {
		$this->height = $height;
	}

	public function calculateArea() {
		return $this->getWidth() * $this->getHeight();
	}

	public function calculatePerimeter() {
		return $this->getWidth() * 2 + $this->getHeight() * 2;
	}
}


class Student {
	private static $courseCount = [];
	private $name;
	private $course;
	private $registration;
	private $grades = [];

	public function __construct($name, $course) {
		$this->setName($name);
		$this->setCourse($course);

		if (!isset(self::$courseCount[$course])) {
			self::$courseCount[$course] = 0;
		}
		self::$courseCount[$course]++;
		$courseCount = base_convert(self::$courseCount[$course], 10, 16);  // Converting the course count to hexadecimal
		$courseCount = strtoupper($courseCount);  // Setting it to upper
		$courseCount = str_pad($courseCount, 3, '0', STR_PAD_LEFT);  // Padding with 0s to the left, so it looks nice and fine, also for logistical reasons but that doesn't matter.

		$cou = substr($course, 0, 3);  // Shortened course name
		$cou = strtoupper($cou);  // Changing it to uppercase

		$this->setRegistration($cou . "_" . "VG" . date("Y") . "_" . $courseCount);  // Concatenating everything to build a very fancy registration code! owo
		// if (rand(1, 100) <= 0) {
		// 	echo $this->registration . "<br>";
		// }
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getCourse() {
		return $this->course;
	}

	public function setCourse($course) {
		$this->course = $course;
	}

	public function getRegistration() {
		return $this->registration;
	}

	public function setRegistration($registration) {
		$this->registration = $registration;
	}

	# This was done in such an odd way cuz I started having ideas and only partly discarding them resulting in this complete mess,
	# but I learned quite a bit so I decided to keep it that way.
	public static function setGrade($student, $subject, $grade) {
		if (!array_key_exists($subject, $student->grades)) {
			$student->grades[$subject] = [];
		}
		$student->grades[$subject][] = $grade;
	}

	public function getGrade($subject = null, $grade = null) {
		if ($subject === null) {
			return $this->grades;
		} elseif (array_key_exists($subject, $this->grades)) {
			if ($grade === null) {
				$gradesList = '';
				foreach ($this->grades[$subject] as $key => $element) {
					$gradesIndex = $key + 1;
					$gradesList .= "$gradesIndex ➤ " . $element . "<br>";  # TODO: Improve, add proper English
				}
				return $gradesList;  # A string list of all grades for the specified subject.
			}
			else {
				return $this->grades[$subject][$grade];  # A string of a specific grade for the specified subject.
			}
		} else {
			return "No grades recorded for $subject.";
		}
	}

	public function viewSubjects($returnAsList = True) {
		if ($returnAsList) {
			$subjectsList = [];
			foreach ($this->grades as $key => $element) {
				$subjectsList[] = $element;
			}
			return $subjectsList;
		}
		else {
			$subjectsList = '';
			foreach ($this->grades as $key => $element) {
				$subjectsList .= $key . "<br>";
			}
			return $subjectsList;
		}
	}

	
	public function calculateMean($subject) {
		// foreach ($this->viewSubjects(true) as $key => $element) {
		// 	$subjectsList = $subjectsList . $element . "<br>";
		// }
		$gradesSum = 0;
		foreach ($this->grades[$subject] as $key => $element) {
			$gradesSum += $element;
		}

		$mean = $gradesSum / count($this->grades[$subject]);
		return $mean;
	}

	public function checkApproval($subject) {
		if ($this->calculateMean($subject) >= 6) {
			return True;
		}
		else {
			return False;
		}
	}
	
}


class Employee {
	private $name;
	private $salary;
	private $role;

	public function __construct($name, $salary, $role) {
		$this->setName($name);
		$this->setSalary($salary);  # Base Salary
		$this->setRole($role);
	}


	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getSalary() {
		return $this->salary;
	}

	public function setSalary($salary) {
		$this->salary = $salary;
	}

	public function getRole() {
		return $this->role;
	}

	public function setRole($role) {
		$this->role = $role;
	}

	public function calculateNetSalary($tax = 0.1, $benefits = 0.02, $ot = 2) {
		$netSalary = $this->getSalary();
		#PS: I assumed that the discounts were over his base salary.
		$netSalary -= $this->getSalary() * $tax;  # Discounting the taxes ;-;
		$netSalary -= $this->getSalary() * $benefits;  # Discounting the benefits ;u;
		
		# $overtimePay = $ot * 66.9;
		# $netSalary += overtimePay;

		return $netSalary;
	}
}


# TODO: Make it so they have a base price multiplied by a factor x which will change the price according to the amount that is available! This way it'll be moar realistical
class Product {
	private $name;
	private $price;
	private $quantity;

	public function __construct($name, $price, $quantity) {
		$this->setName($name);
		$this->setPrice($price);
		$this->setQuantity($quantity);
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getPrice() {
		return $this->price;
	}

	public function setPrice($price) {
		$this->price = $price;
	}

	public function getQuantity() {
		return $this->quantity;
	}

	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	public function calculateTotalValue() {
		$totalValue = $this->getPrice() * $this->getQuantity();
		return $totalValue;
	}

	public function verifyAvailability() {
<<<<<<< HEAD
		if ($this->getQuantity() > 0) {
=======
		# I'm aware I could have omitted the "> 0", but in case a bug happens and the quantity attribute goes negative, it would return true, which is among the worst-case scenarios from my humble perspective. Thus, I chose too keep it like this.
		if ($this->getQuantity() > 0) {
>>>>>>> 1ef26835c6f2ac44a7c97a151b70eb17c5c759b6
			return True;
		} else {
			return False;
		}
	}
}


class Triangle {
	private $side1;
	private $side2;
	private $side3;

	public function __construct($side1, $side2, $side3) {
		$this->setSide1($side1);
		$this->setSide2($side2);
		$this->setSide3($side3);
	}

	public function getSide1() {
		return $this->side1;
	}

	public function setSide1($side1) {
		$this->side1 = $side1;
	}

	public function getSide2() {
		return $this->side2;
	}

	public function setSide2($side2) {
		$this->side2 = $side2;
	}

	public function getSide3() {
		return $this->side3;
	}

	public function setSide3($side3) {
		$this->side3 = $side3;
	}

	public function validate() {
		$check1 = $this->getSide1() + $this->getSide2() > $this->getSide3();
		$check2 = $this->getSide1() + $this->getSide3() > $this->getSide2();
		$check3 = $this->getSide2() + $this->getSide3() > $this->getSide1();
		if ($check1 && $check2 && $check3) {
			return True;
		} else {
			return False;
		}
	}

	# TODO: Implement hyperbolic triangle math to account for the "invalid" triangles
	
	public function calculatePerimeter() {
		return $this->getSide1() + $this->getSide2() + $this->getSide3();
	}
	
	public function calculateArea() {
<<<<<<< HEAD
		$semiPerimeter = $this->calculatePerimeter() / 2;
		# TODO: Attempt using ** 0.5 instead
		$area = sqrt($semiPerimeter * ($semiPerimeter - $this->getSide1()) * ($semiPerimetro - $this->getSide2()) * ($semiPerimeter - $this->getSide3()));
		return $area;
=======
		if ($this->validate()) {
			$semiPerimeter = $this->calculatePerimeter() / 2;
			$area = sqrt($semiPerimeter * ($semiPerimeter - $this->getSide1()) * ($semiPerimeter - $this->getSide2()) * ($semiPerimeter - $this->getSide3()));
			return round($area, 2) . "<br>";
		}
		else {
			return "Non-Euclidean Triangle<br>";  # I believe the term "invalid" to be greatly offensive towards triangles.
		}
>>>>>>> 1ef26835c6f2ac44a7c97a151b70eb17c5c759b6
	}
}


# Car go brrr
class Car {
	private $brand;
	private $model;
	private $velocity;

	public function __construct($brand, $model, $velocity = 0) {
		$this->setBrand($brand);
		$this->setModel($model);
		$this->setVelocity($velocity);
	}

	public function getBrand() {
		return $this->brand;
	}

	public function setBrand($brand) {
		$this->brand = $brand;
	}

	public function getModel() {
		return $this->model;
	}

	public function setModel($model) {
		$this->model = $model;
	}

	public function getVelocity() {
		return $this->velocity;
	}

	public function setVelocity($velocity) {
		$this->velocity = $velocity;
	}

	public function getMeterPerSecond() {
		return round($this->getVelocity() / 3.6, 2);
	}

	public function getMilePerHour() {
		return round($this->getVelocity() / 1.609, 2);
	}

	public function viewVelocity() {
		static $t = 0;
		$t++;
		echo "<table class='brrr'>";
<<<<<<< HEAD
		echo "<tr><th colspan='3'> " . $this->getBrand() . . " " . $this->getModel() . " T$t</th></tr>";
=======
		echo "<tr><th colspan='3'>" . $this->getBrand() . " " . $this->getModel() . " T$t</th></tr>";
>>>>>>> 1ef26835c6f2ac44a7c97a151b70eb17c5c759b6
		echo "<tr><th>Km/h</th><th>mph</th><th>m/s</th></tr>";
		echo "<tr><div class='brrr'><td>" . $this->getVelocity() . "</td><td>" . $this->getMeterPerSecond() . "</td><td>" . $this->getMilePerHour() ."</td></div></tr>";
		echo "</table>";
	}

	public function accelerate($velocityGain, $measure = "Km/h") {
		# TODO: Implement the measure logic for the other measures as well.
		if ($measure === "Km/h") {
			# The invariant interval traversal rate of photonic propagation in a vacuum devoid of the warping of spacetime fabric influence
			$TheInvariantIntervalTraversalRateOfPhotonicPropagationInAVacuumDevoidOfTheWarpingOfSpacetimeFabricInfluence = 1079252848.8;  # In Km/h
			if ($this->getVelocity() + $velocityGain < $TheInvariantIntervalTraversalRateOfPhotonicPropagationInAVacuumDevoidOfTheWarpingOfSpacetimeFabricInfluence) {
				$this->setVelocity($this->getVelocity() + $velocityGain);
			}
			else {
				$this->setVelocity(
				$TheInvariantIntervalTraversalRateOfPhotonicPropagationInAVacuumDevoidOfTheWarpingOfSpacetimeFabricInfluence
				);
			}
		}
		$this->setVelocity(round($this->getVelocity(), 2));
	}

	public function decelerate($velocityLoss, $measure = "Km/h") {
		# TODO: Implement the measure logic for the other measures as well.
		if ($measure === "Km/h") {
			if ($velocityLoss < $this->getVelocity()) {
				$this->setVelocity($this->getVelocity() - $velocityLoss);
			}
			else {
				$this->setVelocity(0);
			}
		}
		$this->setVelocity(round($this->getVelocity(), 2));
	}
}


class Consultation {
	private $patientName;
	private $doctorName;
	private $date;
	private $symptoms;
	private $diagnosis;
	private $prescription;
	private $observations;
	public $colour;

	public static $colours = ["#9370DB", "#98FB98", "#FFB6C1"];
	public static $colourIndex = 0;
	
	public function __construct($patientName, $doctorName, $date = null) {
		$this->setPatientName($patientName);
		$this->setDoctorName($doctorName);
		if ($date) {
			$this->setDate($date);
		}
		else {
			$this->setDate(date("d-m-y"));
		}
		
		$this->setColour(self::$colours[0]);  # Likely needless but rn I'm too afraid to break anything so I decided to keep it in.
		$this->setColour(self::$colours[self::$colourIndex]);
		self::$colourIndex = (self::$colourIndex + 1) % count(self::$colours);  # It wasn't specified if class attributes should also receive getters and or setters, so...
	}

	public function getPatientName() {
		return $this->patientName;
	}

	public function setPatientName($patientName) {
		$this->patientName = $patientName;
	}

	public function getDoctorName() {
		return $this->doctorName;
	}

	public function setDoctorName($DoctorName) {
		$this->doctorName = $DoctorName;
	}

	public function getDate() {
		return $this->date;
	}
	
	public function setDate($date) {
		$this->date = $date;
	}
	
	public function getSymptoms() {
		return $this->symptoms;
	}
	
	public function setSymptoms($symptoms) {
		$this->symptoms = $symptoms;
	}
	
	public function getDiagnosis() {
		return $this->diagnosis;
	}
	
	public function setDiagnosis($diagnosis) {
		$this->diagnosis = $diagnosis;
	}
	
	public function getPrescription() {
		return $this->prescription;
	}
	
	public function setPrescription($prescription) {
		$this->prescription = $prescription;
	}
	
	public function getObservations() {
		return $this->observations;
	}
	
	public function setObservations($observations) {
		$this->observations = $observations;
	}

	public function getColour() {
		return $this->colour;
	}

	public function setColour($colour) {
		$this->colour = $colour;
	}

	public function display() {
		echo "<table class='medical-chart'>";
		echo "<tr><th style = 'background-color: {$this->getColour()}'>Patient Name</th><td style = 'background-color: {$this->getColour()}'>" . $this->getPatientName() . "</td></tr>";
		echo "<tr><th style = 'background-color: {$this->getColour()}'>Doctor Name</th><td style = 'background-color: {$this->getColour()}'>" . $this->getDoctorName() . "</td></tr>";
		echo "<tr><th style = 'background-color: {$this->getColour()}'>Date</th><td style = 'background-color: {$this->getColour()}'>" . $this->getDate() . "</td></tr>";
		echo "<tr><th style = 'background-color: {$this->getColour()}'>Symptoms</th><td style = 'background-color: {$this->getColour()}'>" . ($this->getSymptoms() ?? "N/A") . "</td></tr>";
		echo "<tr><th style = 'background-color: {$this->getColour()}'>Diagnosis</th><td style = 'background-color: {$this->getColour()}'>" . ($this->getDiagnosis() ?? "N/A") . "</td></tr>";
		echo "<tr><th style = 'background-color: {$this->getColour()}'>Prescription</th><td style = 'background-color: {$this->getColour()}'>" . ($this->getPrescription() ?? "N/A") . "</td></tr>";
		echo "<tr><th style = 'background-color: {$this->getColour()}'>Observations</th><td style = 'background-color: {$this->getColour()}'>" . ($this->getObservations() ?? "N/A") . "</td></tr>";
		echo "</table>";
	}
}


class Patient {
	private $name;
	private $age;  # Insert this attribute into the consultation history
	private $consultationHistory;

	public function __construct($name, $age, $consultationHistory = null) {
		$this->setName($name);
		$this->setAge($age);

		# I didn't define a setter for this one
		$this->consultationHistory = $consultationHistory ?? [];  # Null Coalescense Operator ♥♥♥
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getAge() {
		return $this->age;
	}

	public function setAge($age) {
		$this->age = $age;
	}

	# Unsure if this was the best approach...
	public function getConsultationHistory() {
		return $this->consultationHistory;
	}

	public function getConsultation($index) {
		return $this->getConsultationHistory([$index]);
	}

	public function setConsultationHistory($consultationHistory) {
		# Very much unlikely to be used, yes, but you never know!!!
		$this->consultationHistory = $consultationHistory;
	}

	public function setConsultation($index, $consultation) {
		# Very unlikely to be used, yes, but you never know!
		$this->consultationHistory[$index] = $consultation;
	}

	public function displayConsultation($index = 0)  /* Perhaps setting $index default value to 0 is a good practice I should replicate everywhere else in this class, butt I'm too lazy to do it at this point in time, specially since I already set it everywhere without a default value...*/ {
		$this->getConsultation($index)[0]->display();
	}

	public function displayAllConsultations() {
		foreach($this->getConsultationHistory() as $consultation) {
			$consultation->display();
			echo "<br>";
		}
	}

	public function logConsultation($doctorName, $date = null, $symptoms= null, $diagnosis = null, $prescription = null, $observations = null) {
		$this->consultationHistory[] = new Consultation(
			$this->getName(), $doctorName, $date, $symptoms, $diagnosis, $prescription, $observations
		);
	}

	public function getDoctorName($index) {
		return $this->getConsultation($index)[0]->getDoctorName();
	}
	
	public function setDoctorName($index, $doctorName) {
		$this->getConsultation($index)->setDoctorName($doctorName);
	}

	public function getDate($index) {
		return $this->getConsultation($index)->getDate();
	}
	
	public function setDate($index, $date) {
		$this->getConsultation($index)->setDate($date);
	}

	public function getSymptoms($index) {
		return $this->getConsultation($index)->getSymptoms();
	}
	
	public function setSymptoms($index, $symptoms) {
		$this->getConsultation($index)[0]->setSymptoms($symptoms);
	}

	public function getDiagnosis($index) {
		return $this->getConsultation($index)->getDiagnosis();
	}
	
	public function setDiagnosis($index, $diagnosis) {
		$this->getConsultation($index)[0]->setDiagnosis($diagnosis);
	}

	public function getPrescription($index) {
		return $this->getConsultation($index)->getPrescription();
	}
	
	public function setPrescription($index, $prescription) {
		$this->getConsultation($index)[0]->setPrescription($prescription);
	}

	public function getObservations($index) {
		return $this->getConsultation($index)->getObservations();
	}
	
	public function setObservations($index, $observations) {
		$this->getConsultation($index)[0]->setObservations($observations);
	}
}


class Buch {
	# Fancy excuse v1:
	# Please understand that due to the German grammar, I had to go against PHP's best code practices here, as I'm unable to commit grammar mistakes on purpose. Kind regards, Sammy-boy.

	# Fancy excuse v2:
	# Kindly note that due to the intricacies of German grammar, I was compelled to deviate from the best practices of PHP coding in this instance. My inability to intentionally make grammatical errors necessitated this course of action. I appreciate your understanding in this matter. Yours sincerely, Sammy-boy.

	private $Titel;
	private $Autor;
	private $Seitenzahl;
	private $Verfügbarkeit;
	private $Ausleihverlauf;

	private static $Bücher = [];

	public function __construct($Titel, $Autor, $Seitenzahl) {
		$this->setTitel($Titel);
		$this->setAutor($Autor);
		$this->setSeitenzahl($Seitenzahl);
		$this->setVerfügbarkeit(True);
		$this->setAusleihverlauf([]);

		self::$Bücher[] = $this;  # ♥  PS: I f♥cking lo♥e doing this sorta thing!
	}

	public function getTitel() {
		return $this->Titel;
	}

	public function setTitel($Titel) {
		$this->Titel = $Titel;
	}

	public function getAutor() {
		return $this->Autor;
	}

	public function setAutor($Autor) {
		$this->Autor = $Autor;
	}

	public function getSeitenzahl() {
		return $this->Seitenzahl;
	}

	public function setSeitenzahl($Seitenzahl) {
		$this->Seitenzahl = $Seitenzahl;
	}

	public function getVerfügbarkeit() {
		return $this->Verfügbarkeit;
	}

	public function setVerfügbarkeit($Verfügbarkeit) {
		$this->Verfügbarkeit = $Verfügbarkeit;
	}

	public function getAusleihverlauf() {
		return $this->Ausleihverlauf;
	}

	public function setAusleihverlauf($Ausleihverlauf) {
		$this->Ausleihverlauf = $Ausleihverlauf;
	}

	public function ausleihen() {
		$this->Ausleihverlauf[date("d-m-y") . $this->getTitel()] = "ausgeliehen";  # Yes, I'm aware I could have simply used boolean values instead,
		$this->setVerfügbarkeit(False);
	}

	public function zurückgeben() {
		$this->Ausleihverlauf[date("d-m-y") . $this->getTitel()] = "zurückgegeben";  # but we both know I enjoy going overboard!  >:D
		$this->setVerfügbarkeit(True);
	}
	
	public function prüfen() {
		return $this->getVerfügbarkeit();
	}

	public static function alleBücherAnzeigen() {
		echo "<table class='bücher-chart'>";
		echo "<tr><th>ID</th><th>Titel</th><th>Autor</th><th>Seitenzahl</th><th>Verfügbarkeit</th></tr>";
		foreach(self::$Bücher as $Buch) {

			# $colour = Consultation::$colours[Consultation::$colourIndex];
			# Consultation::$colourIndex = (Consultation::$colourIndex + 1) % count(Consultation::$colours);

			# echo "<tr style = 'background-color: $colour'><td>" . array_search($Buch, self::$Bücher) . "</td><td>" . $Buch->getTitel() . "</td><td>" . $Buch->getAutor() . "</td><td>" . $Buch->getSeitenzahl() ."</td><td>" . ($Buch->prüfen() ? "✔️" : "❌") . "</td></tr>";

			echo "<tr><td>" . array_search($Buch, self::$Bücher) . "</td><td>" . $Buch->getTitel() . "</td><td>" . $Buch->getAutor() . "</td><td>" . $Buch->getSeitenzahl() ."</td><td>" . ($Buch->prüfen() ? "✔️" : "❌") . "</td></tr>";
		}
		echo "</table>";
	}

}

?>