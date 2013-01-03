<?php

namespace HybridLogic\Validation\Rule;

/**
 * Input must be a valid number e.g. -99 or 123.45
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class Number implements \HybridLogic\Validation\Rule {


	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator) {
		return is_numeric($value);
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
		return $validator->get_label($field) . ' must be a number';
	} // end func: get_error_message



} // end class: Number