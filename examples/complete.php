<?php echo '<pre>';

include '../autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;


$input = array(
	'notempty'     => 'test',
	'equal'        => 'hello-world',
	'notequal'     => 'not-goodbye-world',
	'matches'      => 'test',
	'matches2'     => 'test',
	'inarray'      => 'mar',
	'inarraykeys'  => 'female',
	'minlength'    => 'testing',
	'maxlength'    => 'testing',
	'exactlength'  => 'testing',
	'alpha'        => 'hello',
	'alphanumeric' => 'hello123',
	'alphaslug'    => 'hello-world-2',
	'regex'        => 'a2b',
	'email'        => 'test@test.com',
	'url'          => 'http://www.google.com/',
	'ip'           => '192.168.1.1',
	'true'         => 'yes',
	'number'       => '-123.45',
	'numnatural'   => '27',
	'nummin'       => '5',
	'nummax'       => '10',
	'numrange'     => '7',
);


$array = array('jan', 'feb', 'mar', 'apr');
$array_keys = array(
	'male' => 'Guys',
	'female' => 'Ladies',
);


$validator = new Validator();


$validator
	->add_rule('notempty', new Rule\NotEmpty())
	->add_rule('equal', new Rule\Equal('hello-world'))
	->add_rule('notequal', new Rule\NotEqual('goodbye-world'))
	->add_rule('matches', new Rule\Matches('matches2'))
	->add_rule('inarray', new Rule\InArray($array))
	->add_rule('inarraykeys', new Rule\InArray($array_keys, $match_keys = true))
	->add_rule('minlength', new Rule\MinLength(5))
	->add_rule('maxlength', new Rule\MaxLength(10))
	->add_rule('exactlength', new Rule\ExactLength(7))
	->add_rule('alpha', new Rule\Alpha())
	->add_rule('alphanumeric', new Rule\AlphaNumeric())
	->add_rule('alphaslug', new Rule\AlphaSlug())
	->add_rule('regex', new Rule\Regex('/^[a-z][0-9][a-z]/i'))
	->add_rule('email', new Rule\Email())
	->add_rule('url', new Rule\URL())
	->add_rule('ip', new Rule\IP())
	->add_rule('true', new Rule\True())
	->add_rule('number', new Rule\Number())
	->add_rule('numnatural', new Rule\NumNatural())
	->add_rule('nummin', new Rule\NumMin(5))
	->add_rule('nummax', new Rule\NumMax(10))
	->add_rule('numrange', new Rule\NumRange(5, 10))
;


if($validator->is_valid($input)) {
	var_dump('success', $validator->get_data());
} else {
	var_dump('error', $validator->get_errors(), $validator->get_data());
}
