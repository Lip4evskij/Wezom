<?php
class Model_News extends Model
{


    public  function get_list($filter)
    {

    }
    public function get_id($id)
    {
        try{

            $stmt =("SELECT * from News WHERE id = $id");
            $query=$this->db->query($stmt);
            $row = $query->fetch();
        }catch(PDOException $e) {
            echo $e->getMessage();

            exit;
        }
        return $row;
    }

    public function count_list()
    {
        //кол-во get_list
    }
    public function add()
    {
        //добавляет при обновлении страницы (переделать)
        if (isset($_POST['add']))
        {
            $stmt = ("INSERT INTO News (title) values ('new new ne w запись тайтл')");
        $qver=$this->db->query($stmt);

         return $qver;
        }

    }


    public function updata($id,$data)
    {

    }
}