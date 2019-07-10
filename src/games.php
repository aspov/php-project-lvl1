<?php
namespace BrainGames\Games;

use function \cli\line;
use function \BrainGames\Cli\gcd;

function brainEven()
{
    $description = 'Answer "yes" if number even otherwise answer "no".';
    $value = rand(1, 100);
    $result = $value % 2 == 0 ? 'yes' : 'no';
    return [$description, $value, $result];
}

function brainCalc()
{
    $description = 'What is the result of the expression?';
    $variant = rand(0, 2);
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    if ($variant == 0) {
        $value = "{$num1} + {$num2}";
        $result = $num1 + $num2;
    }
    if ($variant == 1) {
        $value = "{$num1} - {$num2}";
        $result = $num1 - $num2;
    }
    if ($variant == 2) {
        $value = "{$num1} * {$num2}";
        $result = $num1 * $num2;
    }
    return [$description, $value, $result];
}

function brainGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';
    $num1 = rand(1, 20);
    $num2 = rand(1, 20);
    $value = "{$num1} {$num2}";
    $result = gcd($num1, $num2);
    return [$description, $value, $result];
}

function brainProgression()
{
    $description = 'What number is missing in the progression?';
    $startNum = rand(1, 100);
    $step = rand(1, 5);
    $hiddenNum = rand(0, 9);
    $progressionCount = 10;
    for ($i = 0; $i < $progressionCount; $i++) {
        $value[] = $startNum;
        $startNum = $startNum + $step;
    }
    $result = $value[$hiddenNum];
    $value[$hiddenNum] = '..';
    return [$description, implode($value, ' '), $result];
}

function brainPrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $value = rand(1, 100);
    $result = 'yes';
    for ($i = round($value / 2, 0, PHP_ROUND_HALF_DOWN); $i > 1; $i--) {
        if ($value % $i == 0) {
            $result = 'no';
            break;
        }
    }
    return [$description, $value, $result];
}
