<?php
class Controller_Admin_News extends Controller
{
    public $request;
    public function __construct()
    {

        $this->request= new Request();
        $this->model= new Model_News();
        $this->view = new View();
    }
    function action_index()
    {

        $add=$this->model->get_list([]);
        $add['err1']=$this->test_data();
        $t=$this->model->get_id(3);
        $ad=$this->model->add();

        var_dump($ad);die();
        $this->view->generate('/admins/news/list.php',
            'template_view.php',$add);

    }
    public  function action_add()
    {
        $data=[];
        $this->view->generate('/admins/news/form.php',
            'template_view.php',$data);

    }
    public function action_edit()
    {
        //var_dump($this);die;
        $id=$this->request->get_param('get','id',false);
        if ($id)
        {

            $data=[];//сделать выборку данных по id
            $this->view->generate('/admins/news/form.php',
                'template_view.php',$data);
        }
        else
        {
            die('404 news error not id');
        }

    }
    public function test_data()
    {
        $post=$this->request->post;
        $msg=false;
        $err=false;
           if($post)
           {
               $title=strip_tags(trim($_POST['title']));
               $text=strip_tags(trim($_POST['text']));
               $author=strip_tags(trim($_POST['author']));
               $target_image="images/";
               $target_image=$target_image.basename($_FILES['uploadedfile']['name']);
               if($title=='')
               {
                   $err['title']=true;
               }

               if($text=='')
               {
                   $err['text']=true;
               }
               if($author=='')
               {
                   $err['author']=true;
               }
           }



            return $err;
    }
}