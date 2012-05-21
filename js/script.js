$(document).ready(function () {
  
  // Event interactions
  $(".findmore a").click(function (e) {
    $(this).closest('.event').removeClass('folded');
    e.preventDefault();
  });
  $(".findless a").click(function (e) {
    $(this).closest('.event').addClass('folded');
    e.preventDefault();
  });
  
  // Twitter
  var endpoint = "http://api.twitter.com/1/statuses/user_timeline.json?",
      options = "&exclude_replies=true&count=5&callback=?"; // Callback prevents XHR http://bit.ly/HbQsH7
  
  var pattern = /((mailto\:|(news|(ht|f)tp(s?))\:\/\/){1}\S+)/ig;

  // Swap out tweet text
  var updateText = function (elem, data) {
    // Does this element actually exist?
    if( $(elem).length === 0 ) return;
    // Did we get any data?
    if( !data.text ) return;

    // Find text element
    var p = $(elem).find('p');

    // Does it need updating?
    if( $(p).text() !== data.text ) {
      $(p).height($(p).height()).fadeOut(function () {
        var date = data.created_at.split(' '),
            date_string = ["<time>", date[0], date[2], date[1], "at", date[3], "</time>"].join(' ');
        var text = data.text;
        text = text.replace(pattern, '<a href="$1">$1</a>');
        $(p).height('auto').html(text + date_string).fadeIn();
      });
    }
  };

  var getTweets = function () {
    $.getJSON(endpoint + "screen_name=multipack" + options, function (data) {
      updateText($('.multipack.tweet blockquote'), data[0]);
    });
    $.getJSON(endpoint + "screen_name=leampack" + options, function (data) {
      updateText($('.leampack.tweet blockquote'), data[0]);
    });
    $.getJSON(endpoint + "screen_name=staffspack" + options, function (data) {
      updateText($('.staffspack.tweet blockquote'), data[0]);
    });
  };

  setInterval(getTweets, 1000 * 60 * 5); // Check for tweets every five minutes
  setTimeout(getTweets, 1000 * 5); // Ahem

  // Return to top button
  var top = $('.top'), offset = $('section').first().offset().top;
  var hasTransitions = $('html').hasClass('csstransitions');
  var moveFade;
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

  // Debug info
  $('.debug').click(function () {
    if( $(this).height() <= 20 ) {
      $(this).animate({height: 'auto', background: 'transparent'});
    } else {
      $(this).animate({height: '20px', background: '#eee'});
    }
  });
  
});