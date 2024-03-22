<?php
class Circle {
	private $radius;

	public function __construct($radius) {
		$this->radius = $radius;
	}

	public function getRadius() {
		return $this->radius;
	}

	public function setRadius($radius) {
		$this->radius = $radius;
	}

	public function calculateArea() {
		return pi() * ($this->getRadius() ** 2);
	}

	public function calculatePerimeter() {
		return 2 * pi() * $this->getRadius();
	}
}


class Rectangle {
	private $width;
	private $height;

	public function __construct($width, $height) {
		$this->width = $width;
		$this->height = $height;
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
		$this->name = $name;
		$this->course = $course;

		if (!isset(self::$courseCount[$course])) {
			self::$courseCount[$course] = 0;
		}
		self::$courseCount[$course]++;
		$courseCount = base_convert(self::$courseCount[$course], 10, 16);  // Converting the course count to hexadecimal
		$courseCount = strtoupper($courseCount);  // Setting it to upper
		$courseCount = str_pad($courseCount, 3, '0', STR_PAD_LEFT);  // Padding with 0s to the left.

		$cou = substr($course, 0, 3);  // Shortened course name
		$cou = strtoupper($cou);  // Setting it to upper

		$this->registration = $cou . "_" . "VG" . date("Y") . "_" . $courseCount;  // Concatenating everything to build a very fancy registration! owo
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
					$gradesList .= "$gradesIndex ➤ " . $element . "<br>";  # TODO: Improve
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

	public function viewSubjects($returnAsList = true) {
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
		$this->name = $name;
		$this->salary = $salary;  # Base Salary
		$this->role = $role;
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
		$netSalary -= $this->salary * $tax;  # Discounting the taxes ;-;
		$netSalary -= $this->salary * $benefits;  # Discounting the benefits ;u;
		
		# $overtimePay = $ot * 66.9;
		# $netSalary += overtimePay;
		return $netSalary;
	}
}


class Product {
	private $name;
	private $price;
	private $quantity;

	public function __construct($name, $price, $quantity) {
		$this->name = $name;
		$this->price = $price;
		$this->quantity = $quantity;
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
		$totalValue = $this->price * $this->quantity;
		return $totalValue;
	}

	public function verifyAvailability() {
		if ($this->quantity > 0) {
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
		$this->side1 = $side1;
		$this->side2 = $side2;
		$this->side3 = $side3;
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
		$check1 = $this->side1 + $this->side2 > $this->side3;
		$check2 = $this->side1 + $this->side3 > $this->side2;
		$check3 = $this->side2 + $this->side3 > $this->side1;
		if ($check1 && $check2 && $check3) {
			return True;
		} else {
			return False;
		}
	}

	public function calculatePerimeter() {
		return $this->side1 + $this->side2 + $this->side3;
	}
	
	public function calculateArea() {
		$semiPerimeter = $this->calculateArea() / 2;
		# TODO: Attempt using ** 0.5 instead
		$area = sqrt($semiPerimeter * ($semiPerimeter - $this->side1) * ($semiPerimetro - $this->side2) * ($semiPerimeter - $this->side3));
		return $area;
	}
}


# Car go brrr
class Car {
	private $brand;
	private $model;
	private $velocity;

	public function __construct($brand, $model, $velocity = 0) {
		$this->brand = $brand;
		$this->model = $model;
		$this->velocity = $velocity;
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
		echo "<table class='brrr' style='border: none;'>";
		echo "<tr><th colspan='3'>$this->brand $this->model T$t</th></tr>";
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
?>