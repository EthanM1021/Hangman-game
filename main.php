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

  getUserInput:
  $guessedLetter = strtolower(readline("\n\nEnter a letter to guess... "));

  if (!onlyLetters($guessedLetter)) {
    echo "Please enter letters only...\n\n";
    goto getUserInput;
  }

  if (letterHasBeenGuessed($guessedLetters, $guessedLetter)) {
    echo "You have already entered $guessedLetter\n\n";
    goto getUserInput;
  }

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

// Decide when a user wins

// TEST EVERYTHING