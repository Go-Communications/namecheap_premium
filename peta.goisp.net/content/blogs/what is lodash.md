+++
title = "Lodash"
image = "/images/post/fn.png"
author = "petasearch"
date = 2019-11-07T05:00:00Z
description = "Lodash"
categories = ["Meta Data"]
type = "post"

+++


Lodash

Lodash is a JavaScript utility library you can depend on small files to keep footprint low. Lodash is a modern JavaScript utility library delivering modularity, performance & extras.



Lodash Example


_.assign Method


```
<!DOCTYPE html>
<html>
<head>
    <title>Lodash Tutorial</title>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
    <script type="text/javascript">
        var foo = {
            a: "a property"
        };
        var bar = {
            b: 4,
            c: "an other property"
        }

        var result = _.assign({
            a: "an old property"
        }, foo, bar);

        console.log(JSON.stringify(result));
    </script>
</head>
<body></body>
</html>
```

Output:

```
{"a":"a property","b":4,"c":"an other property"}
```


```
_.first() and _.last() Methods
```

The .first()/.head() functions return the first array element; the _.last() function returns the last array element.
Example:

```
<!DOCTYPE html>
<html>
<head>
    <title>Lodash Tutorial</title>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
    <script type="text/javascript">
  // Lodash first and last array elements
        words = ['sky', 'wood', 'forest', 'falcon',
            'pear', 'ocean', 'universe'
        ];

        let fel = _.first(words);
        let lel = _.last(words);

        console.log(`First element: ${fel}`);
        console.log(`Last element: ${lel}`);
    </script>
</head>
<body></body>
</html>
```

The above HTML prints below output on the console:

```
First element: sky
Last element: universe
```


_.find Method

Instead of iterating through an array with a loop to find a specific object, we can simply use a _.find method.
Example:

```
<!DOCTYPE html>
<html>
<head>
    <title>Lodash Tutorial</title>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
    <script type="text/javascript">
  // Lodash first and last array elements
  var users = [
    { firstName: "John", lastName: "Doe", age: 28, gender: "male" },
    { firstName: "Jane", lastName: "Doe", age: 5, gender: "female" },
    { firstName: "Jim", lastName: "Carrey", age: 54, gender: "male" },
    { firstName: "Kate", lastName: "Winslet", age: 40, gender: "female" }
  ];

  var user = _.find(users, { lastName: "Doe", gender: "male" });
  console.log(user);
  // user -> { firstName: "John", lastName: "Doe", age: 28, gender: "male" }

  var underAgeUser = _.find(users, function(user) {
   return user.age < 18;
  });
  
  console.log(underAgeUser);
    </script>
</head>
<body></body>
</html>
```

The above HTML prints below output on the console:

```
{firstName: "John", lastName: "Doe", age: 28, gender: "male"}
{firstName: "Jane", lastName: "Doe", age: 5, gender: "female"}
```




