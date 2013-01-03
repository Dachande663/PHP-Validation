<?php

namespace HybridLogic\Validation\Rule;

/**
 * Input value must be a valid IPv4 or v6 address
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class IP implements \HybridLogic\Validation\Rule {


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
		return (bool) filter_var($value, FILTER_VALIDATE_IP);
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
		return $validator->get_label($field) . ' must be a valid IP address';
	} // end func: get_error_message



} // end class: IP