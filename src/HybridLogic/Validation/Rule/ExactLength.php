<?php

namespace HybridLogic\Validation\Rule;

/**
 * String must be exact length
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class ExactLength implements \HybridLogic\Validation\Rule {


	/**
	 * @var int Length
	 **/
	protected $length = 0;


	/**
	 * Constructor
	 *
	 * @param int Length
	 * @return void
	 **/
	public function __construct($length) {
		$this->length = (int) $length;
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
		return strlen($value) === $this->length;
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
		return $validator->get_label($field) . " must be exactly {$this->length} characters in length";
	} // end func: get_error_message



} // end class: ExactLength