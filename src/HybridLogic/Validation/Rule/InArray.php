<?php

namespace HybridLogic\Validation\Rule;

/**
 * Ensure input value is in supplied array
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class InArray implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var array Array to match against
	 **/
	protected $array;


	/**
	 * @var bool If true, match against keys not values
	 **/
	protected $match_keys;


	/**
	 * Constructor
	 *
	 * @return void
	 **/
	public function __construct(array $array, $match_keys = false) {
		$this->array = $array;
		$this->match_keys = (bool) $match_keys;
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
		if($this->match_keys === true) {
			return array_key_exists($value, $this->array);
		} else {
			return in_array($value, $this->array);
		}
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
		return $validator->get_label($field) . ' must be in the available list of options';
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'php_inarray';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {

		$keys = $this->match_keys ? array_keys($this->array) : array_values($this->array);
		$array = array_fill_keys($keys, 1);

		return array(
			'php_inarray' => $array,
		);
	} // end func: jquery__get_rule_definition



	/**
	 * jQuery Validation method
	 *
	 * @return string JavaScript function
	 **/
	public function jquery__get_method_definition() {
		return 'function(value, element, keys){
			return this.optional(element) || (value in keys);
		}';
	} // end func: jquery__get_method_definition



} // end class: InArray