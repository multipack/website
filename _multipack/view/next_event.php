<?php

  /* Skeleton:

  <article role="event" class="next presents event folded">
    <header>
      <h1>Multipack</h1>
      <p>Next Event</p>
    </header>
    <article role="details">
      <h2 class="type">Type</h2>
      <h2 class="date">Date</h2>
      <h2 class="venue">Venue</h2>
      <h2 class="location">Location</h2>
      <h2 class="time">Time</h2>
    </article>
    <nav role="more">
      <ul>
        <li class="findmore"><a href="#">More Info</a></li>
        <li><a href="#">Map &amp; Details</a></li>
        <li><a href="#">Lanyrd</a></li>
        <li><a href="//twitter.com/leampack">Twitter</a></li>
        <li class="findless"><a href="#">Close</a></li>
      </ul>
    </nav>
  </article>

  */

?>

<article role="event" class="next <?=$this->view_data->events[0]->meetup?> event folded">
  
  <header>
    <h1>Multipack</h1>
    <p>Next Event</p>
  </header>
  <?php $this->view_component('event', $this->view_data->events[0]); ?>
</article>