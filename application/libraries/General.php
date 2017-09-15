<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*---------------------------------------------------------------------
    Class privilege ,generate all request linked to the access controll
----------------------------------------------------------------------*/

class General {

    private $obj = NULL;
    function General(){
        $this->obj= & get_instance();
        $this->obj->load->model('m_login');
        $this->asideleft='';
        $this->asideright='';
        $this->header='';
        $this->colorStyle='';
        $this->dataUser=$this->obj->session->userdata('dataUser');
    }
    
    function getHeaderAside()
    {
        if($this->dataUser)
        {
            $IdRole=$this->dataUser->IdRole;
            $arrayAside= array();
            $daftarmenuaside=$this->obj->m_login->getAksesMenuAside($IdRole);
            foreach ($daftarmenuaside as $key => $value) 
            {            
                $submenus=$this->obj->m_login->getSubMenuAside($value->IdMenu,$IdRole);
                array_push($arrayAside, (object) array('menu'=>$value,'submenus'=>$submenus));
            }
            $data['arrayAside']= $arrayAside;
            $this->asideleft= $this->obj->load->view('template/asideleft',$data,true);
            $this->asideright=$this->obj->load->view('template/asideright',$data,true);
            $this->obj->session->set_userdata('asideleft',$this->asideleft);
            /*---------------------------------------------------------*/

            $arrayHeader= array();
            $data['arrayDataUser']=$this->dataUser;
            $daftarmenu=$this->obj->m_login->getAksesMenuHeader($IdRole);
            
            foreach ($daftarmenu as $key => $value) 
            {            
                $submenus=$this->obj->m_login->getSubMenuHeader($value->IdMenu,$IdRole);
                array_push($arrayHeader, (object) array('menu'=>$value,'submenus'=>$submenus));

                if(strpos($this->obj->router->fetch_class(), $value->URL) !== false)
                {$this->colorStyle=$value->IconStyle;}
                foreach ($arrayHeader as $key => $xxx) 
                {
                    foreach ($xxx->submenus as $key => $yyy) 
                    {
                        if(strpos($this->obj->router->fetch_class(), $yyy->URL) !== false)
                        {$this->colorStyle=$yyy->IconStyle;}
                    }
                }
            }
            $data['arrayHeader']= $arrayHeader;//print_r($data['arrayHeader']);
            $data['REQUEST_URI']= explode('/',$_SERVER['REQUEST_URI']);
            $this->header= $this->obj->load->view('template/header',$data,true);
            $this->obj->session->set_userdata('header',$daftarmenu);  
        }
        else //if User not Loggedin, load view for public home
        {
            //echo "string".$this->obj->router->fetch_class();
            if($this->obj->router->fetch_class()=='Registration') //Not login but on Register page
            {
                $this->header= $this->obj->load->view('template/headerdefault','',true);
            }
            else
            {
                $this->header= $this->obj->load->view('template/headerlogin','',true);
            }
        }             
    }
    function tryLogin()
    {
        $username = $this->obj->input->post('username');
        $password = $this->obj->input->post('password');
        //Username is Unique
        $arrayUserdata=$this->obj->m_login->getUserData($username);

        if(count($arrayUserdata)>0)
        {
            if($password==$this->obj->encryption->decrypt(base64_decode($arrayUserdata->Password)))
            {
                $loginLog=array('IdUser'=>$arrayUserdata->Id,'Username'=>$arrayUserdata->Username,'Role'=>$arrayUserdata->IdRole,'IP'=>$_SERVER['REMOTE_ADDR'],'Host'=>gethostbyaddr($_SERVER['REMOTE_ADDR']),'LoginTime'=>date('Y-m-d H:i:s'),'Token'=>base64_encode(date("Y-m-d H:i:s")));
                $arrayUserdata=array('IdUser'=>$arrayUserdata->Id,'Username'=>$arrayUserdata->Username,'Fullname'=>$arrayUserdata->Fullname,'Role'=>$arrayUserdata->Role,'Keterangan'=>$arrayUserdata->Keterangan,'IdRole'=>$arrayUserdata->IdRole,'IP'=>$_SERVER['REMOTE_ADDR'],'Host'=>gethostbyaddr($_SERVER['REMOTE_ADDR']),'LoginTime'=>date('Y-m-d H:i:s'),'Token'=>base64_encode(date("Y-m-d H:i:s")));
                $this->obj->m_login->insertLoginLog($loginLog);
                $this->obj->session->set_userdata('dataUser',(object)$arrayUserdata);
                $this->dataUser=$arrayUserdata;
                $dataToken= $username.'|'.base64_encode(date("Y-m-d H:i:s")).'|'.$_SERVER['REMOTE_ADDR'].'|'.gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $this->obj->session->set_userdata('dataToken',$dataToken);
                echo "User found";
            }
            else{echo "Password wrong";}
        }
        else
        {
            echo "User not found";
        }
    }
    function signout()
    {
        $this->obj->m_login->updateSignout($this->dataUser->IdUser);
        $this->obj->session->sess_destroy();
        redirect(current_url());             
    }

}
