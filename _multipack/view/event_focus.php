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
      <h2><?=$this->view_data->title; ?></h2>
    </div>
  </header>
  <article role="about">
    <p>Sorry, we couldn&rsquo;t get details of upcoming events from Lanyrd. 
        Birmingham&rsquo;s meet-up takes place at 2pm on the second Saturday of each month and 
        Leamington&rsquo;s meet-up takes place at 7:30pm on the last Tuesday of each month.
		For further details, find out about all our events on <a class="lanyrd" href="//lanyrd.com/guides/multipack">Lanyrd</a>.</p>
  </article>
</section>
<?php endif; ?>
