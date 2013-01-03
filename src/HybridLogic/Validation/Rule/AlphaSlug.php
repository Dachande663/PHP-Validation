<?php

namespace HybridLogic\Validation\Rule;

/**
 * Only characters a-z, 0-9, - and _
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class AlphaSlug implements \HybridLogic\Validation\Rule {


	/**
	 * Constructor
	 *
	 * @return void
	 **/
	public function __construct() {
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
		return (preg_replace('/[^a-zA-Z0-9-_]/', '', $value) === $value);
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



} // end class: AlphaSlug