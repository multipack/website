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
$config->redirects = array(
	'about'		=> '/',
	'events'	=> '/show-and-tell',
	'presents'	=> '/show-and-tell',
	'leampack'	=> '/leamington',
	
	// old presents URLs
	'presents/mobile-development' => 'http://v2.multipack.co.uk/presents/mobile-development/',
	'presents/show-and-tell' => 'http://v2.multipack.co.uk/presents/show-and-tell/',
	'presents/the-design-process' => 'http://v2.multipack.co.uk/presents/the-design-process/',
	'presents/rich-internet-applications' => 'http://v2.multipack.co.uk/presents/rich-internet-applications/',
	'presents/coding-standards' => 'http://v2.multipack.co.uk/presents/coding-standards/',
	'presents/being-green' => 'http://v2.multipack.co.uk/presents/being-green/',
	'presents/emerging-standards' => 'http://v2.multipack.co.uk/presents/emerging-standards/',
);

$config->models = array("lanyrd", "cache");

// Production
$config->environment('production');
$config->url = "//multipack.co.uk";