<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: AlphaNumeric
 *
 * @package default
 * @author Luke Lanchester
 **/
class AlphaNumericTest extends PHPUnit_Framework_TestCase {


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
		$this->validator->add_rule('field', new Rule\AlphaNumeric());
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
			array(array(), true),
			array(array('field' => null), true),
			array(array('field' => ''), true),
			array(array('field' => 'abcd'), true),
			array(array('field' => '1234'), true),
			array(array('field' => 'abcd1234'), true),
			array(array('field' => '! $*'), false),
			array(array('field' => 'abc!'), false),
			array(array('field' => '!abc'), false),
			array(array('field' => 'abc!123'), false),
		);
	} // end func: provider



} // end class: AlphaNumericTest