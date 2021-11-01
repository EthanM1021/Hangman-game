# Hangman-game

## Challenge Outline

For my advanced programming project, I have decided to implement the game of hangman. Hangman is where a player guesses a word which is chosen by another player. The guesser gets to know the length of the word and tries to guess the word in a certain number of attempts. On every wrong guess, a drawing of a hanging man increases until it is a full drawing. Once the drawing is complete, the game is over unless the player wins beforehand. 

For this project, I have developed it fully in PHP. This is the language in which we use in the workplace so I am familiar with this.

### Working Plan
 - How to store the state of the word and decide if it's public, private or protected
 - How to display the current hanged man image
 - A way to store all the guessed letters so far
 - Don't allow the user to guess the same letter twice
 - Ensure only letters are entered from the user
 - A way to store the number of guesses remaining
 - If word is fulfilled, user wins
 - If guesses have been reached, end game
 - Implement a 2 player version

### Flow Diagram
![image](https://user-images.githubusercontent.com/79159281/139719038-99d26d8f-b5c5-4136-852f-0a8c8270c7d4.png)

## Development

When starting this project, the initial plan was to write pseudocode to split each point above into smaller steps. I also planned to do one step as a commit to this repository. For example, when finding a way to store the word in a suitable fashion, that would be one commit. Then if later in the project, I saw there was a better way to store it which would make the code either:
 - More readable
 - Easier to access/change/update
 - If the current way didn't work how I intended it to

When designing a project like this where I need to adapt object orientated programming (OOP) into this. Since working with OOP for this project, I have found various benefits:
 - It makes it easier to reuse code
 - It provides a clear structure for my program (i.e. all my classes in one file, functions in another etc.)
 - Having it in different files also made debugging easier as I could see where the problem was coming from
 - Data redundancy - In PHP you can have public private and protected methods.

This allows a variable/function to keep the scope of it's lifetime to a limit. The difference betweene each scope is:
 - Public - this can be accessed from anywhere, other classes, files, other instances of the object
 - Private - Can only be accessed in it's own class
 - Protected - Can be accessed in all classes which inherit and including the parent class

For this project, I decided to have 2 parent classes. One for the game which in turn would have two instansiations which are the win and lose states of the game. Another class which will keep the state of the word. 

For the standards of this project. I have ensured to maintain consistency in the naming conventions of functions, variables etc. I have chosen to write these in camel case e.g. thisIsAFunction. Camel case consists of every first letter of a word is uppercase apart from the first word. This is useful as a function or variable name cannot contain spaces so this is effectively a way of making the function name readable.
I have also made it so that the function names are readable and are in relation to what they are doing. For example, in my code:
```
function letterHasBeenGuessed(array $arrayOfLetters, string $letter): bool {
  foreach ($arrayOfLetters as $eachLetter) {
    if ($eachLetter == $letter) {
      return true;
    }
  }
  return false;
}
```
I have made it so the function name is letterHasBeenGuessed is because it evaluates to a boolean. I then invoke this function in the main.php file inside an if statement:
```
if (letterHasBeenGuessed($guessedLetters, $guessedLetter)) {
    echo "You have already entered $guessedLetter\n\n";
    goto getUserInput;
  }
```
So now, this makes it readable as it now reads in plain english if letter has been guessed. I find this much more readable than potentially something like if letter in array.

Also, referring back to the function, I have made it so my code is "one line, one instruction" (OLOI). 
The first line is defining the function with appropriate name and parameters.
The second line loops through the array
The third line checks if the letter is in the array
The fourth line returns true if the letter is in the array
The fifth line closes the if statement
The sixth line closes the foreach loop
The seventh line returns false if the if statement resolves to false

Having OLOI makes the code much easier to read than if all seven of those lines were on one line. I also find this method easier to debug. If my code fails for some reason, I can then go through each line and see where exactly it is going wrong.

I have also tried my best to make most, if not all of my functions pure. A pure function is a function that if it is given the same input, it will **always** return the same output. Another example within my code would be:
```
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
```

If I break down the function declaration parameters it reads (int $guesses, int $max): string...
The int before $guesses and $max declares what type that parameter should be. So, only integers are being able to be passed into this function. If not, then a PHP type error occurs. Then after the parameter brakcets there is a colon and a string. This is to state the return value. As you can see, there is a possiblity of three different outcomes, so there are a potential of three different outcomes but either way, each one is a string
The comment above the function is explaining the parameters (@param) which are getting input to the function and also the return (@return) value. This is used quite often in PHP and also in my workplace and I think it looks great as it tells you what it is taking in and returning before actually reading the function.

If I was to walk through this function line by line:
 - Function declaration with parameters
 - It then works out the remaining guesses in which the user has left
 - If statement to see if there is more than one guess
 - If this is fulfilled - return the output message for the user
 - If not fulfilled, it then checks if the remaining guesses is equal to 1
 - If still not fulfilled, the default message would be game over.

This is a pure function as if you were to pass 6 and 10 into this function x amount of times. The remaining variable would always be 4 and therefore, the first return statement would always return as seen below:
```
totalGuesses(6, 10);
totalGuesses(6, 10);
totalGuesses(6, 10);
totalGuesses(6, 10);

// Output will always be:
You have 4 guesses left
You have 4 guesses left
You have 4 guesses left
You have 4 guesses left
```

Throughout my project, I have tried to make it so that as many functions are *reusable* as possible. This helps in code as it can be time saving when it comes to writing the same code again and you could also, use the code in other projects. 
An example from my code would be:
```
/*
* @param length of word
*
* @return string of underscores the length which was given
*/
function replaceAllLetters(int $length): string {
  return str_repeat("_ ", $length - 1);
}
```
This function is pure as it's the same output with the same input *everyime* and also it can be reusable.

So, instead of doing:
```
str_repeat("_ ", $length)
```
every single time you would need to use this, you can create a function and just pass an integer and it makes it easier to read. It's also time saving in the sense of that you only need to remember the function name which is in plain English and don't need to remember what the code exactly states.

When talking about code smells, a code smell is not particuarly a bug and it will stop your code from workinh. A code smell is a technical violation that may lead to problems further down the road. A few examples of a code smell is:
 - Duplicated code/logic
 - Long parameter list
 - Long classes/objects
 - A class instansiating another class inside itself
 - Hard to read code
 - No consistency with function/variable naming
 - No consistency with indentation and spacing
 
Although, these are just examples, these sets of rules differ from developer to developer, company to company. I have tried to incorporate as many as these procedures as possible to my code is readable, easy to see where something goes wrong and robust.
One way in which I have tried to have less *smelly* code is to limit the amount of parameters to 3 going into a function and the appropriate naming of functions and variables. I would always have the function declaration, function name, variables and the open parentheses with a space in between. Then if any variables needed naming in a function, then the variables would always get declared at the top, the logic would then be the middle of the function with a line space between the variables and then finally, the return statement on the last line as I incorporated OLOI. An example would be:
```
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
```
So, here the variable is the first line, then an empty line, then the logic which is the for loop and then the return statement. So, it's like a beginning, middle and end of the function.

When it comes to OOP, I have a total of 2 classes and then 2 inherited classes in my code. An example of the parent class would be:
```
class Game {
  private $wordGuessed = false;
  private $gameOver = false;

  public function intro(): void {
    echo "Welcome to Hangman!\nGenerating a word...\n\n";
    sleep(2.5);
  }
}
```
So here is a class declaration which handles my state of the game. It gets declared with the keyword of class {CLASS NAME}. Again, I have stuck to the same convention with t he beginning, middle and end. So the variables get defined at the top with their different visibilities whether that be public, private or protected. Then, there is a line break and then a function. This function is a *void* function. This means that the function has no specific return value. In this example, it has an echo statement which prints things to the console and then a call to a inbuilt PHP sleep function which stops execution of any code for the specified amount of time in seconds, in this instance, it stops execution for 2.5 seconds.

In my code, there is also an example of instansiation:
```
$game = new Game();
$game->intro();
```
So, a class can be thought of as a blueprint of an object and in this instance I am making a replica of this class.
On the first line, I am instansiating the new class to a variable called game.
Then I access the function which then executes. 
In PHP, to access a function within a class the *->* is used. Although, if the function inside the class was a private function, then an error would occur as the scope of the function would not let me access it.

I also included inheritance of classes in my code. In PHP, when inheriting a class, it will have access to all the parent's public and protected methods, properties and constants. For example:
```
class Win extends Game {
  public function congratulateUser(): void {
    echo "\n\n\nYou won!!!";
  }
}
```

Here, I am inheriting the Game class which is the parent and creating a subclass called Win. When a user wins the game, I will instansiate the Win class and invoke the public function inside of the Win class like so:
```
$win = new Win();
$win->congratulateUser();
```

### Phase 1 development phase -  How to store the state of the word 

For this phase, I needed to decide whether how I was storing the word. Was this in array and updating the array everytime the user had a correct guess or I could store it as a string and dynamically update it when a user guesses corrrectly. Or I could store it in the word class but this meant that I would have to make it have public access which meant the scope of the variable would be until the program ends. Another way to store the word would be to create a function inside a class and have two functions. One to set the word and one to get the word. This way I could make the set function private and the get function public. In the end, I decided to store it as a string in the main.php file. This was because I could dynamically update the string so I wasn't pushing a word to an array which would in turn, use up unnecessary memory. At first, I decided to implement the get and set functions however, I have a classes file and a main file so I would've had to make both functions public since they were being accessed from a different file. 

### Phase 2 development phase - How to display the current hanged man image

At first, I was looking at storing the state the same way as the word in a string and updating it dynamically however, doing this was very difficult so I needed to think of another way to get round this. In the end I made a hangedman.php file in which I stored all the hanged man images and made them as variables. I had to think forward for this phase as I needed to know how I wanted to access each hangman whenever I needed it. So, I decided to store them as indexed so the amount of remaining guesses the user had left.

### Phase 3 development phase - Don't allow the user to guess the same letter twice

For this, I decided to put all the letters in which the user has guessed into an array. In PHP, by default, arrays have key and value pairs, and the key is the index of the entry. For this, I had to think I would access this in the later stages of the program. To do this phase, I created a function which had 2 parameters, one for the array of letters that had already been guessed. The second parameter was the letter in which the letter. Then I'd loop through the array and if any of the indexes matches the guessed letter, then it would return true or false dependant if the letter was found. For this, it was a pure function and around 4 lines long. So this function is reusable, robust and pure. 

### Phase 4 development phase - Ensure only letters are entered from the user

For this phase, there was 2 options which sprung to mind for this one. One was to compare the user input to the whole alphabet or to use regex. For the first option, in PHP, it has an in built range function which you can specify two parameters. They could be 1 and 10 or A-Z. However, I found that it is case sensitive. I also found that regex could be done with one line, so this is the option I decided to use. PHP has a preg_match() function which returns true or false if the regex matches the string in which you pass to this function. My regex which I will talk about at a later stage, is now a one line function which is reusable and pure. 

### Phase 5 development phase - A way to store the number of guesses remaining

For this, I decided to create a counter at the top of the main.php file so that when a user guesses wrong, the counter increments by one each time. I then have a seperate variable which is called MAX_GUESSES - It's in all capitals as it's a constant and in the workplace and most developers name constants all in capitals. Then I use this guess state to determine if the player has hit their maximum number of guesses which then in turn, decides if they lose the game.

### Phase 6 development phase - Implement a 2 player version

Whilst creating the game, from the start I was baring in mind that this project needed to have a level of complexity and I thought the two player version would secure this. So whilst creating the different functions etc. I wanted them to be robust and reusable and then I could easily reuse them when it came to creating this version. In the end, I reused practically all of my functions and just had a boolean flag which was defined at the top of my main.php file with the other variables which when the user would pick 2 off the menu class, then the flag would be flipped and became true. Then, I would just need to navigate around my code and add the boolean flag in where it needed to be. For example, if the user wanted the two player version, instead of reading from a file, the user would enter the word and then that word is then the word which is picked and manoeuvred around my code.

### Testing

Although, there is no test suite file in my project, this project consisted more of visual and manual testing. So, when I implemented a feature, I would test to make sure it doesn't break any part of the code ensuring that the quality of the runtime doesn't decrease significantly for some reason. Then, if the code is working and no errors were occuring, then I would commit my work so if I did something wrong, I could then revert my work back to a certain point where no errors were occuring. 

For testing my regex patterns, I also used this [website](https://regex101.com/). 

### Reflection

If I had more time with this project, I would've implemented something like lifelines into my work. For example, reveal 1 letter in the word. I could also implement a word category game type. For example, there could be 3 word text files or I could introduce something like an API and make this project front end to get word types such as nouns, verbs, adjectives and then the user could guess the word from this. 
