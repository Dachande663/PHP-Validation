<?php

namespace HybridLogic\Validation\Rule;

/**
 * Regex
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class Regex implements \HybridLogic\Validation\Rule {


	/**
	 * @var string Regex to validate against
	 **/
	protected $regex;


	/**
	 * Constructor
	 *
	 * @return void
	 **/
	public function __construct($regex) {
		$this->regex = $regex;
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
		return (bool) preg_match($this->regex, $value);
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
		return $validator->get_label($field) . ' did not match the expected pattern';
	} // end func: get_error_message



} // end class: Regex