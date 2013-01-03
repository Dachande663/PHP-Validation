<?php

namespace HybridLogic\Validation\Rule;

/**
 * Validate a URL
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class URL implements \HybridLogic\Validation\Rule {


	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator) {

		if(substr($value, 0, 7) !== 'http://' or substr($value, 0, 8) !== 'https://') {
			$value = "http://$value";
		}

		return (bool) filter_var($value, FILTER_VALIDATE_URL);

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
		return $validator->get_label($field) . ' must be a valid website address';
	} // end func: get_error_message



} // end class: URL