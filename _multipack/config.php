<?php

/**
 * ✨
 * MULTIPACK
 * 
 * Site Configuration
 * 
 * Choose which environment you are configuring
 * using $config->environment(...)
 */

// Dev
$config->environment('development');
$config->url = "//multipack.dev";
$config->routes = array(
  "" => "index",
  "birmingham" => "meetup_multipack",
  "leamington" => "meetup_leampack",
  "staffspack" => "meetup_staffspack",
  "show-and-tell" => "event_showandtell",
  "style" => "style"
);

$config->models = array("lanyrd", "cache");

// Production
$config->environment('production');
$config->url = "//beta.multipack.co.uk";
