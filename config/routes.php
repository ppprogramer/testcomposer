<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', function () {
    echo "首页！";
});

Macaw::get('fuck', function () {
    echo "成功！";
});

Macaw::$error_callback = function() {
    throw new Exception("路由无匹配项 404 Not Found");
};

Macaw::get('/home', 'App\Controllers\HomeController@index');
Macaw::get('/sendMail', 'App\Controllers\HomeController@sendMail');

Macaw::dispatch();