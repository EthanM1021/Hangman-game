<?php

require("./function.php");

$alphabet = "abcdefghijklmnopqrstuvwxyz";

startGame();

$wordsArray = readTextFile("./words.txt");

$word = getRandomWord($wordsArray);

$length = getLengthOfWord($word);

echo "\nYou're word is...\n\n";

echo $word;
echo "\n";
echo replaceAllLetters($length);

echo "\n\n";

$guessedLetter = readline("Enter a letter to guess... ");

echo checkLetterNotInWord($word, $guessedLetter);