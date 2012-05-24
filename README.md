# Heyo.

This here's the website of the [Multipack](http://multipack.co.uk).

You're very welcome to submit an issue or a pull request if you spot anything that need imporoving, be it content, code or comments.

This site is a gracefully-degrading responsive site. It's not prefect on every device, and we rely on the community to help. If you don't feel you can make a contribution directly in code, please submit a new issue so someone else can pick it up.

### Editing content

There's no database to worry about, so just head to `_multipack/view` to edit the content if you spot an error, or want to add something.

### Coding style

- **Two spaces** for indentation
- Comment anything that is not immediately obvious – you shouldn't have to be a PHP/Javascript ninja/rockstar/goddess/hipster/pirate to make this site better
- Use a slow, easy to understand method above an incomprehensible, fast method

### Changing styles

The site is built using [LESS](http://http://lesscss.org/), all found in `css/less`. These should be compiled minified but not compressed.

Please try to keep colours out of all `.less` files except `colours.less`, and if you are changing styles then please follow the instructions in that file.

### Lanyrd integration

The site pulls all event data from Lanyrd and then caches it on the server (in `_multipack/cache` - although this is not in the repo). The Lanyrd library is found in `_multipack/model`. The code is reasonably well commented, so you should be able to make changes from that file.

### The framework

The framework is based on [Lowcarb](https://github.com/phuu/lowcarb), and is essentially a very lightweight version of CodeIgniter. You can follow how it loads by starting at the `index.php` and working through.

Configuration is kept in `config.php`, and supports multiple environments.

The controller is `_multipack/multipack.php`.

I'll document the framework more soon.

### License

The website and all code is licensed under the [Creative Commons Attribution-NonCommercial 3.0 Unported](http://creativecommons.org/licenses/by-nc/3.0/).

You are free to copy, distribute and transmit the site, and to adapt the code & content (unless it is pulled from Lanyrd - check their license) according to the following conditions:

- You must attribute the work by providing a link to this repository, but do not suggest that we endorse you or your use of the work.
- Noncommercial — You may not use this work for commercial purposes.

Please see the link above for more information.