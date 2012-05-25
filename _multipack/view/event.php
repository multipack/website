<? /*

  <p class="synopsis extra"><a href="//j.mp/multipackpresentstickets">Grab your free ticket</a> for the first Multipack Presents of the year, featuring special guest keynote speakers Elliot Jay Stocks (of 8 Faces and Viewport Industries) and Joel Gascoigne (of Buffer).</p>
  <div class="speakers photos extra">
    <ul>
      <li><a href="//twitter.com/#!/elliotjaystocks"><img src="//twimg0-a.akamaihd.net/profile_images/1775191076/elliot_reasonably_small.jpg" alt="Elliot Jay Stocks"></a></li>
      <li><a href="//twitter.com/#!/joelgascgoine"><img src="//twimg0-a.akamaihd.net/profile_images/1395764787/joel-spain-avatar-buffer_reasonably_small.png" alt="Joel Gascoigne"></a></li>
      <li><a href="//twitter.com/#!/nivi_ms"><img src="//twimg0-a.akamaihd.net/profile_images/1781387684/_MG_4888_reasonably_small.jpg" alt="Nivi Morales"></a></li>
      <li><a href="//twitter.com/#!/peteweb"><img src="//twimg0-a.akamaihd.net/profile_images/1528765469/image_reasonably_small.jpg" alt="Pete Lancaster"></a></li>
      <li><a href="//twitter.com/#!/rythie"><img src="//twimg0-a.akamaihd.net/profile_images/1463371257/230892_10150254594151070_556271069_9383710_1138365_n_reasonably_small.jpg" alt="Richard Cunningham"></a></li>
      <li><a href="//twitter.com/#!/rachelmccollin"><img src="//twimg0-a.akamaihd.net/profile_images/1440763146/RMjulprofile_reasonably_small.jpg" alt="Rachel McCollin"></a></li>
      <li><a href="//twitter.com/#!/mrsteveheyes"><img src="//twimg0-a.akamaihd.net/profile_images/1384225849/Steve_Avatar_reasonably_small.jpg" alt="Steve Heyes"></a></li>
      <li><a href="//twitter.com/#!/phuunet"><img src="//twimg0-a.akamaihd.net/profile_images/1501820894/Photo_on_18-08-2011_at_14.50_reasonably_small.jpg" alt="Tom Ashworth"></a></li>
    </ul>
  </div>
  <div class="map iframe">
    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=52.2934915623%2C-1.53812362806+%28The+White+Horse%29&amp;output=embed"></iframe>
  </div>
  <div class="map mapimage">
    <a href="http://maps.google.com/maps?q=52.2934915623%2C-1.53812362806+%28The+White+Horse%29"><img src="http://maps.google.com/maps/api/staticmap?center=52.2934915623,-1.53812362806&amp;zoom=15&amp;size=425x350&amp;sensor=false&amp;markers=size:mid|color:blue|52.2934915623,-1.53812362806"></a>
  </div>

*/ ?>

<article role="details">
  <h2 class="type"><?=$view_component_data->meetup?></h2>
  <h2 class="date"><?=$view_component_data->date?></h2>
  <h2 class="venue"><?=$view_component_data->venue['name']?></h2>
  <h2 class="location"><?=$view_component_data->location?></h2>
  <h2 class="time"><?=$view_component_data->time?></h2>
</article>
<p class="synopsis extra"><?=$view_component_data->tagline?></p>
<div class="map iframe">
  <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?=$view_component_data->map_url?>&amp;output=embed"></iframe>
</div>
<div class="map mapimage">
  <a href="<?=$view_component_data->map_url?>"><img src="http://maps.google.com/maps/api/staticmap?center=<?=$view_component_data->venue['latitude']?>,<?=$view_component_data->venue['longitude']?>&amp;zoom=15&amp;size=425x350&amp;sensor=false&amp;markers=size:mid|color:blue|<?=$view_component_data->venue['latitude']?>,<?=$view_component_data->venue['longitude']?>"></a>
</div>
<nav role="more">
  <ul>
    <li class="findmore"><a href="#">More Info</a></li>
    <li class="eventfocus"><a href="/<?=$view_component_data->url?>">Map &amp; Details</a></li>
    <li><a href="<?=$view_component_data->lanyrd?>">Lanyrd</a></li>
    <li><a href="//twitter.com/<?=$view_component_data->meetup?>">Twitter</a></li>
    <li class="findless"><a href="#">Close</a></li>
  </ul>
</nav>