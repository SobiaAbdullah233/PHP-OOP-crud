<?php

class Person {
	public string $name;
	public string $height;
	public string $weight;
	// protected \DateTime $dob;
	protected  $dob;

	public function __construct($name, $height, $weight, $dob) {
		$this->name 	= $name;
		$this->height 	= $height;
		$this->weight 	= $weight;
		$this->dob 		= $dob;
	}

	public function getAge() {
		// return Date("Y") - $this->dob->format("Y");
		return Date("Y-m-d", strtotime($this->dob));
	}

	public function toString() {
		return $this->name .  " | " . $this->height . " | " . $this->weight . " | " . $this->dob->format("Y-m-d");
	}
}