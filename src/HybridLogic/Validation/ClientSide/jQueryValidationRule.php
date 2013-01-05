<?php

namespace HybridLogic\Validation\ClientSide;

/**
 * jQuery Validation Rule
 *
 * A Rule implementing this interface asserts that it can
 * be used as part of a jQuery Validation method.
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
interface jQueryValidationRule {


	/**
	 * jQuery Validation rule name
	 *
	 * This is the name of the rule within jQuery
	 * validation e.g. minlength. Custom names can also be
	 * provied, but jquery__method must return the
	 * necessary function to validate against.
	 *
	 * @return string Rule name
	 **/
	public function jquery__get_rule_name();



	/**
	 * jQuery Validation rule definition
	 *
	 * Define the state a field must be in to validate
	 * successfully. Returning a string will create a JSON
	 * key with a true value, otherwise arrays will be
	 * merged. E.g.
	 *
	 * return 'required'
	 *   => { required: true }
	 *
	 * return array('minlength' => 5)
	 *   => { minlength: 5 }
	 *
	 * @return void
	 **/
	public function jquery__get_rule_definition();



	/**
	 * jQuery Validation method [OPTIONAL]
	 *
	 * For custom rules, return the function body within
	 * this method. Note that functions must not be unique
	 * to a single field instance.
	 *
	 * Return null to skip.
	 *
	 * @return string JavaScript function
	 **/
	// public function jquery__get_method_definition();



} // end interface: jQueryValidationRule