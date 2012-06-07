<article role="event" class="next <?=$this->view_data->event->meetup ?> event focus">
  <header>
    <h1><?=$this->view_data->event->meetup ?></h1>
    <p>Event Focus:</p>
  </header>
  <?php $this->view_component('event', $this->view_data->event); ?>
</article>