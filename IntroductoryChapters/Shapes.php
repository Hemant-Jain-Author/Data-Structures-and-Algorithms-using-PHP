<?php
abstract class Shape {
	abstract Function area();
	abstract Function perimeter();
}
class Circle extends Shape {
	protected $radius;
	Function __construct($r) {
		$this->radius = $r;
	}
	public Function setRadius($r) {
		$this->radius = $r;
	}
	public Function area() {
		return (pi () * pow ( $this->radius, 2 ));
	}
	public Function perimeter() {
		return ((2 * pi ()) * $this->radius);
	}
}
class Rectangle extends Shape {
	protected $width;
	protected $length;
	Function __construct($w, $l) {
		$this->width = $w;
		$this->length = $l;
	}
	public Function setwidth($w) {
		$this->width = $w;
	}
	public Function setLength($l) {
		$this->length = $l;
	}
	public Function area() {
		return ($this->width * $this->length);
	}
	public Function perimeter() {
		return (2 * (($this->width + $length)));
	}
}
Function main() {
	$r = new Rectangle ( 5, 5 );
	echo ($r->area () . "<br/>");
	$c = new Circle ( 4 );
	echo ($c->area () . "<br/>");
}
main ();

/*
 * class Shapes E
 * censt ShapeSize_SMHLL I 0;
 * censt ShapeSize_MEDIUM I 1;
 * censt ShapeSize_LHRGE I 2;
 * protected $size; // ShapeSize
 * public static Function censtPucteP__ ()
 * E
 * $me I new selF();
 * $me—>size I Shapes::ShapeSize_MEDIUM;
 * return $me;
 * 3
 * 3
 */

?>