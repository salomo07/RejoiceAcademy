<?php

class m_login extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function getUserData($username)
    {   
        $query = $this->db->query("select * from tblUser u join tblRole r on u.Role=r.IdRole  where Username = '$username'");
        return $query->row();
    }
    function getUserToken($user,$ip,$host,$token)
    {
        $query = $this->db->query("select * from tblLoginLog where Username = '$user' and IP='$ip' and Host='$host' and Token='$token'");
        return $query->row();
    }
    function insertLoginLog($data)
    {
        $this->db->insert("tblLoginLog",$data);
    }
    function updateSignout($idUser)
    {
        $date=date("Y-m-d H:i:s");
        $xxx=$this->db->query("select Id from tblLoginLog where IdUser=$idUser order by Id desc limit 1")->row();
        $this->db->query("update tblLoginLog set LogoutTime = '$date' where Id = $xxx->Id");
    }
    function verifyPassword($idUser,$old)
    {
        $query = $this->db->query("select u.Id as IdUser, * from tblUser where Id=$idUser and Password='$old'");
        return $query->row();
    }
    function updatePassword($idUser,$new)
    {
        $this->db->query("update tblUser set Password='$new' where Id=$idUser");
    }
    function getAksesMenuHeader($role)
    {
        $query = $this->db->query("select * from tblAksesMenuHeader a join tblMenuHeader m on m.IdMenu=a.IdMenu
        where IdRole=$role order by m.IdMenu asc");
        return $query->result();
    }
    
    function getAksesMenuAside($role)
    {
        $query = $this->db->query("select * from tblAksesMenuAside a join tblMenuAside m on m.IdMenu=a.IdMenu
        where IdRole=$role order by m.IdMenu asc");
        return $query->result();
    }
    function getSubMenuHeader($IdMenu,$IdRole)
    {
        $query = $this->db->query("select * from tblMenuHeader2 d join tblaksesmenuheader2 a on a.IdMenu2=d.IdMenu2 where d.IdMenu=$IdMenu and a.IdRole=$IdRole order by d.IdMenu2 asc");
        return $query->result();
    }
    function getSubMenuAside($IdMenu,$IdRole)
    {
        $query = $this->db->query("select * from tblMenuAside2 d join tblaksesmenuaside2 a on a.IdMenu2=d.IdMenu2 where d.IdMenu=$IdMenu and a.IdRole=$IdRole order by d.IdMenu2 asc");
        return $query->result();
    }
    function getUsername($key)
    {
        $query = $this->db->query("select Username from tblUser where Username like '%$key%'");
        return $query->result();
    }
}
