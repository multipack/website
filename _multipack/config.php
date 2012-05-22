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

$config->url = "//multipack.dev";
$config->salt = "somesalt";
$config->routes = array(
  "" => "index",
  "multipack" => "meetup_multipack",
  "leampack" => "meetup_leampack",
  "staffspack" => "meetup_staffspack",
  "presents" => "presents"
);

// Load any class
$config->models = array("lanyrd", "cache");