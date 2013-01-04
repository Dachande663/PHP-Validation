<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: Matches
 *
 * @package default
 * @author Luke Lanchester
 **/
class MatchesTest extends PHPUnit_Framework_TestCase {


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
		$this->validator->add_rule('field', new Rule\Matches('other_field'));
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
			array(array('other_field' => null), true),
			array(array('field' => '', 'other_field' => ''), true),
			array(array('field' => 'test'), false),
			array(array('other_field' => 'test'), false),
			array(array('field' => 'test', 'other_field' => 'test'), true),
			array(array('field' => 'test', 'other_field' => 'TEST'), false),
		);
	} // end func: provider



} // end class: MatchesTest