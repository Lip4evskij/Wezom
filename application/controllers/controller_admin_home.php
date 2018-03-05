<?php
class Controller_Admin_Home extends Controller
{
    public function __construct()
    {
        $this->model=new Model_Admin();
        $this->view = new View();
    }
    function action_index()
    {

        $list=$this->model->list_news();

        $this->view->generate('/admins/home.php',
            'template_view.php',$list);
    }
}