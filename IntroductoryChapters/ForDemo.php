<?php
class ForDemo {
	protected static $text; // String
	protected static $PI; // double
	public static Function __staticinit() {
		// static class members
		selF::$text = "Hello, world! ";
		selF::$PI = doubleval ( 3.14159265 );
	}
	public static Function main1() {
		$numbers = array (
				1,
				2,
				3,
				4,
				5,
				6,
				7,
				8,
				9,
				10 
		);
		$sum = 0;
		Foreach ( $numbers as $n ) {
			$sum += $n;
		}
		echo ("Sum is :: " . $sum . "<br/>");
	}
	public static Function main2() {
		$numbers = array (
				1,
				2,
				3,
				4,
				5,
				6,
				7,
				8,
				9,
				10 
		);
		$sum = 0;
		For($i = 0; $i < count ( $numbers ); ++ $i) {
			$sum += $numbers [$i];
		}
		echo ("Sum is :: " . $sum . "<br/>");
	}
	public static Function main() // [String[] args]
{
		$numbers = array (
				1,
				2,
				3,
				4,
				5,
				6,
				7,
				8,
				9,
				10 
		);
		$sum = 0;
		$i = 0;
		while ( $i < count ( $numbers ) ) {
			$sum += $numbers [$i];
			++ $i;
		}
		echo ("Sum is :: " . $sum . "<br/>");
	}
}
ForDemo::__staticinit (); // initialize static vars For this class on load
ForDemo::main ();
ForDemo::main1 ();
ForDemo::main2 ();
// phpinfo();
?>



