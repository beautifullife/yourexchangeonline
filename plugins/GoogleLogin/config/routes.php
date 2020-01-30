<?php
use Cake\Routing\Router;

Router::plugin('GoogleLogin', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
