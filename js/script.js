/**
 * Copyright (C) 2012 Multipack
 */
;(function(){ /* ... */ }());
/**
 * This file should be minified to /js/script.min.js.
 * 
 * If you add to this file, please be a good Javascript citizen:
 *   - wrap new functionality in a closure (the function above)
 *     to avoid polluting the namespace
 *   - if you're loading anything, do it as infrequently as possible
 *   - comment it
 *
 * Thank you!
 */
$(function () {
  
  /**
   * set up event interactions
   */
  ;(function () {

    $(".findmore a").click(function (e) {
      $(this).closest('.event').removeClass('folded');
      e.preventDefault();
    });
    $(".findless a").click(function (e) {
      $(this).closest('.event').addClass('folded');
      e.preventDefault();
    });

  }());
  
  
  /**
   * Get all of the tweets
   */
  ;(function () {

    var endpoint = "http://api.twitter.com/1/statuses/user_timeline.json?",
        options = "&exclude_replies=true&count=5&callback=?"; // Callback prevents XHR http://bit.ly/HbQsH7

    var twenty_minutes = 1000 * 60 * 20;

    // Don't reload the tweets if we have them in local storage
    var localStorage = window.localStorage;
    
    var pattern = /((mailto\:|(news|(ht|f)tp(s?))\:\/\/){1}\S+)/ig;

    // Swap out tweet text
    var updateText = function (elem, data) {
      // Does this element actually exist?
      if( $(elem).length === 0 ) { return; }
      // Did we get any data?
      if( !data.text ) { return; }

      // Find text element
      var p = $(elem).find('p');

      // Format the date all nicely like
      var date = data.created_at.split(' '),
          date_string = ["<time>", date[0], date[2], date[1], "at", date[3], "</time>"].join(' ');

      // Make links linky
      var text = data.text;
      text = text.replace(pattern, '<a href="$1">$1</a>');

      // Stick the date on the end
      text = text + date_string;

      // Does it need updating?
      if( $(p).text() !== text ) {
        $(p).height($(p).height()).fadeOut(function () {
          $(p).height('auto').html(text).fadeIn();
        });
      }
    };

    // Go get em, tiger
    var getTweets = function (force) {

      var time_diff = (new Date()).getTime() - localStorage["tweet.check"];

      if( ! localStorage["tweet.check"] || time_diff > twenty_minutes) {
        force = true;
      }

      // If we're not being forced, and we have some tweets in
      // localStorage, stick em in there
      if( !force && localStorage["tweets"] === "yes" ) {
        updateText($('.multipack.tweet blockquote'), JSON.parse(localStorage["tweet.multipack"]));
        updateText($('.leampack.tweet blockquote'), JSON.parse(localStorage["tweet.leampack"]));
        return;
      }

      localStorage["tweet.check"] = (new Date()).getTime();

      // Grab that tweet, oh yeah
      $.getJSON(endpoint + "screen_name=multipack" + options, function (data) {
        localStorage["tweet.multipack"] = JSON.stringify(data[0]);
        updateText($('.multipack.tweet blockquote'), data[0]);
      });
      $.getJSON(endpoint + "screen_name=leampack" + options, function (data) {
        localStorage["tweet.leampack"] = JSON.stringify(data[0]);
        updateText($('.leampack.tweet blockquote'), data[0]);
      });

      // We got the tweets
      localStorage["tweets"] = "yes";
    };

    // Auto update
    setInterval(function () {
      getTweets(true); // Force a refresh
    }, 1000 * 60 * 20); // Check for tweets every twenty minutes

    // If we've got tweets, don't show the (hilarous) messages
    if( localStorage["tweets"] !== undefined ) {
      getTweets(false);
    } else {
      setTimeout(function () {
        getTweets(true); // Dont't force a refresh
      }, 1000 * 5); // Ahem. Synergising.
    }

  }());
  
});