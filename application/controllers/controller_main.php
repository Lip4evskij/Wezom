<?php

class Controller_Main extends Controller
{
public $route;
    function __construct()
    {

        $this->model = new Model_View();
        $this->view = new View();
    }
    function action_index($route)
    {
        $this->route=$route;
        $this->getPage();
      //  $this->getList();
       $this->arr['item'] =$this->model->getListModel($this->offset,$this->limit);
       $this->arr['count_page']=$this->total_pages;
        $this->view->generate('main_view.php',
            'template_view.php', $this->arr);

    }
    public function getPage()
    {
        $page=$this->route->page;

        $this->limit=5;
        $this->total_item=$this->model->getPageModel();

        $this->total_pages= ceil($this->total_item/$this->limit);
        $this->offset=($page-1)*$this->limit;
    }





}