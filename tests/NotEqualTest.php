<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: NotEqual
 *
 * @package default
 * @author Luke Lanchester
 **/
class NotEqualTest extends PHPUnit_Framework_TestCase {


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
		$this->validator->add_rule('field', new Rule\NotEqual('rasmus'));
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
			array(array('field' => 'rasmus'), false),
			array(array('field' => ' rasmus'), true),
			array(array('field' => 'rasmus '), true),
			array(array('field' => 'RASMUS'), true),
			array(array('field' => 'lerdorf'), true),
		);
	} // end func: provider



} // end class: NotEqualTest