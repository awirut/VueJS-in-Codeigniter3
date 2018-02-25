<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }



    public function do_getUser()
    {
                 $this->db->order_by("id", "desc");
        $query = $this->db->get('users');

        return $query->result();
    }

    public function do_insert($data)
    {

        return $this->db->insert('users', $data); 

    }

    public function do_update($id, $data)
    {

        return $this->db->update('users', $data, array('id' => $id));

    }

    public function do_delete($data)
    {

        return $this->db->delete('users', array('id' => $data)); 

    }

}
