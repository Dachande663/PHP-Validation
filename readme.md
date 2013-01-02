Validation Library
==================

A simple, extensible validation library for PHP with support
for filtering and validating any input array.


0.0 Table of Contents
---------------------

* Introduction
* Examples
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
adding custom rules very easy.

This library currently ships with only a base set of rules,
but more are been added.


2.0 Examples
------------

```php
use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

$validator = new Validator($_POST);
$validator
	->set_label('name', 'your name')
	->add_filter('name', 'trim')
	->add_rule('name', new Rule\MinLength(5))
	->add_rule('name', new Rule\MaxLength(10))
	->add_filter('email', 'trim')
	->add_filter('email', 'strtolower')
	->add_rule('email', new Rule\MinLength(5))
	->add_rule('email', new Rule\EmailAddress())
	->add_rule('password', new Rule\Matches('password2'))
	->set_label('password2', 'password confirmation')
;

if($validator->is_valid()) {
	print_r($validator->get_data());
} else {
	print_r($validator->get_errors());
}
```


3.0 Running Tests
-----------------

@todo


4.0 Troubleshooting
-------------------

@todo


5.0 Changelog
-------------

* **[2012-12-08]** Initial Version
* **[2013-01-02]** First Release
