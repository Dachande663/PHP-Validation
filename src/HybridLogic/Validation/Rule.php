<?php

namespace HybridLogic\Validation;

/**
 * Validation Rule interface
 *
 * A generic Rule that asserts whether the given validation
 * data is valid or not.
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
interface Rule {


	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator);



	/**
	 * Return error message for this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return string Error message
	 **/
	public function get_error_message($field, $value, $validator);



} // end interface: Rule