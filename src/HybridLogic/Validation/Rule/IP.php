<?php

namespace HybridLogic\Validation\Rule;

/**
 * Input value must be a valid IPv4 or v6 address
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class IP implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


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



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'php_ip';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return 'php_ip';
	} // end func: jquery__get_rule_definition



	/**
	 * jQuery Validation method
	 *
	 * @return string JavaScript function
	 **/
	public function jquery__get_method_definition() {
		return 'function(value, element){
			return this.optional(element) || /\b(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\b/.test(value);
		}';
	} // end func: jquery__get_method_definition



} // end class: IP