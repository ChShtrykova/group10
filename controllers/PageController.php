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
        $re = '@\d*([+/*-])\d*@me';
        $calculate = $_POST['calculate'];
        $stm = preg_match($re, $calculate,$m);
        list($a, $b) = explode($m[1], $calculate);
        switch ($m[1]){
            case '+':
                $res = $a+$b;
                break;
            case '-':
                $res = $a-$b;
                break;
            case '*':
               $res = $a*$b;
                break;
            case '/':
                $res = $a/$b;
                break;
        };
        $examples = "$calculate = $res";

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