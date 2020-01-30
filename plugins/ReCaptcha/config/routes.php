<?php
use Cake\Routing\Router;

Router::plugin('ReCaptcha', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
