<?php
declare(strict_types=1);

namespace App\Patterns\Interpreter;

require_once '../../../vendor/autoload.php';

$context = new InterpreterContext();
$literal = new LiteralExpression('four');
$var = new VariableExpression('input', 'four');
$var->interpret($context);
$literal->interpret($context);

echo $context->lookUp($var) . PHP_EOL;

echo 'Another example' . PHP_EOL;
$cxt = new InterpreterContext();
$input = new VariableExpression('input');
$statement = new BooleanOrExpression(
        new EqualsExpression($input,
            new LiteralExpression('four')), // left operand
        new EqualsExpression($input,
            new LiteralExpression('4')) // right operand
    );

foreach (['four', '4', '52'] as $val) {
    $input->setValue($val);
    print "$val:\n";
    $statement->interpret($context);

    if ($context->lookUp($statement)) {
        print "True!\n\n";
    } else {
        print "False!\n\n";
    }
}