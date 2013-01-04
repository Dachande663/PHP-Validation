<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: InArray
 *
 * @package default
 * @author Luke Lanchester
 **/
class InArrayTest extends PHPUnit_Framework_TestCase {


	/**
	 * Tests
	 *
	 * @return void
	 * @dataProvider provider
	 **/
	public function test($input, $expected) {

		$array = array(
			'jan',
			'feb',
			'mar',
			'apr',
			'jun',
		);

		$validator = new Validator;
		$validator->add_rule('field', new Rule\InArray($array));

		$result = $validator->is_valid($input);
		$this->assertEquals($expected, $result);

	} // end func: test



	/**
	 * Tests Keys
	 *
	 * @return void
	 * @dataProvider provider
	 **/
	public function testKeys($input, $expected) {

		$array = array(
			'jan' => 'january',
			'feb' => 'february',
			'mar' => 'march',
			'apr' => 'april',
			'jun' => 'june',
		);

		$validator = new Validator;
		$validator->add_rule('field', new Rule\InArray($array, $match_keys = true));

		$result = $validator->is_valid($input);
		$this->assertEquals($expected, $result);

	} // end func: testKeys



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

			array(array('field' => 'jan'), true),
			array(array('field' => 'mar'), true),
			array(array('field' => 'jun'), true),

			array(array('field' => 'dec'), false),
			array(array('field' => 'january'), false),
			array(array('field' => 'random'), false),

		);
	} // end func: provider



} // end class: InArrayTest