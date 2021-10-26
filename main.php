<?php

require_once("./function.php");
require_once("./classes.php");
require_once("./hangedman.php");

$alphabet = "abcdefghijklmnopqrstuvwxyz";
$guesses = 6;
$MAX_GUESSES = 7;

startGame();

$allWords = readTextFile("./words.txt");

$randomWord = getRandomWord($allWords);

$length = getLengthOfWord($randomWord);

echo "\nYour word is...\n";

echo $randomWord;
echo "\n";
echo replaceAllLetters($length);
echo "\n\n";

$guessedLetter = strtolower(readline("Enter a letter to guess... "));

for ($i = 0; $i < strlen($alphabet); $i++) {
  if ($guessedLetter == $alphabet[$i]) {
    $letterIsInWord = checkLetterNotInWord($randomWord, $guessedLetter);
  }
}

$guess = new Word();

if ($letterIsInWord) {
  $updatedWord = $guess->unveilLetter($randomWord, $guessedLetter);
  echo "You guessed correctly!\n\n";
  echo $updatedWord;
} else {
  echo "Oops, $guessedLetter is not in the word...\n\n";
  if ($guesses != $MAX_GUESSES) {
    ++$guesses;
    echo "Game over!\n\n";
  }
  echo $hangman[$guesses];
  echo "\n";
}

// Create a max guesses constant or find a way to track the number of guesses

// Keep asking user for input until guesses have maxed or word is complete

// TEST EVERYTHING

// Get the two player version working