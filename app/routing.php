<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['show', '/item/{id}', 'GET'], // action, url, HTTP method
        ['add', '/Item/add', ['GET','POST']],//action, url, HTTP method
        ['edit','/Item/edit/{id}',['GET','POST']],//action, url, HTTP method
        ['delete','/Item/delete/{id}', 'GET'],//action, url, HTTP method
    ],
    'Category' => [ // Controller
        ['category', '/categories', 'GET'], // action, url, HTTP method
        ['show', '/category/{id}', 'GET'], // action, url, HTTP method
        ['add', '/Category/add', ['GET','POST']], //action,url,HTTP method
        ['edit', '/Category/edit/{id}', ['GET','POST']],//action,url,HTTP method
        ['delete','/Category/delete/{id}', 'GET'],//action, url, HTTP method
    ],
];