<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019/12/24
 * Time: 9:33
 */
require_once __DIR__.'/vendor/autoload.php';
use Workerman\Worker;
// Create a http worker
$http_worker = new Worker("http://0.0.0.0:2345");
$http_worker->count = 10;

//接收数据时发出
$http_worker->onMessage = function ($connect, $data){
    var_dump($_GET,$_POST,$_COOKIE,$_SESSION);
    //发送数据给客户端
    $connect->send("你好,ferre");
};


// Run worker
Worker::runAll();
