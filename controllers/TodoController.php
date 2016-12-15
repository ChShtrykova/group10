<?php

class TodoController
{

    public function index()
    {
        $taskList = App::get('query')->selectAll('todo');

        include "views/todo.view.php";
    }

    public function add()
    {
        $title = $_POST['task'];


        App::get('query')->insert('todo', [
            'title' => $title,
        ]);

        Request::goBack();
    }

    public function update()
    {
        if (isset($_POST['act'])){
            if($_POST['act']=='u') {

                App::get('query')->update('todo', $_POST['complete']);
            }
            if ($_POST['act']=='d'){

                App::get('query')->del('todo', $_POST['complete']);
            }
        }
        Request::goBack();
    }
}