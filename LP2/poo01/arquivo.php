<?php
class Circle {
	protected $radius;

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
	protected $radius;

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
	protected $name;
	protected $course;
	protected $registration;
	public $grades = [];

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

	public static function setGrade($student, $subject, $grade) {
		$subjectsGradesCounter = [];
		if (!isset($student->grades[$subject])) {
			if (!isset($subjectsGradesCounter[$subject])) {
				$subjectsGradesCounter[$subject] = 0;
			}
			$subjectsGradesCounter[$subject]++;

			$student->grades[$subject] = [];
		}
		$student->grades[$subject][$subjectsGradesCounter[$subject]] = $grade;
	}

	public function getGrade($subject = null, $grade) {  # TODO: Do the same thing done for $subject to $grade
		if ($subject === null) {
			return $this->grades;
		} elseif (array_key_exists($subject, $this->grades)) {
			return $this->grades[$subject];  # TODO: Make it a nice print since it'll be a list, ideally fancily ordered
		} else {
			return "No grades recorded for $subject.";
		}
	}

	/*
	public function calculateArea() {
		return pi() * ($this->getRadius() ** 2);
	}
	*/
}

?>