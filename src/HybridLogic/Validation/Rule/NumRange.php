<?php

namespace HybridLogic\Validation\Rule;

/**
 * NumRange
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class NumRange implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var int Min value
	 **/
	protected $min = 0;


	/**
	 * @var int Max value
	 **/
	protected $max = 0;


	/**
	 * Constructor
	 *
	 * @param int Min value
	 * @param int Max value
	 * @return void
	 **/
	public function __construct($min, $max) {
		$this->min = (int) $min;
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
		$value = (int) $value;
		return ($value >= $this->min and $value <= $this->max);
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
		return $validator->get_label($field) . " must be between {$this->min} and {$this->max}";
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'range';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return array(
			'range' => array($this->min, $this->max),
		);
	} // end func: jquery__get_rule_definition



} // end class: NumRange