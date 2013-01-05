<?php

namespace HybridLogic\Validation\Rule;

/**
 * Number must be greater than or equal to value
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class NumMin implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var int Min value
	 **/
	protected $min = 0;


	/**
	 * Constructor
	 *
	 * @param int Min value
	 * @return void
	 **/
	public function __construct($min) {
		$this->min = (int) $min;
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
		$value = (int) $value;
		return $value >= $this->min;
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
		return $validator->get_label($field) . " must be greater than or equal to {$this->min}";
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'min';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return array(
			'min' => $this->min,
		);
	} // end func: jquery__get_rule_definition



} // end class: NumMin