<?php

$router->namespace('API')->group(function ($router) {
    $router->resource('documents', 'DocumentsController', ['only'=> ['index']]);
    $router->resource('formations', 'FormationsController', ['only'=> ['index']]);
    $router->resource('organizations', 'OrganizationsController', ['only'=> ['index']]);
    $router->resource('countries', 'CountriesController', ['only'=> ['index']]);
});
