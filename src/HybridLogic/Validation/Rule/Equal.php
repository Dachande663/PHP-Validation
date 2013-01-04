<?php

namespace HybridLogic\Validation\Rule;

/**
 * Field value must match Equal value
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class Equal implements \HybridLogic\Validation\Rule {


	/**
	 * @var string Value to compare against
	 **/
	protected $value;


	/**
	 * Constructor
	 *
	 * @param string Value to compare against
	 * @return void
	 **/
	public function __construct($value) {
		$this->value = $value;
	} // end func: __construct



	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator) {
		return $value === $this->value;
	} // end func: validate



	/**
	 * Return error message for this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return string Error message
	 **/
	public function get_error_message($field, $value, $validator) {
		return $validator->get_label($field) . ' must match the expected value';
	} // end func: get_error_message



} // end class: Equal