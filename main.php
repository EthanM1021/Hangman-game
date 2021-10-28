<?php

require_once("./function.php");
require_once("./classes.php");
require_once("./hangedman.php");

$alphabet = "abcdefghijklmnopqrstuvwxyz";
$guessedLetters = array();
$guesses = 0;
$MAX_GUESSES = 7;
$currentStatus = $hangman[$guesses];

$newGame = new Game();
$newGame->intro();

$isWordGuessed = $newGame->getWordGuessed();
$isGameOver = $newGame->getGameOver();

$allWords = readTextFile("./words.txt");

$randomWord = getRandomWord($allWords);

$length = getLengthOfWord($randomWord);

while(!$isWordGuessed && !$isGameOver) {

displayWordToUser($randomWord, $length);

$guessedLetter = strtolower(readline("\n\nEnter a letter to guess... "));
array_push($guessedLetters, $guessedLetter);

for ($i = 0; $i < strlen($alphabet); $i++) {
  if ($guessedLetter == $alphabet[$i]) {
    $letterIsInWord = checkLetterNotInWord($randomWord, $guessedLetter);
  }
}

$guess = new Word();

if ($letterIsInWord) {
  $updatedWord = $guess->unveilLetter($randomWord, $guessedLetters);
  echo "You guessed correctly!\n\n";
  echo $currentStatus;
  echo "\n";
  echo $updatedWord;
  echo "\n\n";
} else {
  $guesses++;
  echo "Oops, $guessedLetter is not in the word...\n";
  echo $currentStatus;
echo "\n";
  echo totalGuesses($guesses, $MAX_GUESSES);
}
}
// TODO: Investigate why wrong letters are making whole word dissappear

// Only allow letters to be inputted
/*
* Ask user for input
* Decide whether the letter is in the word or not
* If it is - Add letter
* If it is not - add one to the guesses and display hangman state
* And notify user of guesses left
* If word is not complete redo step 1
* If word is complete, call a winning function
*/


// Keep asking user for input until guesses have maxed or word is complete

// TEST EVERYTHING

// Get the two player version working