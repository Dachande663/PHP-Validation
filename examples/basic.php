<?php echo '<pre>';

include '../autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;


$input = array(
	'name'      => 'Luke ',
	'email'     => ' LuKe@lUkElAnChEsTeR.CO.UK ',
	'password'  => 'password123',
	'password2' => 'password456',
);


$validator = new Validator();


$validator
	->set_label('name', 'your name')
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


if($validator->is_valid($input)) {
	var_dump('success', $validator->get_data());
} else {
	var_dump('error', $validator->get_errors(), $validator->get_data());
}
