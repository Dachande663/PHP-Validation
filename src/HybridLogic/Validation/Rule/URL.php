<?php

namespace HybridLogic\Validation\Rule;

/**
 * Validate a URL
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class URL implements \HybridLogic\Validation\Rule, \HybridLogic\Validation\ClientSide\jQueryValidationRule {


	/**
	 * @var array Allowed protocols
	 **/
	protected $allowed_domains;


	/**
	 * @var array Allowed protocols
	 **/
	protected $allowed_protocols = array('http', 'https');


	/**
	 * Constructor
	 *
	 * @param string Allowed domains
	 * @param string Allowed protocols
	 * @return void
	 **/
	public function __construct(array $allowed_domains = null, array $allowed_protocols = null) {
		if($allowed_domains !== null) $this->allowed_domains = $allowed_domains;
		if($allowed_protocols !== null) $this->allowed_protocols = $allowed_protocols;
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

		if(empty($value)) return false;
		if(!filter_var($value, FILTER_VALIDATE_URL)) return false;

		$url = parse_url($value);
		if(!in_array($url['scheme'], $this->allowed_protocols)) return false;

		if($this->allowed_domains === null) return true;

		return in_array($url['host'], $this->allowed_domains);

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
		return $validator->get_label($field) . ' must be a valid website address';
	} // end func: get_error_message



	/**
	 * jQuery Validation rule name
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name() {
		return 'url';
	} // end func: jquery__get_rule_name



	/**
	 * jQuery Validation rule definition
	 *
	 * @return array Rule
	 **/
	public function jquery__get_rule_definition() {
		return 'url';
	} // end func: jquery__get_rule_definition



} // end class: URL