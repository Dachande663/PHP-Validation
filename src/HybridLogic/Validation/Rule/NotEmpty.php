<?php

namespace HybridLogic\Validation\Rule;

/**
 * Input value cannot be empty
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class NotEmpty implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator) {
		return !empty($value);
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
		return $validator->get_label($field) . ' must not be empty';
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'required';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return 'required';
	} // end func: jquery__get_rule_definition



} // end class: NotEmpty