+++
title = "Knows how to call a function"
image = "/images/post/fn.png"
author = "petasearch"
date = 2019-11-07T05:00:00Z
description = "Knows how to call a function"
categories = ["Meta Data"]
type = "post"

+++



## Knows how to call a function

4 ways you can call a function


JavaScript functions can be called:

1. As a function
2. As a method
3. As a constructor
4. via call() and apply()




To create a function, we must first declare it and give it a name, the same way we'd create any variable, and then we follow it by a function definition:

```
var sayHello = function() {
};
```

we could just output a message at a random location:

```
var sayHello = function() {
   text("Halllllllo!", random(200), random(200));
};
```


"call" the function, by writing its name followed by empty parentheses:

```
sayHello();
```

And then we could call it whenever we wanted, as many times as we wanted!

```
sayHello();
sayHello();
sayHello();
```


to put the message at two precise coordinates:

```
sayHello(50, 100);
sayHello(150, 200);
```

To make that work, we need to change our sayHello function definition so it knows that it will receive 2 arguments, and then uses them inside:

```
var sayHello = function(xPos, yPos) {
   text("Halllllllo!", xPos, yPos);
};
```













Example: call a function

As a function:

```
<button onclick="sayHello()">say hello</button>
  <script>
    function sayHello() {
      console.log(this);
      console.log(arguments);
      console.log('hello');
    }
  </script>
```  
  
  
  
  
As a method
  
```  
<button onclick="greeter.sayHello()">say hello</button>
  <script>
    greeter = {
      sayHello: function () {
        console.log(this);
        console.log(arguments);
        console.log('hello');
      }
    }
```
    
    
    
As a constructor
    
```
<input type="text" id="name"></input>
  <button onclick="sayHello()">say hello</button>
  <script>
    function Greeter(name) {
      console.info('begin constructor');
      console.log(this);
      console.log(arguments);
      this.name = name;
      console.info('end constructor')
    }
    function sayHello() {
      var name = document.getElementById('name').value;
      var grtr = new Greeter(name);
      console.log('hello ' + grtr.name);
    }
  </script>
```
  
  
  
via call() and apply()

```
  <button onclick="go()">GO</button>
  <script>
    var people = [];
    var name = 'alex';
    function Person(idx) {
      idx % 2 === 0 ? 
        this.name = 'alex ' + idx : 
        this.name = 'bob ' + idx;
    }
    function printName() {
      console.log(this.name);
    }
    function go() {
      //print the name variable defined on the window object
      printName();
      //populate the people array with a couple of people
      for (let idx = 0; idx < 5; idx++) {
        people.push(new Person(idx));
      }
     // lets call the printName for each object that we just created 
     // seting this dynamically
      people.forEach(p => { 
        printName.call(p);
      });
    }
  </script>
```
