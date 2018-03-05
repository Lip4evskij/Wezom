<?php
class Controller {

    public $model;
    public $view;
    public $route;
    public $limit=5;
    public $total_pages;
    public $offset;
    public $total_item;
    public $arr=[];

    function __construct()
    {

        $this->view = new View();
        echo "1";die;
    }


}