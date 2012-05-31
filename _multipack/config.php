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
  "presents" => "presents",
  "style" => "style"
);

$config->models = array("lanyrd", "cache");

// Production
$config->environment('production');
$config->url = "//beta.multipack.co.uk";
