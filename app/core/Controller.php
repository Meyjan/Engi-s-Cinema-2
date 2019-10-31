<?php

class Controller{

    public function render($path, $data = []) {
        require_once '../app/views/' . $path .'.php';
}

    public function model($path) {
        $path = $path . '_model';
        require_once '../app/models/' . $path .'.php';
        return new $path;
    }
}
