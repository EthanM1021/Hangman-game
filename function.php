<?php

require_once("./classes.php");
require_once("./classes.php");
require_once("./option1.php");

function startGame(): void {
  // $startMenu = new Menu();
}

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
  return strlen($word);
}