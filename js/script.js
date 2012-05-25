/**
 * Multipack JS
 *
 * If you add to this file, please be a good Javascript citizen:
 *   - wrap new functionality in a closure to avoid polluting the namespace
 *   - if you're loading anything, do it as infrequently as possible
 *   - comment it
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

    // Don't reload the tweets if we have them in local storage
    var localStorage = window.localStorage;
    
    var pattern = /((mailto\:|(news|(ht|f)tp(s?))\:\/\/){1}\S+)/ig;

    // Swap out tweet text
    var updateText = function (elem, data) {
      // Does this element actually exist?
      if( $(elem).length === 0 ) return;
      // Did we get any data?
      if( !data.text ) return;

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

      // If we're not being forced, and we have some tweets in
      // localStorage, stick em in there
      if( !force && localStorage["tweets"] === "yes" ) {
        updateText($('.multipack.tweet blockquote'), JSON.parse(localStorage["tweet.multipack"]));
        updateText($('.leampack.tweet blockquote'), JSON.parse(localStorage["tweet.leampack"]));
        return;
      }

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
  
  
  /**
   * Return to top button
   */
  ;(function () {

    var top = $('.top'),
        offset = $('section').first().offset().top;
    var hasTransitions = $('html').hasClass('csstransitions');
    var moveFade;

    // Move up on click
    $(top).click(function (e) {
      e.preventDefault();
      var initialPosition = $('body').scrollTop();
      $('body').animate({scrollTop: 0});
      setTimeout(function () {
        if( $('body').scrollTop() >= initialPosition ) {
          $('body').scrollTop(0);
        }
      }, 200);
    });

    // Move the button as the user scrolls
    $(window).scroll(function () {

      // Don't move yet, still scrollin'
      clearTimeout(moveFade);

      // Move the button after 100ms of no scrolling
      moveFade = setTimeout(function () {
        // Fade it out at the top
        if( $(window).scrollTop() < offset) {
          if( hasTransitions ) {
            $(top).css({opacity: 0});
          } else {
            $(top).fadeOut('slow');
          }
        } else {
          if( hasTransitions ) {
            $(top).css({opacity: 0.5});
          } else {
            $(top).fadeIn('slow');
          }
        }
        // Move it real good
        if( hasTransitions ) {
          $(top).css({top: $(window).scrollTop()});
        } else {
          $(top).animate({top: $(window).scrollTop()});
        }
      }, 200);

    });

    // Trigger a scroll event
    $(window).scroll();

  }());
  
});