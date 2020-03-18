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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'Admin/index';
$route['admin/login'] = 'Admin/index';
$route['admin/postLogin'] = 'Admin/postLogin';
$route['admin/logout'] = 'Admin/logout';

$route['admin/dashboard'] = 'Admin/dashboard';

//Sectors
$route['admin/sectors'] = 'Sector/index';
$route['admin/sectors/new'] = 'Sector/addForm';
$route['admin/sectors/addnew'] = 'Sector/addNewSector';
$route['admin/update/category/(:any)'] = 'Sector/update/$1';
$route['admin/delete/category/(:any)'] = 'Sector/delete/$1';
$route['admin/delete/categories'] = 'Sector/deleteSelected';
$route['admin/active/category/(:any)'] = 'Sector/changeStatus/$1/1';
$route['admin/deactive/category/(:any)'] = 'Sector/changeStatus/$1/0';

//FAQs
$route['admin/faq'] = 'Faq/index';
$route['admin/faq/new'] = 'Faq/addForm';
$route['admin/faq/addnew'] = 'Faq/addNewFaq';
$route['admin/update/faq/(:any)'] = 'Faq/update/$1';
$route['admin/delete/faq/(:any)'] = 'Faq/delete/$1';
$route['admin/delete/faqs'] = 'Faq/deleteSelected';
$route['admin/active/faq/(:any)'] = 'Faq/changeStatus/$1/1';
$route['admin/deactive/faq/(:any)'] = 'Faq/changeStatus/$1/0';

//News
$route['admin/news'] = 'News/index';
$route['admin/news/new'] = 'News/addForm';
$route['admin/news/addnew'] = 'News/addNewNews';
$route['admin/update/news/(:any)'] = 'News/update/$1';
$route['admin/delete/news/(:any)'] = 'News/delete/$1';
$route['admin/delete/news'] = 'News/deleteSelected';
$route['admin/active/news/(:any)'] = 'News/changeStatus/$1/1';
$route['admin/deactive/news/(:any)'] = 'News/changeStatus/$1/0';

//Blogs
$route['admin/blogs'] = 'Blogs/index';
$route['admin/blogs/new'] = 'Blogs/addForm';
$route['admin/blogs/addnew'] = 'Blogs/addNewBlog';
$route['admin/update/blogs/(:any)'] = 'Blogs/update/$1';
$route['admin/delete/blogs/(:any)'] = 'Blogs/delete/$1';
$route['admin/delete/blogs'] = 'Blogs/deleteSelected';
$route['admin/active/blogs/(:any)'] = 'Blogs/changeStatus/$1/1';
$route['admin/deactive/blogs/(:any)'] = 'Blogs/changeStatus/$1/0';