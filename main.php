<?php

require_once("./function.php");
require_once("./classes.php");
require_once("./hangedman.php");

$alphabet = "abcdefghijklmnopqrstuvwxyz";
$guessedLetters = array();
$guesses = 0;
$MAX_GUESSES = 7;
$userHasGuessed = false;
$guessedWord;

$game = new Game();
$game->intro();

$isWordGuessed = $game->getWordGuessed();
$isGameOver = $game->getGameOver();

$allWords = readTextFile("./words.txt");

$randomWord = getRandomWord($allWords);

$length = getLengthOfWord($randomWord);


while (!$isWordGuessed && !$isGameOver) {
if ($guesses == $MAX_GUESSES) {
  $loseGame = new Lose();
  $game->setGameOver();
  $loseGame->badLuck($randomWord);
  break;
}

  if ($userHasGuessed) {
    displayWordToUser($guessedWord, $length, $userHasGuessed);
  } else {
    displayWordToUser($randomWord, $length, $userHasGuessed);
  }

  $guessedLetter = strtolower(readline("\n\nEnter a letter to guess... "));
  array_push($guessedLetters, $guessedLetter);

  for ($i = 0; $i < strlen($alphabet); $i++) {
    if ($guessedLetter == $alphabet[$i]) {
      $letterIsInWord = checkLetterNotInWord($randomWord, $guessedLetter);
    }
  }

  $guess = new Word();

  if ($letterIsInWord) {
    $guessedWord = $guess->unveilLetter($randomWord, $guessedLetters);
    $userHasGuessed = true;
    echo "You guessed correctly!\n\n";
    echo $hangman[$guesses];
    echo "\n\n";
  } else {
    $guesses++;
    echo "Oops, $guessedLetter is not in the word...\n";
    echo $hangman[$guesses];
    echo "\n";
    echo totalGuesses($guesses, $MAX_GUESSES);
  }
}

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

// TEST EVERYTHING

// Get the two player version working