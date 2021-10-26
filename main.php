<?php

require_once("./function.php");
require_once("./classes.php");

$alphabet = "abcdefghijklmnopqrstuvwxyz";

startGame();

$allWords = readTextFile("./words.txt");

$randomWord = getRandomWord($allWords);

$length = getLengthOfWord($randomWord);

echo "\nYour word is...\n";

echo $randomWord;
echo "\n";
echo replaceAllLetters($length);
echo "\n\n";

$guessedLetter = readline("Enter a letter to guess... ");

$letterIsInWord = checkLetterNotInWord($randomWord, $guessedLetter);

$guess = new Word();

if ($letterIsInWord) {
  $updatedWord = $guess->unveilLetter($randomWord, $guessedLetter);
  echo "You guessed correctly!\n";
  echo $updatedWord;
} else {
  echo "Oops, $guessedLetter is not in the word...\n\n";
}