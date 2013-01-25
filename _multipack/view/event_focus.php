<?php if(!empty($this->view_data->event) && !empty($this->view_data->event->meetup)): ?>
<article role="event" class="next <?=$this->view_data->event->meetup ?> event focus">
  <header>
    <h1><?=$this->view_data->event->meetup ?></h1>
    <p>Event Focus:</p>
  </header>
  <?php $this->view_component('event', $this->view_data->event); ?>
</article>
<?php else: ?>
<section role="main">
  <header>
    <?php $this->view_component('nav'); ?>
    <div class="branding">
      <h1>Multipack</h1>
      <h2>Events…</h2>
    </div>
  </header>
  <article role="about">
    <p>Sorry, we couldn’t find any upcoming events, but please check back soon.
		In the meantime, you can find out about all our events on <a class="lanyrd" href="//lanyrd.com/guides/multipack">Lanyrd</a>.</p>
  </article>
</section>
<?php endif; ?>