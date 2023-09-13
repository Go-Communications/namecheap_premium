+++
title = "What is React"
image = "/images/post/fn.png"
author = "petasearch"
date = 2019-11-07T05:00:00Z
description = "What is React"
categories = ["Meta Data"]
type = "post"

+++



What is React

React is a JavaScript library using to create user interface. React library has best components to create painless interactive UIs

well made from facebook, ..with pros and cns (facebook does not care much about server rendening). but luckily theer are libraries 



Getting started

How to install react in a website


 As an example we will use a like button in a page. So, we just need this react script --> div id ="like_button_container":


'use strict';

const e = React.createElement;

```
class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return e(
      'button',
      { onClick: () => this.setState({ liked: true }) },
      'Like'
    );
  }
}
```
const domContainer = document.querySelector('#like_button_container');
ReactDOM.render(e(LikeButton), domContainer);



Finally, we need internet connection to see nice UI like button where above react script loaded

```
<div>
      <!-- We will put our React component inside this div. -->
    <div id="like_button_container"></div>

    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

    <!-- Load our React component. -->
    <script>
'use strict';

const e = React.createElement;

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return e(
      'button',
      { onClick: () => this.setState({ liked: true }) },
      'Like'
    );
  }
}

const domContainer = document.querySelector('#like_button_container');
ReactDOM.render(e(LikeButton), domContainer);
</script>

 </div>





The smallest React example looks like this:

ReactDOM.render(
  Hello, world!,
  document.getElementById('root')
);

```



Install globally

This package requires node >= 10.

```
npm install -g create-react-library
```




Usage with npx


```
npx create-react-library
```





(npx comes with npm 5.2+ and higher, see instructions for older npm versions)

Creating a New Module

```
create-react-library
```




Development

Local development is broken into two parts (ideally using two tabs).

First, run rollup to watch your src/ module and automatically recompile it into dist/ whenever you make changes.


```
npm start # runs rollup with watch flag 
```





The second part will be running the example/ create-react-app that's linked to the local version of your module.

```
# (in another tab)
cd example
npm start # runs create-react-app dev server 
```





Now, anytime you make a change to your library in src/ or to the example app's example/src, create-react-app will live-reload your local dev server so you can iterate on your component in real-time.

Publishing to npm


```
npm publish
```



This builds commonjs and es versions of your module to dist/ and then publishes your module to npm.

Make sure that any npm modules you want as peer dependencies are properly marked as peerDependencies in package.json. The rollup config will automatically recognize them as peers and not try to bundle them in your module.

Deploying to Github Pages

```
npm run deploy
```


This creates a production build of the example create-react-app that showcases your library and then runs gh-pages to deploy the resulting bundle.








