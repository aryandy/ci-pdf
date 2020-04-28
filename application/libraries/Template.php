<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    private $layout_view;
    private $title = '';
    private $js_list = array();

    public function __construct()
    {
        $this->_ci =&get_instance();
    }

    public function admin($template,$data=null)
    {
        $data['js_layout'] = '';
        $isLogin  = $this->_ci->session->userdata('role_id');
        if($isLogin == '1'){
            $side = 'admin/sidebar';
        }else{
            $side = 'admin/sidebar_user';
        }
        
        foreach ($this->js_list as $v)
            $data['js_layout'] .= sprintf('<script type="text/javascript" src="%s"></script>', $v)."\n";
    
        $data['title_y']=$this->title;
        $data['content']=$this->_ci->load->view($template,$data, true);
        $data['sidebar']=$this->_ci->load->view($side,$data, true);
        $this->_ci->load->view('admin/template.php',$data);
    }

    public function home($template,$data=null)
    {
        $data['js_layout'] = '';
        
        foreach ($this->js_list as $v)
            $data['js_layout'] .= sprintf('<script type="text/javascript" src="%s"></script>', $v)."\n";
    
        $data['title_y']=$this->title;
        $data['content']=$this->_ci->load->view($template,$data, true);
        $data['header']=$this->_ci->load->view('home/header',$data, true);
        $data['footer']=$this->_ci->load->view('home/footer',$data, true);
        $this->_ci->load->view('home/index',$data);
    }

    public function def_js()
    {
        //default js
        $this->js(base_url('assets/admin/js/vendor-all.min.js'));
        $this->js(base_url('assets/admin/js/plugins/bootstrap.min.js'));
        $this->js(base_url('assets/admin/js/ripple.js'));
        $this->js(base_url('assets/admin/js/pcoded.min.js'));
    }

    /**
     * Set page title
     *
     * @param $title
     */
    function title($title) {
        $this->title = $title;
    }

    function js($item) {
        $this->js_list[] = $item;
    }

}
