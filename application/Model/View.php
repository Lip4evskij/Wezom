<?php
 class  Model_View extends Model
 {
     function __construct()
     {
         parent::__construct();
     }

     public function get_data()
     {

         $ret=false;
         $sql="SELECT * FROM News ORDER BY id DESC";
         $query=$this->db->query($sql);
         $ret=$query->fetchAll();
         if($ret)
         {
             return $ret;
         }
            return false;

     }
     public function getPageModel()
     {

         $sql="SELECT id FROM News";
         $query=$this->db->query($sql);
         return $query->rowCount();
     }
     public function getListModel($offset,$limit)
     {

         $sql="SELECT * FROM News LIMIT $offset,$limit";
         $query=$this->db->query($sql);
         return $query->fetchAll();

     }
 }