<?php return array (
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravel/ui' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Ui\\UiServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nuwave/lighthouse' => 
  array (
    'providers' => 
    array (
      0 => 'Nuwave\\Lighthouse\\LighthouseServiceProvider',
      1 => 'Nuwave\\Lighthouse\\SoftDeletes\\SoftDeletesServiceProvider',
      2 => 'Nuwave\\Lighthouse\\OrderBy\\OrderByServiceProvider',
    ),
    'aliases' => 
    array (
      'graphql' => 'Nuwave\\Lighthouse\\GraphQL',
    ),
  ),
  'tymon/jwt-auth' => 
  array (
    'aliases' => 
    array (
      'JWTAuth' => 'Tymon\\JWTAuth\\Facades\\JWTAuth',
      'JWTFactory' => 'Tymon\\JWTAuth\\Facades\\JWTFactory',
    ),
    'providers' => 
    array (
      0 => 'Tymon\\JWTAuth\\Providers\\LaravelServiceProvider',
    ),
  ),
);