<?php
class Route
{
    public $page=1;
    public $is_admin=false;

    public function start()
    {
        $request=new Request();
        $this->page=$request->get_param('get','page',1);

        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        $url=$_SERVER['REQUEST_URI'];
        $url=explode('?',$url);

        $routes = explode('/', $url[0]);

        // получаем имя контроллера
        if ( !empty($routes[1]) )
        {
            if ($routes[1]=='admin')
            {
                $this->is_admin=true;
                if (isset($routes[2]) && $routes[2]!='')
                {
                    $controller_name ='admin_'. $routes[2];
                    if ( !empty($routes[3]) )
                    {

                        $action_name = $routes[3];
                    }
                }
                else
                {
                    $controller_name ='admin_home';
                }
            }
            else
            {
                $controller_name = $routes[1];
                if ( !empty($routes[2]) )
                {

                    $action_name = $routes[2];
                }
            }

        }

        // получаем имя экшена

//        var_dump($controller_name,$action_name);die();
        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_file = strtolower($model_name).'.php';
        $model_path = "application/Model/".$model_file;
        if(file_exists($model_path))
        {
            include "application/Model/".$model_file;
        }
       // var_dump($controller_name);die();
        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }

        else
        {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            Route::ErrorPage404();
        }

        // создаем контроллер

        $controller = new $controller_name;

// var_dump($controller_name);die;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера
            $controller->$action($this);

        }
        else
        {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
