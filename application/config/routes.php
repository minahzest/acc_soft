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
$route['default_controller'] = 'Welcome';
$route['404_override'] = 'Welcome/not_found';
$route['translate_uri_dashes'] = FALSE;

$route['sign-in'] = 'SystemLogin/signin';
$route['back-office'] = 'AdminMain';
$route['logout'] = 'SystemLogin/logout';

//inventory 
$route['invent'] = 'Inventory';
$route['available_inventory'] = 'Inventory/invent';
$route['getInven'] = 'Inventory/getInventory';
$route['getSubInven'] = 'Inventory/getSubInventory';
$route['create_inventory'] = 'Inventory/createInventory';
$route['addInventory'] = 'Inventory/addInventory';
$route['getInvDetails'] = 'Inventory/getInvDetails';
$route['check_name_ajax'] = 'Inventory/check_name_ajax';
$route['update_inv_ajax'] = 'Inventory/update_inv_ajax';


//suppliers
$route['sup'] = 'Supplier';
$route['available_supplier'] = 'Supplier/sup';
$route['save_supplier_ajax'] = 'Supplier/save_supplier_ajax';
$route['payments'] = 'Supplier/payments';


//Categories
$route['cat'] = 'Category';
$route['available_category'] = 'Category/cat';
$route['create_category'] = 'Category';
$route['report_category'] = 'Category';
$route['save_cat_ajax'] = 'Category/save_cat_ajax';


//Categories
$route['brd'] = 'Brand';
$route['available_brand'] = 'Brand/brd';
$route['save_brand_ajax'] = 'Brand/save_brand_ajax';


//Sales
$route['sls'] = 'Sales';
$route['Sales'] = 'Sales/billing';
$route['bill_list'] = 'Sales/bill_list';
$route['getProInfo'] = 'Sales/getProInfo';
$route['addList'] = 'Sales/addList';
$route['remove_cart_item_ajax'] = 'Sales/remove_cart_item_ajax';
$route['save_invoice_ajax'] = 'Sales/save_invoice_ajax';
$route['invoice'] = 'Sales/invoice';
$route['view_invoice/(:num)'] = 'Sales/view_invoice/$1';
$route['update_qty_ajax'] = 'Sales/update_qty_ajax';
$route['update_status_ajax'] = 'Sales/update_status_ajax';











