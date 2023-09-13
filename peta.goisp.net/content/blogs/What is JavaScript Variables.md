+++
title = "JavaScript Variables"
image = "/images/post/fn.png"
author = "petasearch"
date = 2019-11-07T05:00:00Z
description = "JavaScript Variables"
categories = ["Meta Data"]
type = "post"

+++


JavaScript Variables


A variable is a "named storage" for data. In JavaScript we can use variables to store user data, goods information, messages etc. To create a variable in JavaScript, we use "let" keyword


let play;
play = 'Please visit YouTube.com'; //string stored




The string is now saved into the memory area associated with the variable. We can access it using the variable name:

```
let message;
message = 'Hello!';

alert(message); // shows the variable content
```


Declare multip[le variable in one line:

```
let user = 'John', age = 25, message = 'Hello';
```


The multiline variant is a bit longer, but easier to read:

```
let user = 'John';
let age = 25;
let message = 'Hello';
```

Some people also define multiple variables in this multiline style:

```
let user = 'John',
  age = 25,
  message = 'Hello';
```


…Or even in the “comma-first” style:

```
let user = 'John'
  , age = 25
  , message = 'Hello';

```


In older, use of keyword "var" insteadf of "let"

```
var message = 'Hello';
```



Variable naming
There are two limitations on variable names in JavaScript:

The name must contain only letters, digits, or the symbols $ and _.
The first character must not be a digit.
Examples of valid names:

```
let userName;
let test123;
```


What’s interesting – the dollar sign '$' and the underscore '_' can also be used in names. They are regular symbols, just like letters, without any special meaning.

These names are valid:

```
let $ = 1; // declared a variable with the name "$"
let _ = 2; // and now a variable with the name "_"

alert($ + _); // 3
```



Constants
To declare a constant (unchanging) variable, use const instead of let:

```
const myBirthday = '18.04.1982';
```

Variables declared using const are called “constants”. They cannot be reassigned. An attempt to do so would cause an error:

```
const myBirthday = '18.04.1982';

myBirthday = '01.01.2001'; // error, can't reassign the constant!
```


Uppercase constants

```
const COLOR_RED = "#F00";
const COLOR_GREEN = "#0F0";
const COLOR_BLUE = "#00F";
const COLOR_ORANGE = "#FF7F00";

// ...when we need to pick a color
let color = COLOR_ORANGE;
alert(color); // #FF7F00
```




We can declare variables to store data by using the var, let, or const keywords.


