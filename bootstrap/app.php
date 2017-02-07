<?php
use Illuminate\Database\Capsule\Manager as Capsule;

// Autoload 自动载入
require '../vendor/autoload.php';

//Eloquent
$capsule = new Capsule;

$capsule->addConnection(require '../config/database.php');

$capsule->bootEloquent();

// whoops 错误提示
$whoops = new \Whoops\Run;

$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

$whoops->register();