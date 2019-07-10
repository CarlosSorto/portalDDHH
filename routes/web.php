<?php

$router->get('/', function () {
    return view('welcome');
});


$router->group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

$router->get('/', 'SiteController@home')
       ->name('home');
$router->get('acerca-del-portal', 'SiteController@about')
       ->name('about');
$router->get('repositorio-ddhh', 'SiteController@repositories')
       ->name('repositories');
$router->get('directorio-organizaciones', 'SiteController@organizations')
       ->name('organizations');
$router->get('formaciones', 'SiteController@formations')
       ->name('formations');
$router->get('contactenos', 'SiteController@contact')
       ->name('contact');
$router->get('buscar', 'SiteController@search')
        ->name('search');
$router->post('mail', 'SiteController@mail')->name('email.contact');
/*
 * Details Pages
 */

 $router->get('formaciones/{formation}', 'SiteController@formation')
        ->name('formation');
 $router->get('repositorio-ddhh/{document}', 'SiteController@document')
        ->name('document');
 $router->get('directorio-organizaciones/{organization}', 'SiteController@organization')
        ->name('organization');

/*
 * Form Pages
 */

 $router->get('formacion/crear', 'SiteController@create_formation')
        ->name('create.formation');
 $router->get('organizacion/crear', 'SiteController@create_organization')
        ->name('create.organization');
 $router->get('documento/crear', 'SiteController@create_document')
        ->name('create.document');

$router->post('document', 'DocumentsController@store')->name('document.store');
$router->post('organization', 'OrganizationsController@store')->name('organization.store');
$router->post('formation', 'FormationsController@store')->name('formation.store');
