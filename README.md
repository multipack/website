# Heyo.

This here's the website of the [Multipack](http://multipack.co.uk).

You're very welcome to submit an issue or a pull request if you spot anything that need improving, be it content, code or comments.

This site is a gracefully-degrading responsive site. It's not prefect on every device, and we rely on the community to help. If you don't feel you can make a contribution directly in code, please submit a new issue so someone else can pick it up.

## Development Tips

If you're au fait with editing php.ini, and making sure things are writable by your apache process:

- Make sure your version of PHP supports short opening tags
- Make sure that your `php.ini` file has the setting `short_open_tag` set to `On`.
- Create a directory called `_multipack/cache/`, a file called `_multipack/model/results` and ensure they're both writable – these are within the `.gitignore` file to prevent cached files and temporary results ending up in source control.

If you're not sure how to do this, open up a terminal window and follow these instructions:

- Find out where your `php.ini` file is – type `php -i | grep php.ini` and hit enter. It's usually in `/etc/` or `/private/etc/'.
- Go to the directory you found earlier - type `cd /private/etc/' and hit enter.
- If `php.ini` doesn't exist (`ls | grep php.ini` will show you if it does) then type `sudo cp php.ini.default php.ini` and hit enter.
- Using the editor of your choice (I'll assume nano) edit your new `php.ini` file - type `sudo nano php.ini` and hit enter.
- Hit CTRL-W (where-is), type `short_open_tag` and hit enter. Make sure this is uncommented and set to `On`.
- Hit CTRL-W again, type `date.timezone` and hit enter. For the purposes of the Multipack, you'll want to uncomment this and set it to `Europe/London`.
- Hit CTRL-O (write-out) and hit enter to write the file to its existing location.
- Hit CTRL-X (exit).
- Type `sudo apachectl graceful` and hit enter to restart Apache.

That sorts out the short tags and timezone settings. Next, you'll want to create the cache directory and results file:

- Use `cd` to move to the directory containing the website files.
- Type `mkdir _multipack/cache` and hit enter.
- Type `chmod 666 _multipack/cache` and hit enter.
- Type `touch _multipack/model/results` and hit enter.
- Type `chmod 666 _multipack/model/results` and hit enter.

Note, of course, that this method of making the directory and files writable is only suitable for a local development environment as it makes them writable by anyone. **It is totally not suitable for a production environment.** This is a quick and dirty method to help you get these bits writable without having to worry about what group your apache process is running under or having to use `chgrp` on these files.

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

Ask @phuu if problems with Lowcarb crop up.

## License

The website and all code is licensed under the [Creative Commons Attribution-NonCommercial-ShareAlike 2.0 UK: England & Wales license][cc].

You are free to copy, distribute and transmit the code within this repository, and to make derivative works from the code & content (excluding content pulled in from third parties such as Lanyrd, Foursquare and others – check their licenses) according to the following conditions:

- You must attribute the work by providing a link to this repository.
- You may not use this work for commercial purposes.
- If you alter, transform, or build upon this work, you may distribute the resulting work only under a license identical to this one.
- You must not suggest that The Multipack endorses you or your use of the work.

Please see the [Creative Commons license page][cc] for further information.

[cc]: http://creativecommons.org/licenses/by-nc-sa/2.0/uk/
