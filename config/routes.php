<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', function () {
    echo "首页！";
});

Macaw::get('fuck', function () {
    echo "成功！";
});

Macaw::get('/home', 'App\Controllers\HomeController@index');

Macaw::dispatch();