<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/

# Davao Aguilas custom routes
$route['api/videos/(:num)'] = 'api/videos/single/$1';
$route['api/videos/type/(:any)'] = 'api/videos/type/$1';
$route['api/news/(:num)'] = 'api/news/single/$1';
$route['api/partners/(:num)'] = 'api/partners/single/$1';
$route['api/members/(:num)'] = 'api/members/single/$1';
$route['api/teams/(:num)'] = 'api/teams/single/$1';
$route['api/players/(:num)'] = 'api/players/single/$1';
$route['api/squad/(:any)'] = 'api/players/squad/$1';
$route['api/icons/(:num)'] = 'api/icons/single/$1';
$route['api/team_stats/(:num)'] = 'api/team_stats/single/$1';
$route['api/general_stats/(:num)'] = 'api/general_stats/single/$1';
$route['api/team_stats/team/default'] = 'api/team_stats/team/0/default';
$route['api/general_stats/team/default'] = 'api/general_stats/team/0/default';
$route['api/general_stats/player/(:num)'] = 'api/general_stats/player/$1';
$route['api/team_stats/team/(:num)'] = 'api/team_stats/team/$1';
$route['api/player_stats/(:num)'] = 'api/player_stats/single/$1';
$route['api/leagues/(:num)'] = 'api/leagues/single/$1';
$route['api/fixtures/leagues/(:num)/mixed/(:any)/(:any)'] = 'api/fixtures/mixed/$1/$2/$3';
// $route['api/fixtures/leagues/(:num)/upcoming'] = 'api/fixtures/leagues/$1/upcoming';
// $route['api/fixtures/leagues/(:num)/final'] = 'api/fixtures/leagues/$1/final';
// $route['api/fixtures/leagues/(:num)/ongoing'] = 'api/fixtures/leagues/$1/ongoing';
$route['api/fixtures/upcoming/'] = 'api/fixtures/upcoming';
$route['api/fixtures/recent/'] = 'api/fixtures/recent';
$route['api/ladders/leagues/(:num)/standings'] = 'api/ladders/standings/$1';
$route['api/ladders/leagues/(:num)/home'] = 'api/ladders/home/$1';
$route['api/ladders/leagues/(:num)/away'] = 'api/ladders/away/$1';
$route['api/ladders/(:num)'] = 'api/ladders/single/$1';
$route['api/fixtures/(:num)'] = 'api/fixtures/single/$1';
$route['api/commentary/(:num)'] = 'api/commentary/single/$1';
$route['api/cpm/(:num)'] = 'api/cpm/single/$1';
$route['api/match_stats/(:num)'] = 'api/match_stats/single/$1';
$route['api/lineups/(:num)'] = 'api/lineups/single/$1';
$route['api/geo_tags/(:num)'] = 'api/geo_tags/single/$1';
$route['api/actions/(:num)'] = 'api/actions/single/$1';
$route['api/lineups/(:num)/default'] = 'api/lineups/default/$1';
$route['api/fixtures/(:num)/lineups/default'] = 'api/lineups/default/$1';
$route['api/fixtures/(:num)/match_reports'] = 'api/match_reports/single/$1';
$route['api/fixtures/(:num)/commentary'] = 'api/commentary/single/$1';
$route['api/fixtures/(:num)/lineups'] = 'api/lineups/teams/$1';
$route['api/match_stats/fixtures/(:num)'] = 'api/match_stats/fixtures/$1';
$route['api/teams/default/id'] = 'api/teams/default/id';
$route['notifications/new/(:any)'] = 'notification/notify/$1';

# Migration
$route['migrate/(:any)'] = 'migrate/index/$1';

# Restserver default examples
$route['api/example/users/(:num)'] = 'api/example/users/id/$1';
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
