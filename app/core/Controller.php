<?php

class Controller
{

    public function render($path, $data = [])
    {
        include_once '../app/views/' . $path .'.php';
    }

    public function model($path)
    {
        $path = $path . '_model';
        include_once '../app/models/' . $path .'.php';
        return new $path;
    }
}
