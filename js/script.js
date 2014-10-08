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

  

});
