<?php

require_once("./function.php");
require_once("./classes.php");
require_once("./hangedman.php");

$alphabet = "abcdefghijklmnopqrstuvwxyz";
$guessedLetters = array();
$guesses = 0;
define("MAX_GUESSES", 7);
$userHasGuessed = false;
$guessedWord = "";
$twoPlayer = false;

$menu = new Menu();

if ($menu->display() == 2) {
  $twoPlayer = true;
}


$game = new Game();
if ($twoPlayer == false) {
  $game->intro();
}

$isWordGuessed = $game->getWordGuessed();
$isGameOver = $game->getGameOver();

$allWords = readTextFile("./words.txt");

if ($twoPlayer == true) {
  $randomWord = strtolower(readline("Player 1 - enter your word: \n"));
} else {
  $randomWord = getRandomWord($allWords);
}

$length = getLengthOfWord($randomWord);

while (!$isWordGuessed && !$isGameOver) {

if ($guessedWord) {
  $noWhitespaces = noWhitespace($guessedWord);
  if ($noWhitespaces === trim($randomWord)) {
    $game->setWordGuessed();
    $win = new Win();
    $win->congratulateUser();
    break;
  }
}

  if ($guesses === MAX_GUESSES) {
    $game->setGameOver();
    $loseGame = new Lose();
    $loseGame->badLuck($randomWord);
    break;
  }

/* SOMETHING GOING WRONG HERE 
  Finish Reflection
*/

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

  if (letterHasBeenGuessed($guessedLetters, $guessedLetter[0])) {
    echo "You have already entered $guessedLetter\n\n";
    goto getUserInput;
  }

  array_push($guessedLetters, $guessedLetter[0]);

  for ($i = 0; $i < strlen($alphabet); $i++) {
    if ($guessedLetter === $alphabet[$i]) {
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
    echo totalGuesses($guesses, MAX_GUESSES);
  }
}