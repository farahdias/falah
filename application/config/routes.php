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
$route['default_controller'] = 'Frontend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['article']			   = 'Frontend/blog';
$route['category/(:any)']      = 'Frontend/category/$1';
$route['(:any)/(:any)/(:any)'] = 'Frontend/detail_page/$1/$2/$3';
$route['contact']			   = 'Frontend/contact';
$route['about_us']             = 'Frontend/about_us';


///////////////////////////

$route['panel/auth'] = 'Auth';
$route['content/page/(:any)/list']   	  = 'Content/page/$1';
$route['content/page/(:any)/tambah'] 	  = 'Content/add/$1';
$route['content/page/(:any)/edit/(:any)'] = 'Content/edit/$1/$2';

$route['insert_content']			 		 = 'Content/insert';
$route['update_content/(:any)']				 = 'Content/update/$1';
$route['delete/content/(:any)/(:any)'] 		 = 'Content/delete/$1/$2';
$route['set_approval/content/(:any)/(:any)/(:any)'] = 'Content/set_approval/$1/$2/$3';

$route['master_data/category'] = 'Category';
$route['insert_category']	   = 'Category/insert';
$route['delete_category/(:any)'] = 'Category/delete/$1';
$route['update_category']	   	= 'Category/update';
$route['set_approval/category/(:any)/(:any)'] = 'Category/set_approval/$1/$2'; 

$route['master_data/about_us'] = 'Content/about_us';
$route['update_about_us']	   = 'Content/update_about_us';