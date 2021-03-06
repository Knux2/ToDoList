<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // db connection
    $container['dbConnection'] = function ($c) {
        $settings = $c->get('settings')['db'];
        $db = new PDO($settings['host'].$settings['dbName'], $settings['userName']);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $db;
    };

    $container['todoModel'] = new Portal\Factories\TodoModelFactory();
    $container['ViewFirstListController'] = new Portal\Factories\ViewFirstListControllerFactory();
    $container['AddTaskController'] = new Portal\Factories\AddTaskControllerFactory();
    $container['RemoveTaskController'] = new Portal\Factories\RemoveTaskControllerFactory();
};
