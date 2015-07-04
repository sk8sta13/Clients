<?php

defined('BASEPATH') or die('No direct script access allowed');

class Webservice extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('Usermodel', 'user');
        $this->load->model('Clientmodel', 'client');

    }

    public function index($client)
    {

        $data = $this->input->post();
        if ($data) {

            $user = $this->user->getBy(['username' => $client, 'password' => $data['password']]);
            if ($user) {

                header("Access-Control-Allow-Origin: *");
                if (isset($data['type'])) {

                    $result = $this->client->getDataService($user, $data['type']);
                    if ($data['type'] == 'xml') {

                        header ("Content-Type:text/xml");

                    }

                } else {

                    $result = $this->client->getDataService($user);

                }

                die($result);

            } else {

                $this->load->view('errors/html/error_404', ['heading' => '404 Page Not Found', 'message' => '<p>The page you requested was not found.</>']);

            }

        } else {

            $this->load->view('errors/html/error_404', ['heading' => '404 Page Not Found', 'message' => '<p>The page you requested was not found.</>']);

        }

    }

}
