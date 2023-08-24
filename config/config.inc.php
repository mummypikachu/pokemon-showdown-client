<?php

mb_internal_encoding('UTF-8');

$routes = json_decode(file_get_contents(__DIR__ . '/routes.json'), true);

$psconfig = [
// routes
	'routes' => $routes,
];