<?php

namespace HybridLogic\Validation\Rule;

/**
 * Number must be less or equal to value
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class NumMax implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var int Max value
	 **/
	protected $max = 0;


	/**
	 * Constructor
	 *
	 * @param int Max value
	 * @return void
	 **/
	public function __construct($max) {
		$this->max = (int) $max;
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
		if(strlen($value) === 0) return false;
		$value = (int) $value;
		return $value <= $this->max;
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
		return $validator->get_label($field) . " must be less than or equal to {$this->max}";
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'max';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return array(
			'max' => $this->max,
		);
	} // end func: jquery__get_rule_definition



} // end class: NumMax