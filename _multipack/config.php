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
  "multipack" => "meetup",
  "leampack" => "meetup",
  "staffspack" => "meetup",
  "presents" => "event"
);

// Load any class
$config->models = array("lanyrd", "cache");