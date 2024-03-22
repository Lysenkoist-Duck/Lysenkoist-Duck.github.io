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
					$gradesList .= "$gradesIndex ➤ " . $element . "<br>";
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

?>