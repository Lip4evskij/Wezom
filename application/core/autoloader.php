<?php
spl_autoload_register(function ($class_name) {
    $path=APPLICATION;
    $tmp=explode('_',$class_name);
    if (is_array($tmp))
    {
        $class=$path.'/'.$tmp[0].'/'.$tmp[1].'.php';

         include $class;
    }
    else
    {
        var_dump('error no class ', $class_name);die();
    }
});