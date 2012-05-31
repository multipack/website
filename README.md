# Heyo.

This here's the website of the [Multipack](http://multipack.co.uk).

You're very welcome to submit an issue or a pull request if you spot anything that need imporoving, be it content, code or comments.

This site is a gracefully-degrading responsive site. It's not prefect on every device, and we rely on the community to help. If you don't feel you can make a contribution directly in code, please submit a new issue so someone else can pick it up.

## Development Tips

A few quick tips to get you going:

- You'll need to make sure your version of PHP supports short opening tags and that your `php.ini` file has `short_open_tag = On`.
- Create a directory called `_multipack/cache/`, a file called `_multipack/model/results` and ensure they're both writable – these are within the `.gitignore` file to prevent cached files and temporary results ending up in source control.

### Editing content

There's no database to worry about, so just head to `_multipack/view` to edit the content if you spot an error, or want to add something.

### Coding style

- **Two spaces** for indentation
- Comment anything that is not immediately obvious – you shouldn't have to be a PHP/Javascript expert to make this site better
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

## License

The website and all code is licensed under the [Creative Commons Attribution-NonCommercial-ShareAlike 2.0 UK: England & Wales license][cc].

You are free to copy, distribute and transmit the code within this repository, and to make derivative works from the code & content (excluding content pulled in from third parties such as Lanyrd, Foursquare and others – check their licenses) according to the following conditions:

- You must attribute the work by providing a link to this repository.
- You may not use this work for commercial purposes.
- If you alter, transform, or build upon this work, you may distribute the resulting work only under a license identical to this one.
- You must not suggest that The Multipack endorses you or your use of the work.

Please see the [Creative Commons license page][cc] for further information.

[cc]: http://creativecommons.org/licenses/by-nc-sa/2.0/uk/
