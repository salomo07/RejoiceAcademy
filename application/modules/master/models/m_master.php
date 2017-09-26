<?php

class m_master extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function getMenuLevel1($filter)
    {
        $query = $this->db->query("select * from tblmenuaside".$this->getWhere($filter,'tblmenuaside')." order by IdMenu asc");
        return $query->result();
    }
    function updateMenuLevel1($filter)
    {        
        $this->db->query("update tblmenuaside ".$this->getSet($filter,'tblmenuaside')." where IdMenu=".$filter['IdMenu']);
    }
    function getWhere($filter,$tbl)
    {
        $query=$this->db->query("SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tbl'");
        $result=$query->result();
        $where ='';
        foreach ($filter as $key => $value) 
        {if($value==''){unset($filter[$key]);}}
        foreach ($filter as $key => $value) 
        {
            $isnumber=false;
            foreach ($result as $r) 
            {
                if($r->COLUMN_NAME == $key && $r->DATA_TYPE=='int'){$isnumber=true;}
            }
            if($isnumber==true)
            {                
                $where .= $key.' = '.$value.'';
                unset($filter[$key]);
                if(count($filter)>0){$where .='and ';}
            }
            else
            {
                $where .= $key.' like "%'.$value.'%" ';
                unset($filter[$key]);
                if(count($filter)>0){$where .='and ';}
            }
        }
        if($where!=''){$where =' where '.$where;}
        return $where;        
    }
    function getSet($filter,$tbl)
    {
        $query=$this->db->query("SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$tbl'");
        $result=$query->result();

        $set ='';
        foreach ($filter as $key => $value) 
        {
            $isnumber=false;
            foreach ($result as $r) 
            {
                if($r->COLUMN_NAME == $key && $r->DATA_TYPE=='int'){$isnumber=true;}
            }
            if($isnumber==true)
            {                               
                $set .= $key.' = '.$value.''; 
                unset($filter[$key]);
                if(count($filter)>0){$set .=', ';}
            }
            else if($isnumber==false)
            {
                $set .= $key.' = "'.$value.'" ';
                unset($filter[$key]);
                if(count($filter)>0){$set .=', ';}
            }
        }
        if($set!=''){$set =' set '.$set;}
        return $set;         
    }
}
