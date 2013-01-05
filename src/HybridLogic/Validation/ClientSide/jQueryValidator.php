<?php

namespace HybridLogic\Validation\ClientSide;
use HybridLogic\Validation\ClientSide\jQueryValidationRule;

/**
 * jQuery Validation generator
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class jQueryValidator {


	/**
	 * @var Validator instance
	 **/
	protected $validator;


	/**
	 * Constructor
	 *
	 * @param Validator instance
	 * @return void
	 **/
	public function __construct($validator) {
		$this->validator = $validator;
	} // end func: __construct



	/**
	 * Return necessary Client Side Validation representation
	 *
	 * @return array Output
	 **/
	public function generate() {

		$methods   = array(); // Actual validation methods
		$rules     = array(); // Individual field rules
		$messages  = array(); // Field error messages
		$php_rules = $this->validator->get_rules();


		foreach($php_rules as $field_name => $field_rules) {

			$rules[$field_name] = array();

			foreach($field_rules as $rule) {

				if( ! ($rule instanceof jQueryValidationRule) ) continue;
				$rule_name = $rule->jquery__get_rule_name();


				if(!isset($methods[$rule_name])) {
					$method = method_exists($rule, 'jquery__get_method_definition') ? $rule->jquery__get_method_definition() : null;
					if($method) $methods[$rule_name] = $method;
				}


				$js_rule = $rule->jquery__get_rule_definition();

				if(is_array($js_rule)) {
					$rules[$field_name] = array_merge($rules[$field_name], $js_rule);
				} else {
					$rules[$field_name][$js_rule] = true;
				}


				$messages[$field_name][$rule_name] = $rule->get_error_message($field_name, null, $this->validator);

			}

			if(empty($rules[$field_name])) unset($rules[$field_name]);
			if(empty($messages[$field_name])) unset($messages[$field_name]);

		}


		return array(
			'rules'    => $rules,
			'messages' => $messages,
			'methods'  => $methods,
		);

	} // end func: generate



} // end class: jQueryValidator