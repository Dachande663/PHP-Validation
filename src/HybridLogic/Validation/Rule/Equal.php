<?php

namespace HybridLogic\Validation\Rule;

/**
 * Field value must match Equal value
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class Equal implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var string Value to compare against
	 **/
	protected $value;


	/**
	 * Constructor
	 *
	 * @param string Value to compare against
	 * @return void
	 **/
	public function __construct($value) {
		$this->value = $value;
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
		return $value === $this->value;
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
		return $validator->get_label($field) . ' must match the expected value';
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'php_equal';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return array(
			'php_equal' => $this->value,
		);
	} // end func: jquery__get_rule_definition



	/**
	 * jQuery Validation method
	 *
	 * @return string JavaScript function
	 **/
	public function jquery__get_method_definition() {
		return 'function(value, element, expected){
			return this.optional(element) || (value === expected);
		}';
	} // end func: jquery__get_method_definition



} // end class: Equal