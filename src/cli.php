<?php
namespace BrainGames\Cli;

use function \cli\line;
use function \BrainGames\Games\gameStart;

function getDescription($game)
{
    switch ($game) {
        case 'brain-even':
            line('Answer "yes" if number even otherwise answer "no".');
    }
}

function run($game = '')
{
    line('Welcome to the Brain Game!');
    getDescription($game);
    line();
    $name = \cli\prompt('May I have your name?');
    line("Hello, %s!", $name);
    
    if (empty($game)) {
        return null;
    }
    
    $rounds = 3;
    for ($i = 0; $i < $rounds; $i++) {
        [$question, $result] = gameStart($game);
        line("Question: {$question}");
        $answer = strtolower(\cli\prompt('Your answer'));
        if ($answer != $result) {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
            return line("Let's try again, {$name}!");
        }
        line('Correct!');
    }
    line("Congratulations, {$name}!");
}
