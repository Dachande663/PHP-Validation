<?php

namespace HybridLogic\Validation\Rule;

/**
 * Value must evaulate to truth
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class True implements \HybridLogic\Validation\Rule {


	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator) {
		return (bool) $value;
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
		return $validator->get_label($field) . ' must be checked';
	} // end func: get_error_message



} // end class: True