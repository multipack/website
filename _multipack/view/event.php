
<article role="details">
  <h2 class="type"><?=$view_component_data->meetup?></h2>
  <h2 class="date"><?=$view_component_data->date?></h2>
  <h2 class="venue"><?=$view_component_data->venue['name']?></h2>
  <h2 class="location"><?=$view_component_data->location?></h2>
  <h2 class="time"><?=$view_component_data->time?></h2>
</article>
<nav role="more">
  <ul>
    <li class="findmore"><a href="#">More Info</a></li>
    <li class="eventfocus"><a href="/<?=$view_component_data->url?>">Map &amp; Details</a></li>
    <li><a href="<?=$view_component_data->lanyrd?>">Lanyrd</a></li>
    <li><a href="//twitter.com/<?=$view_component_data->meetup?>">Twitter</a></li>
    <li class="findless"><a href="#">Close</a></li>
  </ul>
</nav>