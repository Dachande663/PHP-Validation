<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Validator Tests
 *
 * @package default
 * @author Luke Lanchester
 **/
class ValidatorTest extends PHPUnit_Framework_TestCase {


	/**
	 * Test Label set
	 *
	 * @return void
	 **/
	public function testLabelSet() {

		$validator = new Validator;
		$validator->set_label('field1', 'field one');

		$this->assertEquals('field one', $validator->get_label('field1'));

	} // end func: testLabelSet



	/**
	 * Test Label generate
	 *
	 * @return void
	 **/
	public function testLabelGenerated() {

		$validator = new Validator;
		$validator->add_rule('another_field', new Rule\NotEmpty());

		$this->assertEquals('another field', $validator->get_label('another_field'));

	} // end func: testLabelGenerated



	/**
	 * Test Empty Validator
	 *
	 * @return void
	 **/
	public function testEmptyValidator() {

		$validator = new Validator;
		$result = $validator->is_valid(array());

		$this->assertTrue($result);
		$this->assertCount(0, $validator->get_data());
		$this->assertCount(0, $validator->get_errors());

	} // end func: testEmptyValidator



	/**
	 * Test Filters
	 *
	 * @return void
	 **/
	public function testFilters() {

		$validator = new Validator;

		$validator->add_filter('field1', 'trim');
		$validator->add_filter('field2', 'strrev');
		$validator->add_filter('field2', 'strtoupper');

		$result = $validator->is_valid(array(
			'field1' => ' hello world ',
			'field2' => 'abcd',
		));

		$this->assertTrue($result);

		$expected = array(
			'field1' => 'hello world',
			'field2' => 'DCBA',
		);

		$this->assertEquals($expected, $validator->get_data());
		$this->assertCount(0, $validator->get_errors());

	} // end func: testFilters



	/**
	 * Test Rules
	 *
	 * @return void
	 * @dataProvider providerRules
	 **/
	public function testRules($input, $expected) {

		$validator = new Validator;

		$validator->add_rule('field1', new Rule\NotEmpty());

		$validator->add_rule('field2', new Rule\MinLength(5));
		$validator->add_rule('field2', new Rule\MaxLength(10));

		$result = $validator->is_valid($input);
		$this->assertEquals($expected, $result);

	} // end func: testEmptyValidator



	/**
	 * Provider Rules
	 *
	 * @return array Data
	 **/
	public function providerRules() {
		return array(
			array(array(), false),
			array(array('wrong_field' => 'test'), false),
			array(array('field1' => 'test'), false),
			array(array('field2' => 'testtest'), false),
			array(array('field1' => 'test', 'field2' => 'testtest'), true),
		);
	} // end func: providerRules



} // end class: ValidatorTest