<?php
/**
 * Created by PhpStorm.
 * User: Ljubomir
 * Date: 09-Mar-16
 * Time: 20:41
 */
class FormaLogin extends CI_Controller {

    function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
            $this->load->view('formsuccess');
        }
    }
}