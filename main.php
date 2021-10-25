<?php

require("./function.php");

startGame();

$wordsArray = readTextFile("./words.txt");

$word = getRandomWord($wordsArray);

$length = getLengthOfWord($word);

echo "\nYou're word is...\n\n";

echo replaceAllLetters($length);

echo "\n\n";