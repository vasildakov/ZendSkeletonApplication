<?php
namespace Soap\Service;

class TestClass {

	/**
	 * This is a simple test method 1
	 * @param   double  $arg1
	 * @return  string  $result
	 */
	public function myFunction($arg1) {
		return "you post ".$arg1;
		// return array('vasil', 1, "malta", 123);
	}

	/**
	 * This is a simple test method 2
	 * @param  int      $arg1
	 * @param  float      $arg2
	 * @return array    $result
	 */
	public function myFunction2($arg1, $arg2) {
		return array('arg1' => $arg1, 'arg2' => $arg2);
	}


	/**
	 * This is a simple test method 3
	 * @param  int     $arg1
	 * @param  int     $arg2
	 * @param  string  $arg3
	 * @return array   $result
	 */
	public function myFunction3($arg1, $arg2, $arg3) {
		return array('result 3');
	}

}