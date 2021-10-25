<?php

require_once("./function.php");
require_once("./classes.php");

$alphabet = "abcdefghijklmnopqrstuvwxyz";

startGame();

$wordsArray = readTextFile("./words.txt");

$randomWord = getRandomWord($wordsArray);

$length = getLengthOfWord($randomWord);

echo "\nYou're word is...\n\n";

echo $randomWord;
echo "\n";
echo replaceAllLetters($length);

echo "\n\n";

$guessedLetter = readline("Enter a letter to guess... ");

$letterInWord = checkLetterNotInWord($randomWord, $guessedLetter);

$guess = new ThinkOfAName();

if ($letterInWord) {
  $updatedWord = $guess->unveilLetter($randomWord, $guessedLetter);
  echo "You guessed correctly!\n";
  echo $updatedWord;
} else {
  echo "Oops, $guessedLetter is not in the word...\n\n";
}