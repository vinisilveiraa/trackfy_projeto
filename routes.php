<?php

// oq for view/controller ta definido como tal
$routes = [
  '/' => ['view' => 'views/home.php'],
  '/home' => ['view' => 'views/home.php'],

  '/library' => ['view' => 'views/library.php'],
  '/search' => ['view' => 'views/search.php'],
  '/profile' => ['view' => 'views/profile.php'],
  '/track' => ['view' => 'views/track.php'],
  '/add_track' => ['view' => 'views/add_track.php'],
  '/add_album' => ['view' => 'views/add_album.php'],
  
  
  '/login' => ['controller' => 'AuthController', 'method' => 'login'],
  '/logout' => ['controller' => 'AuthController', 'method' => 'logout'],
  '/register' => ['controller' => 'AuthController', 'method' => 'register'],
  
  
  '/add_album' => ['controller' => 'AlbumController', 'method' => 'add_album'],
  '/add_track' => ['controller' => 'TrackController', 'method' => 'add_track'],

  '/search' => ['controller' => 'SearchController', 'method' => 'search'],
  '/profile/{username}' => ['controller' => 'UserController', 'method' => 'show'],
  '/track/{slug}' => ['controller' => 'TrackController', 'method' => 'show']

];
