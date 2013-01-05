<?php

namespace HybridLogic\Validation\Rule;

/**
 * Validate an email address
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class Email implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator) {
		return (bool) filter_var($value, FILTER_VALIDATE_EMAIL);
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
		return $validator->get_label($field) . ' must be a valid email address';
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'email';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return void
	 **/
	public function jquery__get_rule_definition() {
		return 'email';
	} // end func: jquery__get_rule_definition



} // end class: Email