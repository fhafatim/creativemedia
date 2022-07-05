<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib
{

    function __construct()
    {
        $this->ci = & get_instance();
    }

    function destroy_all()
    {
        $this->ci->session->sess_destroy();
        $this->ci->session->sess_create();
    }

    function login()
    {
        return $this->ci->session->userdata('nik');
    }

    function logout()
    {
        $this->ci->session->unset_userdata('nik', 'id_employe');
        $this->ci->session->sess_destroy();
    }

    function record()
    {
        return $this->ci->mdl_login->loggedin(array('nik' => $this->login()));
    }

}
