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
/*

*/
//$route['produit'] = 'product/create_product';



//$route['default_controller'] = 'product';
$route['connection'] = 'connexion';
$route['produits'] = '';
$route['categories'] = '';
$route['reservations/client'] = 'book/list_book';
$route['reservations/liste'] = 'book/list_book_all_admin';
$route['profil'] = 'profile';
$route['profil/modification'] = 'profile/update_info_pwd_view';
$route['deconnecter']='connexion/disconnect_to_welcome_page';
$route['produits/liste']='productajax/list_product';

$route['categories/categorie'] = 'categoryajax/get_product_by_category';
$route['produits/produit/id'] = 'productajax/afficher_idProd';
$route['produits/produit/information/'] = 'productajax/product_info/';
$route['inscription'] = 'register/registration';
$route['categories'] = 'categoryajax/list_category';
$route['reserver'] = 'book/book_product';
$route['produits/produit/creer']='product/create_product';
$route['categories/categorie/creer']='category/create_category';

$route['categories/categorie/information'] = 'categoryajax/info_category';
$route['categories/categorie/modifier'] = 'category/update_category';
$route['categories/categorie/telecharger'] = 'category/do_upload_category';
$route['produits/produit/information/administrateur'] = 'productajax/product_info_admin';
$route['produits/produit/modifier']='product/update_product';
$route['produits/produit/supprimer/']='product/delete_product/';
$route['produits/produit/chercher/']='searchproduct/search/';





$route['default_controller'] = 'product';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
