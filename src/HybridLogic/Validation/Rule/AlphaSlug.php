<?php

namespace HybridLogic\Validation\Rule;

/**
 * Only characters a-z, 0-9, - and _
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class AlphaSlug implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var string Pattern to allow
	 **/
	protected $regex = '/^[a-z0-9-_]*$/i';


	/**
	 * Validate this Rule
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param Validator Validator object
	 * @return bool True if rule passes
	 **/
	public function validate($field, $value, $validator) {
		if(empty($value)) return true;
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
		return $validator->get_label($field) . ' can contain all letters, numbers, hyphens and underscores';
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'php_alphaslug';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return 'php_alphaslug';
	} // end func: jquery__get_rule_definition



	/**
	 * jQuery Validation method
	 *
	 * @return string JavaScript function
	 **/
	public function jquery__get_method_definition() {
		return 'function(value, element){
			return this.optional(element) || ' . $this->regex . '.test(value);
		}';
	} // end func: jquery__get_method_definition



} // end class: AlphaSlug