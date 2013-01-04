<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: Email
 *
 * @package default
 * @author Luke Lanchester
 **/
class EmailTest extends PHPUnit_Framework_TestCase {


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
		$this->validator->add_rule('field', new Rule\Email());
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

			array(array('field' => 'test'), false),
			array(array('field' => 'test.com'), false),
			array(array('field' => 'www.test.com'), false),
			array(array('field' => 'test@test'), false),

			array(array('field' => 'test@test.com'), true),
			array(array('field' => 'test@test.co.uk'), true),
			array(array('field' => 'test.test@test.com'), true),
			array(array('field' => 'test+test@test.com'), true),

		);
	} // end func: provider



} // end class: EmailTest