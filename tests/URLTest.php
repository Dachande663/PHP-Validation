<?php

include './autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

/**
 * Rule Test: URL
 *
 * @package default
 * @author Luke Lanchester
 **/
class URLTest extends PHPUnit_Framework_TestCase {


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

		$allowed_domains = array(
			'test.com',
			'www.test.com',
			'test2.com',
		);

		$this->validator = new Validator;
		$this->validator->add_rule('field', new Rule\URL($allowed_domains));

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
			array(array('field' => 'test@test.com'), false),

			array(array('field' => 'http://test.com'), true),
			array(array('field' => 'http://www.test.com'), true),
			array(array('field' => 'http://www.test.com/hello/world'), true),

			array(array('field' => 'http://test2.com'), true),
			array(array('field' => 'http://www.test2.com'), false),

			array(array('field' => 'https://test2.com'), true),
			array(array('field' => 'mailto://luke@lukelanchester.com'), false),
			array(array('field' => 'ftp://test.com'), false),

		);
	} // end func: provider



} // end class: URLTest