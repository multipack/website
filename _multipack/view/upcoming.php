<?php

  /* Skeleton:

  <li role="event" class="folded multipack event">
    <header>
      <h1>Multipack</h1>
      <p>Upcoming Event</p>
    </header>
    <article role="details">
      <h2 class="type">Multipack</h2>
      <h2 class="date">14 Feb</h2>
      <h2 class="venue"><span class="extra">The </span>Old Joint Stock</h2>
      <h2 class="location">Birmingham</h2>
      <h2 class="time">7pm</h2>
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
  </li>

  */

?>

<section>
  <article role="upcoming" class="upcoming">
    <h3>Upcoming events:</h3>
    <ul>
    <?php foreach( $this->view_data->events as $event ): ?>

      <li role="event" class="folded <?=$event->meetup?> event">
        <header>
          <h1>Multipack</h1>
          <p>Upcoming Event:</p>
        </header>
        <?php $this->view_component('event', $event); ?>
      </li>

    <?php endforeach; ?>
    </ul>
  </article>
</section>