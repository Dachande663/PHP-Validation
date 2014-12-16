<?php

namespace HybridLogic\Validation;

/**
 * Validator
 *
 * A Validator contains a set of validation rules and
 * associated metadata for ensuring that a given dataset
 * is valid and returned correctly.
 *
 * @package Validation
 * @author Luke Lanchester <luke@lukelanchester.com>
 **/
class Validator {


	/**
	 * @var array Data to validate
	 **/
	protected $data;


	/**
	 * @var array Labels
	 **/
	protected $labels = array();


	/**
	 * @var array Filters
	 **/
	protected $filters = array();


	/**
	 * @var array Rules
	 **/
	protected $rules = array();


	/**
	 * Set the Label for a given Field
	 *
	 * @param string Field name
	 * @param string Field label
	 * @return self
	 **/
	public function set_label($field, $label) {
		$this->labels[$field] = $label;
		return $this;
	} // end func: set_label



	/**
	 * Get field label
	 *
	 * @return string Label
	 **/
	public function get_label($field) {
		return isset($this->labels[$field]) ? $this->labels[$field] : $this->humanize_field_name($field);
	} // end func: get_label



	/**
	 * Add a Filter to this Field
	 *
	 * @param string Field name
	 * @param callable Filter callback
	 * @return self
	 **/
	public function add_filter($field, $filter) {

		if(!is_callable($filter)) return $this;

		if(!isset($this->filters[$field])) $this->filters[$field] = array();
		$this->filters[$field][] = $filter;

		return $this;

	} // end func: add_filter



	/**
	 * Add a Rule to this Field
	 *
	 * @param string Field name
	 * @param callable Validation rule
	 * @return self
	 **/
	public function add_rule($field, $rule) {

		if(!$rule instanceof \HybridLogic\Validation\Rule) return $this;

		if(!isset($this->labels[$field])) {
			$this->set_label($field, $this->humanize_field_name($field));
		}

		if(!isset($this->rules[$field])) $this->rules[$field] = array();
		$this->rules[$field][] = $rule;

		return $this;

	} // end func: add_rule



	/**
	 * Return all currently defined rules
	 *
	 * @return array Rules
	 **/
	public function get_rules() {
		return $this->rules;
	} // end func: get_rules



	/**
	 * Validate this object!
	 *
	 * @param array Input data to validate
	 * @return bool True if valid
	 **/
	public function is_valid(array $data) {

		$this->data = $this->apply_filters($data);

		$this->errors = $this->test_rules();

		return empty($this->errors);

	} // end func: is_valid



	/**
	 * Return validated data
	 *
	 * @param string Return just a single field
	 * @param mixed Default value
	 * @return array Field data
	 **/
	public function get_data($field = null, $default = null) {
		if($field === null) return $this->data;
		return array_key_exists($field, $this->data) ? $this->data[$field] : $default;
	} // end func: get_data



	/**
	 * Return any errors
	 *
	 * @return array Field errors
	 **/
	public function get_errors() {
		return $this->errors;
	} // end func: get_errors



	/**
	 * Execute rules
	 *
	 * @return array Errors generated
	 **/
	protected function test_rules() {

		if(empty($this->rules)) return array();

		$errors = array();

		foreach($this->rules as $field => $rules) {
			list($result, $error) = $this->test_field_rules($field, $rules);
			if($result === false) $errors[$field] = $error;
		}

		return $errors;

	} // end func: test_rules



	/**
	 * Test rules for a given field
	 *
	 * @param string Field name
	 * @param array Field rules
	 * @return array [Valid, Error]
	 **/
	protected function test_field_rules($field, array $rules) {

		$value = isset($this->data[$field]) ? $this->data[$field] : null;

		foreach($rules as $rule) {
			list($result, $error) = $this->test_rule($field, $value, $rule);
			if($result === false) return array(false, $error);
		}

		return array(true, null);

	} // end func: test_field_rules



	/**
	 * Test a single Rule against a Field
	 *
	 * @param string Field name
	 * @param string Field value
	 * @param callable Rule
	 * @return array [Valid, Error]
	 **/
	protected function test_rule($field, $value, $rule) {

		$result = $rule->validate($field, $value, $this);

		if($result) {
			return array(true, null);
		} else {
			return array(false, $rule->get_error_message($field, $value, $this));
		}

	} // end func: test_rule



	/**
	 * Apply any defined filters
	 *
	 * @param array Input data
	 * @return array Filtered data
	 **/
	protected function apply_filters(array $data) {

		if(empty($this->filters)) return $data;

		foreach($this->filters as $field => $filters) {

			if(!isset($data[$field])) continue;

			$value = $data[$field];

			foreach($filters as $filter) {
				$value = call_user_func($filter, $value);
			}

			$data[$field] = $value;

		}

		return $data;

	} // end func: apply_filters



	/**
	 * Humaize a string
	 *
	 * @param string Internal string
	 * @return string Humanized stirng
	 **/
	protected function humanize_field_name($field) {
		return str_replace(array('-', '_'), ' ', $field);
	} // end func: humanize_field_name



} // end class: Validator
