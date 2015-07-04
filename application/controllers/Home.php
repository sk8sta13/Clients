<?php

defined('BASEPATH') or die('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        if (! is_null(get_cookie('clients-language'))) {
            $this->lang->load('app', get_cookie('clients-language'));
            $this->lang->load('form_validation', get_cookie('clients-language'));
        }

    }

    public function index()
    {

        $this->load->view('home/index');

    }

    public function about()
    {

        $this->load->view('home/about');

    }

    public function login()
    {

        $message['error'] = false;

        if ($this->input->method() == 'post') {

            $this->load->model('Usermodel', 'user');
            $user = $this->user->getBy($this->input->post());

            if (count($user)) {

                $user = (array) $user[0];
                unset($user['password']);
                $this->session->set_userdata($user);

                redirect('/home', 'refresh');

            } else {

                $message['error'] = true;

            }

        }

        $this->load->view('home/login.php', $message);

    }

    public function logout()
    {

        $this->session->sess_destroy();
        redirect('/home', 'refresh');

    }

    public function settings()
    {

        if ($this->session->has_userdata('id')) {

            $this->load->view('home/settings');

        } else {

            $this->load->view('home/permission-denied');

        }

    }

    public function language($lang)
    {

        // 3 mêses = 7776000 segundos, tempo de expiração do cookie.
        set_cookie('clients-language', $lang, 7776000);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');

    }

}
