<?php
namespace controllers;

use core\App;
use core\Request;

class PageController
{

    public function home()
    {
        $title = 'Главная';
        $pageTitle = 'Калькулятор';
        $examplesList = App::get('query')->selectAll('plus');

        include "views/index.view.php";
    }

    public function add()
    {
        $examples = $_POST['calculate'];


        App::get('query')->insert('plus', [
            'examples' => $examples,
        ]);

        Request::goBack();
    }

    public function table()
    {
        $rows = 10;
        $cols = 10;
        $color = '#369';

        $title = 'Таблица умножения';
        $pageTitle = 'Таблица умножения';

        include "views/table.view.php";
    }

    public function about()
    {
        require "views/about.view.php";
    }
}