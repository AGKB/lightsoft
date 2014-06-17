<?php

// set assert options
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_WARNING, 0);
assert_options(ASSERT_CALLBACK, 'my_handler');

//Create handler
function my_handler($file, $line, $code, $desc = null)
{
    echo "Incorrect assert in file: $file, line: $line, code: $code  $desc <br>".PHP_EOL;
}

function  isCorrect($str)
{
    do
    {
        $str = preg_replace('/\\(\\)|{}|[^{}()]/', '', $str, -1, $cnt);
    }
    while ($cnt);
    return $str == '' ?: false;
}

assert(isCorrect('') === true, "''");
assert(isCorrect('()') === true, '()');
assert(isCorrect('{()}') === true, '{()}');
assert(isCorrect('{()}{}') === true, '{()}{}');
assert(isCorrect('(())') === true, '(())');
assert(isCorrect('{({({({()})})})}') === true, '{({({({()})})})}');
assert(isCorrect('{(})') === false, '{(})');

echo 'Ok';
?>
