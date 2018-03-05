<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.03.2018
 * Time: 0:05
 */
class Request
{
    public $get;
    public $post;
    public $session;
 public function __construct()
 {
     $this->get=$_GET;
     $this->post=$_POST;
     $this->session=$_SESSION;


 }
 public function get_param($method,$key,$default=false)
 {
     if($method!='' && $key!='')
     {
         switch ($method) {
             case 'get':
                 if (isset($this->get[$key]))
                 {
                     return $this->get[$key];
                 }
                 break;
             case 'post':
                 if (isset($this->post[$key]))
                 {
                     return $this->post[$key];
                 }
                 break;
             case 'session':
                 if (isset($this->session[$key]))
                 {
                     return $this->session[$key];
                 }
                 break;
                      }


     }
     return $default;
 }
}