<?php
use Cake\Routing\Router;

Router::plugin('GooglePlus', ['path' => '/googleplus'], function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
