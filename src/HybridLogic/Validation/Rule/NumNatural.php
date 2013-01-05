<?php

namespace HybridLogic\Validation\Rule;

/**
 * Input must be an integer zero or above
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class NumNatural implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator) {
		if(!ctype_digit($value)) return false;
		return $value >= 0;
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
		return $validator->get_label($field) . ' must be a whole number greather than or equal to zero';
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'php_numnatural';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return 'php_numnatural';
	} // end func: jquery__get_rule_definition



	/**
	 * jQuery Validation method
	 *
	 * @return string JavaScript function
	 **/
	public function jquery__get_method_definition() {
		return 'function(value, element){
			return this.optional(element) || /^[0-9]*$/i.test(value);
		}';
	} // end func: jquery__get_method_definition



} // end class: NumNatural