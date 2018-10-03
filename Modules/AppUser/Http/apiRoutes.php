<?php 
use Dingo\Api\Routing\Router;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function (Router $api) {
    $api->post('login',function(){
    	echo "dfas";
    });

});
