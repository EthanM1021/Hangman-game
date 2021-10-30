<?php

require_once("./classes.php");
require_once("./classes.php");

/*
* @param file name to read from
*
* @return indexed array of each word
*/
function readTextFile(string $fileName): array {
  $contents = file($fileName);

  return $contents;
}

/*
* @param array of words from the text file
*
* @return index of that word from the array of words
*/
function getRandomWord(array $words): string {
  $random = array_rand($words);

  return $words[$random];
}

/*
* @param word to get length of
*
* @return integer of length
*/
function getLengthOfWord(string $word): int {
  $notZeroIndexed = 0;
  for ($i = 1; $i <= strlen($word); $i++) {
    $notZeroIndexed++;
  }
  return $notZeroIndexed;
}

/*
* @param word to guess, length of that word, whether the user has guessed a letter or not
*/
function displayWordToUser(
  string $word, 
  int $length, 
  bool $firstGuess
): void {
  echo "\nYour word is...\n\n";

  echo $word;
  echo "\n";
  if (!$firstGuess) {
    echo replaceAllLetters($length);
  }
  echo "\n\n";
}

/*
* @param length of word
*
* @return string of underscores the length which was given
*/
function replaceAllLetters(int $length): string {
  return str_repeat("_ ", $length - 1);
}

/*
* @param the word to be guessed and the users input
*
* @return true or false dependant on if the letter is in the word
*/
function checkLetterNotInWord(string $word, string $letter): bool {
  $inWord = preg_match("/$letter/", $word);

  return $inWord;
}

/*
* @param current guesses that the user has taken
* @param maximum number of guesses
*
* @return message to notify them of how many guesses they have left
*/
function totalGuesses(int $guesses, int $max): string {
  $remaining = $max - $guesses;

  if ($remaining > 1) {
    return "You have $remaining guesses left\n\n";
  } else if ($remaining == 1) {
    return "You have $remaining guess left\n\n";
  } else {
    return "Game Over!!!\n\n";
  }
}

function onlyLetters(string $letter): bool {
  if (preg_match('/^\pL+$/u', $letter)) {
   return true;
  } return false;
}