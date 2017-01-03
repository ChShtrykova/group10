<?php

$routers->get('', 'PageController@home');
$routers->post('add','PageController@add');
$routers->get('task-list', 'TodoController@index');
$routers->post('task/add', 'TodoController@add');
$routers->post('task/update', 'TodoController@update');