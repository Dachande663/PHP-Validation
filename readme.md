Validation Library
==================

A simple, extensible validation library for PHP with support
for filtering and validating any input array along with
generating client side validation code.

[![Build Status](https://travis-ci.org/Dachande663/PHP-Validation.png)](https://travis-ci.org/Dachande663/PHP-Validation)


0.0 Table of Contents
---------------------

* Introduction
* Examples
* Rule Reference
* Running Tests
* Troubleshooting
* Changelog


1.0 Introduction
----------------

This library provides a simple way to validate an input
array against a set of rules. Input could come from $_POST
or any other data source.

Each field can have its own label, pre-filters and rules
applied to it. Rules extend a very simple interface, making
adding custom rules very easy. The Validator object itself
can be executed multiple times against different datasets,
making it very useful for processing dynamic data.

Additionally, validation rules can be generated for client
side scripts. Currently only jQuery Validate is supplied
but additional interfaces can be added easily.


2.0 Examples
------------

```php
use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

$validator = new Validator();
$validator
	->set_label('name', 'first name')
	->set_label('email', 'email address')
	->set_label('password2', 'password confirmation')
	->add_filter('name', 'trim')
	->add_filter('email', 'trim')
	->add_filter('email', 'strtolower')
	->add_rule('name', new Rule\MinLength(5))
	->add_rule('name', new Rule\MaxLength(10))
	->add_rule('email', new Rule\MinLength(5))
	->add_rule('email', new Rule\Email())
	->add_rule('password', new Rule\Matches('password2'))
;

if($validator->is_valid($_POST)) {
	print_r($validator->get_data());
} else {
	print_r($validator->get_errors());
}
```

More detailed examples can be found in ./examples.


3.0 Rule Reference
------------------

* **NotEmpty** Makes this a required field
* **Equal** Input must match provided string
* **NotEqual** Input must not match provided string
* **Matches** Input must match value of another field
* **InArray** Input must be in an array of values
* **MinLength** Input length must be greater than or equal to value
* **MaxLength** Input length must be less  than or equal to value
* **ExactLength** Input length must be exactly value
* **Alpha** Input can only contain a-z characters
* **AlphaNumeric** Input can contain a-z and 0-9
* **AlphaSlug** Input can contain a-z, 0-9, - and _
* **Regex** Input must match provided regular expression
* **Email** Input must be a valid email format
* **URL** Input must be a valid URL format
* **IP** Input must be a valid IPv4 or v6 address
* **True** Input must be true e.g. checkbox
* **Number** Input must be numeric e.g. -99 or 123.45
* **NumNatural** Input must be an integer zero or above
* **NumMin** Input value must be greater than or equal to value
* **NumMax** Input value must be less than or equal to value
* **NumRange** Input value must be between min and max values


4.0 Running Tests
-----------------

phpunit tests


5.0 Troubleshooting
-------------------

@todo


6.0 Changelog
-------------

* **[2012-12-08]** Initial Version
* **[2013-01-02]** First Release
* **[2013-01-04]** Add more Rules and additional tests
