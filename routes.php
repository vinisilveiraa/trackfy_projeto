<?php

// oq for view/controller ta definido como tal
$routes = [
  '/' => ['view' => 'views/home.php'],
  '/home' => ['view' => 'views/home.php'],

  '/login' => ['controller' => 'AuthController', 'method' => 'login'],
  '/logout' => ['controller' => 'AuthController', 'method' => 'logout'],
  
  '/register' => ['controller' => 'AuthController', 'method' => 'register'],

  '/library' => ['view' => 'views/library.php'],
  '/profile' => ['view' => 'views/profile.php'],
  '/search' => ['view' => 'views/search.php'],
  '/track' => ['view' => 'views/track.php']
];
