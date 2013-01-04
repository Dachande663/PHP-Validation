<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: Equal
 *
 * @package default
 * @author Luke Lanchester
 **/
class EqualTest extends PHPUnit_Framework_TestCase {


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
		$this->validator->add_rule('field', new Rule\Equal('rasmus'));
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
			array(array('field' => 'rasmus'), true),
			array(array('field' => ' rasmus'), false),
			array(array('field' => 'rasmus '), false),
			array(array('field' => 'RASMUS'), false),
			array(array('field' => 'lerdorf'), false),
		);
	} // end func: provider



} // end class: EqualTest