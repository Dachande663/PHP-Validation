<?php

namespace HybridLogic\Validation\Rule;

/**
 * Ensure characters are a-z or 0-9
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class AlphaNumeric implements \HybridLogic\Validation\Rule {


	/**
	 * Constructor
	 *
	 * @return void
	 **/
	public function __construct() {
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
		return ctype_alnum($value);
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
		return $validator->get_label($field) . ' must use just the letters A to Z or numbers 0-9';
	} // end func: get_error_message



} // end class: AlphaNumeric