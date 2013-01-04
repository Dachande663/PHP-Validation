<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: True
 *
 * @package default
 * @author Luke Lanchester
 **/
class TrueTest extends PHPUnit_Framework_TestCase {


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
		$this->validator->add_rule('field', new Rule\True());
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
			array(array('field' => 'checked'), true),

			array(array('field' => 'true'), true),
			array(array('field' => true), true),

			array(array('field' => 'false'), true),
			array(array('field' => false), false),

			array(array('field' => 'null'), true),
			array(array('field' => null), false),

			array(array('field' => '1'), true),
			array(array('field' => 1), true),

			array(array('field' => '0'), false),
			array(array('field' => 0), false),
		);
	} // end func: provider



} // end class: TrueTest