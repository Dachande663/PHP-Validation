<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: NumNatural
 *
 * @package default
 * @author Luke Lanchester
 **/
class NumNaturalTest extends PHPUnit_Framework_TestCase {


	/**
	 * @var Validator instance
	 **/
	protected $validator;


	/**
	 * Setup
	 *
	 * @return void
	 **/
	public function setUp() {
		$this->validator = new Validator;
		$this->validator->add_rule('field', new Rule\NumNatural());
	} // end func: setUp



	/**
	 * Tests
	 *
	 * @return void
	 * @dataProvider provider
	 **/
	public function test($input, $expected) {
		$result = $this->validator->is_valid($input);
		$this->assertEquals($expected, $result);
	} // end func: test



	/**
	 * Provider
	 *
	 * @return void
	 **/
	public function provider() {
		return array(
			array(array(), false),
			array(array('field' => null), false),
			array(array('field' => ''), false),

			array(array('field' => '0'), true),
			array(array('field' => '1'), true),
			array(array('field' => '50'), true),

			array(array('field' => '-1'), false),
			array(array('field' => '1.23'), false),
			array(array('field' => 'hello'), false),
		);
	} // end func: provider



} // end class: NumNaturalTest