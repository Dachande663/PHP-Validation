Validation Library
==================

A simple, extensible validation library for PHP with support
for filtering and validating any input array.


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

This library currently ships with only a base set of rules,
but more are been added.


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


3.0 Rule Reference
------------------

Rule         | ? | Description
--------------------------
NotEmpty     | N | Makes this a required field
Equal        | Y | Input must match provided string
NotEqual     | N | Input must not match provided string
Matches      | Y | Input must match value of another field
InArray      | N | Input must be in an array of values

MinLength    | Y | Input length must be greater than or equal to value
MaxLength    | Y | Input length must be less  than or equal to value
ExactLength  | N | Input length must be exactly value

Alpha        | N | Input can only contain a-z characters
AlphaNumeric | N | Input can contain a-z and 0-9
AlphaSlug    | N | Input can contain a-z, 0-9, - and _

Regex        | N | Input must match provided regular expression
Email        | Y | Input must be a valid email format
URL          | N | Input must be a valid URL format
IP           | N | Input must be a valid IPv4 or v6 address
True         | N | Input must be true e.g. checkbox

Number       | N | Input must be numeric e.g. -99 or 123.45
NumNatural   | N | Input must be an integer zero or above
NumMin       | N | Input value must be greater than or equal to value
NumMax       | N | Input value must be less than or equal to value
NumRange     | N | Input value must be between min and max values


4.0 Running Tests
-----------------

@todo


5.0 Troubleshooting
-------------------

@todo


6.0 Changelog
-------------

* **[2012-12-08]** Initial Version
* **[2013-01-02]** First Release
