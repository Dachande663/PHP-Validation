<?php

namespace HybridLogic\Validation\Rule;

/**
 * Input must be a minimum of length
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class MinLength implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var int Min length
	 **/
	protected $length = 0;


	/**
	 * Constructor
	 *
	 * @param int Min length
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
		return strlen($value) >= $this->length;
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
		return $validator->get_label($field) . " must be at least {$this->length} characters in length";
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'minlength';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return array(
			'minlength' => $this->length,
		);
	} // end func: jquery__get_rule_definition



} // end class: MinLength