<?php

namespace HybridLogic\Validation\Rule;

/**
 * Ensure one string exactly matches another
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class Matches implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var string Field to compare against
	 **/
	protected $compare_against;


	/**
	 * Constructor
	 *
	 * @param string Field to compare against
	 * @return void
	 **/
	public function __construct($compare_against) {
		$this->compare_against = $compare_against;
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
		$value2 = $validator->get_data($this->compare_against);
		return $value === $value2;
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
		return $validator->get_label($field) . ' must match ' . $validator->get_label($this->compare_against);
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'equalTo';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return array(
			'equalTo' => "[name='{$this->compare_against}']",
		);
	} // end func: jquery__get_rule_definition



} // end class: Matches