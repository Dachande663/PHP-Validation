<?php

include '../autoload.php';

use HybridLogic\Validation\Validator;
use HybridLogic\Validation\Rule;

$validator = new Validator();

$validator

	->set_label('name', 'your name')
	->add_filter('name', 'trim')
	->add_rule('name', new Rule\NotEmpty())
	->add_rule('name', new Rule\MinLength(5))
	->add_rule('name', new Rule\MaxLength(10))

	->add_filter('email', 'trim')
	->add_filter('email', 'strtolower')
	->add_rule('email', new Rule\NotEmpty())
	->add_rule('email', new Rule\MinLength(5))
	->add_rule('email', new Rule\Email())
	->add_rule('age', new Rule\NotEmpty())
	->add_rule('age', new Rule\NumRange(13, 18))

	->add_rule('password', new Rule\NotEmpty())
	->add_rule('password', new Rule\MinLength(5))
	->add_rule('password', new Rule\Matches('password2'))
	->set_label('password2', 'password confirmation')

;


if(isset($_POST['submit'])) {

	if($validator->is_valid($_POST)) {
		echo '<p>Posted successfully.</p>';
	} else {
		echo '<p>Errors were encountered:</p><ul>';
		foreach($validator->get_errors() as $error) echo "<li>$error</li>";
		echo '</ul>';
	}

}


$jquery_validator = new HybridLogic\Validation\ClientSide\jQueryValidator($validator);
$jquery = $jquery_validator->generate();


?><!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery Validation Test</title>
</head>

<body>


<form action="" method="post">

	<p>
		<label for="name">Your name</label><br>
		<input type="text" name="name">
	</p>

	<p>
		<label for="email">Email</label><br>
		<input type="text" name="email">
	</p>

	<p>
		<label for="email">Age</label><br>
		<input type="text" name="age">
	</p>

	<p>
		<label for="password">Password</label><br>
		<input type="text" name="password">
	</p>

	<p>
		<label for="password2">Password confirmation</label><br>
		<input type="text" name="password2">
	</p>

	<p>
		<input type="submit" name="submit" value="Submit">
	</p>

</form>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.10.0/jquery.validate.js"></script>


<script type="text/javascript">

<?php foreach($jquery['methods'] as $method_name => $method_function): ?>
	jQuery.validator.addMethod("<?php echo $method_name; ?>", <?php echo $method_function; ?>);
<?php endforeach; ?>

$("form").validate({

	submitHandler: function(form, e) {
		console.log("SUBMIT", form, e);
	},

	rules: <?php echo json_encode($jquery['rules']); ?>,
	messages: <?php echo json_encode($jquery['messages']); ?>

});

</script>


</body>
</html>