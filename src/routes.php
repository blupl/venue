<?php

use Illuminate\Routing\Router;
use Orchestra\Support\Facades\Foundation;

/*
|--------------------------------------------------------------------------
| Frontend Routing
|--------------------------------------------------------------------------
*/

Foundation::group('blupl/venue', 'venue', ['namespace' => 'Blupl\Venue\Http\Controllers'], function (Router $router) {

    $router->post('printing/pdf/batch', 'PrintingController@batchPrinting');
    $router->get('printing/pdf/{id}', 'PrintingController@pdf');
    $router->get('printing/{id}', 'PrintingController@show');
    $router->get('printing', 'PrintingController@index');

    $router->get('approval/pdf/{id}', 'ApprovalController@pdf');
    $router->get('approval/archive/{id}', 'ApprovalController@archive');
    $router->get('approval/member/{id}', 'ApprovalController@showReporter');
    $router->put('approval/zone/batch', 'ApprovalController@storeBatchApproval');
    $router->post('approval/zone/batch', 'ApprovalController@batchApproval');
    $router->put('approval/zone/{id}', ['as' => 'venue.approval.zone', 'uses'=>'ApprovalController@update']);
    $router->get('approval/{id}', 'ApprovalController@show');
    $router->get('approval', 'ApprovalController@index');

    $router->post('member/registration', 'VenueController@store');
    $router->get('member/registration', 'VenueController@create');
    $router->get('member', 'VenueController@index');
    $router->get('/', 'HomeController@index');
});

/*
|--------------------------------------------------------------------------
| Backend Routing
|--------------------------------------------------------------------------
*/

Foundation::namespaced('Blupl\Venue\Http\Controllers\Admin', function (Router $router) {
    $router->group(['prefix' => 'venue'], function (Router $router) {
        $router->get('/', 'HomeController@index');
        $router->match(['GET', 'HEAD', 'DELETE'], 'profile/{roles}/delete', 'HomeController@delete');

    });
});
