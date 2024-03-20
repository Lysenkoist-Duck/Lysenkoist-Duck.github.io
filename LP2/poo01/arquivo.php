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
	protected $grades = [];

	public function __construct($name, $course) {
		$this->name = $name;
		$this->course = $course;
		// 20241VG.CTB_EAD0702
		// strtoupper(substr($job, 0, 3))  // upper & sub string

		/*
		$number = 12345;
		$alphadecimal = base_convert($number, 10, 36);
		*/

		if (!isset(self::$jobCount[$job])) {
            self::$jobCount[$job] = 0;
        }
        self::$jobCount[$job]++;

		$this->registration = $course . date("y") . "_" . str_pad(self::$courseCount[$course], 3, '0', STR_PAD_LEFT);
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

	/*public function calculateArea() {
		return pi() * ($this->getRadius() ** 2);
	}
	*/
}

?>
