<?php

class m_master extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function getMenuAsideLevel1()
    {
        $query = $this->db->query("select * from tblmenuaside order by IdMenu asc");
        return $query->result();
    }
    function getMenuHeaderLevel1()
    {
        $query = $this->db->query("select * from tblmenuaside order by IdMenu asc");
        return $query->result();
    }
}
