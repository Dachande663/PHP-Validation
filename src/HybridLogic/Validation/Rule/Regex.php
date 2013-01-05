<?php

namespace HybridLogic\Validation\Rule;

/**
 * Regex
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class Regex implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


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



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'php_regex';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return array(
			'php_regex' => $this->regex,
		);
	} // end func: jquery__get_rule_definition



	/**
	 * jQuery Validation method
	 *
	 * @return string JavaScript function
	 **/
	public function jquery__get_method_definition() {
		return 'function(value, element, regexp){

			var reg, slash, mod, re;

			reg = regexp.substr(1);
			slash = reg.indexOf("/");
			mod = reg.substr(slash + 1);
			reg = reg.substr(0, slash);

			re = new RegExp(reg, mod);
			return this.optional(element) || re.test(value);

		}';
	} // end func: jquery__get_method_definition



} // end class: Regex