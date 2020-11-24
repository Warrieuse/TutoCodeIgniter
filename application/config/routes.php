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
$route['default_controller'] = 'site';	// Si aucun paramètre n'est donné, c'est
										// la route qui sera utilisée. Il n'est
										// pas nécessaire d'indiquer la méthode
										// 'index()' c'est celle qui est appelée
										// par défaut

//J'aimerais que l'adresse http://localhost/blog/ nous donne la liste des articles de notre blog.
$route['blog'] = 'blog/index'; // l'URI 'blog' sera redirigée vers 'blog/index'
//Attention ! $route['blog'] doit se trouver avant $route['(:any)'], 
//sinon c'est cette dernière qui sera prise en compte et nous aurons
//toujours une erreur si nous voulons accéder à l'adresse http://localhost/blog/.
$route ['(:any)'] = 'site/$1'; 	// si un seul paramètre est donné, il sera utilisé
								// comme méthode du contrôleur 'site'. Cela per-
								// mettra de 'cacher' ce dernier dans les adresses.

$route ['blog/(:any)_(:num)'] = 'blog/article/$2'; 	// $2 se réfère au contenu du
													// deuxième jeu de parenthèses
$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

